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


    <!-- Login card  -->
    <section class="mx-auto flex-grow w-full mt-10 mb-10 max-w-[1200px] px-5">
        <div class="container mx-auto border px-5 py-5 shadow-sm md:w-1/2">
            <div class="">
                <p class="text-4xl font-bold">LOGIN</p>
                <p>Welcome back, customer!</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="mt-6 flex flex-col">
                @csrf
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input class="mb-3 mt-3 border px-4 py-2" id="email" type="email" name="email"
                    :value="old('email')" required autofocus autocomplete="username" placeholder="youremail@domain.com" />
                <x-input-error :messages="$errors->get('email')" class="mb-2" />

                <x-input-label for="password" :value="__('Password')" />
                <x-text-input class="mt-3 border px-4 py-2" id="password" type="password" name="password" required
                    autocomplete="current-password" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                {{-- Remember Me --}}
                <div class="mt-4 flex justify-between">
                    <div class="flex justify-center items-center gap-2">
                        <input id="remember_me" type="checkbox" name="remember" />
                        <label for="checkbox">Remember me</label>
                    </div>
                    @if (Route::has('password.request'))
                        <a class="underline text-md text-accent hover:text-accent2 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
                {{-- /Remember Me --}}


                <button type="submit" class="my-5 w-full bg-accent py-2 text-white">
                    LOGIN
                </button>

                <p class="text-center text-gray-500">OR LOGIN WITH</p>

                <div class="my-5 flex gap-2">
                    <button class="w-1/2 bg-blue-800 py-2 text-white">FACEBOOK</button>
                    <button class="w-1/2 bg-orange-500 py-2 text-white">GOOGLE</button>
                </div>
            </form>


            <p class="text-center">
                Don`t have account?
                <a href="{{ route('register') }}" class="text-accent">Register now</a>
            </p>
        </div>
    </section>
    <!-- /Login Card  -->



    @include('shop.components.footer')


</body>

</html>
