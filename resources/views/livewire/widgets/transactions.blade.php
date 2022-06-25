<div>
    <div>
        <div class="card w-full bg-base-100 shadow-xl card-compact">
            <div class="card-body">
                <h2 class="card-title">Riwayat Transaksi</h2>

                <div class="overflow-x-auto w-full">
                    <table class="table table-compact w-full">
                        <thead>
                        <tr>
                            <td class="w-1">Waktu</td>
                            <td>Produk</td>
                            <td class="w-1 text-right">Harga</td>
                            <td class="w-1 text-right">Status</td>
                        </tr>
                        </thead>
                        <tbody wire:poll.15000ms>
                        @foreach($transactions as $transaction)
                            <tr>
                                <td class="text-info">
                                    <a href="{{ route('transactions.show', $transaction->id) }}">{{ to_wib($transaction->created_at) }}</a>
                                </td>
                                <td>
                                    {{ str($transaction->product_name)->limit(30) }}
                                </td>
                                <td>
                                    {{ to_rupiah($transaction->product_price) }}
                                </td>
                                <td>
                                    {{ $transaction->status_name }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-actions justify-center">
                    <div class="form-control w-full">
                        <a href="{{ route('transactions.index') }}" class="btn btn-ghost btn-block">Lihat
                            selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
