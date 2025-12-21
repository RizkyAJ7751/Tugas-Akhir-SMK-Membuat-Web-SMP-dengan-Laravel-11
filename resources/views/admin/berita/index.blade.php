<!-- Script -->
<script src="https://cdn.tailwindcss.com"></script>

@extends('layouts.admin')

@section('title', 'Kelola Berita')
@section('page-title', 'Berita & Artikel')

@section('content')
    <div class="space-y-6">
        <!-- Header Card -->
        <div class="p-6 bg-white rounded-lg shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Daftar Berita & Artikel</h3>
                    <p class="mt-1 text-gray-600">Kelola berita dan artikel yang akan ditampilkan di website</p>
                </div>
                <a href="{{ route('admin.berita.create') }}"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white transition-colors bg-green-600 border border-transparent rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Berita
                </a>
            </div>
        </div>

        @if ($beritas->count() > 0)
            <!-- Berita List -->
            <div class="p-3 overflow-hidden bg-white rounded-lg shadow-md">
                <div class="flex justify-between overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Gambar</th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Judul & Tanggal</th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Status</th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($beritas as $berita)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($berita->gambar)
                                            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
                                                class="object-cover w-16 h-12 rounded">
                                        @else
                                            <div class="flex items-center justify-center w-16 h-12 bg-gray-200 rounded">
                                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="max-w-xs text-sm font-medium text-gray-900 truncate">
                                            {{ $berita->judul }}</div>
                                        <div class="text-sm text-gray-500">{{ $berita->tanggal_publikasi->format('d M Y') }}
                                        </div>
                                        <div class="text-xs text-gray-400">{{ Str::limit(strip_tags($berita->konten), 60) }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $berita->status == 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                            <svg class="w-2 h-2 mr-1" fill="currentColor" viewBox="0 0 8 8">
                                                <circle cx="4" cy="4" r="3" />
                                            </svg>
                                            {{ $berita->status == 'published' ? 'Dipublikasi' : 'Draft' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                                        <div class="flex items-center space-x-2">
                                            @if ($berita->status == 'published')
                                                <a href="{{ route('berita.show', $berita->slug) }}" target="_blank"
                                                    class="text-blue-600 hover:text-blue-900" title="Lihat di Website">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                                        </path>
                                                    </svg>
                                                </a>
                                            @endif
                                            <a href="{{ route('admin.berita.edit', $berita->id) }}"
                                                class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                            <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST"
                                                class="inline-block"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-600 hover:text-red-900">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                @if ($beritas->hasPages())
                    <div
                        class="flex items-center justify-between gap-3 px-4 py-3 mx-3 bg-white border-t border-gray-200 rounded-lg shadow-md sm:px-6">
                        {{ $beritas->links() }}
                    </div>
                @endif
            </div>
        @else
            <!-- Empty State -->
            <div class="p-12 bg-white rounded-lg shadow-md">
                <div class="text-center">
                    <svg class="w-16 h-16 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                        </path>
                    </svg>
                    <h3 class="mb-2 text-lg font-semibold text-gray-900">Belum Ada Berita</h3>
                    <p class="mb-6 text-gray-600">Tambahkan berita atau artikel untuk ditampilkan di website.</p>
                    <a href="{{ route('admin.berita.create') }}"
                        class="inline-flex items-center px-6 py-3 text-sm font-medium text-white transition-colors bg-green-600 border border-transparent rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Tambah Berita Baru
                    </a>
                </div>
            </div>
        @endif

        <!-- Stats Card -->
        <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
            <div class="p-6 bg-white rounded-lg shadow-md">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center w-8 h-8 bg-green-100 rounded-full">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Dipublikasi</p>
                        <p class="text-2xl font-semibold text-gray-900">
                            {{ $beritas->where('status', 'published')->count() }}</p>
                    </div>
                </div>
            </div>

            <div class="p-6 bg-white rounded-lg shadow-md">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center w-8 h-8 bg-yellow-100 rounded-full">
                            <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Draft</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $beritas->where('status', 'draft')->count() }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="p-6 bg-white rounded-lg shadow-md">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center w-8 h-8 bg-blue-100 rounded-full">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Total Berita</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $beritas->count() }}</p>
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
                        Berita dengan status "Dipublikasi" akan ditampilkan di section blog pada website utama.
                        Berita dengan status "Draft" tidak akan ditampilkan di website.
                        Pastikan gambar yang diupload berkualitas baik dan konten sudah diperiksa sebelum dipublikasi.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
