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


    {{-- Verify email section --}}

    <section class="container mt-4 text-center mx-auto max-w-[1200px] bg-white shadow-md py-10">
        <div class="mx-auto max-w-[600px] px-5">
            <div class="flex justify-center mt-3">
                <img src="/image/email.png" alt="" width="25%">
            </div>
            <h2 class="text-2xl font-bold my-4">Verifikasi Alamat Email Anda</h2>
            <div class="h-[2px] w-full bg-gray-300"></div>
            <p class="mt-2 text-gray-500 my-4">Sebelum melanjutkan, silakan periksa email Anda untuk tautan verifikasi. Jika
                Anda Tidak menerima email, klik tombol di bawah ini untuk meminta link yang baru.</p>

            <div class="mt-5">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit"
                        class="px-4 w-full py-3 bg-accent font-semibold text-white text-base rounded-sm hover:bg-accent-dark">Kirim Ulang
                        Verifikasi Email</button>
                </form>
            </div>
        </div>
    </section>


    @include('shop.components.footer')


</body>

</html>
