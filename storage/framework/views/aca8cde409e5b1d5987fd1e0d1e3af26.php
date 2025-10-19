<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Tentang Kami - SMP Sahlaniyah</title>
    <link rel="icon" type="image/png" href="<?php echo e(asset('images/logo.png')); ?>">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="">
        
    <?php echo $__env->make('components.navbar-non-landing-page', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<section id="about" class="py-20 bg-white">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="grid items-center grid-cols-1 gap-12 lg:grid-cols-2">
            <!-- Text Content -->
            <div>
                <h2 class="mb-6 text-3xl font-bold text-gray-900 md:text-4xl">
                    Tentang <span class="text-secondary">SMP IT Bahrul Ulum Sahlaniyah</span>
                </h2>
                <p class="mb-6 text-lg leading-relaxed text-gray-600">
                    SMP IT Bahrul Ulum Sahlaniyah adalah sekolah Islam terpadu yang berkomitmen untuk memberikan pendidikan berkualitas tinggi dengan mengintegrasikan nilai-nilai Islam dalam setiap aspek pembelajaran.
                </p>
                <p class="mb-8 leading-relaxed text-gray-600">
                    Dengan tenaga pengajar yang profesional dan berpengalaman, kami berusaha membentuk generasi yang tidak hanya cerdas secara akademik, tetapi juga memiliki akhlak mulia dan karakter yang kuat sesuai dengan ajaran Islam.
                </p>
            </div>

            <!-- Visual Content -->
            <div class="relative">
                <div class="p-8 bg-secondary rounded-2xl">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="p-6 text-center bg-white rounded-xl">
                            <div class="flex items-center justify-center w-12 h-12 mx-auto mb-3 rounded-full bg-secondary">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                </svg>
                            </div>
                            <h4 class="mb-1 font-semibold text-gray-900">Inovasi</h4>
                            <p class="text-sm text-gray-600">Metode pembelajaran modern</p>
                        </div>
                        <div class="p-6 text-center bg-white rounded-xl">
                            <div class="flex items-center justify-center w-12 h-12 mx-auto mb-3 rounded-full bg-secondary">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </div>
                            <h4 class="mb-1 font-semibold text-gray-900">Kasih Sayang</h4>
                            <p class="text-sm text-gray-600">Lingkungan yang penuh perhatian</p>
                        </div>
                        <div class="p-6 text-center bg-white rounded-xl">
                            <div class="flex items-center justify-center w-12 h-12 mx-auto mb-3 rounded-full bg-secondary">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <h4 class="mb-1 font-semibold text-gray-900">Prestasi</h4>
                            <p class="text-sm text-gray-600">Pencapaian akademik tinggi</p>
                        </div>
                        <div class="p-6 text-center bg-white rounded-xl">
                            <div class="flex items-center justify-center w-12 h-12 mx-auto mb-3 rounded-full bg-secondary">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <h4 class="mb-1 font-semibold text-gray-900">Komunitas</h4>
                            <p class="text-sm text-gray-600">Keluarga besar sekolah</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    
    <?php echo $__env->make('components.footer-non-landing-page', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>
</html>

<?php /**PATH C:\laragon\www\smpit-bahrul-ulum-sahlaniyah\resources\views/components/about.blade.php ENDPATH**/ ?>