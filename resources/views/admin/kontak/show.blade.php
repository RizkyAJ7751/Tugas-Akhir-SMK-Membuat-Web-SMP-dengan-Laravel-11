@extends('layouts.admin')

@section('title', 'Detail Pesan')
@section('page-title', 'Detail Pesan Kontak')

@section('content')
    <div class="p-6 bg-white rounded-lg shadow-md">
        <h2 class="mb-4 text-lg font-semibold text-gray-900">Detail Pesan</h2>

        <div class="grid grid-cols-2 gap-6 text-sm">
            <div>
                <p><strong>Nama:</strong> {{ $kontak->nama }}</p>
                <p class="mt-2"><strong>Telepon:</strong> {{ $kontak->telepon ?? '-' }}</p>
            </div>
            <div>
                <p><strong>Tanggal:</strong>
                    {{ $kontak->created_at ? $kontak->created_at->format('d M Y H:i') : '-' }}
                </p>
            </div>
        </div>

        <div class="mt-4">
            <p><strong>Subjek:</strong></p>
            <p class="text-gray-900">{{ $kontak->subjek }}</p>
        </div>

        <div class="mt-4">
            <p><strong>Pesan:</strong></p>
            <div class="p-4 mt-1 text-gray-700 bg-gray-100 rounded-lg">
                {{ $kontak->pesan }}
            </div>
        </div>

        <div class="flex justify-end mt-6 space-x-2">
            <a href="mailto:{{ $kontak->email }}?subject=Re: {{ $kontak->subjek }}"
                class="px-4 py-2 text-white bg-green-600 rounded hover:bg-green-700">
                Balas Email
            </a>
            <a href="{{ route('admin.kontak-masuk.index') }}"
                class="px-4 py-2 text-gray-600 bg-gray-200 rounded hover:bg-gray-300">
                Kembali
            </a>
        </div>
    </div>
@endsection
