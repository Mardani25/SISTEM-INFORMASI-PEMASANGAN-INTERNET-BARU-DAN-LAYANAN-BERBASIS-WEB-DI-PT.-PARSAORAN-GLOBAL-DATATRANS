<h1>Riwayat Pembayaran</h1>
<table border="1">
    <tr>
        <th>Layanan</th>
        <th>Jumlah</th>
        <th>Status</th>
        <th>Tanggal Bayar</th>
    </tr>
    <?php $__empty_1 = true; $__currentLoopData = $pembayarans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pembayaran): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <td><?php echo e($pembayaran->pemesanan->layanan->nama_layanan ?? '-'); ?></td>
            <td>Rp<?php echo e(number_format($pembayaran->jumlah, 0, ',', '.')); ?></td>
            <td><?php echo e($pembayaran->status_pembayaran); ?></td>
            <td><?php echo e($pembayaran->tanggal_bayar); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
            <td colspan="4">Belum ada pembayaran.</td>
        </tr>
    <?php endif; ?>
</table>
<?php /**PATH C:\laragon\www\sistem-pemesanan-dan-pemasangan1\resources\views/pembayaran/riwayatbayar.blade.php ENDPATH**/ ?>