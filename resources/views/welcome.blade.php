<x-guest-layout>
    @section('title', 'Beli Pulsa Online')
    <div class="hero py-10 bg-transparent">
        <div class="hero-content text-center">
            <div class="max-w-xl">
                <h1 class="text-5xl font-bold">Jual Pulsa Online via Crypto Buka 24 Jam</h1>
                <p class="py-6">Isi Ulang Pulsa, Voucher Game, PDAM, Tokon PLN, Paket Data, E-Currency, Money Exchanger,
                    Saldo Go-Jek, Voucher TV, Telpon dan Sms Termurah, Termudah dan Terpercaya.</p>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
        <div>
            @livewire('widgets.order-form')
        </div>
        <div>
            @livewire('widgets.transactions')
        </div>
    </div>
    <div class="py-4 bg-base-100 p-5 rounded-box my-3">
        <h2 class="card-title my-3">Mendukung Metode Pembayaran</h2>
        <hr>
        @foreach($paymentMethods as $key => $items)
            <div class="my-2">
                <h3 class="font-extrabold my-1">{{ $key }}</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
                    @foreach($items as $paymentMethod)
                        <div class="p-2 text-center bg-base-200 rounded-box">{{ $paymentMethod->name }}</div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</x-guest-layout>
