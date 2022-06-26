<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class CronController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function __invoke(Request $request)
    {
        switch ($request->query('action')) {
            case 'update-transactions':
                Artisan::call('update:transactions');
                break;
            case 'update-products':
                Artisan::call('update:products');
                break;
            default:
                Artisan::call('update:transactions');
                Artisan::call('update:products');
        }

        return 'OK';
    }
}
