<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Dashboard') - SMP IT Bahrul Ulum Sahlaniyah</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{ asset('upload/20230419_121535.png') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="font-sans antialiased bg-gray-50" x-data="{ sidebarOpen: false }">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="fixed inset-y-0 left-0 z-50 w-64 transition-transform duration-300 ease-in-out transform bg-white shadow-lg lg:translate-x-0 lg:static lg:inset-0"
            :class="{ '-translate-x-full': !sidebarOpen, 'translate-x-0': sidebarOpen }">

            <!-- Logo -->
            <div class="flex items-center justify-center h-16 px-4 bg-gradient-to-r from-green-600 to-green-700">
                <img src="{{ asset('upload/20230419_121535.png') }}" alt="Logo" class="w-auto h-10">
                <span class="ml-2 text-lg font-semibold text-white">Admin Panel</span>
            </div>

            <!-- Navigation -->
            <nav class="px-4 mt-8">
                <div class="space-y-2">
                    <!-- Dashboard -->
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-green-50 hover:text-green-700 transition-colors {{ request()->routeIs('dashboard') ? 'bg-green-100 text-green-700 border-r-4 border-green-500' : '' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z"></path>
                        </svg>
                        Dashboard
                    </a>

                    <!-- Stats -->
                    <a href="{{ route('admin.stats.index') }}"
                        class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-green-50 hover:text-green-700 transition-colors {{ request()->routeIs('admin.stats.*') ? 'bg-green-100 text-green-700 border-r-4 border-green-500' : '' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                            </path>
                        </svg>
                        Statistik Sekolah
                    </a>

                    <!-- Kepala Sekolah -->
                    <a href="{{ route('admin.kepala-sekolah.index') }}"
                        class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-green-50 hover:text-green-700 transition-colors {{ request()->routeIs('admin.kepala-sekolah.*') ? 'bg-green-100 text-green-700 border-r-4 border-green-500' : '' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Kepala Sekolah
                    </a>

                    <!-- Guru -->
                    <a href="{{ route('admin.guru.index') }}"
                        class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-green-50 hover:text-green-700 transition-colors {{ request()->routeIs('admin.guru.*') ? 'bg-green-100 text-green-700 border-r-4 border-green-500' : '' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 3h16v10H4z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 13v8m-6 0h12" />
                        </svg>

                        Data Guru
                    </a>

                    <!-- Berita -->
                    <a href="{{ route('admin.berita.index') }}"
                        class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-green-50 hover:text-green-700 transition-colors {{ request()->routeIs('admin.berita.*') ? 'bg-green-100 text-green-700 border-r-4 border-green-500' : '' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                            </path>
                        </svg>
                        Berita & Artikel
                    </a>

                    <!-- Kontak Masuk -->
                    <a href="{{ route('admin.kontak-masuk.index') }}"
                        class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-green-50 hover:text-green-700 transition-colors {{ request()->routeIs('admin.kontak-masuk.*') ? 'bg-green-100 text-green-700 border-r-4 border-green-500' : '' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        Kontak Masuk
                    </a>

                    <!-- Program -->
                    <a href="{{ route('admin.programs.index') }}"
                        class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-green-50 hover:text-green-700 transition-colors {{ request()->routeIs('admin.programs.*') ? 'bg-green-100 text-green-700 border-r-4 border-green-500' : '' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h14a2 2 0 012 2v10H3V5z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2 19h20l-2 2H4l-2-2z" />
                        </svg>

                        Kelola Program
                    </a>




                    <!-- Fake Login Attempts -->
                    <a href="{{ route('admin.fake-logins.index') }}"
                        class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-green-50 hover:text-green-700 transition-colors {{ request()->routeIs('admin.fake-logins.*') ? 'bg-green-100 text-green-700 border-r-4 border-green-500' : '' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 11c0-1.105-.895-2-2-2H6c-1.105 0-2 .895-2 2v4c0 1.105.895 2 2 2h4c1.105 0 2-.895 2-2v-4zm6-7c0-1.105-.895-2-2-2h-2c-1.105 0-2 .895-2 2v2c0 1.105.895 2 2 2h2c1.105 0 2-.895 2-2V4zM18 14c0-1.105-.895-2-2-2h-2c-1.105 0-2 .895-2 2v4c0 1.105.895 2 2 2h2c1.105 0 2-.895 2-2v-4z" />
                        </svg>
                        Percobaan Login
                    </a>
                </div>


                <!-- Divider -->
                <div class="my-6 border-t border-gray-200"></div>

                <!-- Website Link -->
                <a href="{{ url('/') }}" target="_blank"
                    class="flex items-center px-4 py-3 text-gray-700 transition-colors rounded-lg hover:bg-blue-50 hover:text-blue-700">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                    </svg>
                    Lihat Website
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex flex-col flex-1 lg:ml-0">
            <!-- Top Navigation -->
            <header class="bg-white border-b border-gray-200 shadow-sm">
                <div class="flex items-center justify-between px-6 py-4">
                    <!-- Mobile menu button -->
                    <button @click="sidebarOpen = !sidebarOpen"
                        class="p-2 text-gray-600 rounded-md lg:hidden hover:text-gray-900 hover:bg-gray-100">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>

                    <!-- Page Title -->
                    <h1 class="text-2xl font-semibold text-gray-900">@yield('page-title', 'Dashboard')</h1>

                    <!-- User Menu -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            <div class="flex items-center space-x-3">
                                <div class="flex items-center justify-center w-8 h-8 bg-green-500 rounded-full">
                                    <span
                                        class="text-sm font-medium text-white">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                </div>
                                <span
                                    class="hidden font-medium text-gray-700 md:block">{{ Auth::user()->name }}</span>
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="open" @click.away="open = false" x-cloak
                            class="absolute right-0 z-50 w-48 py-1 mt-2 bg-white rounded-md shadow-lg">
                            <a href="{{ route('profile.edit') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-6">
                @if (session('success'))
                    <div class="relative px-4 py-3 mb-6 text-green-700 bg-green-100 border border-green-400 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="relative px-4 py-3 mb-6 text-red-700 bg-red-100 border border-red-400 rounded">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <!-- Mobile Sidebar Overlay -->
    <div x-show="sidebarOpen" @click="sidebarOpen = false" x-cloak
        class="fixed inset-0 z-40 bg-black bg-opacity-50 lg:hidden"></div>
</body>

</html>
