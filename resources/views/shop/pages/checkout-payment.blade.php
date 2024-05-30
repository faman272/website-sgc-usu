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
                Metode Pembayaran
            </h2>
            <!-- form  -->
            <section class="grid w-full max-w-[1200px] grid-cols-1 gap-3 px-5 pb-10">
                <table class="hidden lg:table">
                    <thead class="h-16 bg-neutral-100">
                        <tr>
                            <th>ADDRESS</th>
                            <th>PENGIRIMAN</th>
                            <th class="bg-neutral-600 text-white">PEMBAYARAN</th>
                            <th>ORDER REVIEW</th>
                        </tr>
                    </thead>
                </table>

                <div class="py-5">

                    <form action="{{ route('shop.checkout-payment-store') }}" method="POST">
                        @csrf
                        <div class="grid w-full grid-cols-1 gap-3 lg:grid-cols-2">
                            @foreach ($payments as $item)
                                <div class="flex w-full justify-between gap-2 opacity-70">
                                    <div class="flex w-full cursor-pointer flex-col border">
                                        <div class="flex bg-accent2 px-4 py-2 items-center">
                                            <input class="outline-yellow-400" name="payment_method" type="radio"
                                                value="{{ $item->kode }}" />

                                            <p class="ml-3 font-bold text-white text-lg">{{ $item->nama_metode }}</p>
                                        </div>

                                        <div class="px-4 py-3 flex-col justify-center items-center">
                                            <img src="{{ asset("storage/$item->gambar") }}" alt="" width="50%"
                                                class="mb-2">
                                            <p class="font-bold">{{ $item->norek }}</p>
                                            <p class="font-bold">an: {{ $item->atas_nama }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                </div>
                {{-- 
                <div class="flex w-full items-center justify-between">
                    <a href="catalog.html" class="hidden text-sm text-accent lg:block">&larr; Back to the shop</a>

                    <div class="mx-auto flex justify-center gap-2 lg:mx-0">
                        <a href="checkout-payment.html" class="bg-accent px-4 py-2 text-white">PEMBAYARAN</a>
                    </div>
                </div> --}}
            </section>
            <!-- /form  -->

            <!-- Summary  -->

            <section class="mx-auto w-full px-4 md:max-w-[400px]">
                <div class="">
                    <div class="border py-5 px-4 shadow-md">
                        <p class="font-bold">ORDER SUMMARY</p>

                        <div class="flex justify-between border-b py-5">
                            <p>Subtotal</p>
                            <p>Rp{{ number_format($subtotal, 0, ',', '.') }}</p>
                        </div>

                        <div class="flex justify-between border-b py-5">
                            <p>Shipping (Total {{ $total_berat }}gr)</p>
                            <p>Rp{{ number_format($order->ongkir, 0, ',', '.') }}</p>
                        </div>

                        <div class="flex justify-between py-5">
                            <p>Total Pesanan ({{ $jumlah_pesanan }} Produk)</p>
                            <p class="font-extrabold text-accent text-[24px]">
                                Rp{{ number_format($order->total, 0, ',', '.') }}</p>
                        </div>

                        <input type="hidden" id="no_order" name="no_order" value="{{ $order->no_order }}" />
                        <input type="hidden" id="total_pembayaran" name="total_pembayaran" value="{{ $order->total }}" />

                        <button type="submit" class="w-full bg-accent px-5 py-2 text-white">
                            KONFIRMASI PEMBAYARAN
                        </button>
                    </div>
                    </form>

                </div>
            </section>
        </section>

        <!-- /Summary -->






        @include('shop.components.footer')


        <script>
            const radio = document.querySelectorAll('input[type="radio"]');

            radio.forEach((item) => {
                item.addEventListener('click', () => {
                    radio.forEach((item) => {
                        item.parentElement.parentElement.parentElement.classList.add('opacity-70');
                    });
                    item.parentElement.parentElement.parentElement.classList.remove('opacity-70');
                });

            });
        </script>


</body>

</html>
