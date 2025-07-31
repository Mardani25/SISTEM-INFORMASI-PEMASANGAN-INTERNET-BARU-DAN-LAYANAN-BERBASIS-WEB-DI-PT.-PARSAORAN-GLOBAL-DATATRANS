<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="text-center">Riwayat Pembayaran</h1>

    <!-- Tampilkan pesan jika tidak ada riwayat pembayaran -->
    <?php if($pembayaran->isEmpty()): ?>
        <div class="alert alert-warning">
            Belum ada pembayaran yang berhasil.
        </div>
    <?php else: ?>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nomor Pemesanan</th>
                    <th>Layanan</th>
                    <th>Jumlah Pembayaran</th>
                    <th>Status Pembayaran</th>
                    <th>Tanggal Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $pembayaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($index + 1); ?></td>
                    <td><?php echo e('ORDER-' . $p->id_pemesanan); ?></td>
                    <td><?php echo e(optional($p->pemesanan->layanan)->nama_layanan ?? 'Layanan tidak ditemukan'); ?></td>
                    <td>Rp <?php echo e(number_format($p->jumlah, 0, ',', '.')); ?></td>
                    <td>
                        <?php if($p->status_pembayaran == 'settlement'): ?>
                            <span class="badge bg-success">Berhasil</span>
                        <?php else: ?>
                            <span class="badge bg-danger">Gagal</span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($p->tanggal_bayar->format('d-m-Y ')); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            </tbody>
        </table>
    <?php endif; ?>

    <div class="text-center mt-4">
        <a href="<?php echo e(route('pelanggan.dashboard')); ?>" class="btn btn-primary">Kembali ke Beranda</a>
    </div>
</div>

</body>
</html>
<?php /**PATH C:\laragon\www\sistem-pemesanan-dan-pemasangan1\resources\views/riwayat.blade.php ENDPATH**/ ?>