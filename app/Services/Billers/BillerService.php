<?php

namespace App\Services\Billers;

use Illuminate\Support\Facades\Http;

class BillerService
{
    private $merchantId = 'b1e103f6-5eb2-4242-badf-29bb1f65983f';
    private $token = '6bf20fcd-3b0c-404d-9230-b172b4450cbc|wreMqma2uUewkTn0S93F0Nz4zYNigDK9bDFiZbA1';

    public function getCategories()
    {
        return cache()->remember('categories', 600, function () {
            $response = Http::withToken($this->token)
                ->get('http://bayarcepat.test/api/v1/products/payment-points/categories');

            if ($response->ok()) {
                return collect($response['data'])->toArray();
            }

            return [];
        });
    }

    public function getPrepaids($categorySlug = '')
    {
        $http = http_build_query([
            'expand' => 1,
            'category_slug' => $categorySlug
        ]);

        return cache()->remember(md5($http), 600, function () use ($http) {
            $response = Http::withToken($this->token)
                ->get('http://bayarcepat.test/api/v1/products/payment-points/prepaids?' . $http);

            if ($response->ok()) {
                return collect($response['data'])->toArray();
            }

            return [];
        });
    }
}