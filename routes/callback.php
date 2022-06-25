<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'callbacks',
    'as' => 'callbacks.'
], function () {
    Route::any('/biller', function () {

    })->name('biller');
    Route::any('/moota', function () {

    })->name('moota');
    Route::any('/duikut', function () {

    })->name('duitku');
});