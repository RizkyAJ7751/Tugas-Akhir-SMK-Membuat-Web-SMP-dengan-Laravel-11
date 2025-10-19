<?php $__env->startSection('title', 'Kelola Kepala Sekolah'); ?>
<?php $__env->startSection('page-title', 'Kepala Sekolah'); ?>

<?php $__env->startSection('content'); ?>
    <div class="space-y-6">
        <!-- Header Card -->
        <div class="p-6 bg-white rounded-lg shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Data Kepala Sekolah</h3>
                    <p class="mt-1 text-gray-600">Kelola informasi kepala sekolah yang ditampilkan di website</p>
                </div>
                <div class="flex items-center space-x-2">
                    <!-- Tombol Tambah/Edit -->
                    <a href="<?php echo e($kepalaSekolah
                        ? route('admin.kepala-sekolah.edit', $kepalaSekolah->id)
                        : route('admin.kepala-sekolah.create')); ?>"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white transition-colors bg-green-600 border border-transparent rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <?php if($kepalaSekolah): ?>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            <?php else: ?>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            <?php endif; ?>
                        </svg>
                        <?php echo e($kepalaSekolah ? 'Edit Data' : 'Tambah Data'); ?>

                    </a>

                    <!-- Tombol Hapus (hanya muncul kalau data ada) -->
                    <?php if($kepalaSekolah): ?>
                        <form action="<?php echo e(route('admin.kepala-sekolah.destroy', $kepalaSekolah->id)); ?>" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus data kepala sekolah?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white transition-colors bg-red-600 border border-transparent rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Hapus
                            </button>
                        </form>
                    <?php endif; ?>
                    <?php if($kepalaSekolah): ?>
                        <p></p>
                    <?php else: ?>
                        <p class="ml-2">Belum ada data kepala sekolah</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <?php if($kepalaSekolah): ?>
            <!-- Profile Card -->
            <div class="overflow-hidden bg-white rounded-lg shadow-md">
                <div class="px-6 py-8 bg-gradient-to-r from-green-600 to-green-700">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <?php if($kepalaSekolah->foto): ?>
                                <img src="<?php echo e(asset('storage/' . $kepalaSekolah->foto)); ?>" alt="Foto Kepala Sekolah"
                                    class="object-cover w-24 h-24 border-4 border-white rounded-full shadow-lg">
                            <?php else: ?>
                                <div
                                    class="flex items-center justify-center w-24 h-24 bg-white border-4 border-white rounded-full shadow-lg">
                                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="ml-6 text-white">
                            <h2 class="text-2xl font-bold"><?php echo e($kepalaSekolah->nama); ?></h2>
                            <?php if($kepalaSekolah->gelar): ?>
                                <p class="text-lg text-green-100"><?php echo e($kepalaSekolah->gelar); ?></p>
                            <?php endif; ?>
                            <div class="flex items-center mt-2">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?php echo e($kepalaSekolah->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'); ?>">
                                    <svg class="w-2 h-2 mr-1" fill="currentColor" viewBox="0 0 8 8">
                                        <circle cx="4" cy="4" r="3" />
                                    </svg>
                                    <?php echo e($kepalaSekolah->is_active ? 'Aktif' : 'Tidak Aktif'); ?>

                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="px-6 py-6">
                    <h4 class="mb-3 text-lg font-semibold text-gray-900">Sambutan Kepala Sekolah</h4>
                    <div class="prose text-gray-700 max-w-none">
                        <?php if($kepalaSekolah->sambutan): ?>
                            <?php echo nl2br(e($kepalaSekolah->sambutan)); ?>

                        <?php else: ?>
                            <p class="italic text-gray-500">Belum ada sambutan yang ditambahkan.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Preview Section -->
            <div class="p-6 bg-white rounded-lg shadow-md">
                <h4 class="mb-4 text-lg font-semibold text-gray-900">Preview Tampilan Website</h4>
                <div class="p-6 rounded-lg bg-gray-50">
                    <div class="text-center">
                        <h5 class="mb-4 text-sm font-medium text-gray-600">Bagaimana data ini akan tampil di section "Kenali
                            Guru":</h5>
                        <div class="max-w-md p-6 mx-auto bg-white rounded-lg shadow-sm">
                            <?php if($kepalaSekolah->foto): ?>
                                <img src="<?php echo e(asset('storage/' . $kepalaSekolah->foto)); ?>" alt="Foto Kepala Sekolah"
                                    class="object-cover w-20 h-20 mx-auto mb-4 rounded-full">
                            <?php else: ?>
                                <div
                                    class="flex items-center justify-center w-20 h-20 mx-auto mb-4 bg-gray-200 rounded-full">
                                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                            <?php endif; ?>
                            <h6 class="font-semibold text-gray-900"><?php echo e($kepalaSekolah->nama); ?></h6>
                            <p class="mt-1 text-xs font-medium text-green-600">Kepala Sekolah</p>
                            <?php if($kepalaSekolah->sambutan): ?>
                                <p class="mt-2 text-xs text-gray-600 line-clamp-3">
                                    <?php echo e(Str::limit($kepalaSekolah->sambutan, 100)); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <!-- Empty State -->
            <div class="p-12 bg-white rounded-lg shadow-md">
                <div class="text-center">
                    <svg class="w-16 h-16 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <h3 class="mb-2 text-lg font-semibold text-gray-900">Belum Ada Data Kepala Sekolah</h3>
                    <p class="mb-6 text-gray-600">Tambahkan informasi kepala sekolah untuk ditampilkan di website</p>
                    <a href="<?php echo e(route('admin.kepala-sekolah.create')); ?>"
                        class="inline-flex items-center px-6 py-3 text-sm font-medium text-white transition-colors bg-green-600 border border-transparent rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Tambah Data Kepala Sekolah
                    </a>
                </div>
            </div>
        <?php endif; ?>

        <!-- Info Card -->
        <div class="p-6 border border-blue-200 rounded-lg bg-blue-50">
            <div class="flex items-start">
                <svg class="w-6 h-6 text-blue-600 mt-0.5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <div>
                    <h4 class="mb-1 text-sm font-medium text-blue-800">Informasi Penting</h4>
                    <p class="text-sm text-blue-700">
                        Data kepala sekolah akan ditampilkan di section "Kenali Guru" pada website utama.
                        Sambutan kepala sekolah akan menjadi bagian utama dari section tersebut.
                        Pastikan foto ukuran 1:1 yang diupload berkualitas baik dan sambutan ditulis dengan menarik.
                    </p>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\smpit-bahrul-ulum-sahlaniyah\resources\views/admin/kepala_sekolah/index.blade.php ENDPATH**/ ?>