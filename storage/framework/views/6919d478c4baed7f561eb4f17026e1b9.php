<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manajemen Teknisi</title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        @media (max-width: 576px) {
            input.form-control {
                font-size: 14px;
                padding: 8px;
            }
            button.btn {
                font-size: 14px;
                padding: 6px 12px;
            }
        }
    </style>
</head>
<body class="bg-light text-dark">
    <div class="container py-5 px-3 px-md-5">

        <!-- Header & Tombol Kembali -->
        <div class="d-flex justify-content-between align-items-center mb-4 flex-column flex-md-row text-center text-md-start">
            <h2 class="text-primary mb-3 mb-md-0">Manajemen Data Teknisi</h2>
            <a href="/admin/dashboard" class="btn btn-outline-primary rounded-pill px-4">
                <i class="bi bi-arrow-left me-2"></i>Kembali ke Dashboard
            </a>
        </div>

        <!-- Notifikasi -->
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <!-- Form Tambah Teknisi -->
        <div class="card mb-5">
            <div class="card-header bg-primary text-white">Tambah Teknisi Baru</div>
            <div class="card-body">
                <form action="<?php echo e(route('teknisi.store')); ?>" method="POST" class="row g-3">
                    <?php echo csrf_field(); ?>
                    <div class="col-md-6">
                        <input type="text" name="name" class="form-control" placeholder="Nama" required>
                    </div>
                    <div class="col-md-6">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="col-md-6">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="col-md-6">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="telepon" class="form-control" placeholder="Telepon">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="alamat" class="form-control" placeholder="Alamat">
                    </div>
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary">Tambah Teknisi</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tabel Teknisi -->
        <div class="card">
            <div class="card-header bg-secondary text-white">Daftar Teknisi</div>
            <div class="card-body table-responsive">
<table class="table table-bordered table-sm align-middle">
    <thead class="table-light">
        <tr>
            <th style="min-width: 120px;">Nama</th>
            <th style="min-width: 150px;">Email</th>
            <th style="min-width: 100px;">Telepon</th>
            <th style="min-width: 150px;">Alamat</th>
            <th class="text-center" style="min-width: 120px;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $teknisis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="align-top">
            <td>
                <form action="<?php echo e(route('teknisi.update', $user->id)); ?>" method="POST" class="d-flex flex-column gap-2">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <input type="text" name="name" value="<?php echo e($user->name); ?>" class="form-control form-control-sm" required>
            </td>
            <td>
                    <input type="email" name="email" value="<?php echo e($user->email); ?>" class="form-control form-control-sm" required>
            </td>
            <td>
                    <input type="text" name="telepon" value="<?php echo e($user->telepon); ?>" class="form-control form-control-sm">
            </td>
            <td>
                    <input type="text" name="alamat" value="<?php echo e($user->alamat); ?>" class="form-control form-control-sm">
            </td>
            <td class="text-center">
            <div class="d-flex flex-column gap-1">
                    <button type="submit" class="btn btn-warning btn-sm w-100">Update</button>
                </form>
                <form action="<?php echo e(route('teknisi.destroy', $user->id)); ?>" method="POST" onsubmit="return confirm('Yakin ingin menghapus teknisi ini?')">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger btn-sm w-100">Hapus</button>
                </form>
                </div>
            </td>

        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>


                <!-- Paginasi -->
                <div class="mt-3">
                    <?php echo e($teknisis->appends(request()->query())->links('pagination::bootstrap-5')); ?>

                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH /home/u816639003/domains/ionwifi.site/public_html/resources/views/admin/teknisi/index.blade.php ENDPATH**/ ?>