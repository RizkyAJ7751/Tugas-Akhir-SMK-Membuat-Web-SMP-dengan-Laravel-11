<script src="https://cdn.tailwindcss.com"></script>
@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard')

@section('content')
    @php
        $stats = \App\Models\Stats::getStats();
    @endphp
    <div class="space-y-6">
        <!-- Welcome Card -->
        <div class="p-6 text-white shadow-lg bg-gradient-to-r from-green-600 to-green-700 rounded-xl">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="mb-2 text-2xl font-bold">Selamat Datang, {{ Auth::user()->name }}!</h2>
                    <p class="text-green-100">Kelola konten website SMP IT Bahrul Ulum Sahlaniyah dengan mudah</p>
                </div>
                <div class="hidden md:block">
                    <img src="{{ asset('upload/20230419_121535.png') }}" alt="Logo" class="w-auto h-16 opacity-80">
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
            <!-- Stats Sekolah -->
            <div class="p-6 bg-white border-l-4 border-blue-500 rounded-lg shadow-md">
                <div class="flex items-center">
                    <div class="p-3 text-blue-600 bg-blue-100 rounded-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                            </path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Statistik</p>
                        <p
                            class="text-2xl font-semibold {{ $stats && ($stats->siswa_aktif > 0 || $stats->tenaga_pengajar > 0) }}">
                            {{ $stats && ($stats->siswa_aktif > 0 || $stats->tenaga_pengajar > 0) ? 'Aktif' : 'Kosong' }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Kepala Sekolah -->
            <div class="p-6 bg-white border-l-4 border-green-500 rounded-lg shadow-md">
                <div class="flex items-center">
                    <div class="p-3 text-green-600 bg-green-100 rounded-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Kepala Sekolah</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ \App\Models\KepalaSekolah::count() == 1 ? 'Aktif' : 'Kosong' }}</p>
                    </div>
                </div>
            </div>

            <!-- Data Guru -->
            <div class="p-6 bg-white border-l-4 border-purple-500 rounded-lg shadow-md">
                <div class="flex items-center">
                    <div class="p-3 text-purple-600 bg-purple-100 rounded-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 3h16v10H4zM12 13v8m-6 0h12"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Data Guru</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ \App\Models\Guru::count() }}</p>
                    </div>
                </div>
            </div>

            <!-- Berita -->
            <div class="p-6 bg-white border-l-4 border-yellow-500 rounded-lg shadow-md">
                <div class="flex items-center">
                    <div class="p-3 text-yellow-600 bg-yellow-100 rounded-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                            </path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Berita</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ \App\Models\Berita::count() }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
            <!-- Quick Actions Card -->
            <div class="p-6 bg-white rounded-lg shadow-md">
                <h3 class="mb-4 text-lg font-semibold text-gray-900">Aksi Cepat</h3>
                <div class="space-y-3">
                    <a href="{{ route('admin.stats.index') }}"
                        class="flex items-center p-3 transition-colors rounded-lg bg-blue-50 hover:bg-blue-100">
                        <svg class="w-5 h-5 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                            </path>
                        </svg>
                        <span class="text-gray-700">Update Statistik Sekolah</span>
                    </a>

                    <a href="{{ route('admin.berita.create') }}"
                        class="flex items-center p-3 transition-colors rounded-lg bg-green-50 hover:bg-green-100">
                        <svg class="w-5 h-5 mr-3 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <span class="text-gray-700">Tambah Berita Baru</span>
                    </a>

                    <a href="{{ route('admin.guru.index') }}"
                        class="flex items-center p-3 transition-colors rounded-lg bg-purple-50 hover:bg-purple-100">
                        <svg class="w-5 h-5 mr-3 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 3h16v10H4z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13v8m-6 0h12" />
                        </svg>
                        <span class="text-gray-700">Kelola Data Guru</span>
                    </a>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="p-6 bg-white rounded-lg shadow-md">
                <h3 class="mb-4 text-lg font-semibold text-gray-900">Kontak Masuk Terbaru</h3>
                @php
                    $kontakTerbaru = \App\Models\KontakMasuk::latest()->take(5)->get();
                @endphp

                @if ($kontakTerbaru->count() > 0)
                    <div class="space-y-3">
                        @foreach ($kontakTerbaru as $kontak)
                            <div class="flex items-center justify-between p-3 rounded-lg bg-gray-50">
                                <div>
                                    <p class="font-medium text-gray-900">{{ $kontak->nama }}</p>
                                    <p class="text-sm text-gray-600">{{ Str::limit($kontak->subjek, 30) }}</p>
                                </div>
                                <span class="text-xs text-gray-500">{{ $kontak->created_at->diffForHumans() }}</span>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('admin.kontak-masuk.index') }}"
                            class="text-sm font-medium text-green-600 hover:text-green-700">
                            Lihat Semua Kontak →
                        </a>
                    </div>
                @else
                    <div class="py-8 text-center">
                        <svg class="w-12 h-12 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        <p class="text-gray-500">Belum ada kontak masuk</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- System Info -->
        <div class="p-6 bg-white rounded-lg shadow-md">
            <h3 class="mb-4 text-lg font-semibold text-gray-900">Informasi Sistem</h3>
            <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                <div class="p-4 text-center rounded-lg bg-gray-50">
                    <p class="text-sm text-gray-600">Laravel Version</p>
                    <p class="text-lg font-semibold text-gray-900">{{ app()->version() }}</p>
                </div>
                <div class="p-4 text-center rounded-lg bg-gray-50">
                    <p class="text-sm text-gray-600">PHP Version</p>
                    <p class="text-lg font-semibold text-gray-900">{{ PHP_VERSION }}</p>
                </div>
                <div class="p-4 text-center rounded-lg bg-gray-50">
                    <p class="text-sm text-gray-600">Last Login</p>
                    <p class="text-lg font-semibold text-gray-900">{{ now()->format('d M Y, H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
