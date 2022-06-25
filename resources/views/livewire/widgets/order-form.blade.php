<div>
    @include('vendor.loadings.loading')
    <div class="card w-full bg-base-100 shadow-xl card-compact">
        <div class="card-body">
            <h2 class="card-title">Form Pembelian</h2>
            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">Kategori</span>
                </label>
                <select wire:model="selectedCategory" class="select select-bordered">
                    <option value="">-</option>
                    @foreach($categories as $category)
                        <option value="{{ optional($category)['category_slug'] }}">{{ optional($category)['category'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">Brand / Operator</span>
                </label>
                <select wire:model="selectedBrand" class="select select-bordered">
                    <option value="">-</option>
                    @foreach($brands as $brand)
                        <option value="{{ optional($brand)['brand_slug'] }}">{{ optional($brand)['brand_slug'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">Pilih Produk</span>
                </label>
                <select wire:model="selectedProductId" class="select select-bordered">
                    <option value="">-</option>
                    @foreach($products as $productType)
                        <optgroup label="{{ $productType['type_slug'] }}">
                            @foreach($productType['products'] as $product)
                                <option value="{{ optional($product)->id }}">{{ optional($product)->name }}
                                    - {{ to_rupiah(optional($product)->price) }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
            </div>
            @if(!blank($selectProduct))
                <div class="form-control w-full">
                    <div class="alert alert-warning text-base-content">
                        {{ $selectProduct->name }} <br><br>
                        Deskripsi: <br>
                        {{ $selectProduct->description }}
                    </div>
                </div>
                <form wire:submit.prevent="order">
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">{{ optional($selectProduct->details)['target'] }}</span>
                        </label>
                        <input wire:model.defer="target" type="text" placeholder="Type here"
                               class="input input-bordered w-full"/>
                        @error('target') <span class="my-3 text-error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Masukan Email</span>
                        </label>
                        <input wire:model.defer="customerContact" type="email" placeholder="Type here"
                               class="input input-bordered w-full"/>
                        @error('customerContact') <span class="my-3 text-error">{{ $message }}</span> @enderror
                    </div>
                    {{--
                    @if(optional($selectProduct['details'])['is_additional_data_required'] ?? '')
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text">{{ optional($selectProduct['details'])['additional_data'] }}</span>
                            </label>
                            <input wire:model.lazy="customerContact" type="text" placeholder="Type here"
                                   class="input input-bordered w-full"/>
                            <label class="label">
                                <span class="label-text-alt">Informasi pembelian akan dikirimkan ke alamat email tersebut.</span>
                            </label>
                        </div>
                    @endif--}}
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Metode Pembayaran</span>
                        </label>
                        <select wire:model="selectedPaymentMethod" class="select select-bordered">
                            <option value="" selected>Pilih Metode Pembayaran</option>
                            @foreach($paymentMethods as $key => $items)
                                <optgroup label="{{ $key }}">
                                    @foreach($items as $key => $paymentMethod)
                                        <option value="{{ $paymentMethod->id }}">
                                            {{ $paymentMethod->name }}
                                            @if($paymentMethod->fee_in_idr > 0 || $paymentMethod->fee_in_percent > 0)
                                                (Biaya: {{ to_rupiah($paymentMethod->fee_in_idr) }}
                                                & {{ $paymentMethod->fee_in_percent }}%)
                                            @endif
                                        </option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                        @error('selectedPaymentMethod') <span class="my-3 text-error">{{ $message }}</span> @enderror

                    </div>
                    <div class="form-control w-full my-3">
                        <button class="btn btn-primary btn-block">Lanjutkan Pembayaran</button>
                    </div>
                </form>
            @endif
        </div>
    </div>
</div>
