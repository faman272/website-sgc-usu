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

            <li class="text-gray-500">Cart</li>
        </ul>
    </nav>
    <!-- /breadcrumbs  -->


    <section class="container mx-auto flex-grow max-w-[1200px] border-b py-5 lg:flex lg:flex-row lg:py-10">

        <!-- Mobile cart table  -->
        <section class="container mx-auto my-3 flex w-full flex-col gap-3 px-4 md:hidden">

            @foreach ($carts as $item)
                <div class="flex w-full border px-4 py-4">
                    <img class="self-start object-contain" width="90px" src="/image/{{ $item->product->gambar }}"
                        alt="bedroom image" />
                    <div class="ml-3 flex w-full flex-col justify-center">
                        <div class="flex items-center justify-between">
                            <p class="text-xl font-bold uppercase">{{ $item->product->nama }}</p>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="h-5 w-5">
                                <path
                                    d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
                            </svg>
                        </div>
                        <p class="py-3 text-xl font-bold text-accent">
                            Rp{{ number_format($item->product->harga_diskon, 0, ',', '.') }}</p>
                        <div class="mt-2 flex w-full items-center justify-between">
                            <div class="flex items-center justify-center">

                                <form action="{{ route('cart.decrement', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                        class="flex h-8 w-8 cursor-pointer items-center justify-center border duration-100 hover:bg-neutral-100 focus:ring-2 focus:ring-gray-500 active:ring-2 active:ring-gray-500">
                                        &minus;
                                    </button>
                                </form>
                                <div
                                    class="flex h-8 w-8 cursor-text items-center justify-center border-t border-b active:ring-gray-500">
                                    {{ $item->quantity }}
                                </div>
                                <form action="{{ route('cart.increment', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                        class="flex h-8 w-8 cursor-pointer items-center justify-center border duration-100 hover:bg-neutral-100 focus:ring-2 focus:ring-gray-500 active:ring-2 active:ring-gray-500">
                                        &#43;
                                    </button>
                                </form>
                            </div>
                            <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="red"
                                        class="m-0 h-5 w-5 cursor-pointer">
                                        <path fill-rule="evenodd"
                                            d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach



        </section>
        <!-- /Mobile cart table  -->

        <!-- Desktop cart table  -->
        <section class="hidden h-[450px] w-full max-w-[1200px] grid-cols-1 gap-3 px-5 pb-10 md:grid">
            <table class="table-fixed">
                <thead class="h-16 bg-neutral-100">
                    <tr>
                        <th>ITEM</th>
                        <th>HARGA</th>
                        <th>QTY</th>
                        <th>BERAT</th>
                        <th>SUBTOTAL</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    @if ($carts->count() < 1)
                        <tr class="text-center">
                            <td colspan="5">
                                <div class="flex justify-center mb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" width="200"
                                        height="150" viewBox="0 0 896 747.97143"
                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title>empty_cart</title>
                                        <path
                                            d="M193.634,788.75225c12.42842,23.049,38.806,32.9435,38.806,32.9435s6.22712-27.47543-6.2013-50.52448-38.806-32.9435-38.806-32.9435S181.20559,765.7032,193.634,788.75225Z"
                                            transform="translate(-152 -76.01429)" fill="#2f2e41" />
                                        <path
                                            d="M202.17653,781.16927c22.43841,13.49969,31.08016,40.3138,31.08016,40.3138s-27.73812,4.92679-50.17653-8.57291S152,772.59636,152,772.59636,179.73811,767.66958,202.17653,781.16927Z"
                                            transform="translate(-152 -76.01429)" fill="#08a243" />
                                        <rect x="413.2485" y="35.90779" width="140" height="2" fill="#f2f2f2" />
                                        <rect x="513.2485" y="37.40779" width="2" height="18.5" fill="#f2f2f2" />
                                        <rect x="452.2485" y="37.40779" width="2" height="18.5" fill="#f2f2f2" />
                                        <rect x="484.2485" y="131.90779" width="140" height="2" fill="#f2f2f2" />
                                        <rect x="522.2485" y="113.90779" width="2" height="18.5" fill="#f2f2f2" />
                                        <rect x="583.2485" y="113.90779" width="2" height="18.5" fill="#f2f2f2" />
                                        <rect x="670.2485" y="176.90779" width="140" height="2" fill="#f2f2f2" />
                                        <rect x="708.2485" y="158.90779" width="2" height="18.5" fill="#f2f2f2" />
                                        <rect x="769.2485" y="158.90779" width="2" height="18.5" fill="#f2f2f2" />
                                        <rect x="656.2485" y="640.90779" width="140" height="2"
                                            fill="#f2f2f2" />
                                        <rect x="694.2485" y="622.90779" width="2" height="18.5"
                                            fill="#f2f2f2" />
                                        <rect x="755.2485" y="622.90779" width="2" height="18.5"
                                            fill="#f2f2f2" />
                                        <rect x="417.2485" y="319.90779" width="140" height="2"
                                            fill="#f2f2f2" />
                                        <rect x="455.2485" y="301.90779" width="2" height="18.5"
                                            fill="#f2f2f2" />
                                        <rect x="516.2485" y="301.90779" width="2" height="18.5"
                                            fill="#f2f2f2" />
                                        <rect x="461.2485" y="560.90779" width="140" height="2"
                                            fill="#f2f2f2" />
                                        <rect x="499.2485" y="542.90779" width="2" height="18.5"
                                            fill="#f2f2f2" />
                                        <rect x="560.2485" y="542.90779" width="2" height="18.5"
                                            fill="#f2f2f2" />
                                        <rect x="685.2485" y="487.90779" width="140" height="2"
                                            fill="#f2f2f2" />
                                        <rect x="723.2485" y="469.90779" width="2" height="18.5"
                                            fill="#f2f2f2" />
                                        <rect x="784.2485" y="469.90779" width="2" height="18.5"
                                            fill="#f2f2f2" />
                                        <polygon
                                            points="362.06 702.184 125.274 702.184 125.274 700.481 360.356 700.481 360.356 617.861 145.18 617.861 134.727 596.084 136.263 595.347 146.252 616.157 362.06 616.157 362.06 702.184"
                                            fill="#2f2e41" />
                                        <circle cx="156.78851" cy="726.03301" r="17.88673" fill="#3f3d56" />
                                        <circle cx="333.10053" cy="726.03301" r="17.88673" fill="#3f3d56" />
                                        <circle cx="540.92726" cy="346.153" r="11.07274" fill="#3f3d56" />
                                        <path
                                            d="M539.38538,665.76747H273.23673L215.64844,477.531H598.69256l-.34852,1.10753Zm-264.8885-1.7035H538.136l58.23417-184.82951H217.95082Z"
                                            transform="translate(-152 -76.01429)" fill="#2f2e41" />
                                        <polygon
                                            points="366.61 579.958 132.842 579.958 82.26 413.015 418.701 413.015 418.395 413.998 366.61 579.958"
                                            fill="#f2f2f2" />
                                        <polygon
                                            points="451.465 384.7 449.818 384.263 461.059 341.894 526.448 341.894 526.448 343.598 462.37 343.598 451.465 384.7"
                                            fill="#2f2e41" />
                                        <rect x="82.2584" y="458.58385" width="345.2931" height="1.7035"
                                            fill="#2f2e41" />
                                        <rect x="101.45894" y="521.34377" width="306.31852" height="1.7035"
                                            fill="#2f2e41" />
                                        <rect x="254.31376" y="402.36843" width="1.7035" height="186.53301"
                                            fill="#2f2e41" />
                                        <rect x="385.55745" y="570.79732" width="186.92877" height="1.70379"
                                            transform="translate(-274.73922 936.23495) rotate(-86.24919)"
                                            fill="#2f2e41" />
                                        <rect x="334.45728" y="478.18483" width="1.70379" height="186.92877"
                                            transform="translate(-188.46866 -52.99638) rotate(-3.729)"
                                            fill="#2f2e41" />
                                        <rect y="745" width="896" height="2" fill="#2f2e41" />
                                        <path
                                            d="M747.41068,137.89028s14.61842,41.60627,5.62246,48.00724S783.39448,244.573,783.39448,244.573l47.22874-12.80193-25.86336-43.73993s-3.37348-43.73992-3.37348-50.14089S747.41068,137.89028,747.41068,137.89028Z"
                                            transform="translate(-152 -76.01429)" fill="#a0616a" />
                                        <path
                                            d="M747.41068,137.89028s14.61842,41.60627,5.62246,48.00724S783.39448,244.573,783.39448,244.573l47.22874-12.80193-25.86336-43.73993s-3.37348-43.73992-3.37348-50.14089S747.41068,137.89028,747.41068,137.89028Z"
                                            transform="translate(-152 -76.01429)" opacity="0.1" />
                                        <path
                                            d="M722.87364,434.46832s-4.26731,53.34138,0,81.07889,10.66828,104.5491,10.66828,104.5491,0,145.08854,23.4702,147.22219,40.53945,4.26731,42.6731-4.26731-10.66827-12.80193-4.26731-17.06924,8.53462-19.20289,0-36.27213,0-189.8953,0-189.8953l40.53945,108.81641s4.26731,89.61351,8.53462,102.41544-4.26731,36.27213,10.66827,38.40579,32.00483-10.66828,40.53945-14.93559-12.80193-4.26731-8.53462-6.401,17.06924-8.53462,12.80193-10.66828-8.53462-104.54909-8.53462-104.54909S879.69728,414.1986,864.7617,405.664s-24.537,6.16576-24.537,6.16576Z"
                                            transform="translate(-152 -76.01429)" fill="#2f2e41" />
                                        <path
                                            d="M761.27943,758.78388v17.06924s-19.20289,46.39942,0,46.39942,34.13848,4.8083,34.13848-1.59266V763.05119Z"
                                            transform="translate(-152 -76.01429)" fill="#2f2e41" />
                                        <path
                                            d="M887.16508,758.75358v17.06924s19.20289,46.39941,0,46.39941-34.13848,4.80831-34.13848-1.59266V763.02089Z"
                                            transform="translate(-152 -76.01429)" fill="#2f2e41" />
                                        <circle cx="625.28185" cy="54.4082" r="38.40579" fill="#a0616a" />
                                        <path
                                            d="M765.54674,201.89993s10.66828,32.00482,27.73752,25.60386l17.06924-6.401L840.22467,425.9337s-23.47021,34.13848-57.60869,12.80193S765.54674,201.89993,765.54674,201.89993Z"
                                            transform="translate(-152 -76.01429)" fill="#08a243" />
                                        <path
                                            d="M795.41791,195.499l9.60145-20.26972s56.54186,26.67069,65.07648,35.20531,8.53462,21.33655,8.53462,21.33655l-14.93559,53.34137s4.26731,117.351,4.26731,121.61834,14.93559,27.73751,4.26731,19.20289-12.80193-17.06924-21.33655-4.26731-27.73751,27.73752-27.73751,27.73752Z"
                                            transform="translate(-152 -76.01429)" fill="#3f3d56" />
                                        <path
                                            d="M870.09584,349.12212l-6.401,59.74234s-38.40579,34.13848-29.87117,36.27214,12.80193-6.401,12.80193-6.401,14.93559,14.93559,23.47021,6.401S899.967,355.52309,899.967,355.52309Z"
                                            transform="translate(-152 -76.01429)" fill="#a0616a" />
                                        <path
                                            d="M778.1,76.14416c-8.51412-.30437-17.62549-.45493-24.80406,4.13321a36.31263,36.31263,0,0,0-8.5723,8.39153c-6.99153,8.83846-13.03253,19.95926-10.43553,30.92537l3.01633-1.1764a19.75086,19.75086,0,0,1-1.90515,8.46261c.42475-1.2351,1.84722.76151,1.4664,2.01085L733.543,139.792c5.46207-2.00239,12.25661,2.05189,13.08819,7.80969.37974-12.66123,1.6932-27.17965,11.964-34.59331,5.17951-3.73868,11.73465-4.88,18.04162-5.8935,5.81832-.935,11.91781-1.82659,17.49077.08886s10.31871,7.615,9.0553,13.37093c2.56964-.88518,5.44356.90566,6.71347,3.30856s1.33662,5.2375,1.37484,7.95506c2.73911,1.93583,5.85632-1.9082,6.97263-5.07112,2.62033-7.42434,4.94941-15.32739,3.53783-23.073s-7.72325-15.14773-15.59638-15.174a5.46676,5.46676,0,0,0,1.42176-3.84874l-6.48928-.5483a7.1723,7.1723,0,0,0,4.28575-2.25954C802.7981,84.73052,782.31323,76.29477,778.1,76.14416Z"
                                            transform="translate(-152 -76.01429)" fill="#2f2e41" />
                                        <path
                                            d="M776.215,189.098s-17.36929-17.02085-23.62023-15.97822S737.80923,189.098,737.80923,189.098s-51.20772,17.06924-49.07407,34.13848S714.339,323.51826,714.339,323.51826s19.2029,100.28179,2.13366,110.95006,81.07889,38.40579,83.21254,25.60386,6.401-140.82123,0-160.02412S776.215,189.098,776.215,189.098Z"
                                            transform="translate(-152 -76.01429)" fill="#3f3d56" />
                                        <path
                                            d="M850.89294,223.23648h26.38265S895.6997,304.31537,897.83335,312.85s6.401,49.07406,4.26731,49.07406-44.80675-8.53462-44.80675-2.13365Z"
                                            transform="translate(-152 -76.01429)" fill="#3f3d56" />
                                        <path
                                            d="M850,424.01429H749c-9.85608-45.34-10.67957-89.14649,0-131H850C833.70081,334.115,832.68225,377.62137,850,424.01429Z"
                                            transform="translate(-152 -76.01429)" fill="#f2f2f2" />
                                        <path
                                            d="M707.93806,368.325,737.80923,381.127s57.60868,8.53462,57.60868-14.93559-57.60868-10.66827-57.60868-10.66827L718.60505,349.383Z"
                                            transform="translate(-152 -76.01429)" fill="#a0616a" />
                                        <path
                                            d="M714.339,210.43455l-25.60386,6.401L669.53227,329.91923s-6.401,29.87117,4.26731,32.00482S714.339,381.127,714.339,381.127s4.26731-32.00483,12.80193-32.00483L705.8044,332.05288,718.60633,257.375Z"
                                            transform="translate(-152 -76.01429)" fill="#3f3d56" />
                                        <rect x="60.2485" y="352.90779" width="140" height="2"
                                            fill="#f2f2f2" />
                                        <rect x="98.2485" y="334.90779" width="2" height="18.5"
                                            fill="#f2f2f2" />
                                        <rect x="159.2485" y="334.90779" width="2" height="18.5"
                                            fill="#f2f2f2" />
                                        <rect x="109.2485" y="56.90779" width="140" height="2"
                                            fill="#f2f2f2" />
                                        <rect x="209.2485" y="58.40779" width="2" height="18.5"
                                            fill="#f2f2f2" />
                                        <rect x="148.2485" y="58.40779" width="2" height="18.5"
                                            fill="#f2f2f2" />
                                        <rect x="250.2485" y="253.90779" width="140" height="2"
                                            fill="#f2f2f2" />
                                        <rect x="350.2485" y="255.40779" width="2" height="18.5"
                                            fill="#f2f2f2" />
                                        <rect x="289.2485" y="255.40779" width="2" height="18.5"
                                            fill="#f2f2f2" />
                                        <rect x="12.2485" y="252.90779" width="140" height="2"
                                            fill="#f2f2f2" />
                                        <rect x="112.2485" y="254.40779" width="2" height="18.5"
                                            fill="#f2f2f2" />
                                        <rect x="51.2485" y="254.40779" width="2" height="18.5"
                                            fill="#f2f2f2" />
                                        <rect x="180.2485" y="152.90779" width="20" height="2"
                                            fill="#f2f2f2" />
                                        <rect x="218.2485" y="134.90779" width="2" height="18.5"
                                            fill="#f2f2f2" />
                                        <rect x="279.2485" y="134.90779" width="1" height="2"
                                            fill="#f2f2f2" />
                                    </svg>
                                </div>
                                <span class="font-semibold text-2xl">Cart Empty</span>
                            </td>
                        </tr>
                    @endif

                    @foreach ($carts as $item)
                        <tr class="border-b">
                            <td class="">
                                <div class="flex">
                                    <img class="w-[90px]" src="/image/{{ $item->product->gambar }}"
                                        alt="bedroom image" />
                                    <div class="ml-3 flex flex-col justify-center">
                                        <p class="text-xl font-bold uppercase">{{ $item->product->nama }}</p>
                                        <p class="text-sm text-gray-400 line-through">
                                            Rp{{ number_format($item->product->harga, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="mx-auto text-center">
                                Rp{{ number_format($item->product->harga_diskon, 0, ',', '.') }}</td>
                            <td class="align-middle">
                                <div class="flex items-center justify-center">

                                    <form action="{{ route('cart.decrement', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="flex h-8 w-8 cursor-pointer items-center justify-center border duration-100 hover:bg-neutral-100 focus:ring-2 focus:ring-gray-500 active:ring-2 active:ring-gray-500">
                                            &minus;
                                        </button>
                                    </form>

                                    <div
                                        class="flex h-8 w-8 cursor-text items-center justify-center border-t border-b active:ring-gray-500">
                                        {{ $item->quantity }}
                                    </div>

                                    <form action="{{ route('cart.increment', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="flex h-8 w-8 cursor-pointer items-center justify-center border duration-100 hover:bg-neutral-100 focus:ring-2 focus:ring-gray-500 active:ring-2 active:ring-gray-500">
                                            &#43;
                                        </button>
                                    </form>

                                </div>
                            </td>
                            <td class="mx-auto text-center">{{ $item->total_berat }}gr</td>
                            <td class="mx-auto text-center">Rp{{ number_format($item->subtotal, 0, ',', '.') }}</td>
                            <td class="align-middle">

                                <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="red"
                                            class="m-0 h-5 w-5 cursor-pointer">
                                            <path fill-rule="evenodd"
                                                d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </section>
        <!-- /Desktop cart table  -->

        <!-- Summary  -->

        <section class="mx-auto w-full px-4 md:max-w-[400px]">
            <div class="">
                <div class="border py-5 px-4 shadow-md">
                    <p class="font-bold">ORDER SUMMARY</p>

                    <div class="flex justify-between border-b py-5">
                        <p>Subtotal</p>
                        <p>Rp{{ number_format($total, 0, ',', '.') }}</p>
                    </div>

                    <div class="flex justify-between border-b py-5">
                        <p>Shipping (Total {{ $total_berat }}gr)</p>
                        <p>Pending</p>
                    </div>

                    <div class="flex justify-between py-5">
                        <p>Total Pesanan ({{ $carts->count() }} Produk)</p>
                        <p class="font-extrabold text-accent text-[24px]">Rp{{ number_format($total, 0, ',', '.') }}</p>
                    </div>

                    <a href="{{ route('shop.checkout-alamat') }}">
                            <button class="w-full bg-accent px-5 py-2 text-white">
                                CHECKOUT
                            </button>
                    </a>
                    <div class="mt-4 text-center">
                        <a href="/shop" class="underline">
                            CONTINUE SHOPPING
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </section>


    @include('shop.components.footer')


</body>

</html>
