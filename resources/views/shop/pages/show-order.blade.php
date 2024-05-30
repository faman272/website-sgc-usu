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

    {{-- Jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    {{-- Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



</head>

<body class="antialiased">

    @include('shop.components.header')
    @include('shop.components.navbar')


    <section class="container mx-auto w-full flex-grow max-w-[1200px] border-b py-5 lg:flex lg:flex-row lg:py-10">
        <!-- sidebar  -->
        <section class="hidden w-[300px] flex-shrink-0 px-4 lg:block">
            <div class="border-b py-5">
                <div class="flex items-center">
                    <img width="40px" height="40px" class="rounded-full object-cover" src="/image/avatar.png"
                        alt="Red woman portrait" />
                    <div class="ml-5">
                        <p class="font-medium text-gray-500">Hello,</p>
                        <p class="font-bold">{{ $customer->name }}</p>
                    </div>
                </div>
            </div>

            <div class="flex border-b py-5">
                <div class="w-full">
                    <div class="flex w-full">
                        <div class="flex flex-col gap-2">
                            <a href="/shop/account" class="flex items-center gap-2 font-medium text-accent">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                                </svg>
                                Manage account</a>
                            {{-- <a href="profile-information.html"
                                class="active:blue-900 text-gray-500 duration-100 hover:text-yellow-400">Informasi
                                profil</a> --}}
                            <a href="/shop/account/alamat"
                                class="text-gray-500 duration-100 hover:text-yellow-400">Kelola Alamat</a>
                            {{-- <a href="change-password.html" class="text-gray-500 duration-100 hover:text-yellow-400">Ubah
                                Password</a> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex border-b py-5">
                <div class="flex w-full">
                    <div class="flex flex-col gap-2">
                        <a href="/shop/account/order-history"
                            class="flex items-center gap-2 font-medium active:text-accent">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="h-5 w-5">
                                <path
                                    d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375z" />
                                <path fill-rule="evenodd"
                                    d="M3.087 9l.54 9.176A3 3 0 006.62 21h10.757a3 3 0 002.995-2.824L20.913 9H3.087zm6.163 3.75A.75.75 0 0110 12h4a.75.75 0 010 1.5h-4a.75.75 0 01-.75-.75z"
                                    clip-rule="evenodd" />
                            </svg>

                            My Order History</a>
                    </div>
                </div>
            </div>

            <div class="flex py-5">
                <div class="flex w-full">
                    <div class="flex flex-col gap-2">
                        <a href="#" class="flex items-center gap-2 font-medium active:text-violet-900">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                            </svg>

                            Log Out</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- /sidebar  -->

        <!-- form  -->
        <section class="grid w-full max-w-[1200px] grid-cols-1 gap-3 px-5 pb-10 border-[3px] border-dashed">
            <div class="mt-4">
                <img src="/logo_sgc.png" alt="" class="w-[50px] mx-auto">
                <h1 class="font-bold text-2xl text-accent text-center">PESANAN</h1>
                <h2 class="font-semibold underline my-2 text-center text-[#BADA55]">#{{ $payment->no_pembayaran }}
                </h2>

                <div class="flex w-full flex-col gap-2">
                    <div class="flex w-full flex-col">
                        <h2 class="underline font-semibold">Detail Order:</h2>
                    </div>

                    <div class="flex justify-between">
                        <span class="font-bold">No Order:</span>
                        <span class="italic">#{{ $payment->order->no_order }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="font-bold">Tanggal Order:</span>
                        <span>{{ \Carbon\Carbon::parse($payment->order->created_at)->isoFormat('DD-MMM-YYYY HH:mm') }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="font-bold">Status:</span>
                        <span class="capitalize">{{ $payment->order->status }}</span>
                    </div>

                    <div class="flex w-full flex-col">
                        <h2 class="underline font-semibold">Produk dibeli:</h2>
                    </div>

                    <!-- Product table  -->
                    <table class="mt-3 hidden w-full lg:table">
                        <thead class="h-10 bg-neutral-100">
                            <tr>
                                <th>ITEM</th>
                                <th>HARGA</th>
                                <th>QTY</th>
                                <th>SUBTOTAL</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($detail_orders as $item)
                                @php
                                    $gambar = $item->product->gambar;
                                @endphp
                                <tr class="h-[40px] border-b">
                                    <td class="align-middle">
                                        <div class="flex">
                                            <img class="w-[70px]" src="{{ asset("storage/$gambar") }}"
                                                alt="bedroom image" />
                                            <div class="ml-3 flex flex-col justify-center">
                                                <p class="text-md font-bold uppercase">{{ $item->product->nama }}
                                                </p>
                                                <p class="text-sm text-gray-400">Berat: {{ $item->total_berat }}(gr)
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="mx-auto text-center">
                                        Rp{{ number_format($item->product->harga_diskon, 0, ',', '.') }}</td>
                                    <td class="text-center align-middle">{{ $item->quantity }}</td>
                                    <td class="mx-auto text-center">
                                        Rp{{ number_format($item->subtotal, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach


                            {{-- Subtotal, Ongkir, Total --}}
                            <tr class="h-[40px] border-b">
                                <td class="align-middle"></td>
                                <td class="mx-auto text-center"></td>
                                <td class="align-middle font-bold">Subtotal</td>
                                <td class="mx-auto text-center font-bold">
                                    Rp{{ number_format($subtotal, 0, ',', '.') }}</td>
                            </tr>
                            <tr class="h-[40px] border-b">
                                <td class="align-middle"></td>
                                <td class="mx-auto text-center"></td>
                                <td class="align-middle font-bold">Ongkir</td>
                                <td class="mx-auto text-center font-bold">
                                    Rp{{ number_format($payment->order->ongkir, 0, ',', '.') }}</td>
                            </tr>

                            <tr class="h-[40px] border-b">
                                <td class="align-middle"></td>
                                <td class="mx-auto text-center"></td>
                                <td class="align-middle font-bold">Total</td>
                                <td class="mx-auto text-center font-bold text-lg text-accent">
                                    Rp{{ number_format($payment->total_pembayaran, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- /Product table  -->
                    <div class="flex w-full flex-col">
                        <h2 class="underline font-semibold">Informasi Pembayaran:</h2>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-bold">Nama:</span>
                        <span>{{ $customer->name }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="font-bold">No hp/wa:</span>
                        <span>{{ $customer->nomor_telepon }}</span>
                    </div>

                    <div class="flex w-full flex-col">
                        <h2 class="underline font-semibold">Metode Pembayaran:
                        </h2>
                    </div>

                    {{-- Metode Pembayaran --}}
                    <div>
                        <div class="flex w-1/2 justify-between gap-2">
                            <div class="px-4 py-3 flex-col justify-center items-center">
                                <img src="/image/{{ $payment->paymentMethod->gambar }}" alt=""
                                    width="40%" class="mb-2">
                                <div class="flex justify-between gap-3">
                                    <p class="font-bold text-xl">{{ $payment->paymentMethod->norek }}</p>
                                    <button class="flex items-center gap-1 hover:text-[#383636]">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="none" viewBox="0 0 24 24" class="icon-sm">
                                            <path fill="currentColor" fill-rule="evenodd"
                                                d="M7 5a3 3 0 0 1 3-3h9a3 3 0 0 1 3 3v9a3 3 0 0 1-3 3h-2v2a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3v-9a3 3 0 0 1 3-3h2zm2 2h5a3 3 0 0 1 3 3v5h2a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1h-9a1 1 0 0 0-1 1zM5 9a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h9a1 1 0 0 0 1-1v-9a1 1 0 0 0-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="font-bold">Salin</span>
                                    </button>
                                </div>
                                <p class="mt-2">an: {{ $payment->paymentMethod->atas_nama }}</p>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('shop.checkout-konfirmasi-store', $payment->no_pembayaran) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex w-full gap-2 flex-col mb-6">
                            <h2 class="underline font-semibold"><span class="text-red-500">*</span>Bukti
                                pembayaran:
                            </h2>
                            <img src="/storage/{{ $payment->bukti_pembayaran }}" alt="error" width="40%">
                        </div>

                    </form>

                    <button class="w-full bg-primary hover:bg-[#f4f4f4] border border-red-500 px-5 py-2 text-red-500">
                        BATALKAN PESANAN
                    </button>
                </div>
            </div>

            <div class="flex w-full items-center justify-between">
                <a href="catalog.html" class="hidden text-sm text-accent lg:block">&larr; Back to the shop</a>
            </div>
        </section>
        <!-- /form  -->


    </section>



    @include('shop.components.footer')


</body>

</html>
