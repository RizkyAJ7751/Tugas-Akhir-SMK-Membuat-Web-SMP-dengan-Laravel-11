<!-- Script -->
<script src="https://cdn.tailwindcss.com"></script>

@extends('layouts.admin')

@section('title', 'Edit Data Guru')
@section('page-title', 'Edit Guru')

@section('content')
    <div class="space-y-6">
        <!-- Back Button -->
        <div class="flex items-center">
            <a href="{{ route('admin.guru.index') }}"
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
                <h3 class="text-lg font-semibold text-gray-900">Form Edit Guru</h3>
                <p class="mt-1 text-sm text-gray-600">Perbarui informasi guru yang akan ditampilkan di website</p>
            </div>

            <form method="POST" action="{{ route('admin.guru.update', $guru->id) }}" enctype="multipart/form-data"
                class="p-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <!-- Nama -->
                        <div>
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <input type="text" name="nama" id="nama" value="{{ old('nama', $guru->nama) }}"
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors @error('nama') border-red-500 @enderror"
                                placeholder="Contoh: Siti Aminah">
                            @error('nama')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Jabatan -->
                        <div>
                            <label for="jabatan" class="block mb-2 text-sm font-medium text-gray-700">Jabatan</label>
                            <input type="text" name="jabatan" id="jabatan" value="{{ old('jabatan', $guru->jabatan) }}"
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors @error('jabatan') border-red-500 @enderror"
                                placeholder="Contoh: Guru Matematika">
                            @error('jabatan')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Bidang -->
                        <div>
                            <label for="bidang" class="block mb-2 text-sm font-medium text-gray-700">Bidang
                                Keahlian</label>
                            <input type="text" name="bidang" id="bidang" value="{{ old('bidang', $guru->bidang) }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors @error('bidang') border-red-500 @enderror"
                                placeholder="Contoh: Matematika & Sains">
                            @error('bidang')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- Upload Foto -->
                        <div>
                            <label for="foto" class="block mb-2 text-sm font-medium text-gray-700">Foto Profil</label>

                            <!-- Current Photo Preview -->
                            @if ($guru->foto)
                                <div class="mb-4">
                                    <p class="mb-2 text-sm text-gray-600">Foto saat ini:</p>
                                    <img src="{{ asset('storage/' . $guru->foto) }}" alt="Foto Guru"
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
                                            <span>Upload foto baru</span>
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

                <!-- Action Buttons -->
                <div class="flex items-center justify-end pt-6 mt-8 space-x-3 border-t border-gray-200">
                    <a href="{{ route('admin.guru.index') }}"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 transition-colors bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Batal
                    </a>
                    <button type="submit"
                        class="inline-flex items-center px-6 py-2 text-sm font-medium text-white transition-colors bg-green-600 border border-transparent rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Image preview function
        function previewImage(input) {
            const preview = document.getElementById("imagePreview");
            const previewImg = document.getElementById("previewImg");

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    preview.classList.remove("hidden");
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
