 

<?php $__env->startSection('title', 'Percobaan Login Palsu'); ?>
<?php $__env->startSection('page-title', 'Percobaan Login Palsu'); ?>

<?php $__env->startSection('content'); ?>
<div class="p-6 bg-white rounded-lg shadow">
    <h2 class="mb-4 text-xl font-bold">Berikut Adalah Data Percobaan Login Palsu dari Pihak Luar</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-sm font-medium text-left text-gray-600">IP</th>
                    <th class="px-4 py-2 text-sm font-medium text-left text-gray-600">Email</th>
                    <th class="px-4 py-2 text-sm font-medium text-left text-gray-600">User Agent</th>
                    <th class="px-4 py-2 text-sm font-medium text-left text-gray-600">Tanggal</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php $__empty_1 = true; $__currentLoopData = $logins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $login): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="px-4 py-2 text-sm"><?php echo e($login->ip); ?></td>
                        <td class="px-4 py-2 text-sm"><?php echo e($login->email); ?></td>
                        <td class="px-4 py-2 text-sm"><?php echo e(Str::limit($login->user_agent, 40)); ?></td>
                        <td class="px-4 py-2 text-sm"><?php echo e($login->created_at); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="4" class="px-4 py-2 text-center text-gray-500">Belum ada data</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        <?php echo e($logins->links()); ?> 
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\smpit-bahrul-ulum-sahlaniyah\resources\views/admin/fake-logins/index.blade.php ENDPATH**/ ?>