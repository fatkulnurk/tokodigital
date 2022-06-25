<div>
    <div class="overflow-x-auto w-full">
        <table class="table w-full">
            <thead>
            <tr>
                <th>Name</th>
                <th class="w-1">Provider</th>
                <th class="w-1">Group</th>
                <th class="w-1 text-right">Status</th>
                <th class="text-right"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($paymentMethods as $key => $items)
                <tr>
                    <td colspan="5" class="bg-base-100 font-extrabold">Group: {{ $key }}</td>
                </tr>
            @foreach($items as $paymentMethod)
                <tr>
                    <td>
                        {{ $paymentMethod->name }}
                    </td>
                    <td class="w-1">
                        {{ (new \App\Enums\PaymentMethodProviderEnum())->get($paymentMethod->provider) }}
                    </td>
                    <td class="w-1">
                        {{ $paymentMethod->group }}
                    </td>
                    <td class="w-1 text-right">
                        <div class="form-control bg-transparent">
                            <label class="label cursor-pointer">
                                <input wire:click="updateStatus('{{ $paymentMethod->id }}')"
                                       type="checkbox"
                                       class="toggle toggle-secondary"
                                       @if($paymentMethod->is_active) checked @endif
                                />
                            </label>
                        </div>
                    </td>
                    <th class="w-1 text-right">
                        <a href="{{ route('dashboard.payment-methods.edit', $paymentMethod->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    </th>
                </tr>
            @endforeach
            @endforeach
            </tbody>
        </table>
    </div>
</div>
