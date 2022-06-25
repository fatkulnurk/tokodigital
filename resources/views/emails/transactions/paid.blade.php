@component('mail::message')

# Pesanan Telah Terbayar

Terima kasih atas kepercayaan kamu bertransaksi di platform kami. Transaksi yang anda buat sudah terbayar, silakan buka website untuk melihat infomasi lebih rinci.

@component('mail::button', ['url' => $url])
    Lihat Rincian
@endcomponent

Terima kasih, <br>
{{ config('app.name') }}
@endcomponent