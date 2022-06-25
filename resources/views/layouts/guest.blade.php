<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    @livewireStyles

</head>

<body class="drawer drawer-mobile w-full overflow-x-hidden">
<input id="my-drawer" type="checkbox" class="drawer-toggle"/>
<div class="drawer-content">
    <div class="navbar bg-base-100">
        <div class="navbar-start">
            <label tabindex="0" class="btn btn-ghost btn-circle" for="my-drawer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                </svg>
            </label>
        </div>
        <div class="navbar-center">
            <a href="?ref=logo"
               class="font-extrabold text-transparent text-3xl bg-clip-text bg-gradient-to-r from-primary to-secondary">{{ config('app.name') }}</a>
        </div>
        <div class="navbar-end">
            {{--
            <button class="btn btn-ghost btn-circle">
                <div class="indicator">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                    <span class="badge badge-xs badge-primary indicator-item"></span>
                </div>
            </button>

            <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                    <div class="w-8 rounded-full">
                        <img src="{{ asset('images/default.png') }}"/>
                    </div>
                </label>
                <ul tabindex="0"
                    class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                    <li>
                        <a href="#">
                            Profile
                        </a>
                    </li>
                    <li><a href="#">Ganti Password</a></li>
                    <li><a href="#">Logout</a></li>
                </ul>
            </div>
            --}}
        </div>
    </div>

    <div class="bg-gradient-to-b from-pink-50 to-purple-200">
        <main class="w-full mx-auto min-h-screen">
            <div class="p-1">
                {{--                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">--}}
                {{--                        @yield('title')--}}
                {{--                    </h2>--}}

                @if(session('failed'))
                    <div class="alert alert-error my-3">
                        {{ session('failed') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-error my-3">
                        {{ session('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger my-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
                <div class="font-sans text-gray-900 antialiased">
                    {{ $slot }}
                </div>
            </div>
        </main>
    </div>

    <footer class="card">
        <div class="card-body text-center">
            <div class="card-actions justify-center my-5">
                <p>
                    &copy; 2022 - {{ config('app.name') }}
                </p>
            </div>
        </div>
    </footer>
</div>
<div class="drawer-side">
    <label for="my-drawer" class="drawer-overlay"></label>
    <div class="menu bg-base-100 w-64">
        <div class="navbar">
            <div class="navbar-center text-center">
                <a href="?ref=logo"
                   class="font-extrabold text-transparent text-3xl bg-clip-text bg-gradient-to-r from-primary to-secondary"
                >{{ config('app.name') }}</a>
            </div>
        </div>
        <div class="w-full clear-none">
            <li>
                <a href="/?ref=navbar">
                    <svg id="home-alt-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5"
                         width="48" height="48">
                        <polyline id="primary" points="21 12 12 3 3 12"
                                  style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></polyline>
                        <path id="primary-2" data-name="primary"
                              d="M19,10V20.3a.77.77,0,0,1-.83.7H14.3V14.1H9.7V21H5.83A.77.77,0,0,1,5,20.3V10"
                              style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path>
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <a href="{{ route('transactions.index') }}">
                    <svg id="clock-alt-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5"
                         width="24"
                         height="24">
                        <path id="primary" d="M12,3a9,9,0,1,1-9,9"
                              style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path>
                        <polyline id="primary-2" data-name="primary" points="8 12 12 12 12 7"
                                  style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></polyline>
                    </svg>
                    Riwayat Transaksi
                </a>
            </li>
            <li class="menu-title">
                <span>Daftar Layanan & Harga</span>
            </li>
            <div tabindex="0" class="collapse collapse-arrow">
                <input type="checkbox" class="peer"/>
                <div class="collapse-title font-medium">
                    Produk Prepaid
                </div>
                <div class="collapse-content">
                    @foreach($categories as $category)
                        <li>
                            <a href="{{ route('products.category.show', $category['category_slug']) }}">
                                <svg id="tea-bag-left-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                     class="h-5 w-5"
                                     width="48" height="48">
                                    <line id="primary-upstroke" x1="11.5" y1="14.05" x2="11.5" y2="13.95"
                                          style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2.6;"></line>
                                    <path id="primary"
                                          d="M8.55,10.72,12,9h8a1,1,0,0,1,1,1v8a1,1,0,0,1-1,1H12L8.55,17.28a1,1,0,0,1-.55-.9V11.62A1,1,0,0,1,8.55,10.72ZM3,5V9.5A4.49,4.49,0,0,0,7.5,14H12"
                                          style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path>
                                </svg>
                                {{ $category['category'] }}
                            </a>
                        </li>
                    @endforeach
                </div>
            </div>
            <li class="menu-title">
                <span>Menu Lainnya</span>
            </li>
            <li>
                <a href="#">
                    <svg id="call-out" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5" width="48"
                         height="48">
                        <path id="primary"
                              d="M21,15v3.93a2,2,0,0,1-2.29,2A18,18,0,0,1,3.14,5.29,2,2,0,0,1,5.13,3H9a1,1,0,0,1,1,.89,10.74,10.74,0,0,0,1,3.78,1,1,0,0,1-.42,1.26l-.86.49a1,1,0,0,0-.33,1.46,14.08,14.08,0,0,0,3.69,3.69,1,1,0,0,0,1.46-.33l.49-.86A1,1,0,0,1,16.33,13a10.74,10.74,0,0,0,3.78,1A1,1,0,0,1,21,15ZM21,3,16,8"
                              style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path>
                        <polyline id="primary-2" data-name="primary" points="21 8 21 3 16 3"
                                  style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></polyline>
                    </svg>
                    Hubungi Kami
                </a>
            </li>
            <li>
                <a href="#">
                    <svg id="lock-file-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5"
                         width="48" height="48">
                        <path id="primary" d="M17,7V4a1,1,0,0,0-1-1H5L3,5V20a1,1,0,0,0,1,1H9"
                              style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path>
                        <path id="primary-2" data-name="primary"
                              d="M14,15h6a1,1,0,0,1,1,1v4a1,1,0,0,1-1,1H14a1,1,0,0,1-1-1V16A1,1,0,0,1,14,15Zm3-4h0a2,2,0,0,0-2,2v2h4V13A2,2,0,0,0,17,11ZM3,5H5V3Z"
                              style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path>
                    </svg>
                    Ketentuan Layanan
                </a>
            </li>
            @if(auth()->check())
                @if(auth()->user()->role_user == \App\Enums\RoleUserEnum::ROLE_ADMIN)
                    <li class="menu-title">
                        <span>Menu Admin</span>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.payment-methods.index') }}">
                            <svg id="lock-file-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5"
                                 width="48" height="48">
                                <path id="primary" d="M17,7V4a1,1,0,0,0-1-1H5L3,5V20a1,1,0,0,0,1,1H9"
                                      style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path>
                                <path id="primary-2" data-name="primary"
                                      d="M14,15h6a1,1,0,0,1,1,1v4a1,1,0,0,1-1,1H14a1,1,0,0,1-1-1V16A1,1,0,0,1,14,15Zm3-4h0a2,2,0,0,0-2,2v2h4V13A2,2,0,0,0,17,11ZM3,5H5V3Z"
                                      style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path>
                            </svg>
                            Metode Pembayaran
                        </a>
                    </li>
                    @endif
                    @endif
                    </ul>
        </div>
    </div>
</div>
@livewireScripts

</body>
</html>
