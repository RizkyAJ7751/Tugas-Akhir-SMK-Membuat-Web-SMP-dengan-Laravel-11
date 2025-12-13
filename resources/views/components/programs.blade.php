<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Program Unggulan - SMP Sahlaniyah</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    @include('components.navbar-non-landing-page')

    @php
        // Ambil program utama (first) dari collection $programs yang dikirim controller.
        $mainProgram = isset($programs) && $programs->isNotEmpty() ? $programs->first() : null;
        // Pastikan brosur jadi array
        $mainBrosurs = $mainProgram
            ? (is_array($mainProgram->brosur)
                ? $mainProgram->brosur
                : json_decode($mainProgram->brosur ?? '[]', true))
            : [];
    @endphp

    <!-- Header umum -->
    @if ($mainProgram)
        <div class="px-4 py-8 mt-6 text-center bg-gray-50">
            <h2 class="mb-3 text-3xl font-bold text-gray-900 md:text-4xl">
                {{ $mainProgram->title }}
            </h2>
            <p class="max-w-3xl mx-auto text-base leading-relaxed text-gray-600 break-words md:text-lg">
                {{ $mainProgram->description }}
            </p>
        </div>
    @endif

    <!-- Brosur (full width images dengan space dari tepi) -->
    @if ($mainProgram && !empty($mainBrosurs))
        <div class="max-w-6xl px-4 py-8 mx-auto space-y-8">
            @foreach ($mainBrosurs as $brosur)
                <div class="overflow-hidden rounded-lg shadow-md">
                    <img src="{{ asset('storage/' . $brosur) }}" alt="{{ $mainProgram->title }}"
                        class="object-cover w-full h-full transition-transform duration-300 ease-in-out transform hover:scale-102.5 sm:w-max-[95vw]">
                </div>
            @endforeach
        </div>
    @endif


    {{-- Footer --}}
    @include('components.footer-non-landing-page')
</body>

</html>
