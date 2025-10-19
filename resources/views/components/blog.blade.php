<section id="blog" class="py-20 bg-gray-50">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="mb-16 text-center">
            <h2 class="mb-4 text-3xl font-bold text-gray-900 md:text-4xl">
                Berita & <span class="text-secondary">Artikel</span>
            </h2>
            <p class="max-w-2xl mx-auto text-lg text-gray-600">
                Ikuti perkembangan terbaru dan kegiatan-kegiatan menarik di SMP IT Bahrul Ulum Sahlaniyah
            </p>
        </div>

        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            @forelse($beritas as $berita)
                <article
                    class="flex flex-col overflow-hidden transition duration-300 bg-white shadow-lg rounded-xl hover:shadow-xl hover:z-10">
                    <div class="h-48 bg-gray-200">
                        @if ($berita->gambar_url)
                            <img src="{{ $berita->gambar_url }}" alt="{{ $berita->judul }}"
                                class="object-cover w-full h-full">
                        @else
                            <div class="flex items-center justify-center h-full bg-secondary">
                                <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7" />
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div class="flex flex-col flex-1 p-6">
                        <div class="flex items-center mb-3 text-sm text-gray-500">
                            <span>{{ $berita->tanggal_publikasi->format('d M Y') }}</span>
                            <span class="mx-2">•</span>
                            <span>Artikel</span>
                        </div>
                        <h3 class="mb-3 text-xl font-bold text-gray-900 transition duration-300 hover:text-secondary">
                            <a href="{{ route('berita.show', $berita->slug) }}">{{ $berita->judul }}</a>
                        </h3>
                        <p class="flex-1 mb-4 text-gray-600">
                            {{ $berita->konten_singkat }}
                        </p>
                        <a href="{{ route('berita.show', $berita->slug) }}"
                            class="mt-auto font-semibold transition duration-300 text-secondary hover:text-green-700">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </article>
            @empty
                <!-- Placeholder (kalau belum ada berita di DB) -->
                <div class="col-span-3 italic text-center text-gray-500">
                    Belum ada berita yang tersedia.
                </div>
            @endforelse
        </div>

        @if ($beritas->count() > 0)
            <div class="mt-12 text-center">
                <a href="{{ route('berita.index') }}"
                    class="inline-block px-8 py-3 font-semibold text-white transition duration-300 rounded-lg bg-secondary hover:bg-green-700">
                    Lihat Semua Artikel
                </a>
            </div>
        @endif
    </div>
</section>
