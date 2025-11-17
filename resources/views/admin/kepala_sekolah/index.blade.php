@extends('layouts.admin')

@section('title', 'Kelola Kepala Sekolah')
@section('page-title', 'Kepala Sekolah')

@section('content')
    <div class="space-y-6">
        <!-- Header Card -->
        <div class="p-6 bg-white rounded-lg shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Data Kepala Sekolah</h3>
                    <p class="mt-1 text-gray-600">Kelola informasi kepala sekolah yang ditampilkan di website</p>
                </div>
                <div class="flex items-center space-x-2">
                    <!-- Tombol Tambah/Edit -->
                    <a href="{{ $kepalaSekolah
                        ? route('admin.kepala-sekolah.edit', $kepalaSekolah->id)
                        : route('admin.kepala-sekolah.create') }}"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white transition-colors bg-green-600 border border-transparent rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            @if ($kepalaSekolah)
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            @else
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            @endif
                        </svg>
                        {{ $kepalaSekolah ? 'Edit Data' : 'Tambah Data' }}
                    </a>

                    <!-- Tombol Hapus (hanya muncul kalau data ada) -->
                    @if ($kepalaSekolah)
                        <form action="{{ route('admin.kepala-sekolah.destroy', $kepalaSekolah->id) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus data kepala sekolah?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white transition-colors bg-red-600 border border-transparent rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Hapus
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>

        @if ($kepalaSekolah)
            <!-- Profile Card -->
            <div class="overflow-hidden bg-white rounded-lg shadow-md">
                <div class="px-6 py-8 bg-gradient-to-r from-green-600 to-green-700">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            @if ($kepalaSekolah->foto)
                                <img src="{{ asset('storage/' . $kepalaSekolah->foto) }}" alt="Foto Kepala Sekolah"
                                    class="object-cover w-24 h-24 border-4 border-white rounded-full shadow-lg">
                            @else
                                <div
                                    class="flex items-center justify-center w-24 h-24 bg-white border-4 border-white rounded-full shadow-lg">
                                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="ml-6 text-white">
                            <h2 class="text-2xl font-bold">{{ $kepalaSekolah->nama }}</h2>
                            @if ($kepalaSekolah->gelar)
                                <p class="text-lg text-green-100">{{ $kepalaSekolah->gelar }}</p>
                            @endif
                            <div class="flex items-center mt-2">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $kepalaSekolah->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    <svg class="w-2 h-2 mr-1" fill="currentColor" viewBox="0 0 8 8">
                                        <circle cx="4" cy="4" r="3" />
                                    </svg>
                                    {{ $kepalaSekolah->is_active ? 'Aktif' : 'Tidak Aktif' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="px-6 py-6">
                    <h4 class="mb-3 text-lg font-semibold text-gray-900">Sambutan Kepala Sekolah</h4>
                    <div class="prose text-gray-700 max-w-none">
                        @if ($kepalaSekolah->sambutan)
                            {!! nl2br(e($kepalaSekolah->sambutan)) !!}
                        @else
                            <p class="italic text-gray-500">Belum ada sambutan yang ditambahkan.</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Preview Section -->
            <div class="p-6 bg-white rounded-lg shadow-md">
                <h4 class="mb-4 text-lg font-semibold text-gray-900">Preview Tampilan Website</h4>
                <div class="p-6 rounded-lg bg-gray-50">
                    <div class="text-center">
                        <h5 class="mb-4 text-sm font-medium text-gray-600">Bagaimana data ini akan tampil di section "Kenali
                            Guru":</h5>
                        <div class="max-w-md p-6 mx-auto bg-white rounded-lg shadow-sm">
                            @if ($kepalaSekolah->foto)
                                <img src="{{ asset('storage/' . $kepalaSekolah->foto) }}" alt="Foto Kepala Sekolah"
                                    class="object-cover w-20 h-20 mx-auto mb-4 rounded-full">
                            @else
                                <div
                                    class="flex items-center justify-center w-20 h-20 mx-auto mb-4 bg-gray-200 rounded-full">
                                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                            @endif
                            <h6 class="font-semibold text-gray-900">{{ $kepalaSekolah->nama }}</h6>
                            <p class="mt-1 text-xs font-medium text-green-600">Kepala Sekolah</p>
                            @if ($kepalaSekolah->sambutan)
                                <p class="mt-2 text-xs text-gray-600 line-clamp-3">
                                    {{ Str::limit($kepalaSekolah->sambutan, 100) }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- Empty State -->
            <div class="p-12 bg-white rounded-lg shadow-md">
                <div class="text-center">
                    <svg class="w-16 h-16 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <h3 class="mb-2 text-lg font-semibold text-gray-900">Belum Ada Data Kepala Sekolah</h3>
                    <p class="mb-6 text-gray-600">Tambahkan informasi kepala sekolah untuk ditampilkan di website</p>
                    <a href="{{ route('admin.kepala-sekolah.create') }}"
                        class="inline-flex items-center px-6 py-3 text-sm font-medium text-white transition-colors bg-green-600 border border-transparent rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Tambah Data Kepala Sekolah
                    </a>
                </div>
            </div>
        @endif

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
                        Data kepala sekolah akan ditampilkan di section "Kenali Guru" pada website utama.
                        Sambutan kepala sekolah akan menjadi bagian utama dari section tersebut.
                        Pastikan foto ukuran 1:1 yang diupload berkualitas baik dan sambutan ditulis dengan menarik.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
