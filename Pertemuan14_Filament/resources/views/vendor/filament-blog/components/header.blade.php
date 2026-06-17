@props(['title' =>'StudyMate', 'logo' => null])

<header
    @click.outside="showSearchModal = false"
    x-data="{ showSearchModal: false }"
    class="sticky top-0 z-50 backdrop-blur-md bg-white/80 border-b border-gray-100 shadow-sm"
>

    <div class="container mx-auto px-6">

        <div class="flex items-center justify-between h-20">

            {{-- Logo --}}
            <div class="flex items-center gap-4">

                <a href="{{ config('filamentblog.route.home.url') ?? config('app.url') }}"
                    class="flex items-center gap-3">

                    @if($logo)
                        <img
                            src="{{ $logo }}"
                            alt="{{ $title }}"
                            class="h-12 w-auto object-contain"
                        >
                    @else
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 flex items-center justify-center text-white font-bold text-xl">
                            S
                        </div>

                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">
                                Pomal Blog
                            </h1>
                            <p class="text-xs text-gray-500">
                                Blog Sederhana dirawan seperti Malika   
                            </p>
                        </div>
                    @endif

                </a>

            </div>

            {{-- Menu Desktop --}}
            <nav class="hidden lg:flex items-center gap-10">

                <a href="{{ route('filamentblog.post.index') }}"
                    class="font-semibold text-gray-700 hover:text-blue-600 transition">
                    Home
                </a>

                <a href="{{ route('filamentblog.post.all') }}"
                    class="font-semibold text-gray-700 hover:text-blue-600 transition">
                    Articles
                </a>

                <div class="relative group">

                    <button
                        class="flex items-center gap-2 font-semibold text-gray-700 hover:text-blue-600 transition">

                        Categories

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-4 h-4"
                            viewBox="0 0 24 24">
                            <path fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="m6 9 6 6 6-6" />
                        </svg>

                    </button>

                    <div
                        class="absolute left-0 mt-3 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition duration-300">

                        <div
                            class="bg-white rounded-2xl shadow-xl border p-4 min-w-[250px]">

                            <x-blog-header-category />

                        </div>

                    </div>

                </div>

            </nav>

            {{-- Right Side --}}
            <div class="flex items-center gap-4">

                {{-- Search --}}
                <form
                    action="{{ route('filamentblog.post.search') }}"
                    method="GET"
                    class="hidden md:block">

                    <div class="relative">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400"
                            viewBox="0 0 24 24">

                            <g fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="11" cy="11" r="8"/>
                                <path d="m21 21-4.3-4.3"/>
                            </g>

                        </svg>

                        <input
                            type="text"
                            name="query"
                            value="{{ request()->get('query') }}"
                            placeholder="Cari artikel..."
                            class="w-72 pl-12 pr-5 py-3 rounded-full border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-500 outline-none transition"
                        >

                    </div>

                </form>

                {{-- Button --}}
                <a href="/admin"
                    class="hidden md:flex items-center gap-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3 rounded-full font-semibold shadow-lg hover:scale-105 transition">

                    Admin

                </a>

            </div>

        </div>

    </div>

</header>