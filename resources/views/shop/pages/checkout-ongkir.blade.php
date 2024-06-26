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
    <div id="confirm-pembayaran" class="fixed hidden z-50 inset-0 bg-gray-950/50 dark:bg-gray-950/75">
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
                    <div class="rounded-full p-3 bg-[#7c3a65]/20">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8 text-[#7c3a65]">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                        </svg>
                    </div>
                </div>
                <p class="font-semibold text-gray-950 text-base leading-6 text-center">Checkout Pembayaran</p>
                <p class="mt-2 text-center text-sm text-gray-500">Pastikan data alamat yang anda masukkan sudah benar
                    dan sesuai.</p>
                <div class="mt-6 w-full flex gap-3">
                    <button onclick="tutupModal()"
                        class="px-4 py-2 bg-white shadow-md text-sm w-full rounded-lg">Cancel</button>
                    <button id="continueButton"
                        class="px-4 py-2 bg-[#7c3a65] shadow-sm text-sm w-full text-white rounded-lg">Continue</button>
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

    <div class="flex-grow">
        <section class="container mx-auto max-w-[1200px] py-5 lg:flex lg:flex-row lg:py-10">
            <h2 class="mx-auto px-5 text-2xl font-bold md:hidden">Complete Address</h2>
            <!-- form  -->
            <section class="container mx-auto max-w-[1200px] py-5 lg:flex lg:flex-row lg:py-10">
                <h2 class="mx-auto px-5 text-2xl font-bold md:hidden">Pengiriman</h2>
                <!-- form  -->
                <section class="grid w-full max-w-[1200px] grid-cols-1 gap-3 px-5 pb-10">
                    <table class="hidden lg:table">
                        <thead class="h-16 bg-neutral-100">
                            <tr>
                                <th>ADDRESS</th>
                                <th class="bg-neutral-600 text-white">PENGIRIMAN</th>
                                <th>PEMBAYARAN</th>
                                <th>ORDER REVIEW</th>
                            </tr>
                        </thead>
                    </table>

                    <div class="py-5">
                        <form class="grid w-full grid-cols-1 gap-3 lg:grid-cols-2" action="">
                            @forelse ($dataOngkir as $ongkir)
                                <div class="flex w-full justify-between gap-2 opacity-70">
                                    <div class="flex w-full cursor-pointer flex-col border">
                                        <div class="flex bg-accent2 px-4 py-2 items-center">
                                            <input class="outline-yellow-400" name="shipping" type="radio"
                                                data-description="{{ $ongkir['description'] }}"
                                                value="{{ $ongkir['cost'][0]['value'] }}" />
                                            <p class="ml-3 font-bold text-white text-lg">{{ $ongkir['service'] }}</p>
                                        </div>
                                        <div class="px-4 py-3">
                                            <p class="deskripsi_ongkir">{{ $ongkir['description'] }}</p>
                                            <p class="pb-3 font-bold text-accent text-xl">
                                                Rp{{ number_format($ongkir['cost'][0]['value'], 0, ',', '.') }}</p>
                                            <p>Estimasi tiba: {{ $ongkir['cost'][0]['etd'] }} Hari</p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="flex flex-col ml-[40%] w-full justify-center items-center opacity-70 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150"
                                        viewBox="0 0 586.47858 659.29778" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <circle cx="332.47856" cy="254" r="254.00001" fill="#f2f2f2" />
                                        <path
                                            d="M498.46363,113.58835H33.17063c-.99774-.02133-1.78931-.84746-1.76797-1.84521,.02069-.96771,.80026-1.74727,1.76797-1.76796H498.46363c.99774,.02133,1.78931,.84746,1.76794,1.84521-.02069,.96771-.80023,1.74727-1.76794,1.76796Z"
                                            fill="#cacaca" />
                                        <rect x="193.77441" y="174.47256" width="163.61147" height="34.98639"
                                            rx="17.49318" ry="17.49318" fill="#fff" />
                                        <path
                                            d="M128.17493,244.44534H422.98542c9.66122,0,17.49316,7.83197,17.49316,17.49319h0c0,9.66122-7.83194,17.49319-17.49316,17.49319H128.17493c-9.66122,0-17.49318-7.83197-17.49318-17.49319h0c0-9.66122,7.83196-17.49319,17.49318-17.49319Z"
                                            fill="#fff" />
                                        <path
                                            d="M128.17493,314.41812H422.98542c9.66122,0,17.49316,7.83197,17.49316,17.49319h0c0,9.66122-7.83194,17.49319-17.49316,17.49319H128.17493c-9.66122,0-17.49318-7.83197-17.49318-17.49319h0c0-9.66122,7.83196-17.49319,17.49318-17.49319Z"
                                            fill="#fff" />
                                        <path
                                            d="M91.64085,657.75932l-.69385-.06793c-23.54068-2.42871-44.82135-15.08929-58.18845-34.61835-3.66138-5.44159-6.62299-11.32251-8.815-17.50409l-.21069-.58966,.62375-.05048c7.44699-.59924,15.09732-1.86292,18.49585-2.46417l-21.91473-7.42511-.1355-.65033c-1.29926-6.10406,1.24612-12.38458,6.4285-15.86176,5.19641-3.64447,12.08731-3.76111,17.40405-.29449,2.38599,1.52399,4.88162,3.03339,7.29489,4.49359,8.29321,5.01636,16.8688,10.20337,23.29828,17.30121,9.74951,10.97778,14.02298,25.76984,11.63,40.25562l4.7829,17.47595Z"
                                            fill="#f2f2f2" />
                                        <polygon
                                            points="171.30016 646.86102 182.10017 646.85999 187.23916 605.198 171.29716 605.19897 171.30016 646.86102"
                                            fill="#a0616a" />
                                        <path
                                            d="M170.9192,658.12816l33.21436-.00122v-.41998c-.00049-7.13965-5.78833-12.92737-12.92798-12.92773h-.00079l-6.06702-4.60278-11.3197,4.60345-2.89941,.00012,.00055,13.34814Z"
                                            fill="#2f2e41" />
                                        <polygon
                                            points="84.74116 616.94501 93.38016 623.42603 122.49316 593.185 109.74116 583.61902 84.74116 616.94501"
                                            fill="#a0616a" />
                                        <path
                                            d="M77.67448,625.72966l26.569,19.93188,.25208-.336c4.2843-5.71136,3.12799-13.81433-2.58279-18.09937l-.00064-.00049-2.09079-7.32275-11.81735-3.11102-2.31931-1.73993-8.01019,10.67767Z"
                                            fill="#2f2e41" />
                                        <path
                                            d="M120.64463,451.35271s.59625,16.26422,1.3483,29.30737c.12335,2.13916-4.88821,4.46301-4.75842,6.7901,.08609,1.54395,1.02808,3.04486,1.1156,4.65472,.09235,1.69897-1.20822,3.20282-1.1156,4.95984,.09052,1.71667,1.57422,3.6853,1.66373,5.44244,.96317,18.9093,4.45459,41.54633,.9584,47.87439-1.72299,3.11871-23.68533,46.32446-23.68533,46.32446,0,0,12.23666,18.35498,15.73285,12.23663,4.61771-8.08099,40.20615-45.88745,40.20615-53.10712,0-7.21088,8.23346-61.25323,8.23346-61.25323l5.74103,31.98169,2.63239,6.33655-.82715,3.71997,1.70117,5.02045,.09192,4.96838,1.65619,9.22614s-4.98199,71.88159-2.17633,73.88312c2.81439,2.01038,16.44086,5.62018,18.04901,2.01038,1.59955-3.6098,12.0108-75.01947,12.0108-75.01947,0,0,1.6781-32.72424,3.49622-63.14111,.1048-1.76556,1.34607-3.89825,1.4422-5.63763,.11365-2.01898-.67297-4.64111-.56818-6.599,.11365-2.24628,1.11005-3.82831,1.20618-5.97852,.74292-16.6156-3.42761-36.84912-4.7561-38.84192-4.01202-6.01343-7.62177-10.82074-7.62177-10.82074,0,0-54.03558-17.75403-68.47485,.28625l-3.30185,25.37585Z"
                                            fill="#2f2e41" />
                                        <path
                                            d="M174.53779,284.10378l-21.4209-4.28418-9.9964,13.56656h0c-18.65262,18.34058-18.93359,34.52753-15.60379,60.47382v36.41553l-2.41,24.41187s-8.53156,17.84521,.26788,22.00006,66.59857,3.80066,72.117,2.14209,.73517-3.69482-.71399-11.4245c-2.72211-14.51929-.90131-7.51562-.71399-12.13849,2.68585-66.31363-3.57013-93.5379-4.20544-100.69376l-10.89398-19.75858-6.42639-10.71042Z"
                                            fill="#3f3d56" />
                                        <path
                                            d="M287.43909,337.57097c-2.23248,4.23007-7.47144,5.84943-11.70148,3.61694-.45099-.23804-.88013-.51541-1.28229-.82895l-46.26044,29.37308,.13336-15.9924,44.93842-26.07846c3.20093-3.58887,8.70514-3.90332,12.29401-.70239,3.00305,2.67844,3.7796,7.0657,1.87842,10.61218Z"
                                            fill="#a0616a" />
                                        <path
                                            d="M157.62488,302.62425l-5.26666-.55807c-4.86633-.50473-9.64093,1.57941-12.57947,5.491-1.12549,1.48346-1.9339,3.18253-2.37491,4.99164l-.00317,.01447c-1.32108,5.44534,.75095,11.15201,5.25803,14.48117l18.19031,13.41101c12.76544,17.24899,36.75653,28.69272,64.89832,37.98978l43.74274-27.16666-15.47186-18.73843-30.00336,16.0798-44.59833-34.52374-.0257-.02075-16.97424-10.936-4.79169-.5152Z"
                                            fill="#3f3d56" />
                                        <circle cx="167.29993" cy="248.60526" r="24.9798" fill="#a0616a" />
                                        <path
                                            d="M167.8769,273.59047c-.20135,.00662-.4032,.01108-.6048,.01657-.0863,.22388-.17938,.44583-.2868,.66357l.8916-.68015Z"
                                            fill="#2f2e41" />
                                        <path
                                            d="M174.73243,249.29823c.03918,.24612,.09912,.48846,.17914,.72449-.03302-.24731-.09308-.49026-.17914-.72449Z"
                                            fill="#2f2e41" />
                                        <path
                                            d="M192.59852,224.6942c-1.0282,3.19272-1.94586-.85715-5.32825-.12869-4.06885,.87625-8.80377,.57532-12.13586-1.91879-4.96478-3.64273-11.39874-4.62335-17.22333-2.62509-5.70154,2.01706-15.25348,3.43933-16.73907,9.30179-.51642,2.03781-.7215,4.24933-1.97321,5.9382-1.09436,1.47662-2.82166,2.31854-4.26608,3.45499-4.87726,3.83743-1.14954,14.73981,1.15881,20.50046,2.30838,5.76065,7.60355,9.95721,13.42526,12.10678,5.63281,2.07977,11.7464,2.44662,17.75531,2.28317,1.04517-2.7106,.59363-5.84137-.26874-8.65134-.93359-3.04199-2.31592-5.97791-2.70593-9.13599s.46643-6.74527,3.11444-8.50986c2.4339-1.62192,6.39465-.63388,7.32062,1.98843-.54028-3.27841,2.7807-6.4509,6.20508-7.00882,3.67651-.599,7.35291,.72833,11.01886,1.38901s2.36475-14.77301,.64209-18.98425Z"
                                            fill="#2f2e41" />
                                        <circle cx="281.3585" cy="285.71051" r="51.12006"
                                            transform="translate(-26.58509 542.54478) rotate(-85.26884)"
                                            fill="#08a243" />
                                        <path
                                            d="M294.78675,264.41051l-13.42828,13.42828-13.42828-13.42828c-2.17371-2.17374-5.69806-2.17374-7.87177,0s-2.17371,5.69803,0,7.87177l13.42828,13.42828-13.42828,13.42828c-2.17169,2.17575-2.1684,5.70007,.00739,7.87177,2.17285,2.16879,5.69153,2.16879,7.86438-.00003l13.42828-13.42828,13.42828,13.42828c2.17578,2.17169,5.70007,2.1684,7.87177-.00735,2.16882-2.17288,2.16882-5.6915,0-7.86438l-13.42828-13.42828,13.42828-13.42828c2.17371-2.17374,2.17371-5.69803,0-7.87177s-5.69806-2.17374-7.87177,0h0Z"
                                            fill="#fff" />
                                        <path
                                            d="M261.21387,242.74385c1.5069,4.53946-.95154,9.44101-5.49097,10.94791-.48401,.16064-.9812,.27823-1.4859,.35141l-10.83051,53.71692-11.44788-11.16785,12.29266-50.48209c-.37366-4.7944,3.21008-8.98395,8.00452-9.3576,4.01166-.31265,7.71509,2.16425,8.95807,5.9913Z"
                                            fill="#a0616a" />
                                        <path
                                            d="M146.12519,312.22478l-4.04883,3.41412c-3.73322,3.16214-5.53476,8.05035-4.74649,12.87888,.29129,1.83917,.95773,3.59879,1.95786,5.16949l.00824,.0123c3.01477,4.72311,8.5672,7.17865,14.08978,6.23117l22.27075-3.84171c21.28461,2.72995,46.15155-6.65967,72.34302-20.53055l10.67969-50.37274-24.23297-1.80811-9.16821,32.78271-55.78815,8.28149-.03278,.00415-19.64294,4.67767-3.68896,3.1011Z"
                                            fill="#3f3d56" />
                                        <path
                                            d="M272.93684,658.99046l-271.75,.30731c-.65759-.00214-1.18896-.53693-1.18683-1.19452,.00211-.6546,.53223-1.18469,1.18683-1.18683l271.75-.30731c.65759,.00214,1.18896,.53693,1.18683,1.19452-.00208,.6546-.53223,1.18469-1.18683,1.18683Z"
                                            fill="#cacaca" />
                                        <g>
                                            <ellipse cx="56.77685" cy="82.05834" rx="8.45661" ry="8.64507"
                                                fill="#3f3d56" />
                                            <ellipse cx="85.9906" cy="82.05834" rx="8.45661" ry="8.64507"
                                                fill="#3f3d56" />
                                            <ellipse cx="115.20435" cy="82.05834" rx="8.45661" ry="8.64507"
                                                fill="#3f3d56" />
                                            <path
                                                d="M148.51577,88.89113c-.25977,0-.51904-.10059-.71484-.30078l-5.70605-5.83301c-.38037-.38867-.38037-1.00977,0-1.39844l5.70605-5.83252c.38721-.39453,1.021-.40088,1.41406-.01562,.39502,.38623,.40186,1.01953,.01562,1.41406l-5.02197,5.1333,5.02197,5.13379c.38623,.39453,.37939,1.02783-.01562,1.41406-.19434,.19043-.44678,.28516-.69922,.28516Z"
                                                fill="#3f3d56" />
                                            <path
                                                d="M158.10415,88.89113c-.25244,0-.50488-.09473-.69922-.28516-.39502-.38623-.40186-1.01904-.01562-1.41406l5.02148-5.13379-5.02148-5.1333c-.38623-.39453-.37939-1.02783,.01562-1.41406,.39404-.38672,1.02783-.37939,1.41406,.01562l5.70557,5.83252c.38037,.38867,.38037,1.00977,0,1.39844l-5.70557,5.83301c-.1958,.2002-.45508,.30078-.71484,.30078Z"
                                                fill="#3f3d56" />
                                            <path
                                                d="M456.61398,74.41416h-10.60999c-1.21002,0-2.19,.97998-2.19,2.19v10.62c0,1.21002,.97998,2.19,2.19,2.19h10.60999c1.21002,0,2.20001-.97998,2.20001-2.19v-10.62c0-1.21002-.98999-2.19-2.20001-2.19Z"
                                                fill="#3f3d56" />
                                            <path
                                                d="M430.61398,74.41416h-10.60999c-1.21002,0-2.19,.97998-2.19,2.19v10.62c0,1.21002,.97998,2.19,2.19,2.19h10.60999c1.21002,0,2.20001-.97998,2.20001-2.19v-10.62c0-1.21002-.98999-2.19-2.20001-2.19Z"
                                                fill="#3f3d56" />
                                            <path
                                                d="M481.11398,74.91416h-10.60999c-1.21002,0-2.19,.97998-2.19,2.19v10.62c0,1.21002,.97998,2.19,2.19,2.19h10.60999c1.21002,0,2.20001-.97998,2.20001-2.19v-10.62c0-1.21002-.98999-2.19-2.20001-2.19Z"
                                                fill="#3f3d56" />
                                            <path
                                                d="M321.19229,78.95414h-84.81c-1.48004,0-2.67004,1.20001-2.67004,2.67004s1.19,2.66998,2.67004,2.66998h84.81c1.46997,0,2.66998-1.20001,2.66998-2.66998s-1.20001-2.67004-2.66998-2.67004Z"
                                                fill="#3f3d56" />
                                        </g>
                                    </svg>
                                    <span class="font-bold">Layanan sedang tidak tersedia</span>
                                </div>
                            @endforelse
                        </form>
                    </div>

                    <div class="flex w-full items-center justify-between">
                        <a href="catalog.html" class="hidden text-sm text-accent lg:block">&larr; Back to the shop</a>

                        <div class="mx-auto flex justify-center gap-2 lg:mx-0">
                            <a href="/shop/checkout-alamat"
                                class="bg-primary px-4 py-2 text-accent border border-accent">Sebelumnya</a>
                        </div>
                    </div>
                </section>
                <!-- /form  -->

                <!-- Summary  -->

                <section class="mx-auto w-full px-4 md:max-w-[400px]">
                    <form id="form-pembayaran" action="{{ route('shop.checkout-store') }}" method="POST">
                        @csrf
                        <div class="">
                            <div class="border py-5 px-4 shadow-md">
                                <p class="font-bold">ORDER SUMMARY</p>

                                <div class="flex justify-between border-b py-5">
                                    <p>Subtotal</p>
                                    <p>Rp{{ number_format($total, 0, ',', '.') }}</p>
                                </div>

                                <div class="flex justify-between border-b py-5">
                                    <p>Shipping (Total {{ $total_berat }}gr)</p>
                                    <p id="shipping">Pending</p>
                                </div>

                                <div class="flex justify-between py-5">
                                    <p>Total Pesanan ({{ $carts->count() }} Produk)</p>
                                    <p class="font-extrabold text-accent text-[24px]" id="total-display">
                                        Rp{{ number_format($total, 0, ',', '.') }}</p>
                                </div>

                                {{-- TOTAL: SHIPPING + SUBTOTAL --}}
                                <input type="hidden" id="total" name="total" value="{{ $total }}" />
                                <input type="hidden" id="shippingCost" name="ongkir" value="0" />
                                {{-- Metode pengiriman --}}
                                <input type="hidden" id="metode_pengiriman" name="metode_pengiriman"
                                    value="" />

                                <button id="proses-pembayaran" type="button" class="w-full bg-accent px-5 py-2 text-white">
                                    PROSES PEMBAYARAN
                                </button>
                            </div>
                        </div>
                    </form>

                </section>

            </section>
            <!-- /Summary -->
    </div>

    @include('shop.components.footer')

    <script>
        const radios = document.querySelectorAll('input[type="radio"]');
        const shippingElement = document.getElementById('shipping');
        const totalDisplayElement = document.getElementById('total-display');
        const totalInputElement = document.getElementById('total');
        const shippingCostInputElement = document.getElementById('shippingCost');


        const metodePengiriman = document.getElementById('metode_pengiriman');


        // Modal confirmation
        const confirmPembayaran = document.getElementById('confirm-pembayaran');

        // Fungsi untuk membuka modal
        function bukaModal() {
            confirmPembayaran.classList.remove('hidden');
        }

        // Fungsi untuk menutup modal
        function tutupModal() {
            confirmPembayaran.classList.add('hidden');
        }

        // Mengubah fungsi yang dipanggil saat tombol "PROSES PEMBAYARAN" diklik
        document.getElementById('proses-pembayaran').addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah formulir dari pengiriman default
            bukaModal(); // Membuka modal konfirmasi
        });

        // Mengirim formulir saat tombol "Continue" di modal diklik
        document.getElementById('continueButton').addEventListener('click', function() {
            closeModal(); // Menutup modal
            document.getElementById('form-pembayaran').submit(); // Mengirim formulir
        });



        const subtotal = {{ $total }};


        function getQueryParam(param) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(param);
        }

        const kurir = getQueryParam('kurir').toUpperCase();



        radios.forEach((radio) => {
            radio.addEventListener('change', (e) => {
                const shippingCost = parseInt(e.target.value);
                const newTotal = subtotal + shippingCost;

                // Update data metode pengiriman dari description $ongkir['description']
                const shippingDescription = e.target.getAttribute('data-description')
                metodePengiriman.value = `${kurir}, ${shippingDescription}`;

                shippingElement.innerText = `Rp${new Intl.NumberFormat('id-ID').format(shippingCost)}`;
                totalDisplayElement.innerText = `Rp${new Intl.NumberFormat('id-ID').format(newTotal)}`;

                // Update hidden input values
                totalInputElement.value = newTotal;
                shippingCostInputElement.value = shippingCost;

                radios.forEach((item) => {
                    item.parentElement.parentElement.parentElement.classList.add('opacity-70');
                });
                e.target.parentElement.parentElement.parentElement.classList.remove('opacity-70');
            });
        });
    </script>

</body>

</html>
