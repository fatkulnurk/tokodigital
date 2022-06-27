<?php

if (!function_exists('terbilang_decimal')) {
    function terbilang_decimal($x)
    {
        $float = round($x - floor($x), 8);
        $result = '';
        if ($float > 0.0000001) {
            $floatStr = explode('.', $float);
            $floatStr = $floatStr[1] ?? '';
            $floatStr = substr($floatStr, 0, 8);
            $result = " koma" . terbilang($floatStr);
        }

        return terbilang($x) . $result;
    }
}

if (!function_exists('terbilang')) {
    function terbilang($x) {
        $angka = ["", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas"];

        if ($x < 0) {
            return "";
        }
        
        if ($x < 12)
            return " " . $angka[$x];
        elseif ($x < 20)
            return terbilang($x - 10) . " belas";
        elseif ($x < 100)
            return terbilang($x / 10) . " puluh" . terbilang($x % 10);
        elseif ($x < 200)
            return "seratus" . terbilang($x - 100);
        elseif ($x < 1000)
            return terbilang($x / 100) . " ratus" . terbilang($x % 100);
        elseif ($x < 2000)
            return "seribu" . terbilang($x - 1000);
        elseif ($x < 1000000)
            return terbilang($x / 1000) . " ribu" . terbilang($x % 1000);
        elseif ($x < 1000000000)
            return terbilang($x / 1000000) . " juta" . terbilang($x % 1000000);
    }
}

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

