<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tentang Kami - SMP Sahlaniyah</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Script -->
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="">
    {{-- Navbar --}}
    @include('components.navbar-non-landing-page')

    <section id="contact" class="py-20 bg-white">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold text-gray-900 md:text-4xl">
                    Hubungi <span class="text-secondary">Kami</span>
                </h2>
                <p class="max-w-2xl mx-auto text-lg text-gray-600">
                    Kami siap membantu Anda. Jangan ragu untuk menghubungi kami untuk informasi lebih lanjut tentang
                    sekolah
                    kami.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-12 lg:grid-cols-2">
                <!-- Contact Form -->
                <div class="p-8 bg-gray-50 rounded-2xl">
                    <h3 class="mb-6 text-2xl font-bold text-gray-900">Kirim Pesan</h3>

                    {{-- Success Message --}}
                    @if (session('success'))
                        <div class="p-4 mb-4 text-green-800 bg-green-100 border border-green-300 rounded-lg">
                            ✅ {{ session('success') }}
                        </div>
                    @endif

                    {{-- Error Validation --}}
                    @if ($errors->any())
                        <div class="p-4 mb-4 text-red-800 bg-red-100 border border-red-300 rounded-lg">
                            <strong class="block mb-2">⚠️ Ada kesalahan input:</strong>
                            <ul class="text-sm list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="space-y-6" method="POST" action="{{ route('contact.store') }}" id="contactForm">
                        @csrf
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            <div>
                                <label for="nama" class="block mb-2 text-sm font-medium text-gray-700">Nama
                                    Lengkap</label>
                                <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required
                                    class="w-full px-4 py-3 border @error('nama') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-secondary focus:border-transparent"
                                    placeholder="Masukkan nama lengkap">
                                @error('nama')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                    class="w-full px-4 py-3 border @error('email') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-secondary focus:border-transparent"
                                    placeholder="Masukkan email">
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="telepon" class="block mb-2 text-sm font-medium text-gray-700">Nomor
                                Telepon</label>
                            <input type="tel" id="telepon" name="telepon" value="{{ old('telepon') }}"
                                class="w-full px-4 py-3 border @error('telepon') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-secondary focus:border-transparent"
                                placeholder="Masukkan nomor telepon">
                            @error('telepon')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="subjek" class="block mb-2 text-sm font-medium text-gray-700">Subjek</label>
                            <select id="subjek" name="subjek" required
                                class="w-full px-4 py-3 border @error('subjek') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-secondary focus:border-transparent">
                                <option value="">Pilih subjek</option>
                                <option value="pendaftaran" {{ old('subjek') == 'pendaftaran' ? 'selected' : '' }}>
                                    Informasi
                                    Pendaftaran</option>
                                <option value="program" {{ old('subjek') == 'program' ? 'selected' : '' }}>Program
                                    Sekolah
                                </option>
                                <option value="akademik" {{ old('subjek') == 'akademik' ? 'selected' : '' }}>Akademik
                                </option>
                                <option value="lainnya" {{ old('subjek') == 'lainnya' ? 'selected' : '' }}>Lainnya
                                </option>
                            </select>
                            @error('subjek')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="pesan" class="block mb-2 text-sm font-medium text-gray-700">Pesan</label>
                            <textarea id="pesan" name="pesan" rows="5" required
                                class="w-full px-4 py-3 border @error('pesan') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-secondary focus:border-transparent"
                                placeholder="Tulis pesan Anda di sini...">{{ old('pesan') }}</textarea>
                            @error('pesan')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit"
                            class="w-full px-6 py-3 font-semibold text-white transition duration-300 rounded-lg bg-secondary hover:bg-green-700">
                            Kirim Pesan
                        </button>
                    </form>
                </div>




                <!-- Contact Information -->
                <div class="space-y-8">
                    <div>
                        <h3 class="mb-6 text-2xl font-bold text-gray-900">Informasi Kontak</h3>
                        <div class="space-y-6">
                            <!-- Address -->
                            <div class="flex items-start">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-12 h-12 rounded-full bg-secondary">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h4 class="mb-1 text-lg font-semibold text-gray-900">Alamat</h4>
                                    <p class="text-gray-600">
                                        Jl. Pelayaran No. 08,<br>
                                        RT 03 RW 01, Ds. Tempel, Kec. Krian, Kab. Sidoarjo.
                                    </p>
                                    <a href="https://maps.app.goo.gl/AexGyCHuRQbZkcUt7" target="_blank"
                                        class="inline-flex items-center mt-2 text-sm font-medium text-secondary hover:text-green-700">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                            </path>
                                        </svg>
                                        Lihat di Google Maps
                                    </a>
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="flex items-start">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-12 h-12 rounded-full bg-secondary">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h4 class="mb-1 text-lg font-semibold text-gray-900">Telepon</h4>
                                    <a href="tel:+6289687818832" class="text-gray-600 hover:text-secondary">(+62)
                                        8968-7818-832</a>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="flex items-start">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-12 h-12 rounded-full bg-secondary">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h4 class="mb-1 text-lg font-semibold text-gray-900">Email</h4>
                                    <a href="mailto:smpsahlaniyahkrian@gmail.com"
                                        class="text-gray-600 hover:text-secondary">smpsahlaniyahkrian@gmail.com</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Google Maps Embed -->
                    <div class="h-64 overflow-hidden bg-gray-200 rounded-2xl">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1470.8188861259166!2d112.58507813377058!3d-7.382371273286169!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7809522c9d0bbb%3A0x238f83350d9ebae9!2sSMP%20IT%20Bahrul%20Ulum%20Sahlaniyah!5e1!3m2!1sid!2sid!4v1756564585158!5m2!1sid!2sid"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- footer --}}
    @include('components.footer-non-landing-page')
</body>

</html>
