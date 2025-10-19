@extends('layouts.admin')

@section('title', 'Kelola Data Guru')
@section('page-title', 'Data Guru')

@section('content')
    <div class="space-y-6">
        <!-- Header Card -->
        <div class="p-6 bg-white rounded-lg shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Daftar Guru dan Tenaga Pengajar</h3>
                    <p class="mt-1 text-gray-600">Kelola data guru yang akan ditampilkan di website.</p>
                </div>
                <a href="{{ route('admin.guru.create') }}"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white transition-colors bg-green-600 border border-transparent rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Guru
                </a>
            </div>
        </div>

        @if ($gurus->count() > 0)
            <!-- Guru List -->
            <div class="overflow-hidden bg-white rounded-lg shadow-md">
                <div class="p-3 overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Foto</th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Nama & Gelar</th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Jabatan & Bidang</th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($gurus as $guru)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($guru->foto)
                                            <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama }}"
                                                class="object-cover w-12 h-12 rounded-full">
                                        @else
                                            <div
                                                class="flex items-center justify-center w-12 h-12 bg-gray-200 rounded-full">
                                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                    </path>
                                                </svg>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $guru->nama }}</div>
                                        @if ($guru->gelar)
                                            <div class="text-sm text-gray-500">{{ $guru->gelar }}</div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $guru->jabatan }}</div>
                                        <div class="text-sm text-gray-500">{{ $guru->bidang }}</div>
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                                        <a href="{{ route('admin.guru.edit', $guru->id) }}"
                                            class="mr-3 text-indigo-600 hover:text-indigo-900">Edit</a>
                                        <form action="{{ route('admin.guru.destroy', $guru->id) }}" method="POST"
                                            class="inline-block"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus data guru ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="m-10">
                        <div class="mb-10">
                            {{ $gurus->links() }}
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
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z">
                        </path>
                    </svg>
                    <h3 class="mb-2 text-lg font-semibold text-gray-900">Belum Ada Data Guru</h3>
                    <p class="mb-6 text-gray-600">Tambahkan data guru untuk ditampilkan di website.</p>
                    <a href="{{ route('admin.guru.create') }}"
                        class="inline-flex items-center px-6 py-3 text-sm font-medium text-white transition-colors bg-green-600 border border-transparent rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Tambah Guru Baru
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
                        Data guru akan ditampilkan di section "Kenali Guru" pada website utama.
                        Pastikan foto yang diupload berkualitas baik dan berukuran 1:1.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
