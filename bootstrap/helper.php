<?php

if (!function_exists('blur_data')) {
    function blur_data(string $target, $positionEnd = true)
    {
        $length = strlen($target) / 2;
        $count = strlen($target) - $length;
        if ($positionEnd) {
            $output = substr_replace($target, str_repeat('*', $count), $length, $count);
        } else {
            $output = substr_replace($target, str_repeat('*', $count), 0, $count);
        }
        return $output;
    }
}

if (!function_exists('get_client_ip_public')) {
    function get_client_ip_public(): ?string
    {
        return request()->ip();
    }
}

if (!function_exists('to_utc')) {
    function to_utc($dateTime, $toTimestamp = false, $withFlag = 'UTC')
    {
        $carbon = \Illuminate\Support\Carbon::parse($dateTime)->setTimezone('UTC');

        if ($toTimestamp) {
            return $carbon->timestamp;
        }

        return $carbon->toDateTimeString() . ' ' . $withFlag;
    }
}

if (!function_exists('to_wib')) {
    function to_wib($dateTime, $toTimestamp = false, $withFlag = 'WIB')
    {
        $carbon = \Illuminate\Support\Carbon::parse($dateTime)->setTimezone('Asia/Jakarta');

        if ($toTimestamp) {
            return $carbon->timestamp;
        }

        return $carbon->toDateTimeString() . ' ' . $withFlag;
    }
}

if (!function_exists('to_rupiah')) {
    function to_rupiah($amount, $withSymbol = true)
    {
        $result = number_format($amount, 0, ',', '.');

        return $withSymbol ? 'Rp' . $result : $result;
    }
}

