<x-guest-layout>
    @section('title', 'Riwayat Transaksi Pembelian ' . $transaction->product_name)
    <div class="w-full">
        @if($transaction->status == \App\Enums\TransactionStatusEnum::STATUS_SUCCESS)
            <div class="alert alert-success shadow-lg my-3">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>Pembelian pada transaksi ini sudah berhasil. Jika produk yang anda beli membutuhkan KODE untuk di inputkan (seperti pembelian token PLN), silakan periksa kode pada bagian SN (serial number).</span>
                </div>
            </div>
        @endif
        <div class="overflow-x-auto">
            <table class="table table-compact w-full">
                <tr>
                    <td colspan="3" class="font-extrabold">
                        <h1>#Detail Transaksi</h1>
                    </td>
                </tr>
                <tr>
                    <td class="w-1">ID Transaksi</td>
                    <td class="w-1">:</td>
                    <td>{{ $transaction->id }}</td>
                </tr>
                <tr>
                    <td class="w-1">Kode Produk</td>
                    <td class="w-1">:</td>
                    <td>{{ $transaction->product_id }}</td>
                </tr>
                <tr>
                    <td class="w-1">Produk</td>
                    <td class="w-1">:</td>
                    <td>{{ $transaction->product_name }}</td>
                </tr>
                <tr>
                    <td class="w-1">No Pelanggan</td>
                    <td class="w-1">:</td>
                    <td>{{ blur_data($transaction->target, false) }}</td>
                </tr>
                <tr>
                    <td class="w-1">Email</td>
                    <td class="w-1">:</td>
                    <td>{{ blur_data($transaction->customer_contact) }}</td>
                </tr>
                <tr>
                    <td class="w-1">Waktu Pembelian</td>
                    <td class="w-1">:</td>
                    <td>{{ $transaction->created_at }}</td>
                </tr>
                <tr>
                    <td class="w-1 bg-base-200">Status Transaksi</td>
                    <td class="w-1">:</td>
                    <td class="bg-base-200">{{ $transaction->status_name }}</td>
                </tr>
                @if(!blank($transaction->transactionPayment->paid_at))
                    <tr>
                        <td class="w-1">Terbayar Pada</td>
                        <td class="w-1">:</td>
                        <td class="bg">{{ to_wib($transaction->transactionPayment->paid_at) }}</td>
                    </tr>
                @endif
                <tr>
                    <td class="w-1 bg-warning">SN (serial number)</td>
                    <td class="w-1">:</td>
                    <td class="bg-warning">{{ $transaction->sn ?? 'Masih belum tersedia, akan tersedia jika transaksi telah berhasil' }}</td>
                </tr>
            </table>
        </div>
        <div class="my-2"></div>
        <div class="overflow-x-auto">
            <table class="table table-compact w-full">
                <tr>
                    <td colspan="3" class="font-extrabold">#Detail Pembayaran</td>
                </tr>
                <tr>
                    <td class="w-1">Metode Pembayaran</td>
                    <td class="w-1">:</td>
                    <td>{{ $transaction->paymentMethod->name }}</td>
                </tr>
                @if($transaction->status == \App\Enums\TransactionStatusEnum::STATUS_WAITING_PAYMENT)
                    @if(!blank($transaction->transactionPayment->payment_name))
                        <tr>
                            <td class="w-1">Atas Nama</td>
                            <td class="w-1">:</td>
                            <td>{{ $transaction->transactionPayment->payment_name }}</td>
                        </tr>
                    @endif
                    @if(!blank($transaction->transactionPayment->payment_number))
                        <tr>
                            <td class="w-1">Tujuan Pembayaran</td>
                            <td class="w-1">:</td>
                            <td>{{ $transaction->transactionPayment->payment_number }}</td>
                        </tr>
                    @endif
                    @if(!blank($transaction->transactionPayment->payment_url))
                        <tr>
                            <td colspan="3" class="">
                                <p class="mt-1">
                                    <a href="{{ $transaction->transactionPayment->payment_url }}" target="_blank"
                                       class="btn btn-sm">Bayar Sekarang</a>
                                </p>
                                <p class="mb-1 py-2">
                                    Silahkan klik tombol diatas untuk melakukan pembayaran
                                </p>
                            </td>
                        </tr>
                    @endif
                    <tr>
                        <td class="w-1 bg-error">Batas Pembayaran</td>
                        <td class="w-1 bg-error">:</td>
                        <td class="bg-error">{{ to_wib($transaction->transactionPayment->expired_at) }} (Jangan melebihi
                            waktu tersebut)
                        </td>
                    </tr>
                @endif
                <tr>
                    <td class="w-1 bg-info">Total</td>
                    <td class="w-1 bg-info">:</td>
                    <td class="bg-info">
                        @if ($transaction->transactionPayment->currency == 'IDR')
                            {{ to_rupiah($transaction->transactionPayment->total) }}
                        @else
                            {{ $transaction->transactionPayment->total }} {{ $transaction->transactionPayment->currency }}
                        @endif
                    </td>
                </tr>
            </table>
        </div>
        <div class="mt-2 grid grid-cols-2 gap-2 py-4">
            @if($transaction->status == \App\Enums\TransactionStatusEnum::STATUS_WAITING_PAYMENT)
                <div><a href="?confirm=payment" class="btn btn-block w-full btn-ghost outline">Konfirmasi Pembayaran</a>
                </div>
            @endif
            <div><a href="#komplain" class="btn btn-block w-full btn-warning outline">Komplain</a></div>
        </div>
        <div class="p-4 bg-base-100 rounded-box mt-2">
            <div class="prose w-full text-justify">
                <h3>Penting Harap Dibaca Sebelum Transfer:</h3>
                <ul>
                    @if($transaction->status == \App\Enums\TransactionStatusEnum::STATUS_WAITING_PAYMENT)
                        <li class="text-error">Silakan lakukan transfer
                            sebesar {{ $transaction->transactionPayment->total }} {{ $transaction->transactionPayment->currency }}
                            (HARUS SAMA) .
                        </li>
                        <li class="text-error">Pembayaran berlaku
                            s/d {{ to_wib($transaction->transactionPayment->expired_at) }}</li>
                    @endif
                    <li>Kesalahan jumlah transfer akan menyebabkan transaksi tidak otomatis bahkan gagal.</li>
                    <li>Jika ada masalah, harap menghubungi kami.</li>
                    <li>Pembayaran diterima otomatis terkadang bisa mengalami keterlambatan sampai 1 jam setelah
                        transfer.
                    </li>
                </ul>
            </div>
        </div>

        <div class="modal" id="komplain">
            <div class="modal-box">
                <h3 class="font-bold text-lg">Komplain!</h3>
                <p class="py-4">Untuk komplain, silakan menghubungi kami dengan menyertakan Transaksi ID atau URL
                    Halaman ini.</p>
                <div class="modal-action">
                    <a href="#" class="btn">Tutup</a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
