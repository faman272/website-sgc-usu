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


    <!-- Register card  -->
    <section class="mx-auto mt-10 w-full flex-grow mb-10 max-w-[1200px] px-5">
        <div class="container mx-auto border px-5 py-5 shadow-sm md:w-1/2">
            <div class="">
                <p class="text-4xl font-bold">CREATE AN ACCOUNT</p>
                <p>Register for new customer</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="mt-6 flex flex-col">
                @csrf
                <x-input-label for="name" :value="__('Nama Lengkap')" />
                <x-text-input id="name" name="name" :value="old('name')" required autofocus autocomplete="name"
                    class="mb-2 mt-2 border px-4 py-2" type="text" placeholder="Marcus Aurelius" />
                <x-input-error :messages="$errors->get('name')" />

                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" :value="old('email')" required autocomplete="username"
                    class="mt-2 mb-2 border px-4 py-2" type="email" placeholder="customer@mail.com" />
                <x-input-error :messages="$errors->get('email')" />


                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" name="password" class="mt-2 mb-2 border px-4 py-2" type="password" required
                    autocomplete="new-password" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;" />
                <x-input-error :messages="$errors->get('password')" />

                <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
                <x-text-input id="password_confirmation" name="password_confirmation" class="mt-2 border px-4 py-2"
                    type="password" required autocomplete="new-password"
                    placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;" />
                <x-input-error :messages="$errors->get('password_confirmation')" />

                <div class="mt-4 flex items-center gap-2">
                    <input type="checkbox" />
                    <label for="checkbox">
                        I have read and agree with
                        <a href="#" class="text-accent">terms &amp; conditions</a>
                    </label>
                </div>

                <button type="submit" class="my-5 w-full bg-accent py-2 text-white">
                    CREATE ACCOUNT
                </button>

                <p class="text-center text-gray-500">OR SIGN UP WITH</p>

                <div class="my-5 flex gap-2">
                    <button class="w-1/2 bg-blue-800 py-2 text-white">FACEBOOK</button>
                    <button class="w-1/2 bg-orange-500 py-2 text-white">GOOGLE</button>
                </div>
            </form>


            <p class="text-center">
                Already have an account?
                <a href="{{ route('login') }}" class="text-accent">Login now</a>
            </p>
        </div>
    </section>
    <!-- /Register Card  -->


    @include('shop.components.footer')


</body>

</html>
