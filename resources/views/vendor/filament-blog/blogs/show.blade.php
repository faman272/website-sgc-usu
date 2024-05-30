<x-blog-layout>
    <section class="pb-16">
        <div class="container mx-auto">
            <div class="mb-10 flex gap-x-2 text-sm font-semibold">
                <a href="{{ route('filamentblog.post.index') }}" class="opacity-60">Home</a>
                <span class="opacity-30">/</span>
                <a href="{{ route('filamentblog.post.all') }}" class="opacity-60">Blog</a>
                <span class="opacity-30">/</span>
                <a title="{{ $post->slug }}" href="{{ route('filamentblog.post.show', ['post' => $post->slug]) }}"
                    class="hover:text-primary-600 max-w-2xl truncate font-medium transition-all duration-300">
                    {{ $post->title }}
                </a>
            </div>
            <div class="mx-auto mb-20 space-y-10">
                <div class="grid gap-x-20 sm:grid-cols-[minmax(min-content,10%)_1fr_minmax(min-content,10%)]">
                    <div class="py-5">
                        {{-- <div class="sticky top-24 flex flex-col items-center gap-y-5 divide-y-2">
                            <button x-data=""
                                x-on:click="document.getElementById('comments').scrollIntoView({ behavior: 'smooth'})"
                                class="group/btn flex flex-col items-center justify-center gap-y-2">
                                <div
                                    class="flex items-center justify-center rounded-full bg-slate-100 px-4 py-4 group-hover/btn:bg-slate-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M13 11H7a1 1 0 0 0 0 2h6a1 1 0 0 0 0-2m4-4H7a1 1 0 0 0 0 2h10a1 1 0 0 0 0-2m2-5H5a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h11.59l3.7 3.71A1 1 0 0 0 21 22a.84.84 0 0 0 .38-.08A1 1 0 0 0 22 21V5a3 3 0 0 0-3-3m1 16.59l-2.29-2.3A1 1 0 0 0 17 16H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1Z" />
                                    </svg>
                                </div>
                                <span class="text-xs font-semibold">COMMENTS</span>
                            </button>
                            <div class="pt-5">
                                {!! $shareButton?->html_code !!}
                            </div>
                        </div> --}}

                        {{-- Button SHARE --}}
                        <div class="sticky top-24 flex flex-col items-center gap-y-5 divide-y-2">
                            <div x-data="{ showOptions: false }" class="relative">
                                <button @click="showOptions = !showOptions"
                                    class="group/btn flex flex-col items-center justify-center gap-y-2">
                                    <div
                                        class="flex items-center justify-center rounded-full bg-slate-100 px-4 py-4 group-hover/btn:bg-slate-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="w-5 h-5"
                                            viewBox="0 0 30 30">
                                            <path
                                                d="M 23 3 C 20.791 3 19 4.791 19 7 C 19 7.2869826 19.034351 7.5660754 19.091797 7.8359375 L 10 12.380859 C 9.2667379 11.541629 8.2018825 11 7 11 C 4.791 11 3 12.791 3 15 C 3 17.209 4.791 19 7 19 C 8.2018825 19 9.2667379 18.458371 10 17.619141 L 19.091797 22.164062 C 19.034351 22.433925 19 22.713017 19 23 C 19 25.209 20.791 27 23 27 C 25.209 27 27 25.209 27 23 C 27 20.791 25.209 19 23 19 C 21.798117 19 20.733262 19.541629 20 20.380859 L 10.908203 15.835938 C 10.965649 15.566075 11 15.286983 11 15 C 11 14.713017 10.965649 14.433925 10.908203 14.164062 L 20 9.6191406 C 20.733262 10.458371 21.798117 11 23 11 C 25.209 11 27 9.209 27 7 C 27 4.791 25.209 3 23 3 z">
                                            </path>
                                        </svg>
                                    </div>
                                    <span class="text-xs font-semibold">SHARE</span>
                                </button>
                                <div x-show="showOptions" @click.away="showOptions = false"
                                    class="absolute z-10 right-0 mt-2 w-40 bg-white border border-gray-300 rounded shadow-md">
                                    <ul class="py-1">
                                        <li>
                                            <a onclick="copyURL()"
                                                class="cursor-pointer flex justify-center items-center gap-4 font-bold block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">

                                                <span>Salin Link</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m18.375 12.739-7.693 7.693a4.5 4.5 0 0 1-6.364-6.364l10.94-10.94A3 3 0 1 1 19.5 7.372L8.552 18.32m.009-.01-.01.01m5.699-9.941-7.81 7.81a1.5 1.5 0 0 0 2.112 2.13" />
                                                </svg>


                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="pt-5">
                                {!! $shareButton?->html_code !!}
                            </div>
                        </div>

                        {{-- JS For SHARE START --}}
                        <script>
                            function copyURL() {
                                var url = window.location.href;
                                navigator.clipboard.writeText(url).then(function() {
                                    alert("URL berhasil disalin: " + url);
                                }, function() {
                                    alert("Gagal menyalin URL.");
                                });
                            }
                        </script>
                        {{-- JS For SHARE END --}}

                    </div>
                    <div class="space-y-10">
                        <div>
                            <div class="flex flex-col justify-end">
                                <div class="mb-6 h-full w-full overflow-hidden rounded bg-slate-200">
                                    <img class="flex h-full min-h-[400px] items-center justify-center object-cover object-top text-sm text-xl font-semibold text-slate-400"
                                        src="{{ $post->featurePhoto }}" alt="{{ $post->photo_alt_text }}">
                                </div>
                                <div class="mb-6">
                                    <h1 class="mb-6 text-4xl font-semibold">
                                        {{ $post->title }}
                                    </h1>
                                    <p>{{ $post->sub_title }}</p>
                                    <div class="mt-2">
                                        @foreach ($post->categories as $category)
                                            <a
                                                href="{{ route('filamentblog.category.post', ['category' => $category->slug]) }}">
                                                <span
                                                    class="bg-primary-200 text-primary-800 mr-2 inline-flex rounded-full px-2 py-1 text-xs font-semibold">{{ $category->name }}
                                                </span>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                                {{-- <div class="mb-5 flex items-center justify-between gap-x-3 py-5">
                                    <div>
                                        <div class="flex items-center gap-4">
                                            <img class="h-14 w-14 overflow-hidden rounded-full border-4 border-white bg-zinc-300 object-cover text-[0] ring-1 ring-slate-300"
                                                src="{{ $post->user->avatar }}" alt="{{ $post->user->name() }}">
                                            <div>
                                                <span title="{{ $post->user->name() }}"
                                                    class="block max-w-[150px] overflow-hidden text-ellipsis whitespace-nowrap font-semibold">{{ $post->user->name() }}</span>
                                                <span
                                                    class="block whitespace-nowrap text-sm font-medium font-semibold text-zinc-600">
                                                    {{ $post->formattedPublishedDate() }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <div>
                                    <article class="m-auto leading-6">

                                        {!! tiptap_converter()->asHTML($post->body, toc: true, maxDepth: 3) !!}
                                    </article>

                                    @if ($post->tags->count())
                                        <div class="pt-10">
                                            <span class="mb-3 block font-semibold">Tags</span>
                                            <div class="space-x-2 space-y-1">
                                                @foreach ($post->tags as $tag)
                                                    <a href="{{ route('filamentblog.tag.post', ['tag' => $tag->slug]) }}"
                                                        class="rounded-full border border-slate-300 px-3 py-1 text-sm font-medium font-medium text-black text-slate-600 hover:bg-slate-100">
                                                        {{ $tag->name }}
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{-- @if ($post->comments->count())
                        <div class="border-t-2 py-10">
                            <div class="mb-4">
                                <h3 class="mb-2 text-2xl font-semibold">Comments</h3>
                            </div>
                            <div class="flex flex-col gap-y-6 divide-y">
                                @foreach ($post->comments as $comment)
                                <article class="pt-4 text-base">
                                    <div class="mb-4 flex items-center gap-4">
                                        <img class="h-14 w-14 overflow-hidden rounded-full border-4 border-white bg-zinc-300 object-cover text-[0] ring-1 ring-slate-300" src="{{ asset($comment->user->avatar) }}" alt="avatar">
                                        <div>

                                            <span class="block max-w-[150px] overflow-hidden text-ellipsis whitespace-nowrap font-semibold">
                                                {{ $comment->user->{config('filamentblog.user.columns.name')} }}
                                            </span>
                                            <span class="block whitespace-nowrap text-sm font-medium text-zinc-600">
                                                {{ $comment->created_at->diffForHumans() }}
                                            </span>
                                        </div>
                                    </div>
                                    <p class="text-gray-500">
                                        {{ $comment->comment }}
                                    </p>
                                </article>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        <x-blog-comment :post="$post" /> --}}


                    </div>
                    <div>
                        {{-- Ads Section            --}}
                        {{-- <div --}}
                        {{-- class="sticky top-24 flex h-[600px] w-[160px] items-center justify-center overflow-hidden rounded bg-slate-200 font-medium text-slate-500/20"> --}}
                        {{-- <span>ADS</span> --}}
                        {{-- </div> --}}
                    </div>
                </div>
            </div>

            <div>
                <div>
                    <div class="relative mb-6 flex items-center gap-x-8">
                        <h2 class="whitespace-nowrap text-xl font-semibold">
                            <span class="text-primary font-bold">#</span> Related Posts
                        </h2>
                        <div class="flex w-full items-center">
                            <span class="h-0.5 w-full rounded-full bg-slate-200"></span>
                        </div>
                    </div>
                    <div class="grid md:grid-cols-3 sm:grid-cols-1 gap-x-12 gap-y-10">
                        @forelse($post->relatedPosts() as $post)
                            <x-blog-card :post="$post" />
                        @empty
                            <div class="col-span-3">
                                <p class="text-center text-xl font-semibold text-gray-300">No related posts found.</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="flex justify-center pt-20">
                        <a href="{{ route('filamentblog.post.all') }}"
                            class="flex items-center justify-center md:gap-x-5 rounded-full bg-slate-100 px-20 py-4 text-sm font-semibold transition-all duration-300 hover:bg-slate-200">
                            <span>Show all blogs</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6m0 0H9m9 0v9" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {!! $shareButton?->script_code !!}
</x-blog-layout>
