<x-guest-layout>
    @section('title', 'Riwayat Transaksi')
    <div class="card card-compact w-full bg-base-100 shadow-xl">
        <div class="card-body">
            <h1 class="card-title">Riwayat Transaksi</h1>
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
                    <tbody>
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
            <div class="my-3">
                {{ $transactions->links() }}
            </div>
        </div>
    </div>
</x-guest-layout>
