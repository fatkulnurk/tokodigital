@component('mail::message')

# Transaksi & Tagihan Pembayaran

Terima kasih atas kepercayaan kamu bertransaksi di platform kami. Berikut adalah rincian informasi transaksi & tagihan pembayaran

@component('mail::button', ['url' => $url])
Lihat Rincian
@endcomponent

Terima kasih, <br>
{{ config('app.name') }}
@endcomponent