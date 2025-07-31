<!DOCTYPE html>
<html lang="id">
<head>
    <?php echo $__env->make('teknisi.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Teknisi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container py-4">
        <!-- Tombol Kembali -->
        <a href="/teknisi/dashboard" class="btn btn-outline-primary rounded-pill px-4 py-2 shadow-sm d-inline-flex align-items-center mb-3">
            <i class="bi bi-arrow-left me-2"></i> Kembali ke Dashboard
        </a>

        <!-- Judul -->
        <h2 class="mb-4">📅 Jadwal Tugas Teknisi - 
            <?php echo e(\Carbon\Carbon::parse($tanggal)->translatedFormat('l, d F Y')); ?>

        </h2>

        <!-- Form Filter Tanggal -->
        <form method="GET" action="<?php echo e(route('teknisi.jadwal')); ?>" class="mb-4">
            <label for="tanggal">Pilih Tanggal:</label>
            <input type="date" name="tanggal" id="tanggal" value="<?php echo e($tanggal); ?>" class="form-control" onchange="this.form.submit()">
        </form>

        <!-- Tabel Jadwal -->
        <?php if($jadwals->isEmpty()): ?>
            <div class="alert alert-info">Tidak ada jadwal tugas untuk tanggal ini.</div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Waktu</th>
                            <th>Pelanggan</th>
                            <th>Layanan</th>
                            <th>Keterangan</th>
                            <th>Status Kehadiran</th>
                            <th>Foto Bukti</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $jadwals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jadwal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($jadwal->waktu); ?></td>
                                <td><?php echo e($jadwal->pemesanan->pelanggan->user->name ?? '-'); ?></td>
                                <td><?php echo e($jadwal->pemesanan->layanan->nama_layanan ?? '-'); ?></td>
                                <td><?php echo e($jadwal->pemesanan->keterangan ?? '-'); ?></td>
                                
                                <!-- Status Kehadiran -->
                                <td>
                                    <form action="<?php echo e(route('teknisi.updateKehadiran', $jadwal->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>
                                        <select name="status_kehadiran" class="form-control form-control-sm" onchange="this.form.submit()">
                                            <option value="belum_hadir" <?php echo e($jadwal->status_kehadiran == 'belum_hadir' ? 'selected' : ''); ?>>
                                                Belum Hadir
                                            </option>
                                            <option value="hadir" <?php echo e($jadwal->status_kehadiran == 'hadir' ? 'selected' : ''); ?>>
                                                Hadir / Selesai
                                            </option>
                                        </select>
                                    </form>
                                </td>

                                <!-- Upload/Lihat Bukti -->
                                <td>
                                    <?php if($jadwal->status_kehadiran == 'hadir' && !$jadwal->bukti_foto): ?>
                                        <form action="<?php echo e(route('teknisi.uploadBukti', $jadwal->id)); ?>" method="POST" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <div class="mb-2">
                                                <input type="file" name="bukti_foto" class="form-control form-control-sm" required>
                                            </div>
                                            <button type="submit" class="btn btn-sm btn-primary">Upload Foto</button>
                                        </form>
                                    <?php elseif($jadwal->bukti_foto): ?>
                                        <a href="<?php echo e(asset('storage/bukti_foto/' . $jadwal->bukti_foto)); ?>" target="_blank" class="btn btn-outline-info btn-sm">
                                            Lihat Bukti
                                        </a>
                                    <?php else: ?>
                                        <span class="text-muted">Belum ada</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
<?php /**PATH C:\laragon\www\sistem-pemesanan-dan-pemasangan1\resources\views/teknisi/jadwal.blade.php ENDPATH**/ ?>