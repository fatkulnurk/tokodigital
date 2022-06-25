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
        $request->validate([
            'name' => 'required|string|max:190',
            'account_name' => 'nullable|string|max:190',
            'account_number' => 'nullable|string|max:190',
            'account_memo' => 'nullable|string|max:190',
            'min_amount' => 'required|string|max:190',
            'max_amount' => 'required|string|max:190',
            'rate' => 'required|string|max:190',
            'fee_in_idr' => 'required|string|max:190',
            'fee_in_percent' => 'required|string|max:190',
            'provider' => 'required|string|max:190',
            'group' => 'required|string|max:190',
            'is_with_random_amount' => 'nullable|string|max:1',
            'is_active' => 'nullable|string|max:1'
        ]);

        PaymentMethod::where('id', $id)->update([
            'name' => $request->input('name', ''),
            'account_name' => $request->input('account_name', ''),
            'account_number' => $request->input('account_number', ''),
            'account_memo' => $request->input('account_memo', ''),
            'min_amount' => $request->input('min_amount', 1),
            'max_amount' => $request->input('max_amount', 1000000000),
            'rate' => $request->input('rate', 1),
            'fee_in_idr' => $request->input('fee_in_idr'),
            'fee_in_percent' => $request->input('fee_in_percent'),
            'provider' => $request->input('provider'),
            'group' => $request->input('group'),
            'is_with_random_amount' => $request->input('is_with_random_amount', false),
            'is_active' => $request->input('is_active', false)
        ]);

        return redirect()->back()->with('success', 'Update berhasil');
    }
}
