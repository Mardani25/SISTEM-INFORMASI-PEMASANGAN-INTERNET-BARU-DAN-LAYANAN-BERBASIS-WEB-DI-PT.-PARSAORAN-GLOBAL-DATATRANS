<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Komplain Pelanggan</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        h2 {
            color: #007bff;
            font-size: 2.5rem;
            font-weight: 600;
            text-align: center;
            margin-bottom: 20px;
        }

        h3 {
            color: #343a40;
            font-size: 1.75rem;
            margin-top: 30px;
        }

        .form-group label {
            font-weight: bold;
            font-size: 1.1rem;
        }

        .complain-card {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            margin-top: 15px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        .complain-card p {
            font-size: 1rem;
            color: #495057;
        }

        .alert {
            border-radius: 5px;
            font-size: 1.1rem;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .back-btn {
            margin: 20px;
        }
    </style>
</head>

<body>
    <!-- Tombol Kembali ke Dashboard -->
    <div class="back-btn">
        <a href="/pelanggan/dashboard" class="btn btn-outline-primary rounded-pill px-4 py-2 shadow-sm d-inline-flex align-items-center">
            <i class="bi bi-arrow-left me-2"></i>
            Kembali ke Dashboard
        </a>
    </div>

    <div class="container mt-4">
        <h2>Daftar Komplain Anda</h2>

        <!-- Flash messages -->
        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <?php if(session('error')): ?>
            <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
        <?php endif; ?>

        <!-- Form Komplain -->
        <form action="<?php echo e(route('complain.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="pesan">Pesan Komplain</label>
                <textarea id="pesan" name="pesan" class="form-control" rows="4" required placeholder="Tuliskan komplain Anda..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Kirim Komplain</button>
        </form>

        <hr>

        <!-- Daftar Komplain -->
        <h3>Komplain yang Telah Diajukan</h3>

        <?php $__empty_1 = true; $__currentLoopData = $complains; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $complain): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="complain-card">
                <p><strong>Pesan:</strong> <?php echo e($complain->pesan); ?></p>
                <?php if($complain->tanggapan): ?>
                    <p><strong>Tanggapan Admin:</strong> <?php echo e($complain->tanggapan); ?></p>
                <?php else: ?>
                    <p><strong>Status:</strong> Menunggu Tanggapan</p>
                <?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-muted mt-3">Belum ada komplain yang diajukan.</p>
        <?php endif; ?>

        <!-- Pagination -->
        <div class="mt-4">
            <?php echo e($complains->links()); ?>

        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php /**PATH /home/u816639003/domains/ionwifi.site/public_html/resources/views/pelanggan/komplain.blade.php ENDPATH**/ ?>