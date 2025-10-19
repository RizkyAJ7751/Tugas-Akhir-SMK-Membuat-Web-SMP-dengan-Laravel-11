@extends('layouts.admin')

@section('title', 'Tambah Kepala Sekolah')
@section('page-title', 'Tambah Kepala Sekolah')

@section('content')
    <div class="space-y-6">
        <!-- Header Card -->
        <div class="p-6 bg-white rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-gray-900">Tambah Data Kepala Sekolah</h3>
            <p class="mt-1 text-gray-600">Isi form di bawah untuk menambahkan kepala sekolah baru yang akan ditampilkan di
                website</p>
        </div>

        <!-- Form Card -->
        <div class="p-6 bg-white rounded-lg shadow-md">
            @if ($errors->any())
                <div class="p-4 mb-4 text-sm text-red-800 bg-red-100 border border-red-200 rounded-lg">
                    <ul class="pl-5 list-disc">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.kepala-sekolah.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-4">
                @csrf
                <div>
                    <label class="block mb-1 font-medium text-gray-700">Nama & Gelar</label>
                    <input type="text" name="nama"
                        class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none"
                        placeholder="Contoh : Siti Aminah S.Ag" required>
                </div>

                {{-- Sambutann --}}
                <div>
                    <label class="block mb-1 font-medium text-gray-700">Sambutan</label>
                    <textarea name="sambutan" rows="5"
                        class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none"
                        placeholder="Sambutan Kepala Sekolah" required></textarea>
                </div>

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
                                <input id="foto" name="foto" type="file" class="sr-only" accept="image/*"
                                    onchange="previewImage(this)">
                            </label>
                            <p class="pl-1">atau drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG, JPEG hingga 2MB</p>
                    </div>
                </div>

                <!-- Image Preview -->
                <div id="imagePreview" class="hidden mt-4 ">
                    <p class="mb-2 text-sm text-gray-600">Preview foto baru:</p>
                    <img id="previewImg" class="object-cover w-32 h-32 border border-gray-200 rounded-lg">
                </div>

                @error('foto')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
        </div>

        <div class="flex items-center justify-end mt-4 space-x-3">
            <a href="{{ route('admin.kepala-sekolah.index') }}"
                class="px-4 py-2 text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300">Batal</a>
            <button type="submit" class="px-4 py-2 text-white bg-green-600 rounded-lg hover:bg-green-700">Simpan</button>
        </div>
        </form>
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
                    Pastikan foto berkualitas baik juga usahakan berukuran 1:1 dan sambutan ditulis dengan menarik. Data
                    yang ditambahkan akan
                    muncul di section "Kenali Guru" di website utama.
                </p>
            </div>
        </div>
    </div>
    </div>

    <script>
        // Image preview function
        function previewImage(input) {
            const preview = document.getElementById('imagePreview');
            const previewImg = document.getElementById('previewImg');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    preview.classList.remove('hidden');
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
