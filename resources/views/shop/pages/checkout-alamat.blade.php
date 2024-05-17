<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

</head>

<body class="antialiased">

    {{-- @dd($ongkir) --}}

    @include('shop.components.header')
    @include('shop.components.navbar')

    <!-- breadcrumbs  -->
    <nav class="mx-auto w-full mt-4 max-w-[1200px] px-5">
        <ul class="flex items-center">
            <li class="cursor-pointer">
                <a href="/shop">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                        <path
                            d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                        <path
                            d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                    </svg>
                </a>
            </li>
            <li>
                <span class="mx-2 text-gray-500">&gt;</span>
            </li>

            <li class="text-gray-500">Checkout</li>
        </ul>
    </nav>
    <!-- /breadcrumbs  -->


    <div class="flex-grow">
        <section class="container mx-auto max-w-[1200px] py-5 lg:flex lg:flex-row lg:py-10">
            <h2 class="mx-auto px-5 text-2xl font-bold md:hidden">
                Complete Address
            </h2>
            <!-- form  -->
            <section class="grid w-full max-w-[1200px] grid-cols-1 gap-3 px-5 pb-10">
                <table class="hidden lg:table">
                    <thead class="h-16 bg-neutral-100">
                        <tr>
                            <th class="bg-neutral-600 text-white">ALAMAT</th>
                            <th>PENGIRIMAN</th>
                            <th>PEMBAYARAN</th>
                            <th>ORDER REVIEW</th>
                        </tr>
                    </thead>
                </table>

                <div class="py-5 flex flex-col gap-4">

                    <div class="flex flex-col w-full justify-between gap-2">
                        {{-- Cart Alamat Pengiriman --}}
                        <section class="grid w-full max-w-[1200px] grid-cols-1 gap-3  lg:grid-cols-1">
                            <div class="">
                                <div class="border py-5 shadow-md">
                                    <div class="flex justify-between px-4 pb-5">
                                        <p class="font-bold text-lg">Alamat pengiriman</p>
                                        <a class="text-sm text-accent" href="/shop/account/alamat">Edit</a>
                                    </div>

                                    <div class="px-4">
                                        {{-- Nama Penerima --}}
                                        <p class="font-bold text-accent">{{ $customer->name }}</p>

                                        {{-- Nomor Telepon --}}
                                        <p class="font-semibold">{{ $customer->nomor_telepon }}</p>

                                        {{-- Alamat lengkap --}}
                                        <p>{{ $customer->alamat }}</p>
                                    </div>
                                </div>
                            </div>
                        </section>
                        {{-- /Cart Alamat Pengiriman --}}
                    </div>
                    {{-- Pengiriman --}}
                    <div class="flex flex-col gap-3">

                        <label for="pengiriman" class="font-bold">Pilih metode Pengiriman<span
                                class="text-red-500">*</span></label>

                                {{-- $city --}}
                                {{-- $total_berat --}}
                        <form action="/shop/checkout-ongkir/{{ $city->city_id }}/{{ $total_berat }}">
                            <div class="grid grid-cols-3 items-center my-3">
                                <div class="flex gap-2 font-bold items-center">
                                    <input type="radio" name="kurir" id="kurir" value="jne" />
                                    <span>JNE</span>
                                    <img src="/image/jne.png" alt="" width="25%">
                                </div>
                                <div class="flex gap-2 font-bold items-center">
                                    <input type="radio" name="kurir" id="kurir" value="pos" />
                                    <span>POS</span>
                                    <img src="/image/pos.png" alt="" width="25%">
                                </div>
                                <div class="flex gap-2 font-bold items-center">
                                    <input type="radio" name="kurir" id="kurir" value="tiki" />
                                    <span>TIKI</span>
                                    <img src="/image/tiki.png" alt="" width="35%">
                                </div>

                            </div>

                            <button type="submit"
                                class="bg-accent w-full mt-4 text-white text-center px-4 py-2">Cek
                                Ongkir
                            </button>
                        </form>

                    </div>
                </div>

                <div class="flex w-full items-center justify-between">
                    <a href="catalog.html" class="text-sm text-accent">&larr; Back to the shop</a>

                    {{-- <a href="checkout-delivery.html" class="bg-accent text-white px-4 py-2">Selanjutnya</a> --}}
                </div>
            </section>
            <!-- /form  -->

            <!-- Summary  -->
            <section class="mx-auto w-full px-4 md:max-w-[400px]">
                <div class="">
                    <div class="border py-5 px-4 shadow-md">
                        <p class="font-bold">ORDER SUMMARY</p>

                        <div class="flex justify-between border-b py-5">
                            <p>Subtotal</p>
                            <p>Rp{{ number_format($total, 0, ',', '.') }}</p>
                        </div>

                        <div class="flex justify-between border-b py-5">
                            <p>Shipping (Total {{ $total_berat }}gr)</p>
                            <p>Pending</p>
                        </div>

                        <div class="flex justify-between py-5">
                            <p>Total Pesanan ({{ $carts->count() }} Produk)</p>
                            <p class="font-extrabold text-accent text-[24px]">
                                Rp{{ number_format($total, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
            </section>
        </section>
        <!-- /Summary -->
    </div>

    @include('shop.components.footer')

    <script></script>

</body>

</html>
