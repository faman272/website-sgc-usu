<!-- Nav bar -->
<!-- hidden on small devices -->

<nav class="relative bg-accent">
    <div class="mx-auto hidden h-12 w-full max-w-[1200px] items-center md:flex">

        <div class="mx-7 flex gap-8">
            <a class="font-light text-white duration-100 hover:text-yellow-400 hover:underline" href="/shop">Home</a>
            <a class="font-light text-white duration-100 hover:text-yellow-400 hover:underline"
                href="/blogs">Blogs</a>
            <a class="font-light text-white duration-100 hover:text-yellow-400 hover:underline"
                href="contact-us.html">Contact Us</a>
        </div>

        <div class="ml-auto flex gap-4 px-5">
            @if (Route::has('login'))
                @auth
                    <button onclick="openModal()"
                        class="font-light text-white duration-100 hover:text-yellow-400 hover:underline">Log
                        Out</button>
                @else
                    <a href="{{ route('login') }}"
                        class="font-light text-white duration-100 hover:text-yellow-400 hover:underline">Login</a>

                    <span class="text-white">&#124;</span>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="font-light text-white duration-100 hover:text-yellow-400 hover:underline">Sign
                            Up</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
</nav>
<!-- /Nav bar -->

<!-- Modal Confirmation Alert -->
<div id="confirm-logout" class="fixed hidden inset-0 z-50 bg-gray-950/50 dark:bg-gray-950/75">
    <div class="flex items-center justify-center h-full">
        <div class="bg-white p-5 anim-modal rounded-lg w-96">
            <!-- Close button -->
            <span class="flex justify-end">
                <button onclick="closeModal()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </span>
            <div class="mb-5 flex items-center justify-center">
                <div class="rounded-full p-3 bg-accent/20">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-8 h-8 text-accent">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                    </svg>
                </div>
            </div>
            <p class="font-semibold text-gray-950 text-base leading-6 text-center">Logout</p>
            <p class="mt-2 text-center text-sm text-gray-500">Apakah anda yakin ingin keluar?</p>
            <div class="mt-6 w-full flex gap-3">
                <button onclick="closeModal()" class="px-4 py-2 bg-white shadow-md text-sm w-full rounded-lg">Cancel</button>
                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-accent shadow-sm text-sm w-full text-white rounded-lg">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Modal Confirmation Alert -->

<script>
    const confirmLogout = document.getElementById('confirm-logout');

    const openModal = () => {
        confirmLogout.classList.remove('hidden');
        confirmLogout.classList.add('block');
    }

    const closeModal = () => {
        confirmLogout.classList.remove('block');
        confirmLogout.classList.add('hidden');
    }
</script>
