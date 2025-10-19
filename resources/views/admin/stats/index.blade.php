@extends('layouts.admin')

@section('title', 'Kelola Statistik')
@section('page-title', 'Statistik Sekolah')

@section('content')
    <div class="space-y-6">
        <!-- Header Card -->
        <div class="p-6 bg-white rounded-lg shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Data Statistik Sekolah</h3>
                    <p class="mt-1 text-gray-600">Kelola data statistik yang ditampilkan di halaman depan website</p>
                </div>
                <div>
                    <a href="{{ route('admin.stats.edit', $stats->id) }}"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white transition-colors bg-green-600 border border-transparent rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                        Edit Statistik
                    </a>
                    <form action="{{ route('admin.stats.destroy', $stats->id) }}" method="POST" class="inline"
                        onsubmit="return confirm('Yakin ingin mengosongkan statistik sekolah?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white transition-colors bg-red-600 border border-transparent rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Kosongkan Statistik
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
            <!-- Siswa Aktif -->
            <div class="p-6 bg-white border-l-4 border-blue-500 rounded-lg shadow-md">
                <div class="flex items-center">
                    <div class="p-3 text-blue-600 bg-blue-100 rounded-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Siswa Aktif</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $stats->siswa_aktif ?? 0 }}</p>
                    </div>
                </div>
            </div>

            <!-- Tenaga Pengajar -->
            <div class="p-6 bg-white border-l-4 border-green-500 rounded-lg shadow-md">
                <div class="flex items-center">
                    <div class="p-3 text-green-600 bg-green-100 rounded-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Tenaga Pengajar</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $stats->tenaga_pengajar ?? 0 }}</p>
                    </div>
                </div>
            </div>

            <!-- Tahun Berdiri -->
            <div class="p-6 bg-white border-l-4 border-purple-500 rounded-lg shadow-md">
                <div class="flex items-center">
                    <div class="p-3 text-purple-600 bg-purple-100 rounded-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Tahun Berdiri</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $stats->tahun_berdiri ?? '-' }}</p>
                    </div>
                </div>
            </div>

            <!-- Akreditasi -->
            <div class="p-6 bg-white border-l-4 border-yellow-500 rounded-lg shadow-md">
                <div class="flex items-center">
                    <div class="p-3 text-yellow-600 bg-yellow-100 rounded-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                            </path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Akreditasi</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $stats->akreditasi ?? '-' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Info Card -->
        <div class="p-6 border border-blue-200 rounded-lg bg-blue-50">
            <div class="flex items-start">
                <svg class="w-6 h-6 text-blue-600 mt-0.5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <div>
                    <h4 class="mb-1 text-sm font-medium text-blue-800">Informasi Penting</h4>
                    <p class="text-sm text-blue-700">
                        Data statistik ini akan ditampilkan di halaman Hero/Beranda pada website utama.
                        Pastikan data yang dimasukkan akurat dan terkini.
                    </p>
                </div>
            </div>
        </div>

        <!-- Preview Section -->
        <div class="p-6 bg-white rounded-lg shadow-md">
            <h4 class="mb-4 text-lg font-semibold text-gray-900">Preview Tampilan Website</h4>
            <div class="p-6 rounded-lg bg-gray-50">
                <div class="text-center">
                    <h5 class="mb-4 text-sm font-medium text-gray-600">Bagaimana data ini akan tampil di website:</h5>
                    <div class="grid grid-cols-2 gap-4 text-center md:grid-cols-4">
                        <div>
                            <div class="text-2xl font-bold text-green-600">{{ $stats->siswa_aktif ?? '0' }}</div>
                            <div class="text-sm text-gray-600">Siswa Aktif</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-green-600">{{ $stats->tenaga_pengajar ?? '0' }}</div>
                            <div class="text-sm text-gray-600">Tenaga Pengajar</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-green-600">{{ $stats->tahun_berdiri ?? '0' }}</div>
                            <div class="text-sm text-gray-600">Tahun Berdiri</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-green-600">{{ $stats->akreditasi ?? '-' }}</div>
                            <div class="text-sm text-gray-600">Akreditasi</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
