<?php

namespace App\Http\Livewire\PaymentMethods;

use App\Models\PaymentMethod;
use App\Services\PaymentMethods\PaymentMethodService;
use Livewire\Component;

class Manage extends Component
{
    public function updateStatus($id)
    {
        $paymentMethod = PaymentMethod::select(['id', 'is_active'])->where('id', $id)->first();

        if (!blank($paymentMethod)) {
            $paymentMethod->is_active = !$paymentMethod->is_active;
            $paymentMethod->save();
        }
    }

    public function render()
    {
        return view('livewire.payment-methods.manage', [
            'paymentMethods' => PaymentMethod::get()->groupBy('group')
        ]);
    }
}
