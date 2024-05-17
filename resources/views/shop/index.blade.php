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
</head>

<body class="font-sans antialiased">


    @include('shop.components.header')

    @include('shop.components.navbar')



    <p class="mx-auto mt-10 mb-5 max-w-[1200px] px-10 font-bold text-xl text-accent">TERBARU UNTUKMU!</p>
    {{-- Products Cards --}}
    <section class="mx-auto grid max-w-[1200px] grid-cols-2 gap-5 px-10 pb-10 lg:grid-cols-3">
        @foreach ($products as $product)
            <div class="flex flex-col">
                <div class="relative flex">
                    <div class="">
                        <img class="" src="/image/{{ $product->gambar }}" alt="sofa image" />
                    </div>
                    <div
                        class="absolute flex h-full w-full items-center justify-center gap-3 opacity-0 duration-150 hover:opacity-100">
                        <a href="/shop/product/{{ $product->slug }}">
                            <span
                                class="flex h-8 w-8 cursor-pointer items-center justify-center rounded-full bg-accent2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                </svg>
                            </span>
                        </a>
                    </div>

                    {{-- <div class="absolute right-1 mt-3 flex items-center justify-center bg-amber-400">
                    <p class="px-2 py-2 text-sm">&minus; 25&percnt; OFF</p>
                </div> --}}

                </div>

                <div class="text-center">
                    <h2 class="mt-2 uppercase font-bold text-lg">{{ $product->nama }}</h2>

                    <div class="h-1 w-10 bg-gray-500 mx-auto my-2"></div>

                    <p class="font-medium text-lg text-accent">
                        Rp{{ number_format($product->harga_diskon, 0, ',', '.') }}
                        <span
                            class="text-sm text-gray-500 line-through">Rp{{ number_format($product->harga, 0, ',', '.') }}</span>
                    </p>

                </div>
            </div>
        @endforeach
    </section>
    {{-- /Products Cards --}}



    @include('shop.components.footer')


</body>

</html>
