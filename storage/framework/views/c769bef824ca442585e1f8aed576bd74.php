<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Buat Jadwal Teknisi</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Gaya tambahan agar mobile-friendly -->
    <style>
        .form-label {
            font-weight: bold;
        }
        .back-button {
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 1000;
        }

        @media (max-width: 576px) {
            h2 {
                font-size: 1.25rem;
            }

            .btn {
                font-size: 0.9rem;
                padding: 0.4rem 0.8rem;
            }

            .form-control,
            .form-select {
                font-size: 0.9rem;
            }

            .select2-container .select2-selection--single {
                height: 38px;
                padding: 4px;
                font-size: 0.9rem;
            }

            .select2-container--default .select2-selection--single .select2-selection__rendered {
                line-height: 28px;
            }

            .select2-container--default .select2-selection--single .select2-selection__arrow {
                top: 5px;
            }
        }
    </style>
</head>
<body class="bg-light p-4">

    <!-- Tombol kembali -->
    <a href="/admin/dashboard" class="btn btn-outline-primary rounded-pill shadow-sm d-inline-flex align-items-center back-button">
        <i class="bi bi-arrow-left me-2"></i> Kembali
    </a>

    <div class="container mt-5 pt-4">
        <h2 class="mb-4 text-center">Buat Jadwal Teknisi</h2>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan!</strong>
                <ul class="mb-0">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('admin.teknisi.jadwal.store')); ?>" method="POST" class="shadow-sm p-4 rounded bg-white">
            <?php echo csrf_field(); ?>

            <div class="mb-3">
                <label for="id_teknisi" class="form-label">Teknisi</label>
                <select id="id_teknisi" name="id_teknisi" class="form-select" required>
                    <option value="">Pilih Teknisi</option>
                    <?php $__currentLoopData = $teknisis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teknisi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($teknisi->id); ?>"><?php echo e($teknisi->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

<div class="mb-3">
    <label for="id_pemesanan" class="form-label">Pemesanan</label>
    <select id="id_pemesanan" name="id_pemesanan" class="form-select" required>
        <option value="">Pilih Pemesanan</option>
        <?php $__currentLoopData = $pemesanans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pemesanan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($pemesanan->id); ?>">
                #<?php echo e($pemesanan->id); ?> - 
                <?php echo e($pemesanan->user->name ?? 'Tanpa Nama'); ?> |
                <?php echo e($pemesanan->layanan->nama_layanan ?? '-'); ?> |
                Rp<?php echo e(number_format($pemesanan->layanan->harga ?? 0, 0, ',', '.')); ?> |
                Jadwal: <?php echo e($pemesanan->jadwal_pemasangan ? \Carbon\Carbon::parse($pemesanan->jadwal_pemasangan)->format('Y-m-d') : '-'); ?>

            </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>



            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" class="form-control" required />
            </div>

            <div class="mb-3">
                <label for="waktu" class="form-label">Waktu</label>
                <input type="time" id="waktu" name="waktu" class="form-control" required />
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Simpan Jadwal</button>
                <a href="<?php echo e(route('admin.teknisi.jadwal.index')); ?>" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#id_teknisi').select2({
                placeholder: 'Pilih Teknisi',
                allowClear: true,
                width: '100%'
            });

            $('#id_pemesanan').select2({
                placeholder: 'Pilih Pemesanan',
                allowClear: true,
                width: '100%'
            });
        });
    </script>
</body>
</html>
<?php /**PATH /home/u816639003/domains/ionwifi.site/public_html/resources/views/admin/teknisi/jadwal_create.blade.php ENDPATH**/ ?>