<?php

namespace App\Enums;

class PaymentMethodProviderEnum
{
    const PROVIDER_MOOTA = 1;
    const PROVIDER_INDODAX = 2;
    const PROVIDER_DUITKU = 3;

    public function get($key = '')
    {
        $data = [
            self::PROVIDER_MOOTA => 'Moota',
            self::PROVIDER_INDODAX => 'Indodax',
            self::PROVIDER_DUITKU => 'Duitku'
        ];

        if (!blank($key)) {
            return $data[$key] ?? '';
        }

        return $data;
    }
}