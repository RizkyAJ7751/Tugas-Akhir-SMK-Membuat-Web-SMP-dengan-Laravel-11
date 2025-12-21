<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMP IT Bahrul Ulum Sahlaniyah - Sekolah Islam Terpadu</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <meta name="description"
        content="SMP IT Bahrul Ulum Sahlaniyah adalah sekolah Islam terpadu yang mengintegrasikan pendidikan akademik berkualitas dengan nilai-nilai Islam.">
    <meta name="keywords"
        content="SMP IT, Sekolah Islam Terpadu, Bahrul Ulum Sahlaniyah, Pendidikan Islam, Sekolah Menengah Pertama">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        html {
            scroll-behavior: smooth;
        }

        /* Custom animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }

        /* Smooth scrolling for anchor links */
        section {
            scroll-margin-top: 80px;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <!-- Navigation -->
    @include('components.navbar')

    <!-- Hero Section -->
    @include('components.hero')

    <!-- About Section -->
    {{-- @include('components.about') --}}

    <!-- Teachers Section -->
    @include('components.teachers', ['kepalaSekolah' => $kepalaSekolah, 'gurus' => $gurus])

    <!-- Programs Section -->
    {{-- @include('components.programs') --}}

    <!-- Blog Section -->
    @include('components.blog', ['beritas' => $beritas ?? collect()])


    <!-- Contact Section -->
    {{-- @include('components.contact') --}}

    <!-- Footer -->
    @include('components.footer')

    <!-- Scroll to Top Button -->
    <button id="scrollToTop"
        class="fixed invisible p-3 text-white transition duration-300 rounded-full shadow-lg opacity-0 bottom-8 right-8 bg-secondary hover:bg-green-700">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
        </svg>
    </button>

    <script>
        // Scroll to top functionality
        const scrollToTopBtn = document.getElementById('scrollToTop');

        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                scrollToTopBtn.classList.remove('opacity-0', 'invisible');
                scrollToTopBtn.classList.add('opacity-100', 'visible');
            } else {
                scrollToTopBtn.classList.add('opacity-0', 'invisible');
                scrollToTopBtn.classList.remove('opacity-100', 'visible');
            }
        });

        scrollToTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in-up');
                }
            });
        }, observerOptions);

        // Observe sections for animations
        document.querySelectorAll('section').forEach(section => {
            observer.observe(section);
        });
    </script>
</body>

</html>
