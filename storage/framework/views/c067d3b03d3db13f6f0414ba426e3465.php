

<?php $__env->startSection('title', 'Detail Pesan'); ?>
<?php $__env->startSection('page-title', 'Detail Pesan Kontak'); ?>

<?php $__env->startSection('content'); ?>
    <div class="p-6 bg-white rounded-lg shadow-md">
        <h2 class="mb-4 text-lg font-semibold text-gray-900">Detail Pesan</h2>

        <div class="grid grid-cols-2 gap-6 text-sm">
            <div>
                <p><strong>Nama:</strong> <?php echo e($kontak->nama); ?></p>
                <p class="mt-2"><strong>Telepon:</strong> <?php echo e($kontak->telepon ?? '-'); ?></p>
            </div>
            <div>
                <p><strong>Tanggal:</strong>
                    <?php echo e($kontak->created_at ? $kontak->created_at->format('d M Y H:i') : '-'); ?>

                </p>
            </div>
        </div>

        <div class="mt-4">
            <p><strong>Subjek:</strong></p>
            <p class="text-gray-900"><?php echo e($kontak->subjek); ?></p>
        </div>

        <div class="mt-4">
            <p><strong>Pesan:</strong></p>
            <div class="p-4 mt-1 text-gray-700 bg-gray-100 rounded-lg">
                <?php echo e($kontak->pesan); ?>

            </div>
        </div>

        <div class="flex justify-end mt-6 space-x-2">
            <a href="mailto:<?php echo e($kontak->email); ?>?subject=Re: <?php echo e($kontak->subjek); ?>"
                class="px-4 py-2 text-white bg-green-600 rounded hover:bg-green-700">
                Balas Email
            </a>
            <a href="<?php echo e(route('admin.kontak-masuk.index')); ?>"
                class="px-4 py-2 text-gray-600 bg-gray-200 rounded hover:bg-gray-300">
                Kembali
            </a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\smpit-bahrul-ulum-sahlaniyah\resources\views/admin/kontak/show.blade.php ENDPATH**/ ?>