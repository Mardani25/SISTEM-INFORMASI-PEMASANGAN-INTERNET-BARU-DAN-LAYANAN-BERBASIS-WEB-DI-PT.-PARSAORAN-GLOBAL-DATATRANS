<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Komplain</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Penting untuk Mobile -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<!-- Tombol Kembali -->
<a href="/admin/dashboard" class="btn btn-outline-primary rounded-pill px-4 py-2 shadow-sm d-inline-flex align-items-center mt-4 ms-4">
    <i class="bi bi-arrow-left me-2"></i> Kembali ke Dashboard
</a>

<div class="container mt-4">
    <h2 class="text-primary">Daftar Komplain Pelanggan</h2>

    <?php if(session('success')): ?>
        <div class="alert alert-success mt-2"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <?php if($complains->isEmpty()): ?>
        <p class="mt-3">Tidak ada komplain.</p>
    <?php else: ?>
        <div class="table-responsive mt-3">
            <table class="table table-bordered table-sm align-middle">
                <thead class="table-light">
                    <tr>
                        <th style="min-width: 120px;">Pelanggan</th>
                        <th style="min-width: 200px;">Pesan</th>
                        <th style="min-width: 200px;">Tanggapan</th>
                        <th style="min-width: 150px;">Waktu</th>
                        <th style="min-width: 200px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $complains; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $complain): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="align-top">
                            <td><?php echo e($complain->pelanggan->user->name ?? 'Tidak Diketahui'); ?></td>
                            <td><?php echo e($complain->pesan); ?></td>
                            <td>
                                <?php if($complain->tanggapan): ?>
                                    <?php echo e($complain->tanggapan); ?>

                                <?php else: ?>
                                    <em class="text-muted">Belum ditanggapi</em>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($complain->created_at->format('d M Y H:i')); ?></td>
                            <td>
                                <?php if(!$complain->tanggapan): ?>
                                    <form action="<?php echo e(route('admin.complain.tanggapi', $complain->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <textarea name="tanggapan" class="form-control form-control-sm mb-1" rows="2" placeholder="Tulis tanggapan..." required></textarea>
                                        <button type="submit" class="btn btn-sm btn-success w-100">Kirim</button>
                                    </form>
                                <?php else: ?>
                                    <span class="text-success">Sudah ditanggapi</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-3">
            <?php echo e($complains->links('pagination::bootstrap-5')); ?>

        </div>
    <?php endif; ?>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\laragon\www\sistem-pemesanan-dan-pemasangan1\resources\views/admin/komplain.blade.php ENDPATH**/ ?>