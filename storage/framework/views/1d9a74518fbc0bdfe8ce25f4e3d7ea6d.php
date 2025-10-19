<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e($berita->judul); ?> - <?php echo e(config('app.name', 'Laravel')); ?></title>
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

    <!-- Konten Utama -->
    <section id="blog-show" class="py-16 ">
        <div class="pt-6 mx-auto bg-gradient-to-r from-green-300 to-blue-600">

            <!-- Header Artikel -->
            <header class="max-w-4xl px-3 py-6 mx-auto mb-10 text-center bg-white">
                <!-- Judul -->
                <h1
                    class="mb-4 text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-black leading-tight text-black font-['Roboto']">
                    <?php echo e($berita->judul); ?>

                </h1>

                <!-- Tanggal publikasi -->
                <p class="text-sm sm:text-base md:text-lg text-gray-600 font-medium font-['Roboto']">
                    Dipublikasikan pada
                    <span class="font-semibold text-gray-800">
                        <?php echo e(\Carbon\Carbon::parse($berita->tanggal_publikasi)->translatedFormat('l, d F Y')); ?>

                    </span>
                </p>
            </header>



            <!-- Gambar Utama -->
            <?php if($berita->gambar): ?>
                <div class="w-full px-6 pb-4 mb-10 overflow-hidden text-center shadow-lg bg-green-50">
                    <img src="<?php echo e(asset('storage/' . $berita->gambar)); ?>" alt="<?php echo e($berita->judul); ?>"
                        class=" w-3/4 max-w-4xl max-h-[480px] mx-auto block">
                </div>
            <?php endif; ?>

            <!-- Konten Artikel -->
            <div class="w-full px-6 pb-4 mb-10 overflow-hidden bg-gray-50">
                <article
                    class="w-full max-w-4xl p-6 mx-auto leading-relaxed prose prose-lg text-black break-words bg-white shadow-xl md:w-1/2 md:p-8">
                    <?php echo nl2br(e($berita->konten)); ?>

                </article>
            </div>


            <!-- Tombol Kembali -->
            <div class="p-6 mt-10 text-center bg-gray-100">
                <a href="<?php echo e(route('berita.index')); ?>"
                    class="inline-block px-6 py-3 font-semibold text-white transition bg-green-600 rounded-lg shadow hover:bg-green-700">
                    ← Kembali ke Daftar Berita
                </a>
            </div>
        </div>
    </section>

    
    <?php echo $__env->make('components.footer-non-landing-page', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

</body>

</html>
<?php /**PATH C:\laragon\www\smpit-bahrul-ulum-sahlaniyah\resources\views/components/blog-show.blade.php ENDPATH**/ ?>