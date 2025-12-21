<!-- Script -->
<script src="https://cdn.tailwindcss.com"></script>

@extends('layouts.admin')

@section('title', 'Edit Statistik')
@section('page-title', 'Edit Statistik Sekolah')

@section('content')
    <div class="space-y-6">
        <!-- Back Button -->
        <div class="flex items-center">
            <a href="{{ route('admin.stats.index') }}"
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
                <h3 class="text-lg font-semibold text-gray-900">Edit Data Statistik</h3>
                <p class="mt-1 text-sm text-gray-600">Perbarui data statistik yang akan ditampilkan di website</p>
            </div>

            <form method="POST" action="{{ route('admin.stats.update', $stats->id) }}" class="p-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <!-- Siswa Aktif -->
                    <div>
                        <label for="siswa_aktif" class="block mb-2 text-sm font-medium text-gray-700">
                            <svg class="inline w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z">
                                </path>
                            </svg>
                            Siswa Aktif
                        </label>
                        <input type="number" name="siswa_aktif" id="siswa_aktif"
                            value="{{ old('siswa_aktif', $stats->siswa_aktif) }}" min="0"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors @error('siswa_aktif') border-red-500 @enderror"
                            placeholder="Contoh: 250">
                        @error('siswa_aktif')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Jumlah siswa yang aktif saat ini</p>
                    </div>

                    <!-- Tenaga Pengajar -->
                    <div>
                        <label for="tenaga_pengajar" class="block mb-2 text-sm font-medium text-gray-700">
                            <svg class="inline w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Tenaga Pengajar
                        </label>
                        <input type="number" name="tenaga_pengajar" id="tenaga_pengajar"
                            value="{{ \App\Models\Guru::count() }}" min="0"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors @error('tenaga_pengajar') border-red-500 @enderror"
                            placeholder="Contoh: 25">
                        @error('tenaga_pengajar')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Jumlah guru dan staff pengajar</p>
                    </div>

                    <!-- Tahun Berdiri -->
                    <div>
                        <label for="tahun_berdiri" class="block mb-2 text-sm font-medium text-gray-700">
                            <svg class="inline w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            Tahun Berdiri
                        </label>
                        <input type="number" name="tahun_berdiri" id="tahun_berdiri"
                            value="{{ old('tahun_berdiri', $stats->tahun_berdiri) }}" min="1900"
                            max="{{ date('Y') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors @error('tahun_berdiri') border-red-500 @enderror"
                            placeholder="Contoh: 2010">
                        @error('tahun_berdiri')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Tahun sekolah didirikan</p>
                    </div>

                    <!-- Akreditasi -->
                    <div>
                        <label for="akreditasi" class="block mb-2 text-sm font-medium text-gray-700">
                            <svg class="inline w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                </path>
                            </svg>
                            Akreditasi
                        </label>
                        <select name="akreditasi" id="akreditasi"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors @error('akreditasi') border-red-500 @enderror">
                            <option value="">Pilih Akreditasi</option>
                            <option value="A" {{ old('akreditasi', $stats->akreditasi) == 'A' ? 'selected' : '' }}>A
                                (Sangat Baik)</option>
                            <option value="B" {{ old('akreditasi', $stats->akreditasi) == 'B' ? 'selected' : '' }}>B
                                (Baik)</option>
                            <option value="C" {{ old('akreditasi', $stats->akreditasi) == 'C' ? 'selected' : '' }}>C
                                (Cukup)</option>
                            <option value="Belum Terakreditasi"
                                {{ old('akreditasi', $stats->akreditasi) == 'Belum Terakreditasi' ? 'selected' : '' }}>
                                Belum Terakreditasi</option>
                        </select>
                        @error('akreditasi')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Status akreditasi sekolah dari BAN-S/M</p>
                    </div>
                </div>

                <!-- Preview Section -->
                <div class="p-4 mt-8 rounded-lg bg-gray-50">
                    <h4 class="mb-3 text-sm font-medium text-gray-700">Preview Tampilan di Website:</h4>
                    <div class="grid grid-cols-2 gap-4 text-center md:grid-cols-4">
                        <div class="p-3 bg-white rounded">
                            <div class="text-lg font-bold text-green-600" id="preview-siswa">
                                {{ $stats->siswa_aktif ?? '0' }}</div>
                            <div class="text-xs text-gray-600">Siswa Aktif</div>
                        </div>
                        <div class="p-3 bg-white rounded">
                            <div class="text-lg font-bold text-green-600" id="preview-pengajar">
                                {{ $stats->tenaga_pengajar ?? '0' }}</div>
                            <div class="text-xs text-gray-600">Tenaga Pengajar</div>
                        </div>
                        <div class="p-3 bg-white rounded">
                            <div class="text-lg font-bold text-green-600" id="preview-tahun">
                                {{ $stats->tahun_berdiri ?? '0' }}</div>
                            <div class="text-xs text-gray-600">Tahun Berdiri</div>
                        </div>
                        <div class="p-3 bg-white rounded">
                            <div class="text-lg font-bold text-green-600" id="preview-akreditasi">
                                {{ $stats->akreditasi ?? '-' }}</div>
                            <div class="text-xs text-gray-600">Akreditasi</div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-end pt-6 mt-8 space-x-3 border-t border-gray-200">
                    <a href="{{ route('admin.stats.index') }}"
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
        // Live preview update
        document.addEventListener('DOMContentLoaded', function() {
            const siswaInput = document.getElementById('siswa_aktif');
            const pengajarInput = document.getElementById('tenaga_pengajar');
            const tahunInput = document.getElementById('tahun_berdiri');
            const akreditasiInput = document.getElementById('akreditasi');

            const previewSiswa = document.getElementById('preview-siswa');
            const previewPengajar = document.getElementById('preview-pengajar');
            const previewTahun = document.getElementById('preview-tahun');
            const previewAkreditasi = document.getElementById('preview-akreditasi');

            siswaInput.addEventListener('input', function() {
                previewSiswa.textContent = (this.value || '0');
            });

            pengajarInput.addEventListener('input', function() {
                previewPengajar.textContent = (this.value || '0');
            });

            tahunInput.addEventListener('input', function() {
                previewTahun.textContent = this.value || '0';
            });

            akreditasiInput.addEventListener('change', function() {
                previewAkreditasi.textContent = this.value || '-';
            });
        });
    </script>
@endsection
