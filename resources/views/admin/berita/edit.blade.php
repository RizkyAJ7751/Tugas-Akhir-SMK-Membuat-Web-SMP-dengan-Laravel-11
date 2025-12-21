<!-- Script -->
<script src="https://cdn.tailwindcss.com"></script>

@extends('layouts.admin')

@section('title', 'Edit Berita')
@section('page-title', 'Edit Berita')

@section('content')
    <div class="space-y-6">
        <!-- Back Button -->
        <div class="flex items-center">
            <a href="{{ route('admin.berita.index') }}"
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
                <h3 class="text-lg font-semibold text-gray-900">Form Edit Berita</h3>
                <p class="mt-1 text-sm text-gray-600">Perbarui informasi berita yang akan ditampilkan di website</p>
            </div>

            <form method="POST" action="{{ route('admin.berita.update', $berita) }}" enctype="multipart/form-data"
                class="p-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                    <!-- Left Column (2/3) -->
                    <div class="space-y-6 lg:col-span-2">
                        <!-- Judul -->
                        <div>
                            <label for="judul" class="block mb-2 text-sm font-medium text-gray-700">
                                <svg class="inline w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2h4a1 1 0 011 1v1a1 1 0 01-1 1H3a1 1 0 01-1-1V5a1 1 0 011-1h4z">
                                    </path>
                                </svg>
                                Judul Berita
                            </label>
                            <input type="text" name="judul" id="judul" value="{{ old('judul', $berita->judul) }}"
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors @error('judul') border-red-500 @enderror"
                                placeholder="Masukkan judul berita yang menarik..." onkeyup="generateSlug()">
                            @error('judul')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Slug -->
                        <div>
                            <label for="slug" class="block mb-2 text-sm font-medium text-gray-700">
                                <svg class="inline w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1">
                                    </path>
                                </svg>
                                URL Slug (SEO)
                            </label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug', $berita->slug) }}"
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors @error('slug') border-red-500 @enderror"
                                placeholder="url-slug-otomatis">
                            @error('slug')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500">URL akan menjadi: <span
                                    class="font-mono text-green-600">{{ url('/berita/') }}/<span
                                        id="slug-preview">{{ $berita->slug }}</span></span></p>
                        </div>

                        <!-- Konten -->
                        <div>
                            <label for="konten" class="block mb-2 text-sm font-medium text-gray-700">
                                <svg class="inline w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                                Konten Berita
                            </label>
                            <textarea name="konten" id="konten" rows="12" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors @error('konten') border-red-500 @enderror"
                                placeholder="Tulis konten berita lengkap di sini...">{{ old('konten', $berita->konten) }}</textarea>
                            @error('konten')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500">Gunakan paragraf untuk memisahkan konten. HTML sederhana
                                diperbolehkan.</p>
                        </div>
                    </div>

                    <!-- Right Column (1/3) -->
                    <div class="space-y-6">
                        <!-- Upload Gambar -->
                        <div>
                            <label for="gambar" class="block mb-2 text-sm font-medium text-gray-700">
                                <svg class="inline w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                Gambar Utama
                            </label>

                            <!-- Current Photo Preview -->
                            @if ($berita->gambar)
                                <div class="mb-4">
                                    <p class="mb-2 text-sm text-gray-600">Gambar saat ini:</p>
                                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Berita"
                                        class="object-cover w-full h-32 border border-gray-200 rounded-lg">
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
                                        <label for="gambar"
                                            class="relative font-medium text-green-600 bg-white rounded-md cursor-pointer hover:text-green-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-green-500">
                                            <span>Upload gambar baru</span>
                                            <input id="gambar" name="gambar" type="file" class="sr-only"
                                                accept="image/*" onchange="previewImage(this)">
                                        </label>
                                        <p class="pl-1">atau drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, JPEG hingga 5MB</p>
                                </div>
                            </div>

                            <!-- Image Preview -->
                            <div id="imagePreview" class="hidden mt-4">
                                <p class="mb-2 text-sm text-gray-600">Preview gambar baru:</p>
                                <img id="previewImg" class="object-cover w-full h-48 border border-gray-200 rounded-lg">
                            </div>

                            @error('gambar')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tanggal -->
                        <div>
                            <label for="tanggal" class="block mb-2 text-sm font-medium text-gray-700">
                                <svg class="inline w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                Tanggal Publikasi
                            </label>
                            <input type="date" name="tanggal_publikasi" id="tanggal_publikasi"
                                value="{{ old('tanggal_publikasi', optional($berita->tanggal_publikasi)->format('Y-m-d')) }}"
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors @error('tanggal') border-red-500 @enderror">
                            @error('tanggal_publikasi')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div>
                            <label for="status" class="block mb-2 text-sm font-medium text-gray-700">
                                <svg class="inline w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                    </path>
                                </svg>
                                Status Publikasi
                            </label>
                            <select name="status" id="status"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors @error('status') border-red-500 @enderror">
                                <option value="draft" {{ old('status', $berita->status) == 'draft' ? 'selected' : '' }}>
                                    Draft (Tidak Dipublikasi)</option>
                                <option value="published"
                                    {{ old('status', $berita->status) == 'published' ? 'selected' : '' }}>Dipublikasi
                                </option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500">Draft tidak akan ditampilkan di website</p>
                        </div>

                        <!-- Preview Card -->
                        <div class="p-4 rounded-lg bg-gray-50">
                            <h4 class="mb-3 text-sm font-medium text-gray-700">Preview Card Website:</h4>
                            <div class="overflow-hidden bg-white rounded-lg shadow-sm">
                                <div class="flex items-center justify-center w-full h-32 bg-gray-200" id="preview-image">
                                    @if ($berita->gambar)
                                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Preview"
                                            class="object-cover w-full h-32">
                                    @else
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    @endif
                                </div>
                                <div class="p-3">
                                    <h5 class="text-sm font-semibold text-gray-900 line-clamp-2" id="preview-title">
                                        {{ $berita->judul }}</h5>
                                    <p class="mt-1 text-xs text-gray-600" id="preview-date">
                                        {{ $berita->tanggal_publikasi->format('d M Y') }}</p>
                                    <p class="mt-2 text-xs text-gray-600 line-clamp-2" id="preview-content">
                                        {{ Str::limit(strip_tags($berita->konten), 100) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-end pt-6 mt-8 space-x-3 border-t border-gray-200">
                    <a href="{{ route('admin.berita.index') }}"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 transition-colors bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Batal
                    </a>
                    <button type="submit"
                        class="inline-flex items-center px-6 py-2 text-sm font-medium text-white transition-colors bg-green-600 border border-transparent rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Generate slug from title
        function generateSlug() {
            const title = document.getElementById("judul").value;
            const slug = title
                .toLowerCase()
                .replace(/[^a-z0-9\s-]/g, "")
                .replace(/\s+/g, "-")
                .replace(/-+/g, "-")
                .trim("-");

            document.getElementById("slug").value = slug;
            document.getElementById("slug-preview").textContent = slug || "url-slug";
        }

        // Image preview function
        function previewImage(input) {
            const preview = document.getElementById("imagePreview");
            const previewImg = document.getElementById("previewImg");
            const previewImageCard = document.getElementById("preview-image");

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    preview.classList.remove("hidden");

                    // Update preview card
                    previewImageCard.innerHTML =
                        `<img src="${e.target.result}" alt="Preview" class="object-cover w-full h-32">`;
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        // Live preview update
        document.addEventListener("DOMContentLoaded", function() {
            const judulInput = document.getElementById("judul");
            const kontenInput = document.getElementById("konten");
            const tanggalInput = document.getElementById("tanggal_publikasi");

            const previewTitle = document.getElementById("preview-title");
            const previewContent = document.getElementById("preview-content");
            const previewDate = document.getElementById("preview-date");

            judulInput.addEventListener("input", function() {
                previewTitle.textContent = this.value || "Judul Berita";
                generateSlug(); // Also update slug on title change
            });

            kontenInput.addEventListener("input", function() {
                const text = this.value.replace(/<[^>]*>/g, ""); // Remove HTML tags
                previewContent.textContent = text.length > 100 ? text.substring(0, 100) + "..." : text ||
                    "Konten berita akan muncul di sini...";
            });

            tanggalInput.addEventListener("change", function() {
                if (this.value) {
                    const date = new Date(this.value);
                    const options = {
                        day: "numeric",
                        month: "short",
                        year: "numeric"
                    };
                    previewDate.textContent = date.toLocaleDateString("id-ID", options);
                }
            });
        });
    </script>
@endsection
