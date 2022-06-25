<x-guest-layout>
    @section('title', 'Daftar Harga Layanan ' . $categorySlug)
    <div class="card card-compact w-full bg-base-100 shadow-xl my-3">
        <div class="card-body">
            <h1 class="card-title">Daftar Harga Layanan {{ $categorySlug }}</h1>
            <div class="overflow-x-auto w-full">
                @foreach($brands as $brands)
                    @foreach($brands['types'] as $brandTypes)
                        <table class="table table-compact w-full">
                            <tr>
                                <td colspan="4" class="bg-info font-extrabold">{{ str($brands['brand_slug'] . ' (' .$brandTypes['type_slug'] . ')')->upper() }}</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>Harga</td>
                                <td>Brand</td>
                                <td>Status</td>
                            </tr>
                            @foreach($brandTypes['products'] as $product)
                                <tr>
                                    <td>{{ $product['name'] }}</td>
                                    <td class="w-1 text-right">{{ to_rupiah($product['price'])  }}</td>
                                    <td class="w-1 text-right">{{ $product['brand'] }}</td>
                                    <td class="w-1 text-right">
                                    @if($product['is_available'])
                                            <div class="badge badge-success">Tersedia</div>
                                        @else
                                            <div class="badge badge-error">Gangguan</div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
</x-guest-layout>
