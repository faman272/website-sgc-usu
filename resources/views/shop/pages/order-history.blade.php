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
                            {{-- <a href="profile-information.html"
                                class="active:blue-900 text-gray-500 duration-100 hover:text-yellow-400">Informasi
                                profil</a> --}}
                            <a href="/shop/account/alamat"
                                class="text-gray-500 duration-100 hover:text-yellow-400">Kelola Alamat</a>
                            {{-- <a href="change-password.html" class="text-gray-500 duration-100 hover:text-yellow-400">Ubah
                                Password</a> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex border-b py-5">
                <div class="flex w-full">
                    <div class="flex flex-col gap-2">
                        <a href="/shop/account/order-history"
                            class="flex items-center gap-2 font-medium active:text-accent">
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

        <!-- Mobile order table  -->
        <section class="container mx-auto my-3 flex w-full flex-col gap-3 px-4 md:hidden">
            <!-- 1 -->
            <div class="flex w-full border px-4 py-4">
                <div class="ml-3 flex w-full flex-col justify-center">
                    <div class="flex items-center justify-between">
                        <p class="text-xl font-bold">Order &numero; 1245</p>
                        <div class="border border-green-500 px-2 py-1 text-green-500">
                            Delivered
                        </div>
                    </div>
                    <p class="text-sm text-gray-400">22/06/2023</p>
                    <p class="py-3 text-xl font-bold text-violet-900">$620</p>
                    <div class="mt-2 flex w-full items-center justify-between">
                        <div class="flex items-center justify-center">
                            <a href="order-overview.html"
                                class="flex cursor-text items-center justify-center bg-amber-500 px-2 py-2 active:ring-gray-500">
                                View order
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2 -->

            <div class="flex w-full border px-4 py-4">
                <div class="ml-3 flex w-full flex-col justify-center">
                    <div class="flex items-center justify-between">
                        <p class="text-xl font-bold">Order &numero; 1232</p>
                        <div class="border border-orange-500 px-2 py-1 text-orange-500">
                            Progress
                        </div>
                    </div>
                    <p class="text-sm text-gray-400">20/05/2023</p>
                    <p class="py-3 text-xl font-bold text-violet-900">$320</p>
                    <div class="mt-2 flex w-full items-center justify-between">
                        <div class="flex items-center justify-center">
                            <a href="order-overview.html"
                                class="flex cursor-text items-center justify-center bg-amber-500 px-2 py-2 active:ring-gray-500">
                                View order
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3 -->

            <div class="flex w-full border px-4 py-4">
                <div class="ml-3 flex w-full flex-col justify-center">
                    <div class="flex items-center justify-between">
                        <p class="text-xl font-bold">Order &numero; 3246</p>
                        <div class="border border-red-500 px-2 py-1 text-red-500">
                            Declined
                        </div>
                    </div>
                    <p class="text-sm text-gray-400">03/03/2022</p>
                    <p class="py-3 text-xl font-bold text-violet-900">$2500</p>
                    <div class="mt-2 flex w-full items-center justify-between">
                        <div class="flex items-center justify-center">
                            <a href="order-overview.html"
                                class="flex cursor-text items-center justify-center bg-amber-500 px-2 py-2 active:ring-gray-500">
                                View order
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 4 -->

            <div class="flex w-full border px-4 py-4">
                <div class="ml-3 flex w-full flex-col justify-center">
                    <div class="flex items-center justify-between">
                        <p class="text-xl font-bold">Order &numero; 9827</p>
                        <div class="border border-blue-500 px-2 py-1 text-blue-500">
                            Need Payment
                        </div>
                    </div>
                    <p class="text-sm text-gray-400">31/01/20</p>
                    <p class="py-3 text-xl font-bold text-violet-900">$1700</p>
                    <div class="mt-2 flex w-full items-center justify-between">
                        <div class="flex items-center justify-center">
                            <a href="order-overview.html"
                                class="flex cursor-text items-center justify-center bg-amber-500 px-2 py-2 active:ring-gray-500">
                                View order
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Mobile order table  -->

        <!-- Order table  -->
        <section class="hidden w-full max-w-[1200px] grid-cols-1 gap-3 px-5 pb-10 lg:grid">
            <table class="table-fixed">
                <thead class="h-16 bg-neutral-100">
                    <tr>
                        <th>ORDER</th>
                        <th>DATE</th>
                        <th>TOTAL</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>

                    <!-- 1 -->

                    @forelse ($orders as $order)
                        <tr class="h-[20px] border-b">
                            <td class="text-center align-middle">#{{ $order->no_order }}</td>
                            <td class="mx-auto text-center">{{ $order->created_at }}</td>
                            <td class="text-center align-middle font-bold text-accent">
                                Rp{{ number_format($order->total, 0, ',', '.') }}</td>
                            @if ($order->status == 'diterima')
                                <td class="mx-auto text-center">
                                    <span class="border-2 border-green-500 py-1 px-3 text-green-500">Diterima</span>
                                </td>
                            @elseif($order->status == 'menunggu konfirmasi')
                                <td class="mx-auto text-center">
                                    <span class="border-2 border-orange-400 text-orange-400 py-1 px-3 ">Menunggu
                                        Konfirmasi</span>
                                </td>
                            @elseif($order->status == 'menunggu pembayaran')
                                <td class="mx-auto text-center">
                                    <span class="border-2 border-yellow-500 text-yellow-500 py-1 px-3 ">Menunggu
                                        Pembayaran</span>
                                </td>
                            @elseif($order->status == 'dibatalkan')
                                <td class="mx-auto text-center">
                                    <span class="border-2 border-red-500 text-red-500 py-1 px-3 ">Dibatalkan</span>
                                </td>
                            @elseif($order->status == 'dikirim')
                                <td class="mx-auto text-center">
                                    <span class="border-2 border-red-500 text-red-500 py-1 px-3 ">Dibatalkan</span>
                                </td>
                            @elseif($order->status == 'diproses')
                                <td class="mx-auto text-center">
                                    <span class="border-2 border-violet-500 text-violet-500 py-1 px-3 ">Dikirim</span>
                                </td>
                            @else
                                <td class="mx-auto text-center">
                                    <span class="border-2 border-blue-500 text-blue-500 py-1 px-3 ">Diproses</span>
                                </td>
                            @endif

                            <td class="text-center align-middle">
                                <a href="{{ route('order-detail', $order->payment->no_pembayaran) }}"
                                    class="bg-primary border border-accent text-accent px-4 py-2"><button
                                        class="text-center">View</button></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                <div class="flex flex-col mt-12 justify-center items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" width="100"
                                        height="100" viewBox="0 0 885.55805 557.51874"
                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title>heavy_box</title>
                                        <path
                                            d="M838.81222,592.35166C875.238,501.28427,864.21905,399.5975,817.23963,321.5L325.46637,389.59166l471.2759-98.21687c-198.62291-247.68466-585.21339-83.39849-547.948,229.321Z"
                                            transform="translate(-157.22097 -171.24063)" fill="#e6e6e6" />
                                        <rect x="76.75322" y="320.44454" width="626.52594" height="195.09542"
                                            fill="#08a243" />
                                        <path
                                            d="M408.706,467.89305c5.62128,4.36531,7.67682,5.77455,8.8739,5.59569,57.99957,16.88979,7.15438,36.68334-21.02622,3.08454Z"
                                            transform="translate(-157.22097 -171.24063)" fill="#ffb8b8" />
                                        <polygon
                                            points="60.099 475.093 60.099 514.747 88.649 513.161 80.719 471.921 60.099 475.093"
                                            fill="#ffb8b8" />
                                        <polygon
                                            points="218.713 475.093 218.713 514.747 190.162 513.161 198.093 471.921 218.713 475.093"
                                            fill="#ffb8b8" />
                                        <path
                                            d="M288.69608,441.72171l42.82582-1.58614c98.7937,103.57113,61.43194,79.94854,58.68724,222.05982L337.86647,646.334l11.103-98.34078c.00564-.00376,2.9288-1.95254.499-1.99746-15.19648,5.22229-26.2843-59.43676-59.18629-51.93136-37.44073-1.791-43.536,53.75037-58.68724,53.92882L242.698,646.334,190.3553,662.19539c-5.8605-156.16587-34.583-120.8878,58.68724-222.05982Z"
                                            transform="translate(-157.22097 -171.24063)" fill="#2f2e41" />
                                        <path
                                            d="M225.25041,673.29838s-6.34456-12.68913-14.27527-6.34456-26.96441,25.37826-26.96441,25.37826-45.99811,20.61985-17.44756,33.309,52.34268-17.44756,52.34268-17.44756c27.194-5.67065,42.87962-9.3011,28.45819-38.964C239.17643,672.77254,227.58972,676.87439,225.25041,673.29838Z"
                                            transform="translate(-157.22097 -171.24063)" fill="#2f2e41" />
                                        <path
                                            d="M368.00316,673.29838s6.34456-12.68913,14.27527-6.34456,26.96441,25.37826,26.96441,25.37826,45.99811,20.61985,17.44756,33.309-52.34268-17.44756-52.34268-17.44756c-27.194-5.67065-42.87962-9.3011-28.45819-38.964C354.07714,672.77254,365.66385,676.87439,368.00316,673.29838Z"
                                            transform="translate(-157.22097 -171.24063)" fill="#2f2e41" />
                                        <path
                                            d="M331.5219,262.48771c-2.35907,39.4855-56.24811,36.00919-57.10087-.00032C276.77987,223.0022,330.66891,226.47851,331.5219,262.48771Z"
                                            transform="translate(-157.22097 -171.24063)" fill="#ffb8b8" />
                                        <path
                                            d="M290.28222,283.10755c13.87587,41.93775-18.88432,19.10541,26.96441,52.34267l17.44755-34.89511s-12.68913-4.75843-11.103-22.206Z"
                                            transform="translate(-157.22097 -171.24063)" fill="#ffb8b8" />
                                        <path
                                            d="M375.93387,306.89967,328.65153,296.1074c1.32987,28.5097-29.09516,22.7717-34.404,8.43062l-45.205,26.15378c18.97388,70.667,14.16522,73.58277-11.103,118.96062-9.64336,8.806,4.77846,13.85306,17.33355,9.03441,9.576-5.91024,14.43914-11.16237,24.7-9.82589,48.48518,10.0956,88.84834,12.47853,95.23609,8.53366C377.49493,454.12327,375.143,307.46755,375.93387,306.89967Z"
                                            transform="translate(-157.22097 -171.24063)" fill="#575a89" />
                                        <path
                                            d="M363.24473,310.072c1.58614,0,9.7566-3.84164,9.7566-3.84164,23.771-.40071,39.72292,159.49664,40.99993,164.04194l-15.86141,11.103-25.37827-65.03181Z"
                                            transform="translate(-157.22097 -171.24063)" fill="#575a89" />
                                        <path
                                            d="M252.21482,495.65052c.811,5.98616,2.1911,73.21058,26.27252,41.80855,3.15944-22.91-7.58221-29.74918-10.4111-44.98083Z"
                                            transform="translate(-157.22097 -171.24063)" fill="#ffb8b8" />
                                        <path
                                            d="M258.55939,330.6918l-4.85992-2.69431c-13.02929-.42812-8.923,34.06114-14.43543,59.31894-4.50341,29.42466-3.22115,61.86983,2.06236,105.24733.46205,15.91777,28.9725,5.88989,33.0944,4.67291,0,0-9.51685-65.03181-4.75842-76.1348S258.55939,330.6918,258.55939,330.6918Z"
                                            transform="translate(-157.22097 -171.24063)" fill="#575a89" />
                                        <path
                                            d="M330.274,234.81036a34.02906,34.02906,0,0,0-19.357-14.798l-5.91821,4.73455,2.3009-5.52232a31.326,31.326,0,0,0-5.84937-.33807l-5.32488,6.84631,2.20389-6.6118c-22.84908,2.4534-36.36771,28.68323-24.50556,47.04084,1.82984-5.62323,4.05069-10.89971,5.88053-16.523a16.64409,16.64409,0,0,0,4.33558.02112l2.22628-5.19453.62186,4.97483c6.90017-.60122,17.13483-1.921,23.67647-3.13031l-.63606-3.81638,3.80566,3.17141c2.00423-.46143,3.19416-.87977,3.09583-1.19955,4.86513,7.84319,9.68573,12.8528,14.55074,20.69594C333.22749,254.09835,336.48772,244.9024,330.274,234.81036Z"
                                            transform="translate(-157.22097 -171.24063)" fill="#2f2e41" />
                                        <rect x="527.41215" y="343.97895" width="138.36733" height="65.63579"
                                            fill="#fff" />
                                        <rect x="553.57776" y="357.72699" width="86.0361" height="7.8701"
                                            fill="#e6e6e6" />
                                        <rect x="553.57776" y="372.8618" width="86.0361" height="7.8701"
                                            fill="#e6e6e6" />
                                        <rect x="553.57776" y="387.9966" width="86.0361" height="7.8701"
                                            fill="#e6e6e6" />
                                        <polygon
                                            points="406.916 359.57 402.415 351.775 397.915 343.979 393.414 351.775 388.913 359.57 393.749 359.57 393.749 382.144 402.08 382.144 402.08 359.57 406.916 359.57"
                                            fill="#fff" />
                                        <circle cx="711.88818" cy="483.13309" r="37.06013" fill="#3f3d56" />
                                        <circle cx="718.62639" cy="483.13309" r="16.42438" fill="#e6e6e6" />
                                        <polygon
                                            points="688.515 509.033 769.374 542.724 766.847 550.726 720.311 545.461 641.558 510.507 685.356 515.561 688.515 509.033"
                                            fill="#3f3d56" />
                                        <path
                                            d="M917.21059,712.44674l100.56476-329.88689,24.49016-43.49091.086-.4197c.079-.38371,1.877-9.47416-2.54574-16.05732a14.41879,14.41879,0,0,0-9.7384-6.13447c-13.51631-2.53423-43.75393-3.78284-45.0342-3.83486l-.24142-.00987-.23935.03269c-.82624.11269-20.15088,2.93748-24.51936,19.8122l-21.0244,38.2637-.08267.27226L843.74876,683.899l5.2379,1.59325,95.0945-312.63319,21.09473-38.39264.08555-.35286c3.089-12.6985,17.85682-15.66929,19.821-16.00921,3.089.13181,31.50885,1.39646,43.9756,3.73411a9.02851,9.02851,0,0,1,6.19122,3.7888c2.72588,4.03618,2.04358,9.97879,1.8034,11.541l-24.34,43.22463-.08719.28521L911.97351,710.8502Z"
                                            transform="translate(-157.22097 -171.24063)" fill="#3f3d56" />
                                        <rect x="965.00564" y="374.70786" width="5.47477" height="73.80538"
                                            transform="translate(233.46313 1119.54727) rotate(-79.76214)"
                                            fill="#3f3d56" />
                                        <rect x="951.12147" y="420.40497" width="5.47474" height="73.59863"
                                            transform="translate(157.9235 1129.12816) rotate(-78.46469)"
                                            fill="#3f3d56" />
                                        <rect x="925.90857" y="503.38544" width="5.47463" height="73.22959"
                                            transform="translate(-3.20879 1113.0217) rotate(-74.03214)"
                                            fill="#3f3d56" />
                                        <polygon
                                            points="784.589 511.372 786.585 506.273 718.249 479.515 714.893 443.181 778.675 467.004 799.338 496.902 803.843 493.79 782.201 462.476 708.64 435 713.108 483.382 784.589 511.372"
                                            fill="#3f3d56" />
                                        <circle cx="808.32876" cy="518.50867" r="37.06013" fill="#3f3d56" />
                                        <circle cx="818.01493" cy="520.19322" r="16.42438" fill="#e6e6e6" />
                                    </svg>
                                    <span class="font-bold text-lg">No Order Found</span>
                                </div>

                            </td>
                        </tr>
                    @endforelse


                </tbody>
            </table>
        </section>
        <!-- /Order table  -->

    </section>



    @include('shop.components.footer')


</body>

</html>
