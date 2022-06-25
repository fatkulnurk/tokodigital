<?php

namespace App\Http\Controllers\Dashboard;

use App\Enums\PaymentMethodGroupEnum;
use App\Enums\PaymentMethodProviderEnum;
use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    public function index()
    {
        return view( 'dashboard.payment-methods.index');
    }

    public function edit($id)
    {
        $paymentMethod = PaymentMethod::where('id', $id)->firstOrFail();
        $groups = (new PaymentMethodGroupEnum())->get();
        $providers = (new PaymentMethodProviderEnum())->get();

        return view('dashboard.payment-methods.edit', compact('paymentMethod', 'groups', 'providers'));
    }

    public function update($id, Request $request)
    {
    }
}
