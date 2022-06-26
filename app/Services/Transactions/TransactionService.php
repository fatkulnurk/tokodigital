<?php

namespace App\Services\Transactions;

use App\Enums\CCTypeEnum;
use App\Enums\TransactionStatusEnum;
use App\Mail\TransactionCreated;
use App\Mail\TransactionDelivered;
use App\Mail\TransactionExpired;
use App\Mail\TransactionPaid;
use App\Models\Transaction;
use App\Models\TransactionLog;
use App\Services\PaymentMethods\PaymentMethodService;
use App\Services\Products\ProductService;
use Fatkulnurk\BillerSdk\Payments\Payment;
use Fatkulnurk\BillerSdk\Products\PaymentPoint;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class TransactionService
{
    public function createOrder(string $productId, string $target, string $paymentMethodId, string $customerContact)
    {
        $paymentMethod = (new PaymentMethodService())->show($paymentMethodId);
        if (blank($paymentMethod)) {
            throw new \Exception('Payment Method Not Found');
        }

        if (!$paymentMethod->is_active) {
            throw new \Exception('Payment Method Not Active');
        }

        $paymentService = (new Payment());
        $product = (new ProductService())->getProduct($productId);

        if (blank($product)) {
            throw new \Exception('');
        }

        DB::beginTransaction();

        try {
            $transaction = \App\Models\Transaction::create([
                'user_id' => Auth::id() ?? null,
                'payment_method_id' => $paymentMethodId,
                'product_id' => $product->id,
                'product_name' => $product->name,
                'product_price' => $product->price,
                'target' => $target,
                'status' => TransactionStatusEnum::STATUS_WAITING_PAYMENT,
                'customer_contact' => $customerContact,
                'cc_type' => CCTypeEnum::CC_TYPE_EMAIL
            ]);

            $paymentProvider = $paymentService->getProvider($paymentMethod);
            $paymentService->setPayment($paymentProvider);
            $transactionPayment = $paymentService->createPayment($transaction, $paymentMethod);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw new \Exception($exception->getMessage());
        }

        // kirim email
        try {
            if ($transaction->cc_type == CCTypeEnum::CC_TYPE_EMAIL) {
                Mail::queue((new TransactionCreated($transaction)));
            }
        } catch (\Exception $exception) {
        }

        return $transaction;
    }

    public function checkStatusAll()
    {
        foreach (Transaction::with(['paymentMethod', 'transactionPayment'])
                     ->whereIn('status', [
                         TransactionStatusEnum::STATUS_WAITING_PAYMENT,
                         TransactionStatusEnum::STATUS_PROCESS
                     ])
                     ->orderBy('created_at')
                     ->cursor() as $transaction) {
            $this->checkStatus($transaction);
        }
    }

    public function checkStatus(Transaction $transaction)
    {
        if ($transaction->status == TransactionStatusEnum::STATUS_WAITING_PAYMENT) {
            $paymentService = (new Payment());
            $paymentMethod = $transaction->paymentMethod;
            $paymentProvider = $paymentService->getProvider($paymentMethod);
            $paymentService->setPayment($paymentProvider);
            $response = $paymentService->checkStatusPayment($transaction, $paymentMethod);

            // update ORM
            $transaction->refresh();

            if ($transaction->status == TransactionStatusEnum::STATUS_WAITING_PAYMENT) {
                // pembayaran sudah expired
                if ($transaction->transactionPayment->expired_at < now()->timestamp) {
                    $transaction->status = TransactionStatusEnum::STATUS_FAILED;
                    $transaction->save();

                    $response = $transaction;
                }
            } elseif ($transaction->status == TransactionStatusEnum::STATUS_PROCESS) {
                // kirim email ketika pembayaran berhasil
                try {
                    if ($transaction->cc_type == CCTypeEnum::CC_TYPE_EMAIL) {
                        Mail::queue(new TransactionPaid($transaction));
                    }
                } catch (\Exception $exception) {
                }

                // ketika pembayaran sukses
                $response = $this->createOrderToProvider($transaction);
            }
        }

        // meski terkadang tidak digunakan
        // ketika pembayaran sukses
        if ($transaction->status == TransactionStatusEnum::STATUS_PROCESS) {
            $response = $this->createOrderToProvider($transaction);
        }

        return $response;
    }

    public function createOrderToProvider(Transaction $transaction)
    {
        $paymentPoint = (new PaymentPoint());

        // jika reff masih kosong, lakukan order
        if (blank($transaction->reff_id)) {
            $response = $paymentPoint->order($transaction->product_id, $transaction->target);
        } else {
            // Cek transaksi aja
            $response = $paymentPoint->checkTransaction($transaction->reff_id);
        }

        // selama response kosong atau berupa string
        if (blank($response) || is_string($response)) {
            TransactionLog::create([
                'transaction_id' => $transaction->id,
                'title' => $response ?? 'Tanpa keterangan'
            ]);

            // jika transaksi gagal diproses lebih dari 24 jam, buat transaksi jadi gagal
            return $transaction;
        }

        if (!is_string($response)) {
            switch ($response['status']) {
                case 0: // sedang di proses
                    $transaction->reff_id = optional($response)['id'];
                    break;
                case 1: // berhasil
                    $transaction->reff_id = optional($response)['id'];
                    $transaction->status = TransactionStatusEnum::STATUS_SUCCESS;
                    $transaction->sn = optional($response)['sn'];

                    // kirim email ketika transaksi sukses
                    try {
                        if ($transaction->cc_type == CCTypeEnum::CC_TYPE_EMAIL) {
                            Mail::queue(new TransactionDelivered($transaction));
                        }
                    } catch (\Exception $exception) {

                    }

                    TransactionLog::create([
                        'transaction_id' => $transaction->id,
                        'title' => 'Transaksi berhasil',
                        'data' => $response
                    ]);

                    break;
                case 2: // Gagal (lakukan reset sn, agar order ulang)
                    $transaction->reff_id = null;
                    TransactionLog::create([
                        'transaction_id' => $transaction->id,
                        'title' => 'Transaksi Gagal',
                        'data' => $response
                    ]);
                    break;
            }

            $transaction->reply = json_encode($response);
            $transaction->save();
        }

        return $transaction;
    }
}