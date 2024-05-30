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



    <script>
        const confirmLogout = document.getElementById('confirm-logout');
        const closeModal = () => {
            confirmLogout.classList.add('hidden');
        }
    </script>


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

            <li class="text-gray-500">{{ $product->nama }}</li>
        </ul>
    </nav>
    <!-- /breadcrumbs  -->


    <section class="container flex-grow mx-auto max-w-[1200px] border-b py-5 lg:grid lg:grid-cols-2 lg:py-10">
        <!-- image gallery -->
        <div class="container mx-auto px-4">
            <img class="w-full" src="{{ asset("storage/$product->gambar") }}" alt="image" />
        </div>

        <!-- description  -->
        <div class="mx-auto px-5 lg:px-5">
            <h2 class="pt-3 text-2xl font-bold lg:pt-0">{{ $product->nama }}</h2>

            <p class="mt-5 font-bold">
                Stok: <span class="text-green-600">{{ $product->stok }}</span>
            </p>

            <p class="font-bold">Berat: {{ $product->berat }}gr</p>

            <p class="mt-4 text-4xl font-bold text-accent">
                Rp{{ number_format($product->harga_diskon, 0, ',', '.') }}
                <span
                    class="text-xs text-gray-400 line-through">Rp{{ number_format($product->harga_diskon, 0, ',', '.') }}</span>
            </p>

            <p class="pt-5 text-sm leading-5 text-gray-500">
                {{ $product->deskripsi }}
            </p>

            <div class="mt-6">
                <p class="pb-2 text-xs text-gray-500">Quantity</p>


                <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                    <div class="flex">
                        <button name="decrement"
                            class="flex h-8 w-8 cursor-pointer items-center justify-center border duration-100 hover:bg-neutral-100 focus:ring-2 focus:ring-gray-500 active:ring-2 active:ring-gray-500">
                            &minus;
                        </button>
                        <input type="number" value="1" name="quantity" min="1" max="50"
                            class="flex h-8 w-11 text-center border-neutral-100 cursor-text items-center justify-center border-t border-b active:ring-gray-500">
                        </input>
                        <button name="increment"
                            class="flex h-8 w-8 cursor-pointer items-center justify-center border duration-100 hover:bg-neutral-100 focus:ring-2 focus:ring-gray-500 active:ring-2 active:ring-gray-500">
                            &#43;
                        </button>
                    </div>

            </div>

            <div class="mt-7 flex flex-row items-center gap-6">

                <input type="hidden" value="{{ $product->id }}" name="product_id">
                <input type="hidden" value="{{ $product->harga_diskon }}" name="harga_diskon">
                <input type="hidden" value="{{ $product->berat }}" name="berat">

                <button type="submit"
                    class="flex h-12 w-[40%] items-center justify-center bg-primary border border-accent text-accent duration-100 hover:bg-[#f4f4f4]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="mr-3 h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                    </svg>
                    Masukkan Keranjang
                </button>
                </form>
                <form action="{{ route('beli-sekarang') }}" method="POST"
                    class="flex h-12 w-1/3 items-center justify-center text-white bg-accent hover:bg-accent2">
                    @csrf
                    <input type="hidden" value="{{ $product->id }}" name="product_id">
                    <input type="hidden" value="{{ $product->harga_diskon }}" name="harga_diskon">
                    <input type="hidden" value="{{ $product->berat }}" name="berat">
                    <button type="submit" class="">
                        Beli Sekarang
                    </button>
                </form>
            </div>
        </div>
    </section>




    @include('shop.components.footer')

    <script>
        const inc = document.querySelector('button[name="increment"]');
        const dec = document.querySelector('button[name="decrement"]');

        inc.addEventListener('click', (e) => {
            e.preventDefault();
            const input = document.querySelector('input[name="quantity"]');
            input.value = parseInt(input.value) + 1;
        });

        dec.addEventListener('click', (e) => {
            e.preventDefault();
            const input = document.querySelector('input[name="quantity"]');
            if (parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
            }
        });
    </script>

</body>

</html>
