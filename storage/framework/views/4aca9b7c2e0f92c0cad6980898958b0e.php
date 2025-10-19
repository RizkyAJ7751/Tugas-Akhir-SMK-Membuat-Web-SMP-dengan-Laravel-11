<nav id="navbar" class="fixed top-0 z-50 w-full transition-all duration-300 shadow-lg bg-gradient-green">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Logo dan Nama Sekolah -->
            <div class="flex items-center space-x-4">
                <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo SMP IT Bahrul Ulum Sahlaniyah"
                    class="object-contain w-12 h-12">
                <div class="flex flex-col">
                    <span class="text-lg font-bold leading-tight text-white">SMP IT Bahrul Ulum Sahlaniyah</span>
                    <span class="text-sm text-green-100">Krian - Sidoarjo</span>
                </div>
            </div>

            <!-- Desktop Navigation -->
            <div class="items-center hidden space-x-1 md:flex">
                <a href="#home"
                    class="px-4 py-2 text-base font-medium text-white transition-all duration-300 rounded-lg hover:text-green-100 hover:bg-white/10 hover:scale-105 hover:shadow-md">
                    Beranda
                </a>
                <a href="/about"
                    class="px-4 py-2 text-base font-medium text-white transition-all duration-300 rounded-lg hover:text-green-100 hover:bg-white/10 hover:scale-105 hover:shadow-md">
                    Tentang
                </a>
                <a href="#teachers"
                    class="px-4 py-2 text-base font-medium text-white transition-all duration-300 rounded-lg hover:text-green-100 hover:bg-white/10 hover:scale-105 hover:shadow-md">
                    Kenali Guru
                </a>
                <a href="/programs"
                    class="px-4 py-2 text-base font-medium text-white transition-all duration-300 rounded-lg hover:text-green-100 hover:bg-white/10 hover:scale-105 hover:shadow-md">
                    Program
                </a>
                <a href="#blog"
                    class="px-4 py-2 text-base font-medium text-white transition-all duration-300 rounded-lg hover:text-green-100 hover:bg-white/10 hover:scale-105 hover:shadow-md">
                    Berita
                </a>
                <a href="/contact"
                    class="px-4 py-2 text-base font-medium text-white transition-all duration-300 rounded-lg hover:text-green-100 hover:bg-white/10 hover:scale-105 hover:shadow-md">
                    Kontak
                </a>
            </div>
            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button type="button"
                    class="text-white transition-colors duration-300 hover:text-green-100 focus:outline-none focus:text-green-100"
                    id="mobile-menu-button">
                    <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div class="hidden border-t md:hidden bg-gradient-green-hover border-white/20" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="#home"
                class="block px-3 py-3 text-base font-medium text-white transition-all duration-300 rounded-md hover:text-green-100 hover:bg-white/10">
                Beranda
            </a>
            <a href="/about"
                class="block px-3 py-3 text-base font-medium text-white transition-all duration-300 rounded-md hover:text-green-100 hover:bg-white/10">
                Tentang
            </a>
            <a href="#teachers"
                class="block px-3 py-3 text-base font-medium text-white transition-all duration-300 rounded-md hover:text-green-100 hover:bg-white/10">
                Kenali Guru
            </a>
            <a href="/programs"
                class="block px-3 py-3 text-base font-medium text-white transition-all duration-300 rounded-md hover:text-green-100 hover:bg-white/10">
                Program
            </a>
            <a href="#blog"
                class="block px-3 py-3 text-base font-medium text-white transition-all duration-300 rounded-md hover:text-green-100 hover:bg-white/10">
                Berita
            </a>
            <a href="/contact"
                class="block px-3 py-3 text-base font-medium text-white transition-all duration-300 rounded-md hover:text-green-100 hover:bg-white/10">
                Kontak
            </a>
        </div>
    </div>
</nav>

<script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    });

    // Navbar scroll effect dengan kondisi 630px

    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('nav');
        if (window.scrollY > 630) {
            navbar.classList.remove('backdrop-blur-md', 'bg-gradient-green/95');
            navbar.classList.add('bg-gradient-green');
        } else if (window.scrollY > 50) {
            navbar.classList.add('backdrop-blur-md', 'bg-gradient-green/95');
            navbar.classList.remove('bg-gradient-green');
        } else {
            navbar.classList.remove('backdrop-blur-md', 'bg-gradient-green/95');
            navbar.classList.add('bg-gradient-green');
        }
    });
</script>
<?php /**PATH C:\laragon\www\smpit-bahrul-ulum-sahlaniyah\resources\views/components/navbar.blade.php ENDPATH**/ ?>