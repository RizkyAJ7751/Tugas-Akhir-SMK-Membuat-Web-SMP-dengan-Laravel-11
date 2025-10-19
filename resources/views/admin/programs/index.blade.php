@extends('layouts.admin')

@section('content')
    <div class="p-6 bg-white rounded-lg shadow-md">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Daftar Program</h2>

            @if ($programs->isEmpty())
                <a href="{{ route('admin.programs.create') }}"
                    class="px-4 py-2 text-white bg-green-600 rounded hover:bg-green-700">
                    + Tambah Program
                </a>
            @else
            @endif
        </div>

        @if ($programs->isEmpty())
            <div class="p-6 text-center text-gray-600 border rounded-lg">
                Belum ada program tersedia...
            </div>
        @else
            <div class="space-y-6">
                @foreach ($programs as $program)
                    <div class="p-4 border rounded-lg bg-gray-50">
                        <!-- Header Program -->
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">{{ $program->title }}</h3>
                                <p class="text-sm text-gray-600">Gelombang {{ $program->gelombang }}</p>
                            </div>
                            <div class="flex space-x-2">
                                <!-- Tombol Hapus -->
                                <form action="{{ route('admin.programs.destroy', $program->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus program ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 text-white bg-red-600 rounded hover:bg-red-700">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Deskripsi -->
                        <p class="mb-4 text-gray-700">{{ $program->description }}</p>

                        <!-- Brosur -->
                        @if (!empty($program->brosur))
                            <div class="space-y-3">
                                @foreach ($program->brosur as $brosur)
                                    <div>
                                        <img src="{{ asset('storage/' . $brosur) }}" alt="Brosur {{ $program->title }}"
                                            class="object-cover w-full max-w-md border rounded">
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-sm text-gray-500">Belum ada brosur.</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    <!-- Info Card -->
    <div class="p-6 mt-2 border border-blue-200 rounded-lg bg-blue-50">
        <div class="flex items-start">
            <svg class="w-6 h-6 text-blue-600 mt-0.5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <div class="">
                <h4 class="mb-1 text-sm font-medium text-blue-800">Informasi Penting</h4>
                <p class="text-sm text-blue-700">
                    Pastikan brosur yang diunggah sudah sesuai dan informatif. Brosur akan ditampilkan pada halaman
                    program di website utama.
                </p>
            </div>
        </div>
    </div>
@endsection
