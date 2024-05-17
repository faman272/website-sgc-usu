<!-- Nav bar -->
<!-- hidden on small devices -->
<nav class="relative bg-accent">
    <div class="mx-auto hidden h-12 w-full max-w-[1200px] items-center md:flex">

        <div class="mx-7 flex gap-8">
            <a class="font-light text-white duration-100 hover:text-yellow-400 hover:underline" href="/shop">Home</a>
            <a class="font-light text-white duration-100 hover:text-yellow-400 hover:underline"
                href="catalog.html">Blogs</a>
            <a class="font-light text-white duration-100 hover:text-yellow-400 hover:underline" href="about-us.html">About
                Us</a>
            <a class="font-light text-white duration-100 hover:text-yellow-400 hover:underline"
                href="contact-us.html">Contact Us</a>
        </div>

        <div class="ml-auto flex gap-4 px-5">

            @if (Route::has('login'))
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="font-light text-white duration-100 hover:text-yellow-400 hover:underline">Log
                            Out</button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                        class="font-light text-white duration-100 hover:text-yellow-400 hover:underline">Login</a>

                    <span class="text-white">&#124;</span>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="font-light text-white duration-100 hover:text-yellow-400 hover:underline"
                            href="sign-up.html">Sign
                            Up</a>
                    @endif
                @endauth
            @endif


        </div>
    </div>
</nav>
<!-- /Nav bar -->
