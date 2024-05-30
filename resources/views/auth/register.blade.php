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

                <div class="flex justify-center items-center gap-2">
                    <div class="h-[1px] w-1/2 bg-gray-500"></div>
                    <p class="text-center text-gray-500">OR</p>
                    <div class="h-[1px] w-1/2 bg-gray-500"></div>
                </div>

                <div class="my-5 flex justify-center gap-2">
                    <a href="{{ route('google.redirect') }}"
                        class="w-1/2 flex justify-center border hover:bg-primary border-accent items-center gap-3 bg-white py-2 text-black">
                        <svg width="35px" height="35px" viewBox="0 0 32 32" data-name="Layer 1" id="Layer_1"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M23.75,16A7.7446,7.7446,0,0,1,8.7177,18.6259L4.2849,22.1721A13.244,13.244,0,0,0,29.25,16"
                                fill="#00ac47" />
                            <path
                                d="M23.75,16a7.7387,7.7387,0,0,1-3.2516,6.2987l4.3824,3.5059A13.2042,13.2042,0,0,0,29.25,16"
                                fill="#4285f4" />
                            <path
                                d="M8.25,16a7.698,7.698,0,0,1,.4677-2.6259L4.2849,9.8279a13.177,13.177,0,0,0,0,12.3442l4.4328-3.5462A7.698,7.698,0,0,1,8.25,16Z"
                                fill="#ffba00" />
                            <polygon fill="#2ab2db" points="8.718 13.374 8.718 13.374 8.718 13.374 8.718 13.374" />
                            <path
                                d="M16,8.25a7.699,7.699,0,0,1,4.558,1.4958l4.06-3.7893A13.2152,13.2152,0,0,0,4.2849,9.8279l4.4328,3.5462A7.756,7.756,0,0,1,16,8.25Z"
                                fill="#ea4435" />
                            <polygon fill="#2ab2db" points="8.718 18.626 8.718 18.626 8.718 18.626 8.718 18.626" />
                            <path d="M29.25,15v1L27,19.5H16.5V14H28.25A1,1,0,0,1,29.25,15Z" fill="#4285f4" />
                        </svg>
                        Continue With Google
                    </a>
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
