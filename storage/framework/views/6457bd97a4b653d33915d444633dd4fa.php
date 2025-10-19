<?php $__env->startSection('title', 'Kontak Masuk'); ?>
<?php $__env->startSection('page-title', 'Pesan Kontak Masuk'); ?>

<?php $__env->startSection('content'); ?>
    <div class="space-y-6">
        <!-- Header -->
        <div class="p-6 bg-white rounded-lg shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Daftar Pesan Kontak</h3>
                    <p class="mt-1 text-gray-600">Kelola pesan yang masuk melalui form kontak website</p>
                </div>
                <span class="inline-flex items-center px-3 py-1 text-sm font-medium text-blue-800 bg-blue-100 rounded-full">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <?php echo e($kontaks->count()); ?> Pesan
                </span>
            </div>
        </div>

        <?php if($kontaks->count() > 0): ?>
            <!-- Tabel -->
            <div class="overflow-hidden bg-white rounded-lg shadow-md">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Pengirim</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Subjek & Pesan</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Tanggal</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php $__currentLoopData = $kontaks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kontak): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 w-10 h-10">
                                                <div
                                                    class="flex items-center justify-center w-10 h-10 rounded-full bg-gradient-to-r from-green-400 to-green-600">
                                                    <span
                                                        class="text-sm font-medium text-white"><?php echo e(strtoupper(substr($kontak->nama, 0, 1))); ?></span>
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900"><?php echo e($kontak->nama); ?></div>
                                                <div class="text-sm text-gray-500"><?php echo e($kontak->email); ?></div>
                                                <?php if($kontak->telepon): ?>
                                                    <div class="text-xs text-gray-400"><?php echo e($kontak->telepon); ?></div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="max-w-xs text-sm font-medium text-gray-900 truncate">
                                            <?php echo e($kontak->subjek); ?></div>
                                        <div class="max-w-xs text-sm text-gray-500 truncate">
                                            <?php echo e(Str::limit($kontak->pesan, 80)); ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900"><?php echo e($kontak->created_at->format('d M Y')); ?></div>
                                        <div class="text-xs text-gray-500"><?php echo e($kontak->created_at->format('H:i')); ?></div>
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                                        <div class="flex items-center space-x-2">
                                            <!-- Tombol Lihat -->
                                            <a href="<?php echo e(route('admin.kontak-masuk.show', $kontak->id)); ?>"
                                                class="text-blue-600 hover:text-blue-900" title="Lihat Pesan">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>

                                            <!-- Tombol Hapus -->
                                            <form action="<?php echo e(route('admin.kontak-masuk.destroy', $kontak->id)); ?>"
                                                method="POST" class="inline-block"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?');">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="text-red-600 hover:text-red-900"
                                                    title="Hapus Pesan">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            <?php if($kontaks->hasPages()): ?>
                <div
                    class="flex items-center justify-between px-4 py-3 bg-white border-t border-gray-200 rounded-lg shadow-md sm:px-6">
                    <?php echo e($kontaks->links()); ?>

                </div>
            <?php endif; ?>
        <?php else: ?>
            <!-- Empty -->
            <div class="p-12 bg-white rounded-lg shadow-md">
                <div class="text-center">
                    <svg class="w-16 h-16 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <h3 class="mb-2 text-lg font-semibold text-gray-900">Belum Ada Pesan Kontak</h3>
                    <p class="mb-6 text-gray-600">Pesan dari form kontak akan muncul di sini.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\smpit-bahrul-ulum-sahlaniyah\resources\views/admin/kontak/index.blade.php ENDPATH**/ ?>