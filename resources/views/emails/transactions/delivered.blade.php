@component('mail::message')

# Pesanan Anda Telah Terkirim

Terima kasih atas kepercayaan kamu bertransaksi di platform kami. Berikut adalah rincian informasi transaksi & informasi pengiriman.

@component('mail::button', ['url' => $url])
    Lihat Rincian
@endcomponent

Terima kasih, <br>
{{ config('app.name') }}
@endcomponent