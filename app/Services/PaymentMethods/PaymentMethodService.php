<?php

namespace App\Services\PaymentMethods;

use App\Models\PaymentMethod;

class PaymentMethodService
{
    private int $ttl = 15;

    public function getAll(int $minAmount = 0)
    {
        $result = cache()->remember('PaymentMethodService.getAll' . md5($minAmount), $this->ttl, function () use ($minAmount) {
            return PaymentMethod::when($minAmount != 0, function ($q) use ($minAmount) {
                return $q->where('min_amount', '<=' , $minAmount);
            })->where('is_active', true)
                ->orderBy('name')
                ->get()
                ->groupBy('group');
        });

        return $result;
    }

    public function show($id)
    {
        return cache()->remember('PaymentMethodService.show.' . md5($id) , $this->ttl, function () use ($id) {
           return PaymentMethod::where('id', $id)->first() ?? [];
        });
    }
}