<!-- Script -->
<script src="https://cdn.tailwindcss.com"></script>

@extends('layouts.admin')

@section('title', $kepalaSekolah ? 'Edit Kepala Sekolah' : 'Tambah Kepala Sekolah')
@section('page-title', $kepalaSekolah ? 'Edit Kepala Sekolah' : 'Tambah Kepala Sekolah')

@section('content')
    <div class="space-y-6">
        <!-- Back Button -->
        <div class="flex items-center">
            <a href="{{ route('admin.kepala-sekolah.index') }}"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 transition-colors bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
                Kembali
            </a>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-lg shadow-md">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">{{ $kepalaSekolah ? 'Edit' : 'Tambah' }} Data Kepala Sekolah
                </h3>
                <p class="mt-1 text-sm text-gray-600">{{ $kepalaSekolah ? 'Perbarui' : 'Masukkan' }} informasi kepala
                    sekolah yang akan ditampilkan di website</p>
            </div>

            <form method="POST"
                action="{{ route('admin.kepala-sekolah.update', $kepalaSekolah ? $kepalaSekolah->id : 0) }}"
                enctype="multipart/form-data" class="p-6">
                @csrf
                @method('PATCH')

                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <!-- Nama -->
                        <div>
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-700">
                                <svg class="inline w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Nama Lengkap & Gelar
                            </label>
                            <input type="text" name="nama" id="nama"
                                value="{{ old('nama', $kepalaSekolah->nama ?? '') }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors @error('nama') border-red-500 @enderror"
                                placeholder="Contoh: Dr. Ahmad Suryadi">
                            @error('nama')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status Aktif -->
                        <div>
                            <label class="flex items-center">
                                <input type="checkbox" name="is_active" id="is_active" value="1"
                                    class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500"
                                    {{ old('is_active', $kepalaSekolah->is_active ?? true) ? 'checked' : '' }}>
                                <span class="ml-2 text-sm text-gray-700">Aktifkan sebagai Kepala Sekolah saat ini</span>
                            </label>
                            <p class="mt-1 text-xs text-gray-500">Centang jika masih menjabat sebagai kepala sekolah</p>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- Upload Foto -->
                        <div>
                            <label for="foto" class="block mb-2 text-sm font-medium text-gray-700">
                                <svg class="inline w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                Foto Profil
                            </label>

                            <!-- Current Photo Preview -->
                            @if ($kepalaSekolah && $kepalaSekolah->foto)
                                <div class="mb-4">
                                    <p class="mb-2 text-sm text-gray-600">Foto saat ini:</p>
                                    <img src="{{ asset('storage/' . $kepalaSekolah->foto) }}" alt="Foto Kepala Sekolah"
                                        class="object-cover w-32 h-32 border border-gray-200 rounded-lg">
                                </div>
                            @endif

                            <!-- File Upload -->
                            <div
                                class="flex justify-center px-6 pt-5 pb-6 mt-1 transition-colors border-2 border-gray-300 border-dashed rounded-lg hover:border-green-400">
                                <div class="space-y-1 text-center">
                                    <svg class="w-12 h-12 mx-auto text-gray-400" stroke="currentColor" fill="none"
                                        viewBox="0 0 48 48">
                                        <path
                                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="foto"
                                            class="relative font-medium text-green-600 bg-white rounded-md cursor-pointer hover:text-green-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-green-500">
                                            <span>Upload foto</span>
                                            <input id="foto" name="foto" type="file" class="sr-only"
                                                accept="image/*" onchange="previewImage(this)">
                                        </label>
                                        <p class="pl-1">atau drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, JPEG hingga 2MB</p>
                                </div>
                            </div>

                            <!-- Image Preview -->
                            <div id="imagePreview" class="hidden mt-4">
                                <p class="mb-2 text-sm text-gray-600">Preview foto baru:</p>
                                <img id="previewImg" class="object-cover w-32 h-32 border border-gray-200 rounded-lg">
                            </div>

                            @error('foto')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Sambutan -->
                <div class="mt-6">
                    <label for="sambutan" class="block mb-2 text-sm font-medium text-gray-700">
                        <svg class="inline w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                            </path>
                        </svg>
                        Sambutan Kepala Sekolah
                    </label>
                    <textarea name="sambutan" id="sambutan" rows="6" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors @error('sambutan') border-red-500 @enderror"
                        placeholder="Tulis sambutan kepala sekolah yang akan ditampilkan di website...">{{ old('sambutan', $kepalaSekolah->sambutan ?? '') }}</textarea>
                    @error('sambutan')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-xs text-gray-500">Sambutan ini akan ditampilkan di section "Kenali Guru" pada
                        website</p>
                </div>

                <!-- Preview Section -->
                <div class="p-4 mt-8 rounded-lg bg-gray-50">
                    <h4 class="mb-3 text-sm font-medium text-gray-700">Preview Tampilan di Website:</h4>
                    <div class="max-w-md p-6 mx-auto bg-white rounded-lg shadow-sm">
                        <div class="text-center">
                            <div class="flex items-center justify-center w-20 h-20 mx-auto mb-4 bg-gray-200 rounded-full"
                                id="preview-photo">
                                @if ($kepalaSekolah && $kepalaSekolah->foto)
                                    <img src="{{ asset('storage/' . $kepalaSekolah->foto) }}" alt="Preview"
                                        class="object-cover w-20 h-20 rounded-full">
                                @else
                                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                @endif
                            </div>
                            <h6 class="font-semibold text-gray-900" id="preview-nama">
                                {{ $kepalaSekolah->nama ?? 'Nama Kepala Sekolah' }}</h6>
                            <p class="text-sm text-gray-600" id="preview-gelar">{{ $kepalaSekolah->gelar ?? 'Gelar' }}
                            </p>
                            <p class="mt-1 text-xs font-medium text-green-600">Kepala Sekolah</p>
                            <p class="mt-2 text-xs text-gray-600 line-clamp-3" id="preview-sambutan">
                                {{ Str::limit($kepalaSekolah->sambutan ?? 'Sambutan kepala sekolah...', 100) }}</p>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-end pt-6 mt-8 space-x-3 border-t border-gray-200">
                    <a href="{{ route('admin.kepala-sekolah.index') }}"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 transition-colors bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Batal
                    </a>
                    <button type="submit"
                        class="inline-flex items-center px-6 py-2 text-sm font-medium text-white transition-colors bg-green-600 border border-transparent rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        {{ $kepalaSekolah ? 'Simpan Perubahan' : 'Tambah Data' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Image preview function
        function previewImage(input) {
            const preview = document.getElementById('imagePreview');
            const previewImg = document.getElementById('previewImg');
            const previewPhoto = document.getElementById('preview-photo');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    preview.classList.remove('hidden');

                    // Update preview in website preview section
                    previewPhoto.innerHTML =
                        `<img src="${e.target.result}" alt="Preview" class="object-cover w-20 h-20 rounded-full">`;
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        // Live preview update
        document.addEventListener('DOMContentLoaded', function() {
            const namaInput = document.getElementById('nama');
            const gelarInput = document.getElementById('gelar');
            const sambutanInput = document.getElementById('sambutan');

            const previewNama = document.getElementById('preview-nama');
            const previewGelar = document.getElementById('preview-gelar');
            const previewSambutan = document.getElementById('preview-sambutan');

            namaInput.addEventListener('input', function() {
                previewNama.textContent = this.value || 'Nama Kepala Sekolah';
            });

            gelarInput.addEventListener('input', function() {
                previewGelar.textContent = this.value || 'Gelar';
            });

            sambutanInput.addEventListener('input', function() {
                const text = this.value || 'Sambutan kepala sekolah...';
                previewSambutan.textContent = text.length > 100 ? text.substring(0, 100) + '...' : text;
            });
        });
    </script>
@endsection
