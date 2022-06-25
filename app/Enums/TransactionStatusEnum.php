<?php

namespace App\Enums;

class TransactionStatusEnum
{
    const STATUS_WAITING_PAYMENT = 0;
    const STATUS_PROCESS = 1;
    const STATUS_FAILED = 2;
    const STATUS_SUCCESS = 3;
    public function get($key = '')
    {
        $data = [
            self::STATUS_WAITING_PAYMENT => 'Menunggu Pembayaran',
            self::STATUS_PROCESS => 'Proses pengisian',
            self::STATUS_FAILED => 'Gagal',
            self::STATUS_SUCCESS => 'Transaksi Sukses'
        ];

        if (!blank($key)) {
            return $data[$key];
        } else {
//            return '';
            throw new \Exception('Unknown Key');
        }

        return $data;
    }
}