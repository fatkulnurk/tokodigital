<?php

namespace App\Http\Livewire\Widgets;

use App\Models\Transaction;
use Livewire\Component;

class Transactions extends Component
{
    public function render()
    {
        $transactions = cache()->remember('widget.transactions.render', 5, function () {
            return Transaction::select(['id', 'product_name', 'product_price', 'status', 'created_at'])
                ->orderByDesc('created_at')
                ->limit(5)
                ->get();
        });

        return view('livewire.widgets.transactions', compact('transactions'));
    }
}
