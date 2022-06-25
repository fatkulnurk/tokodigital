<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('update:products', function () {
    $products = (new \Fatkulnurk\BillerSdk\Products\PaymentPoint())->getPrepaids(false);

    $maps = [];
    foreach ($products as $product) {
        $product['price'] = (int) $product['price'] + config('setting.platform-fee');
        $product['details'] = json_encode($product['details'] ?? []);
        $maps[] = $product;
    }

    \App\Models\Product::upsert($maps, ['id']);
})->purpose('Update products from providers');

Artisan::command('update:transactions', function () {
    (new \App\Services\Transactions\TransactionService())->checkStatusAll();
})->purpose('Update payment status');
