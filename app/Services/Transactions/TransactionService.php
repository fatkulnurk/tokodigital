<?php

namespace App\Services\Transactions;

use App\Enums\CCTypeEnum;
use App\Enums\TransactionStatusEnum;
use App\Mail\TransactionCreated;
use App\Mail\TransactionDelivered;
use App\Mail\TransactionExpired;
use App\Mail\TransactionPaid;
use App\Models\Transaction;
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
        switch ($transaction->status) {
            case TransactionStatusEnum::STATUS_WAITING_PAYMENT:
                $paymentService = (new Payment());
                $paymentMethod = $transaction->paymentMethod;
                $paymentProvider = $paymentService->getProvider($paymentMethod);
                $paymentService->setPayment($paymentProvider);
                $response = $paymentService->checkStatusPayment($transaction, $paymentMethod);

                $transaction->refresh();

                // kirim email ketika pembayaran berhasil
                try {
                    if ($transaction->cc_type == CCTypeEnum::CC_TYPE_EMAIL) {
                        Mail::queue(new TransactionPaid($transaction));
                    }
                } catch (\Exception $exception) {
                }

                break;
            case TransactionStatusEnum::STATUS_PROCESS:
                $response = $this->createOrderToProvider($transaction);
                break;
            default:
                $response = [];
        }

        return $response;
    }

    public function createOrderToProvider(Transaction $transaction)
    {
        $paymentPoint = (new PaymentPoint());
        $response = $paymentPoint->order(
            $transaction->product_id,
            $transaction->target
        );

        if(blank($response)) {
            // jika transaksi gagal diproses lebih dari 24 jam, buat transaksi jadi gagal
            return $transaction;
        }

        $transaction->status = TransactionStatusEnum::STATUS_SUCCESS;
        $transaction->sn = optional($response)['sn'];
        $transaction->reply = json_encode($response);
        $transaction->reff_id = optional($response)['id'];
        $transaction->save();

        // kirim email ketika transaksi sukses
        try {
            if ($transaction->cc_type == CCTypeEnum::CC_TYPE_EMAIL) {
                Mail::queue(new TransactionDelivered($transaction));
            }
        } catch (\Exception $exception) {

        }

        return $transaction;
    }
}