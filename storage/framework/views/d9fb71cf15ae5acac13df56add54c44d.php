<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Program Unggulan - SMP Sahlaniyah</title>
    <link rel="icon" type="image/png" href="<?php echo e(asset('images/logo.png')); ?>">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="antialiased">
    <?php echo $__env->make('components.navbar-non-landing-page', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php
        // Ambil program utama (first) dari collection $programs yang dikirim controller.
        $mainProgram = isset($programs) && $programs->isNotEmpty() ? $programs->first() : null;
        // Pastikan brosur jadi array
        $mainBrosurs = $mainProgram
            ? (is_array($mainProgram->brosur)
                ? $mainProgram->brosur
                : json_decode($mainProgram->brosur ?? '[]', true))
            : [];
    ?>

    <!-- Header umum -->
    <?php if($mainProgram): ?>
        <div class="px-4 py-8 mt-6 text-center bg-gray-50">
            <h2 class="mb-3 text-3xl font-bold text-gray-900 md:text-4xl">
                <?php echo e($mainProgram->title); ?>

            </h2>
            <p class="max-w-3xl mx-auto text-base leading-relaxed text-gray-600 break-words md:text-lg">
                <?php echo e($mainProgram->description); ?>

            </p>
            <span class="inline-block px-4 py-1 mt-3 text-sm font-semibold text-white rounded-full bg-secondary">
                Gelombang <?php echo e($mainProgram->gelombang); ?>

            </span>
        </div>
    <?php endif; ?>

    <!-- Brosur (full width images dengan space dari tepi) -->
    <?php if($mainProgram && !empty($mainBrosurs)): ?>
        <div class="max-w-6xl px-4 py-8 mx-auto space-y-8">
            <?php $__currentLoopData = $mainBrosurs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brosur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="overflow-hidden rounded-lg shadow-md">
                    <img src="<?php echo e(asset('storage/' . $brosur)); ?>" alt="<?php echo e($mainProgram->title); ?>"
                        class="object-cover w-full h-full transition-transform duration-300 ease-in-out transform hover:scale-102.5 sm:w-max-[95vw]">
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>


    
    <?php echo $__env->make('components.footer-non-landing-page', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>

</html>
<?php /**PATH C:\laragon\www\smpit-bahrul-ulum-sahlaniyah\resources\views/components/programs.blade.php ENDPATH**/ ?>