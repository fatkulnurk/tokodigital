<?php

namespace App\Enums;

class PaymentMethodGroupEnum
{
    const GROUP_CRYPTO = 'Crypto';
    const GROUP_VIRTUAL_ACCOUNT = 'Virtual Akun';
    const GROUP_EWALLET = 'E-Wallet';
    const GROUP_BANK_TRANSFER = 'Bank Transfer';
    const GROUP_CREDIT_CARD = 'Kartu Kredit';
    const GROUP_RETAIL = 'Ritel';
    const GROUP_QRIS = 'QRIS';
    const GROUP_KREDIT = 'Kredit';

    public function get($key = '')
    {
        $data = [
            self::GROUP_CRYPTO => 'Crypto',
            self::GROUP_VIRTUAL_ACCOUNT => 'Virtual Akun',
            self::GROUP_EWALLET => 'E-Wallet',
            self::GROUP_BANK_TRANSFER => 'Bank Transfer',
            self::GROUP_CREDIT_CARD => 'Kartu Kredit',
            self::GROUP_RETAIL => 'Ritel'
        ];

        if (!blank($key)) {
            return $data[$key] ?? '';
        }

        return $data;
    }
}