@extends('layouts.admin')

@section('title', 'Tambah Program')
@section('page-title', 'Tambah Program')

@section('content')
    <div class="p-6 bg-white rounded-lg shadow-md">
        <h3 class="mb-4 text-lg font-semibold text-gray-900">Tambah Program</h3>

        @if ($errors->any())
            <div class="p-4 mb-4 text-sm text-red-800 bg-red-100 border border-red-200 rounded-lg">
                <ul class="pl-5 list-disc">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.programs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6" onsubmit="alert('Data yang disimpan tidak bisa dirubah kecuali dengan mengosongkan data Program. Pastikan data sudah benar dan disimpan jikalau kelak ada perubahan.')">
            @csrf

            <!-- Judul -->
            <div>
                <label class="block mb-1 font-medium text-gray-700">Judul Program *</label>
                <input type="text" name="title" value="{{ old('title') }}"
                    class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none"
                    placeholder="Contoh : Program Pendaftaran" required>
            </div>

            <!-- Deskripsi -->
            <div>
                <label class="block mb-1 font-medium text-gray-700">Deskripsi</label>
                <textarea name="description" rows="4" placeholder="Deskripsi singkat program"
                    class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none">{{ old('description') }}</textarea>
            </div>

            <!-- Gelombang -->
            <div>
                <label class="block mb-1 font-medium text-gray-700">Gelombang *</label>
                <select name="gelombang"
                    class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none"
                    required>
                    <option value="">-- Pilih --</option>
                    <option value="1" {{ old('gelombang') == '1' ? 'selected' : '' }}>Gelombang 1</option>
                    <option value="2" {{ old('gelombang') == '2' ? 'selected' : '' }}>Gelombang 2</option>
                    <option value="3" {{ old('gelombang') == '3' ? 'selected' : '' }}>Gelombang 3</option>
                </select>
            </div>

            <!-- Upload Brosur -->
            <div class="grid gap-6 md:grid-cols-2">
                @for ($i = 1; $i <= 5; $i++)
                    <div>
                        <label class="block mb-1 font-medium text-gray-700">
                            Brosur {{ $i }} {{ $i == 1 ? '*' : '(opsional)' }}
                        </label>
                        <div
                            class="flex flex-col items-center justify-center px-6 pt-5 pb-6 mt-1 transition-colors border-2 border-gray-300 border-dashed rounded-lg hover:border-green-400">
                            <svg class="w-12 h-12 mx-auto text-gray-400" stroke="currentColor" fill="none"
                                viewBox="0 0 48 48">
                                <path
                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label
                                    class="relative font-medium text-green-600 bg-white rounded-md cursor-pointer hover:text-green-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-green-500">
                                    <span>Upload gambar</span>
                                    <input type="file" name="brosur[]" accept="image/*" class="sr-only"
                                        {{ $i == 1 ? 'required' : '' }}
                                        onchange="previewSelectedImage(event, 'preview-{{ $i }}')">
                                </label>
                                <p class="pl-1">atau drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, JPEG hingga 5MB .</p>
                            <img id="preview-{{ $i }}"
                                class="hidden object-cover w-32 h-32 mt-3 rounded-lg shadow">
                        </div>
                    </div>
                @endfor
            </div>

            <!-- Tombol -->
            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 text-white bg-green-600 rounded-lg hover:bg-green-700">
                    Simpan Program
                </button>
            </div>
        </form>
    </div>
    <!-- Info Card -->
    <div class="p-6 mt-2 border border-blue-200 rounded-lg bg-blue-50">
        <div class="flex items-start">
            <svg class="w-6 h-6 text-blue-600 mt-0.5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <div>
                <h4 class="mb-1 text-sm font-medium text-blue-800">Informasi Penting</h4>
                <p class="text-sm text-blue-700">
                    Pastikan brosur yang diunggah sudah sesuai dan informatif.Program tidak bisa diedit jadi diharuskan data sesuai dan benar. Hapus data untuk pengisian data ulang. Brosur akan ditampilkan pada halaman
                    program di website utama.Upload brosur minimal 1 (satu) buah dan pastikan berurutan sesuai gambar yang akan ditampilkan supaya sesuai.
                </p>
            </div>
        </div>
    </div>

    <!-- Script Preview -->
    <script>
        function previewSelectedImage(event, previewId) {
            const input = event.target;
            const file = input.files[0];
            const preview = document.getElementById(previewId);

            if (file) {
                const reader = new FileReader();
                reader.onload = e => {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
