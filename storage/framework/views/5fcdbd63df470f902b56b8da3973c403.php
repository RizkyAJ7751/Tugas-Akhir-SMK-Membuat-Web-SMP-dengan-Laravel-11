<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - SMP IT Bahrul Ulum Sahlaniyah</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <link rel="icon" type="image/png" href="<?php echo e(asset('upload/20230419_121535.png')); ?>">
</head>

<body class="min-h-screen bg-gradient-to-br from-green-50 via-white to-green-100">
    <div class="flex items-center justify-center min-h-screen px-4 py-12 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div class="text-center">
                <img class="w-auto h-20 mx-auto" src="<?php echo e(asset('upload/20230419_121535.png')); ?>"
                    alt="Logo SMP IT Bahrul Ulum Sahlaniyah">
                <h2 class="mt-6 text-3xl font-bold text-gray-900">
                    Admin Dashboard
                </h2>
                <p class="mt-2 text-sm text-gray-600">
                    SMP IT Bahrul Ulum Sahlaniyah
                </p>
            </div>

            <?php if($errors->any()): ?>
                <div class="p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50" role="alert">
                    <div class="flex">
                        <svg class="flex-shrink-0 w-5 h-5 text-red-700" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10c0 4.418-3.582 8-8 8s-8-3.582-8-8 3.582-8 8-8 8 3.582 8 8zm-9-3a1 1 0 112 0v4a1 1 0 11-2 0V7zm1 8a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <div class="ml-3">
                            <span class="font-semibold">Login gagal!</span>
                            <ul class="mt-1.5 list-disc list-inside text-red-700">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="p-8 bg-white border border-gray-100 shadow-lg rounded-xl">
                <form class="space-y-6" action="<?php echo e(url('/')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <!-- Email -->
                    <div class="relative">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email Address</label>
                        <div class="relative">
                            <input id="email" name="email" type="email" required
                                class="w-full px-4 py-3 pr-10 transition-colors border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                placeholder="Masukkan Email">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <!-- Ikon @ -->
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="relative">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Password</label>
                        <div class="relative">
                            <input id="password" name="password" type="password" required
                                class="w-full px-4 py-3 pr-10 transition-colors border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                placeholder="Masukkan Password">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <!-- Ikon gembok -->
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input id="remember_me" name="remember" type="checkbox"
                            class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                        <label for="remember_me" class="ml-2 text-sm text-gray-700">Ingat saya</label>
                    </div>

                    <!-- Submit -->
                    <button type="submit"
                        class="flex justify-center w-full px-4 py-3 text-sm font-medium text-white transition-all duration-200 transform border border-transparent rounded-lg shadow-sm bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 hover:scale-105">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013 3v1">
                            </path>
                        </svg>
                        Masuk ke Dashboard
                    </button>
                </form>
            </div>



            <div class="text-center">
                <p class="text-xs text-gray-500">© <?php echo e(date('Y')); ?> SMP IT Bahrul Ulum Sahlaniyah. All rights
                    reserved.</p>
            </div>
        </div>
    </div>
</body>

</html>
<?php /**PATH C:\laragon\www\smpit-bahrul-ulum-sahlaniyah\resources\views/auth/Log-in.blade.php ENDPATH**/ ?>