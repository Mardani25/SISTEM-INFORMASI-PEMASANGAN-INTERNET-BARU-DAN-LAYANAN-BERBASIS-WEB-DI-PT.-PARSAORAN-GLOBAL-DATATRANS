<h1>Pembayaran Berhasil</h1>
<p>Terima kasih, pembayaran Anda berhasil diproses.</p>

<h3>Riwayat Pembayaran Anda:</h3>
<ul>
<?php $__currentLoopData = $pembayarans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pembayaran): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li><?php echo e($pembayaran->tanggal_bayar); ?> - Rp<?php echo e(number_format($pembayaran->jumlah)); ?> - Status: <?php echo e($pembayaran->status_pembayaran); ?></li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH C:\laragon\www\sistem-pemesanan-dan-pemasangan1\resources\views/pembayaran/berhasil.blade.php ENDPATH**/ ?>