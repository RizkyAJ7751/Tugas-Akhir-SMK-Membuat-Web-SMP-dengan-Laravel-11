<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Berita - <?php echo e(config('app.name', 'Laravel')); ?></title>
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
                    Daftar <span class="text-green-700">Berita Terbaru</span>
                </h1>
                <p class="max-w-2xl mx-auto text-lg text-gray-600">
                    Ikuti perkembangan terbaru dan kegiatan-kegiatan menarik di
                    <span class="font-semibold text-green-700">SMP IT Bahrul Ulum Sahlaniyah</span>.
                </p>
            </div>

            <!-- Grid daftar berita -->
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                <?php $__empty_1 = true; $__currentLoopData = $beritas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $berita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <article
                        class="flex flex-col overflow-hidden transition duration-300 bg-white shadow-lg rounded-xl hover:shadow-xl">
                        <div class="h-48 bg-gray-200">
                            <?php if($berita->gambar_url): ?>
                                <img src="<?php echo e($berita->gambar_url); ?>" alt="<?php echo e($berita->judul); ?>"
                                    class="object-cover w-full h-full">
                            <?php else: ?>
                                <div class="flex items-center justify-center h-full bg-secondary">
                                    <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7" />
                                    </svg>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="flex flex-col flex-1 p-6">
                            <div class="flex items-center mb-3 text-sm text-gray-500">
                                <span><?php echo e($berita->tanggal_publikasi->format('d M Y')); ?></span>
                                <span class="mx-2">•</span>
                                <span>Artikel</span>
                            </div>
                            <h3
                                class="mb-3 text-xl font-bold text-gray-900 transition duration-300 hover:text-secondary">
                                <a href="<?php echo e(route('berita.show', $berita->slug)); ?>"><?php echo e($berita->judul); ?></a>
                            </h3>
                            <p class="flex-1 mb-4 text-gray-600">
                                <?php echo e($berita->konten_singkat); ?>

                            </p>
                            <a href="<?php echo e(route('berita.show', $berita->slug)); ?>"
                                class="mt-auto font-semibold transition duration-300 text-secondary hover:text-green-700">
                                Baca Selengkapnya →
                            </a>
                        </div>
                    </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <!-- Placeholder (kalau belum ada berita di DB) -->
                    <div class="col-span-3 italic text-center text-gray-500">
                        Belum ada berita yang tersedia.
                    </div>
                <?php endif; ?>
            </div>



            <!-- Pagination -->
            <div class="mt-12">
                <?php echo e($beritas->links()); ?>

            </div>
        </div>
    </section>

    <?php echo $__env->make('components.footer-non-landing-page', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

</body>

</html>
<?php /**PATH C:\laragon\www\smpit-bahrul-ulum-sahlaniyah\resources\views/components/blog-index.blade.php ENDPATH**/ ?>