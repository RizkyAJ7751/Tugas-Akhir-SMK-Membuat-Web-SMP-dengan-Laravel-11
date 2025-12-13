<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Daftar Guru - SMP Sahlaniyah</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="">

    @include('components.navbar-non-landing-page')

    <!-- Konten Utama -->
    <section id="blog-index" class="py-20">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">

            <!-- Judul Halaman -->
            <div class="mb-12 text-center">
                <h1 class="mb-4 text-3xl font-bold text-gray-900 md:text-4xl">
                    Daftar <span class="text-green-700"> Guru</span>
                </h1>
                <p class="max-w-2xl mx-auto text-lg text-gray-600">
                    Lihat tenaga pendidik yang mendampingi di
                    <span class="font-semibold text-green-700">SMP IT Bahrul Ulum Sahlaniyah</span>.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4" id="daftar-guru">
                @forelse($gurus as $guru)
                    <!-- Guru Card (1:1 Aspect Ratio with Hover Overlay) -->
                    <div class="relative overflow-hidden shadow-lg rounded-xl group aspect-square">
                        <!-- Image -->
                        <img src="{{ $guru->foto ? asset('storage/' . $guru->foto) : asset('images/default.png') }}"
                            alt="{{ $guru->nama }}"
                            class="absolute inset-0 object-cover w-full h-full transition duration-300 group-hover:scale-105">

                        <!-- Overlay (Information on Hover) -->
                        <div
                            class="absolute inset-0 flex flex-col items-center justify-center p-4 text-white transition-all duration-300 bg-black opacity-0 bg-opacity-70 group-hover:opacity-100">
                            <h3 class="mb-2 text-lg font-bold text-center">{{ $guru->nama }}</h3>
                            <p class="mb-1 text-sm font-semibold text-center">{{ $guru->bidang ?? '-' }}</p>
                            <p class="text-xs text-center">{{ $guru->jabatan ?? '-' }}</p>
                        </div>
                    </div>

                @empty
                    <!-- Placeholder (kalau tidak ada guru di DB) -->
                    <div class="p-6 text-center bg-white shadow-lg rounded-xl">
                        <div class="flex items-center justify-center w-24 h-24 mx-auto mb-4 bg-gray-200 rounded-full">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <h3 class="mb-2 text-lg font-bold text-gray-900">Data guru akan dimuat</h3>
                        <p class="mb-2 font-semibold text-secondary">dari dashboard admin</p>
                        <p class="text-sm text-gray-600">Bidang studi akan ditampilkan di sini</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $gurus->links() }}
            </div>
        </div>
    </section>

    @include('components.footer-non-landing-page')

</body>

</html>
