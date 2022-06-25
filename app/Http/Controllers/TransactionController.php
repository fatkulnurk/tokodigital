<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Services\Transactions\TransactionService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::select(['id', 'product_name', 'status', 'product_price', 'created_at'])
            ->orderByDesc('created_at')->simplePaginate(10);

        return view('transactions.index', compact('transactions'));
    }

    public function show($id, Request $request, TransactionService $transactionService)
    {
        $md5 = md5($id);
        $transaction = cache()->remember('TransactionController.show' . $md5, 1, function () use ($id) {
            return Transaction::with(['paymentMethod', 'transactionPayment'])
                ->where('id', $id)->firstOrFail();
        });

        if ($request->query('confirm', '') == 'payment') {
            $transactionService->checkStatus($transaction);

            return redirect()->route('transactions.show', $transaction->id);
        }

        return view('transactions.show', compact('transaction'));
    }
}
