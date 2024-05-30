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
                            <a href="profile-information.html"
                                class="active:blue-900 text-gray-500 duration-100 hover:text-yellow-400">Informasi
                                profil</a>
                            {{-- <a href="manage-address.html"
                                class="text-gray-500 duration-100 hover:text-yellow-400">Kelola Alamat</a>
                            <a href="change-password.html" class="text-gray-500 duration-100 hover:text-yellow-400">Ubah
                                Password</a> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex border-b py-5">
                <div class="flex w-full">
                    <div class="flex flex-col gap-2">
                        <a href="my-order-history.html"
                            class="flex items-center gap-2 font-medium active:text-violet-900">
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
        <section class="grid w-full max-w-[1200px] grid-cols-1 gap-3">
            <div class="py-5">
                <div class="w-full"></div>
                <div class="py-5">
                    <form class="flex w-full flex-col gap-3" action="{{ route('account.update') }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="flex flex-col w-full justify-between gap-2">

                            <label for="provinsi">
                                Pilih Provinsi
                                <select name="provinsi" class="form-control" name="provinsi" id="provinsi"
                                    style="width: 100%;">
                                </select>
                            </label>

                            <label for="kabupaten">
                                Pilih Kab/Kota
                                <select name="kota" class="form-control" name="kabupaten" id="kabupaten"
                                    style="width: 100%;">
                                </select>
                            </label>

                            <label for="kecamatan">
                                Pilih Kecamatan
                                <select name="kecamatan" class="form-control" name="kecamatan" id="kecamatan"
                                    style="width: 100%;">
                                </select>
                            </label>

                            <label for="kelurahan">
                                Pilih Kelurahan
                                <select name="kelurahan" class="form-control" name="kelurahan" id="kelurahan"
                                    style="width: 100%;">
                                </select>
                            </label>
                        </div>

                        <div class="flex flex-col">
                            <label for="">Nama Jalan, Gedung, No. Rumah</label>
                            <textarea name="jalan" class="border px-4 py-2 outline-yellow-400" type="textarea"></textarea>
                        </div>
                        <div class="flex w-full justify-between gap-2">
                            <div class="flex w-1/2 flex-col">
                                <label class="flex" for="name">Kode POS<span
                                        class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']"></span></label>
                                <input name="kode_pos" x-mask="999999"
                                    class="w-full border px-4 py-2 outline-yellow-400" placeholder="176356" />
                            </div>
                            <div class="flex w-1/2 flex-col">
                                <label class="flex" for="name">Nomor Telepon<span
                                        class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']"></span></label>
                                <input maxlength="12" name="nomor_telepon"
                                    class="w-full border px-4 py-2 outline-yellow-400" type="text"
                                    placeholder="081234567899" name="" id="" />
                            </div>
                        </div>


                </div>

                <div class="flex w-full items-center justify-between">
                    <a href="/shop" class="text-sm text-accent">&larr; Back to the shop</a>

                    <button type="submit" class="bg-accent text-white px-4 py-2">Simpan</button>
                </div>
                </form>

        </section>
        </div>
    </section>
    <!-- /form  -->

    </section>



    @include('shop.components.footer')


    <script>
        // $(document).ready(function() {
        //     $('#provinsi').on('change', function() {
        //         var provinsi = $(this).val();
        //     });
        // })

        $(document).ready(function() {

            $('select').select2({
                placeholder: "Pilih",
                allowClear: true
            });


            function capitalize(str) {
                return str.toLowerCase().replace(/^\w|\s\w/g, function(letter) {
                    return letter.toUpperCase();
                });
                
            }

            function loadSelect(url, element) {
                $.getJSON(url, function(data) {
                    $.each(data, function(key, entry) {
                        $(element).append($('<option></option>').attr('value', capitalize(entry.name)).text(
                            entry.name).data('id', entry.id));
                    });
                });
            }

            loadSelect('http://www.emsifa.com/api-wilayah-indonesia/api/provinces.json', '#provinsi');

            $('#provinsi').change(function() {
                var id = $(this).find(':selected').data('id'); // Get the id from the selected option
                $('#kabupaten').empty();
                loadSelect('http://www.emsifa.com/api-wilayah-indonesia/api/regencies/' + id + '.json',
                    '#kabupaten');
            });

            $('#kabupaten').change(function() {
                var id = $(this).find(':selected').data('id'); // Get the id from the selected option
                $('#kecamatan').empty();
                loadSelect('http://www.emsifa.com/api-wilayah-indonesia/api/districts/' + id + '.json',
                    '#kecamatan');
            });

            $('#kecamatan').change(function() {
                var id = $(this).find(':selected').data('id'); // Get the id from the selected option
                $('#kelurahan').empty();
                loadSelect('http://www.emsifa.com/api-wilayah-indonesia/api/villages/' + id + '.json',
                    '#kelurahan');
            });
        });
    </script>


</body>

</html>
