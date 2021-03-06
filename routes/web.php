<?php

use Fatkulnurk\BillerSdk\Payments\Indodax\IndodaxClient;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (\App\Services\PaymentMethods\PaymentMethodService $paymentMethodService) {
    $paymentMethods = $paymentMethodService->getAll();

    return view('welcome', compact('paymentMethods'));
})->name('index');

Route::get('/cron-job', \App\Http\Controllers\CronController::class)->name('cron-job');
Route::get('/pages/{slug}', \App\Http\Controllers\PageController::class)->name('pages.show');

Route::group([
    'prefix' => 'products',
    'as' => 'products.'
], function () {
    Route::get('/category-prepaid/{id}', [\App\Http\Controllers\ProductController::class, 'categoryPrepaidShow'])->name('category.show');
});

Route::group([
    'prefix' => 'transactions',
    'as' => 'transactions.'
], function () {
    Route::get('/', [\App\Http\Controllers\TransactionController::class, 'index'])->name('index');
    Route::get('/{id}', [\App\Http\Controllers\TransactionController::class, 'show'])->name('show');
});

Route::get('/dashboard', function () {
    return redirect()->route('dashboard.payment-methods.index');
})->middleware(['auth'])->name('dashboard');

Route::group([
    'prefix' => 'dashboard',
    'as' => 'dashboard.',
    'middleware' => ['auth', 'user_role:' . \App\Enums\RoleUserEnum::ROLE_ADMIN]
], function () {
    Route::view('/payment-methods', 'dashboard.payment-methods.index')
        ->name('payment-methods.index');
    Route::get('/payment-methods', [\App\Http\Controllers\Dashboard\PaymentMethodController::class, 'index'])
        ->name('payment-methods.index');
    Route::get('/payment-methods/{id}', [\App\Http\Controllers\Dashboard\PaymentMethodController::class, 'edit'])
        ->name('payment-methods.edit');
    Route::post('/payment-methods/{id}', [\App\Http\Controllers\Dashboard\PaymentMethodController::class, 'update'])
        ->name('payment-methods.update');
    Route::resource('/pages', \App\Http\Controllers\Dashboard\PageController::class)->only(['edit', 'update']);
});

require __DIR__.'/auth.php';
require __DIR__.'/callback.php';
