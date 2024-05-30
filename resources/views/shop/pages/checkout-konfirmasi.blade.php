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

    {{-- Modal Confirmation Alert --}}
    <div id="confirm-cancel" class="fixed hidden inset-0 bg-gray-950/50 dark:bg-gray-950/75">
        <div class="flex items-center justify-center h-full">
            <div class="bg-white p-5 anim-modal rounded-lg w-96">
                {{-- CLose button --}}
                <span class="flex justify-end">
                    <button onclick="tutupModal()">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </span>
                <div class="mb-5 flex items-center justify-center">
                    <div class="rounded-full p-3 bg-rose-500/20">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8 text-rose-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                        </svg>

                    </div>
                </div>
                <p class="font-semibold text-gray-950 text-base leading-6 text-center">Cancel Order</p>
                <p class="mt-2 text-center text-sm text-gray-500">Apakah anda yakin ingin membatalkan pesanan?</p>
                <div class="mt-6 w-full flex gap-3">
                    <button onclick="tutupModal()"
                        class="px-4 py-2 bg-white shadow-md text-sm w-full rounded-lg">Cancel</button>
                    <form action="{{ route('order-cancel', $payment->order->no_order) }}" method="POST" class="w-full">
                        @method('PATCH')
                        @csrf
                        <button type="submit"
                            class="px-4 py-2 bg-rose-500 shadow-sm text-sm w-full text-white rounded-lg">Confirm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- /Modal Confirmation Alert --}}

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

    <section class="flex-grow">
        <section class="container  mx-auto max-w-[700px] py-5 lg:flex lg:flex-row lg:py-10">
            <h2 class="mx-auto px-5 text-2xl font-bold md:hidden">
                Payment Method
            </h2>
            <!-- form  -->
            <section class="grid w-full max-w-[1200px] grid-cols-1 gap-3 px-5 pb-10 border-[3px] border-dashed">
                <div class="mt-4">
                    <img src="/logo_sgc.png" alt="" class="w-[50px] mx-auto">
                    <h1 class="font-bold text-2xl text-accent text-center">KONFIRMASI PEMBAYARAN</h1>
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
                                    <tr class="h-[40px] border-b">
                                        <td class="align-middle">
                                            <div class="flex">
                                                <img class="w-[70px]" src="/storage/{{ $item->product->gambar }}"
                                                    alt="bedroom image" />
                                                <div class="ml-3 flex flex-col justify-center">
                                                    <p class="text-md font-bold uppercase">{{ $item->product->nama }}
                                                    </p>
                                                    <p class="text-sm text-gray-400">Berat:
                                                        {{ $item->total_berat }}(gr)
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
                            <h2 class="underline font-semibold"><span class="text-red-500">*</span>Silahkan melakukan
                                pembayaran sebesar <span
                                    class="text-accent text-lg">Rp{{ number_format($payment->total_pembayaran, 0, ',', '.') }}</span>
                                pada metode pembayaran ini:
                            </h2>
                        </div>

                        {{-- Metode Pembayaran --}}
                        @php
                            $gambarMetode = $payment->paymentMethod->gambar;
                        @endphp
                        <div>
                            <div class="flex w-1/2 justify-between gap-2">
                                <div class="px-4 py-3 flex-col justify-center items-center">
                                    <img src="{{ asset("storage/$gambarMetode") }}" alt="" width="40%"
                                        class="mb-2">
                                    <div class="flex justify-between gap-3">
                                        <p id="norek" class="font-bold text-xl">
                                            {{ $payment->paymentMethod->norek }}</p>
                                        <button id="salin-norek" class="flex items-center gap-1 hover:text-[#383636]">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="none" viewBox="0 0 24 24" class="icon-sm">
                                                <path fill="currentColor" fill-rule="evenodd"
                                                    d="M7 5a3 3 0 0 1 3-3h9a3 3 0 0 1 3 3v9a3 3 0 0 1-3 3h-2v2a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3v-9a3 3 0 0 1 3-3h2zm2 2h5a3 3 0 0 1 3 3v5h2a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1h-9a1 1 0 0 0-1 1zM5 9a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h9a1 1 0 0 0 1-1v-9a1 1 0 0 0-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="font-bold">Salin</span>

                                            {{-- <span class="font-bold">Disalin</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                              </svg> --}}


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
                                <h2 class="underline font-semibold"><span class="text-red-500">*</span>Upload bukti
                                    pembayaran:
                                </h2>
                                <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" />
                            </div>

                            <button type="submit" class="w-full bg-accent px-5 py-2 text-white">
                                KONFIRMASI PEMBAYARAN
                            </button>
                        </form>


                        <button onclick="bukaModal()" type="button"
                            class="w-full bg-primary hover:bg-[#f4f4f4] border border-red-500 px-5 py-2 text-red-500">
                            BATALKAN PESANAN
                        </button>
                    </div>
                </div>

                <div class="flex w-full items-center justify-between">
                    {{-- <a
                href="catalog.html"
                class="hidden text-sm text-accent lg:block"
                >&larr; Back to the shop</a
              > --}}
                </div>
            </section>
            <!-- /form  -->

            <!-- Summary  -->
            {{-- <section class="mx-auto w-full px-4 md:max-w-[400px]">
                <div class="">
                    <div class="border py-5 px-4 shadow-md">
                        <p class="font-bold">ORDER SUMMARY</p>

                        <div class="flex justify-between border-b py-5">
                            <p>Subtotal</p>
                            <p>$1280</p>
                        </div>

                        <div class="flex justify-between border-b py-5">
                            <p>Shipping</p>
                            <p>Free</p>
                        </div>

                        <div class="flex justify-between py-5">
                            <p>Total</p>
                            <p>$1280</p>
                        </div>
                    </div>
                </div>
            </section> --}}
        </section>
        <!-- /Summary -->

    </section>



    @include('shop.components.footer')


    <script>
        document.getElementById('salin-norek').addEventListener('click', function() {
            var norek = document.getElementById('norek').innerText;
            var tempInput = document.createElement('input');
            tempInput.style = 'position: absolute; left: -1000px; top: -1000px';
            tempInput.value = norek;
            document.body.appendChild(tempInput);
            tempInput.select();
            document.execCommand('copy');
            document.body.removeChild(tempInput);
            // Ubah tampilan tombol setelah teks berhasil disalin
            this.innerHTML =
                '<span class="font-bold">Disalin</span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>';
        });


        // Confirm dialog
        const confirmCancel = document.getElementById('confirm-cancel');

        const bukaModal = () => {
            confirmCancel.classList.remove('hidden');
            confirmCancel.classList.add('block');
        }

        const tutupModal = () => {
            confirmCancel.classList.remove('block');
            confirmCancel.classList.add('hidden');
        }


    </script>

</body>

</html>
