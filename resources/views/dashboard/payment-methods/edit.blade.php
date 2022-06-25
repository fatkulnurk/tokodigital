<x-guest-layout>
    @section('title', 'Edit Metode Pembayaran')
    <form action="{{ route('dashboard.payment-methods.update', $paymentMethod->id) }}">
        @csrf

        <div class="card w-full bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title">Edit {{ $paymentMethod->name }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Nama</span>
                        </label>
                        <input name="name" type="text" value="{{ old('name', $paymentMethod->name) }}"
                               class="input input-bordered w-full"/>
                    </div>

                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Kode Pembayaran (besar kecil berpengaruh)</span>
                        </label>
                        <input type="text" value="{{ old('payment_code', $paymentMethod->payment_code) }}"
                               class="input input-bordered w-full" disabled/>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Akun Pembayaran - Nama</span>
                        </label>
                        <input name="account_name" type="text"
                               value="{{ old('account_name', $paymentMethod->account_name) }}"
                               class="input input-bordered w-full"/>
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Akun Pembayaran - Nomor</span>
                        </label>
                        <input name="account_number" type="text"
                               value="{{ old('account_number', $paymentMethod->account_number) }}"
                               class="input input-bordered w-full"/>
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Akun Pembayaran - Memo</span>
                        </label>
                        <input name="account_memo" type="text"
                               value="{{ old('account_memo', $paymentMethod->account_memo) }}"
                               class="input input-bordered w-full"/>
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Jumlah Minimal</span>
                        </label>
                        <input name="min_amount" type="text" value="{{ old('min_amount', $paymentMethod->min_amount) }}"
                               class="input input-bordered w-full"/>
                    </div>

                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Jumlah Maksimal</span>
                        </label>
                        <input name="max_amount" type="text" value="{{ old('max_amount', $paymentMethod->max_amount) }}"
                               class="input input-bordered w-full"/>
                    </div>

                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Rate (Jika mata uang Rupiah, maka tulis 1)</span>
                        </label>
                        <input name="rate" type="text" value="{{ old('rate', $paymentMethod->rate) }}"
                               class="input input-bordered w-full"/>
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Mata Uang</span>
                        </label>
                        <input type="text" value="{{ $paymentMethod->currency }}" class="input input-bordered w-full"
                               disabled/>
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Biaya Dalam Rupiah</span>
                        </label>
                        <input name="fee_in_idr" type="number" min="0" value="{{ old('fee_in_idr', $paymentMethod->fee_in_idr) }}"
                               class="input input-bordered w-full"/>
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Biaya Dalam Persen</span>
                        </label>
                        <input name="fee_in_percent"
                               type="number"
                               min="0"
                               step="0.01"
                               value="{{ old('fee_in_percent', $paymentMethod->fee_in_percent) }}"
                               class="input input-bordered w-full"/>
                    </div>

                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">

                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Provider</span>
                        </label>
                        <select name="provider" class="select select-bordered">
                            @foreach($providers as $key => $provider)
                                <option value="{{ $key }}"
                                        @if($key == old('provider', $paymentMethod->provider)) selected @endif>{{ $provider }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Group</span>
                        </label>
                        <select name="group" class="select select-bordered">
                            @foreach($groups as $key => $group)
                                <option value="{{ $key }}"
                                        @if($key == old('group', $paymentMethod->group)) selected @endif>{{ $group }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-control">
                        <label class="label cursor-pointer">
                            <span class="label-text">Random Kode Unik?</span>
                            <input name="is_with_random_amount"
                                   type="checkbox"
                                   @if(old('is_with_random_amount', $paymentMethod->is_with_random_amount)) checked="checked" @endif
                                   class="checkbox"/>
                        </label>
                    </div>
                    <div class="form-control">
                        <label class="label cursor-pointer">
                            <span class="label-text">Status Aktif?</span>
                            <input name="is_active"
                                   type="checkbox"
                                   @if(old('is_active', $paymentMethod->is_active)) checked="checked" @endif
                                   class="checkbox"/>
                        </label>
                    </div>
                </div>

                <div class="card-actions justify-end">
                    <a href="{{ route('dashboard.payment-methods.index') }}" class="btn btn-ghost">Batalkan</a>
                    <button class="btn btn-primary">Perbarui</button>
                </div>
            </div>
        </div>
    </form>
</x-guest-layout>
