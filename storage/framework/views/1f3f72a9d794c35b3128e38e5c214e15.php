<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <a href="/dashboard" class="btn btn-outline-primary mb-4">
        ← Kembali ke Dashboard
    </a>

    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Form Pemesanan - <?php echo e($layanan->nama_layanan); ?></h4>
        </div>

        <div class="card-body">
            <?php if(session('success')): ?> 
                <div class="alert alert-success text-center">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('pemesanan.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <input type="hidden" name="id_layanan" value="<?php echo e($layanan->id); ?>">
                <input type="hidden" name="status" value="pending">

                <!-- Nama Pengguna -->
                <div class="mb-3">
                    <label for="nama_user" class="form-label">Nama Pengguna</label>
                    <input type="text" id="nama_user" class="form-control" value="<?php echo e(Auth::user()->name); ?>" readonly>
                    <input type="hidden" name="id_user" value="<?php echo e(Auth::id()); ?>">
                </div>

                <!-- Jadwal Pemasangan -->
                <div class="mb-3">
                    <label for="jadwal_pemasangan" class="form-label">Jadwal Pemasangan</label>
                    <input type="date" name="jadwal_pemasangan" id="jadwal_pemasangan" class="form-control" required>
                </div>

                <!-- Keterangan -->
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan (Opsional)</label>
                    <textarea name="keterangan" id="keterangan" class="form-control" rows="4"></textarea>
                </div>

                <button type="submit" class="btn btn-success w-100">Simpan Pemesanan</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
<?php /**PATH C:\laragon\www\sistem-pemesanan-dan-pemasangan1\resources\views/pemesanan/create.blade.php ENDPATH**/ ?>