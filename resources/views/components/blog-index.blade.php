<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Berita - {{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Script -->
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-r from-blue-100 to-pink-100">

    @include('components.navbar-non-landing-page')

    <!-- Konten Utama -->
    <section id="blog-index" class="py-20">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">

            <!-- Judul Halaman -->
            <div class="mb-12 text-center">
                <h1 class="mb-4 text-3xl font-bold text-gray-900 md:text-4xl">
                    Daftar <span class="text-green-700">Berita Terbaru</span>
                </h1>
                <p class="max-w-2xl mx-auto text-lg text-gray-600">
                    Ikuti perkembangan terbaru dan kegiatan-kegiatan menarik di
                    <span class="font-semibold text-green-700">SMP IT Bahrul Ulum Sahlaniyah</span>.
                </p>
            </div>

            <!-- Grid daftar berita -->
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                @forelse($beritas as $berita)
                    <article
                        class="flex flex-col overflow-hidden transition duration-300 bg-white shadow-lg rounded-xl hover:shadow-xl">
                        <div class="h-48 bg-gray-200">
                            @if ($berita->gambar_url)
                                <img src="{{ $berita->gambar_url }}" alt="{{ $berita->judul }}"
                                    class="object-cover w-full h-full">
                            @else
                                <div class="flex items-center justify-center h-full bg-secondary">
                                    <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7" />
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="flex flex-col flex-1 p-6">
                            <div class="flex items-center mb-3 text-sm text-gray-500">
                                <span>{{ $berita->tanggal_publikasi->format('d M Y') }}</span>
                                <span class="mx-2">•</span>
                                <span>Artikel</span>
                            </div>
                            <h3
                                class="mb-3 text-xl font-bold text-gray-900 transition duration-300 hover:text-secondary">
                                <a href="{{ route('berita.show', $berita->slug) }}">{{ $berita->judul }}</a>
                            </h3>
                            <p class="flex-1 mb-4 text-gray-600">
                                {{ $berita->konten_singkat }}
                            </p>
                            <a href="{{ route('berita.show', $berita->slug) }}"
                                class="mt-auto font-semibold transition duration-300 text-secondary hover:text-green-700">
                                Baca Selengkapnya →
                            </a>
                        </div>
                    </article>
                @empty
                    <!-- Placeholder (kalau belum ada berita di DB) -->
                    <div class="col-span-3 italic text-center text-gray-500">
                        Belum ada berita yang tersedia.
                    </div>
                @endforelse
            </div>



            <!-- Pagination -->
            <div class="mt-12">
                {{ $beritas->links() }}
            </div>
        </div>
    </section>

    @include('components.footer-non-landing-page')

</body>

</html>
