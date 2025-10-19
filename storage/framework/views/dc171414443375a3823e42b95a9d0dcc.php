<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Daftar Guru - SMP Sahlaniyah</title>
    <link rel="icon" type="image/png" href="<?php echo e(asset('images/logo.png')); ?>">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="bg-gradient-to-r from-blue-100 to-pink-100">

    <?php echo $__env->make('components.navbar-non-landing-page', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Konten Utama -->
    <section id="blog-index" class="py-20">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">

            <!-- Judul Halaman -->
            <div class="mb-12 text-center">
                <h1 class="mb-4 text-3xl font-bold text-gray-900 md:text-4xl">
                    Daftar <span class="text-green-700"> Guru</span>
                </h1>
                <p class="max-w-2xl mx-auto text-lg text-gray-600">
                    Ikuti perkembangan terbaru dan kegiatan-kegiatan menarik di
                    <span class="font-semibold text-green-700">SMP IT Bahrul Ulum Sahlaniyah</span>.
                </p>
            </div>

                    <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3" id="daftar-guru">
            <?php $__empty_1 = true; $__currentLoopData = $gurus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $guru): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <!-- Guru Card -->
                <div
                    class="p-6 text-center transition-all duration-300 bg-white shadow-lg rounded-xl hover:shadow-xl hover:scale-105">
                    <div
                        class="flex items-center justify-center w-24 h-24 mx-auto mb-4 overflow-hidden bg-gray-200 rounded-full">
                        <img src="<?php echo e($guru->foto ? asset('storage/'.$guru->foto) : asset('images/default.png')); ?>" alt="<?php echo e($guru->nama); ?>" class="object-cover w-full h-full">
                    </div>
                    <h3 class="mb-2 text-lg font-bold text-gray-900"><?php echo e($guru->nama); ?></h3>
                    <p class="mb-2 font-semibold text-secondary"><?php echo e($guru->bidang ?? '-'); ?></p>
                    <p class="text-sm text-gray-600"><?php echo e($guru->jabatan ?? '-'); ?></p>
                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
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
            <?php endif; ?>
        </div>

            <!-- Pagination -->
            <div class="mt-12">
                <?php echo e($gurus->links()); ?>

            </div>
        </div>
    </section>

    <?php echo $__env->make('components.footer-non-landing-page', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

</body>

</html>
<?php /**PATH C:\laragon\www\smpit-bahrul-ulum-sahlaniyah\resources\views/components/teacher-index.blade.php ENDPATH**/ ?>