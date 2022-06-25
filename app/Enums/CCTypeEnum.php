<?php

namespace App\Enums;

class CCTypeEnum
{
    const CC_TYPE_WHATSAPP = 1;
    const CC_TYPE_EMAIL = 2;
    const CC_TYPE_SMS = 3;

    public function get($key = '')
    {
        $data = [
            self::CC_TYPE_WHATSAPP => 'Whatsapp',
            self::CC_TYPE_EMAIL => 'Email',
            self::CC_TYPE_SMS => 'Sms'
        ];

        if (!blank($key)) {
            return $data[$key];
        } else {
            throw new \Exception('Unknown Key');
        }

        return $data;
    }
}