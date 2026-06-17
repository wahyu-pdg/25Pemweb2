<x-blog-layout>

    @if(count($posts))

    {{-- Hero Section --}}
    <section class="bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 py-20">
        <div class="container mx-auto px-6 text-center text-white">

            <h1 class="text-5xl md:text-6xl font-bold mb-4">
                StudyMate Blog
            </h1>

            <p class="text-lg md:text-xl opacity-90 max-w-2xl mx-auto">
                Temukan artikel pendidikan, tips belajar, teknologi, dan informasi terbaru untuk mendukung perjalanan akademik Anda.
            </p>

        </div>
    </section>

    {{-- Featured Post --}}
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-6">

            <div class="mb-10">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">
                    Artikel Pilihan
                </h2>

                <div class="w-20 h-1 bg-blue-600 rounded"></div>
            </div>

            @foreach ($posts->take(1) as $post)
                <div class="overflow-hidden rounded-3xl shadow-xl hover:shadow-2xl transition duration-300 bg-white">
                    <x-blog-feature-card :post="$post" />
                </div>
            @endforeach

        </div>
    </section>

    {{-- Latest Posts --}}
    <section class="py-16">
        <div class="container mx-auto px-6">

            <div class="flex items-center justify-between mb-10">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800">
                        Artikel Terbaru
                    </h2>
                    <p class="text-gray-500 mt-2">
                        Baca artikel terbaru yang telah dipublikasikan.
                    </p>
                </div>
            </div>

            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">

                @foreach ($posts->skip(1) as $post)

                    <div class="bg-white rounded-2xl shadow-md hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 overflow-hidden">
                        <x-blog-card :post="$post" />
                    </div>

                @endforeach

            </div>

            {{-- Button --}}
            <div class="flex justify-center mt-16">

                <a href="{{ route('filamentblog.post.all') }}"
                   class="inline-flex items-center gap-3 bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-full font-semibold shadow-lg transition-all duration-300">

                    <span>
                        Lihat Semua Artikel
                    </span>

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>

                </a>

            </div>

        </div>
    </section>

    {{-- Newsletter Section --}}
    <section class="bg-gray-900 py-20">
        <div class="container mx-auto px-6 text-center">

            <h2 class="text-4xl font-bold text-white mb-4">
                Tetap Update Bersama StudyMate
            </h2>

            <p class="text-gray-300 max-w-2xl mx-auto mb-8">
                Dapatkan artikel terbaru, tips belajar, dan informasi pendidikan langsung dari blog kami.
            </p>

            <a href="{{ route('filamentblog.post.all') }}"
               class="inline-block bg-white text-gray-900 px-8 py-4 rounded-full font-semibold hover:bg-gray-100 transition">
                Jelajahi Artikel
            </a>

        </div>
    </section>

    @else

    <section class="min-h-[60vh] flex items-center justify-center">
        <div class="text-center">

            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-24 h-24 mx-auto text-gray-300 mb-6"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="1.5"
                      d="M19 21H9a2 2 0 01-2-2V7a2 2 0 012-2h10m0 16a2 2 0 002-2V7a2 2 0 00-2-2m0 16V7m-5 4h2m-2 4h2m-5-8h2m-2 4h2"/>
            </svg>

            <h2 class="text-3xl font-bold text-gray-700 mb-3">
                Belum Ada Artikel
            </h2>

            <p class="text-gray-500">
                Artikel akan muncul di sini setelah dipublikasikan.
            </p>

        </div>
    </section>

    @endif

</x-blog-layout>