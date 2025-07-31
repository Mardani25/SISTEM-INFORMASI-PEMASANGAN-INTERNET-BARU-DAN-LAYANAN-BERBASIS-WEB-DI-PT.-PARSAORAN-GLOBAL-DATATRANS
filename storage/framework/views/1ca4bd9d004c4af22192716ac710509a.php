<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        h1 {
            font-size: 2.5rem;
            color: #007bff;
            margin-top: 2rem;
            text-align: center;
        }

        h3 {
            color: #333;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table th, .table td {
            text-align: center;
            padding: 12px;
        }

        .btn-outline-primary {
            margin-top: 20px;
            margin-left: 20px;
            font-weight: bold;
        }

        .btn-outline-primary:hover {
            background-color: #007bff;
            color: white;
        }

        .status-change {
            border: 1px solid #ccc;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .form-update {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .action-buttons .btn {
            margin-top: 5px;
            width: 100%;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
            font-weight: bold;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .table-responsive {
            margin-top: 20px;
        }

        footer {
            text-align: center;
            margin-top: 30px;
            font-size: 0.9rem;
            color: #6c757d;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <h1>Data Pemesanan</h1>

        <a href="/admin/dashboard" class="btn btn-outline-primary rounded-pill px-4 py-2 shadow-sm d-inline-flex align-items-center mt-4 ms-4">
            <i class="bi bi-arrow-left me-2"></i>
            Kembali ke Dashboard
        </a>

        <h3 class="mt-4">Daftar Pemesanan</h3>
<div class="card mt-4">
    <div class="card-header bg-secondary text-white">Daftar Pemesanan</div>
    <div class="card-body table-responsive">
        <table class="table table-bordered table-sm align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nama Pelanggan</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th>Layanan</th>
                    <th>Harga</th>
                    <th>Jadwal</th>
                    <th>Keterangan</th>
                    <th>Status Bayar</th>
                    <th>Status Pesanan</th>
                    <th class="text-center" style="min-width: 180px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $pembayaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($p->id); ?></td>
                    <td><?php echo e($p->pemesanan->user->name ?? 'Tidak Tersedia'); ?></td>
                    <td><?php echo e($p->pemesanan->user->telepon ?? '-'); ?></td>
                    <td><?php echo e($p->pemesanan->user->alamat ?? '-'); ?></td>
                    <td><?php echo e($p->pemesanan->layanan->nama_layanan ?? '-'); ?></td>
                    <td>Rp <?php echo e(number_format($p->pemesanan->layanan->harga ?? 0, 0, ',', '.')); ?></td>
                    <td><?php echo e($p->pemesanan->jadwal_pemasangan ? \Carbon\Carbon::parse($p->pemesanan->jadwal_pemasangan)->format('Y-m-d') : '-'); ?></td>
                    <td><?php echo e($p->pemesanan->keterangan ?? '-'); ?></td>
                    <td>
                        <?php if($p->status_pembayaran == 'settlement'): ?>
                            <span class="badge bg-success">Berhasil</span>
                        <?php else: ?>
                            <span class="badge bg-danger">Gagal</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <span class="badge 
                            <?php echo e($p->pemesanan->status == 'pending' ? 'bg-secondary' : 
                               ($p->pemesanan->status == 'confirmed' ? 'bg-warning' : 
                               ($p->pemesanan->status == 'canceled' ? 'bg-danger' : 'bg-success'))); ?>">
                            <?php echo e(ucfirst($p->pemesanan->status)); ?>

                        </span>
                    </td>
                    <td class="text-center">
                        <div class="d-flex flex-column gap-1">
                            <form action="<?php echo e(route('pemesanan.updateStatus', ['id' => $p->pemesanan->id])); ?>" method="POST" class="d-flex flex-column gap-1">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <select name="status" class="form-select form-select-sm">
                                    <option value="pending" <?php echo e($p->pemesanan->status == 'pending' ? 'selected' : ''); ?>>Pending</option>
                                    <option value="confirmed" <?php echo e($p->pemesanan->status == 'confirmed' ? 'selected' : ''); ?>>Confirmed</option>
                                    <option value="canceled" <?php echo e($p->pemesanan->status == 'canceled' ? 'selected' : ''); ?>>Canceled</option>
                                    <option value="completed" <?php echo e($p->pemesanan->status == 'completed' ? 'selected' : ''); ?>>Completed</option>
                                </select>
                                <button type="submit" class="btn btn-primary btn-sm w-100">Update</button>
                            </form>
                            <form action="<?php echo e(route('pemesanan.destroy', $p->pemesanan->id)); ?>" method="POST" onsubmit="return confirm('Yakin ingin menghapus pemesanan ini?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm w-100">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="11" class="text-center">Belum ada data pemesanan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

    </div>

    <footer>
        <p>&copy; 2025 Pemesanan System. All rights reserved.</p>
    </footer>
</body>
</html>
<?php /**PATH C:\laragon\www\sistem-pemesanan-dan-pemasangan1\resources\views/pemesanan/index.blade.php ENDPATH**/ ?>