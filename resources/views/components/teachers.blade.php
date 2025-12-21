<!-- Script -->
<script src="https://cdn.tailwindcss.com"></script>

<section id="teachers" class="py-20 bg-gray-50">
    <div class="px-4 py-6 mx-auto bg-gray-100 max-w-7xl sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="mb-16 text-center">
            <h2 class="mb-4 text-3xl font-bold text-gray-900 md:text-4xl">
                Kenali <span class="text-secondary">Guru Kami</span>
            </h2>
            <p class="max-w-3xl mx-auto text-lg text-gray-600">
                Tim pengajar profesional dan berpengalaman yang siap membimbing siswa menuju kesuksesan
            </p>
        </div>

        <!-- Sambutan Kepala Sekolah -->
        <div class="p-8 mb-12 bg-white shadow-lg rounded-2xl">
            <div class="grid items-center grid-cols-1 gap-8 lg:grid-cols-3">
                <!-- Foto & Nama -->
                <div class="text-center lg:col-span-1">
                    <div class="relative inline-block">
                        <img id="kepala-sekolah-foto"
                            src="{{ $kepalaSekolah && $kepalaSekolah->foto ? asset('storage/' . $kepalaSekolah->foto) : asset('images/default-avatar.jpg') }}"
                            alt="Kepala Sekolah" class="object-cover w-48 h-48 mx-auto rounded-full shadow-lg">
                        <div class="absolute p-3 text-white rounded-full -bottom-2 -right-2 bg-secondary">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477
                            3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477
                            4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746
                            0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18
                            16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <h3 id="kepala-sekolah-nama" class="mt-4 mb-2 text-xl font-bold text-gray-900">
                        {{ $kepalaSekolah->nama ?? '-' }}
                    </h3>
                    <p class="font-semibold text-secondary">Kepala Sekolah</p>
                </div>
                <!-- Sambutan -->
                <div class="lg:col-span-2">
                    <h4 class="mb-4 text-2xl font-bold text-gray-900">Sambutan Kepala Sekolah</h4>
                    <div id="kepala-sekolah-sambutan" class="space-y-4 leading-relaxed text-gray-600">
                        {!! nl2br(e ($kepalaSekolah->sambutan ?? 'Sambutan kepala sekolah akan dimuat dari dashboard admin.') )!!}
                    </div>
                </div>
            </div>
        </div>

        <!-- Grid Guru -->
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3" id="daftar-guru">
            @forelse($gurus as $guru)
            <!-- Guru Card (1:1 Aspect Ratio with Hover Overlay) -->
                    <div class="relative overflow-hidden shadow-lg rounded-xl group aspect-square">
                        <!-- Image -->
                        <img src="{{ $guru->foto ? asset('storage/' . $guru->foto) : asset('images/default.png') }}"
                            alt="{{ $guru->nama }}"
                            class="absolute inset-0 object-cover w-full h-full transition duration-300 group-hover:scale-105">

                        <!-- Overlay (Information on Hover) -->
                        <div
                            class="absolute inset-0 flex flex-col items-center justify-center p-4 text-white transition-all duration-300 bg-black opacity-0 bg-opacity-70 group-hover:opacity-100">
                            <h3 class="mb-2 text-lg font-bold text-center">{{ $guru->nama }}</h3>
                            <p class="mb-1 text-sm font-semibold text-center">{{ $guru->bidang ?? '-' }}</p>
                            <p class="text-xs text-center">{{ $guru->jabatan ?? '-' }}</p>
                        </div>
                    </div>

            @empty
                <!-- Placeholder (kalau tidak ada guru di DB) -->
                <div class="p-6 text-center bg-white shadow-lg rounded-xl">
                    <div class="flex items-center justify-center w-24 h-24 mx-auto mb-4 bg-gray-200 rounded-full">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-lg font-bold text-gray-900">Data guru akan dimuat</h3>
                    <p class="mb-2 font-semibold text-secondary">dari dashboard admin</p>
                    <p class="text-sm text-gray-600">Bidang studi akan ditampilkan di sini</p>
                </div>
            @endforelse
        </div>
            <div class="mt-12 text-center">
                <a href="{{ route('teachers.index') }}"
                    class="inline-block px-8 py-3 font-semibold text-white transition duration-300 rounded-lg bg-secondary hover:bg-green-700">
                    Lihat Semua Guru
                </a>
            </div>
    </div>
</section>
