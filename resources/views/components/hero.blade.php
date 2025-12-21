<!-- Script -->
<script src="https://cdn.tailwindcss.com"></script>

<section id="home" class="relative flex items-center justify-center min-h-screen py-4 overflow-hidden">
    <!-- Background Image dengan Overlay -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/school-front.jpg') }}" alt="SMP IT Bahrul Ulum Sahlaniyah"
            class="object-cover w-full h-full">
        <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/30"></div>
    </div>

    <!-- Floating Elements -->
    <div class="absolute w-20 h-20 rounded-full top-20 left-10 bg-white/10 blur-xl animate-pulse"></div>
    <div class="absolute w-32 h-32 delay-1000 rounded-full bottom-32 right-16 bg-secondary/20 blur-2xl animate-pulse">
    </div>
    <div class="absolute w-16 h-16 delay-500 rounded-full top-1/3 right-1/4 bg-white/5 blur-lg animate-pulse"></div>

    <!-- Content -->
    <div class="relative z-10 px-4 pt-20 mx-auto text-center max-w-7xl sm:px-6 lg:px-8">
        <div class="space-y-8 animate-fade-in-up">
            <!-- Logo Besar -->
            <div class="flex justify-center mb-8">
                <img src="{{ asset('images/logo.png') }}" alt="Logo SMP IT Bahrul Ulum Sahlaniyah"
                    class="object-contain w-24 h-24 md:h-32 md:w-32 drop-shadow-2xl animate-float">
            </div>

            <!-- Main Heading -->
            <div class="space-y-4">
                <h1 class="text-4xl font-bold leading-tight text-white md:text-6xl lg:text-7xl">
                    Selamat Datang
                    <span class="block text-transparent bg-green-500 bg-clip-text">
                        di SMP IT Bahrul Ulum Sahlaniyah
                    </span>
                </h1>
                <p class="text-xl font-medium text-green-100 md:text-2xl">
                    Krian - Sidoarjo, Jawa Timur
                </p>
            </div>

            <!-- Description -->
            <div class="max-w-4xl mx-auto space-y-6">
                <p class="text-lg leading-relaxed text-gray-200 md:text-xl">
                    Sekolah Islam Terpadu yang mengintegrasikan pendidikan akademik berkualitas dengan nilai-nilai Islam
                    untuk membentuk generasi yang berakhlak mulia dan berprestasi.
                </p>

                <div class="grid grid-cols-2 gap-6 mt-12 md:grid-cols-4">
                    <div
                        class="p-6 transition-all duration-300 border bg-white/10 backdrop-blur-sm rounded-xl border-white/20 hover:bg-white/20 hover:scale-105">
                        <div class="mb-2 text-3xl font-bold text-white md:text-4xl">
                            {{ $stats->siswa_aktif ?? '-' }}
                        </div>
                        <div class="text-sm text-green-100 md:text-base">Siswa Aktif</div>
                    </div>
                    <div
                        class="p-6 transition-all duration-300 border bg-white/10 backdrop-blur-sm rounded-xl border-white/20 hover:bg-white/20 hover:scale-105">
                        <div class="mb-2 text-3xl font-bold text-white md:text-4xl">
                            {{ $stats->tenaga_pengajar ?? '-' }}
                        </div>
                        <div class="text-sm text-green-100 md:text-base">Tenaga Pengajar</div>
                    </div>
                    <div
                        class="p-6 transition-all duration-300 border bg-white/10 backdrop-blur-sm rounded-xl border-white/20 hover:bg-white/20 hover:scale-105">
                        <div class="mb-2 text-3xl font-bold text-white md:text-4xl">
                            {{ $stats->tahun_berdiri ?? '-' }}
                        </div>
                        <div class="text-sm text-green-100 md:text-base">Tahun Berdiri</div>
                    </div>
                    <div
                        class="p-6 transition-all duration-300 border bg-white/10 backdrop-blur-sm rounded-xl border-white/20 hover:bg-white/20 hover:scale-105">
                        <div class="mb-2 text-3xl font-bold text-white md:text-4xl">
                            {{ $stats->akreditasi ?? '-' }}
                        </div>
                        <div class="text-sm text-green-100 md:text-base">Akreditasi</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute z-10 transform -translate-x-1/2 bottom-8 left-1/2">
        <div class="animate-bounce">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3">
                </path>
            </svg>
        </div>
    </div>
</section>

<style>
    @keyframes fade-in-up {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-10px);
        }
    }

    .animate-fade-in-up {
        animation: fade-in-up 1s ease-out;
    }

    .animate-float {
        animation: float 3s ease-in-out infinite;
    }
</style>
