<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About PT Global Data Trans</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 50px auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #007bff;
            font-size: 3rem;
            font-weight: 600;
        }

        p {
            font-size: 1.125rem;
            line-height: 1.8;
            color: #495057;
        }

        .card {
            background-color: #f1f1f1;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card h3 {
            font-size: 1.75rem;
            color: #343a40;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 1rem;
            color: #6c757d;
        }

        /* Navbar Styling */
        .navbar {
            margin-bottom: 30px;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.3rem;
            color: #007bff;
        }

        .navbar-nav .nav-link {
            color: #495057;
            font-size: 1.1rem;
        }

        .navbar-nav .nav-link:hover {
            color: #007bff;
        }

        .navbar-toggler-icon {
            background-color: #007bff;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(route('pelanggan.dashboard')); ?>">HSPHome</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="/pelanggan/dashboard">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/complains">Complain</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/kontak">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" href="<?php echo e(route('profile.edit')); ?>">
                            <i class="bx bx-user me-1"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="nav-link btn btn-link p-0" style="border: none; background: none;">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1>About PT Global Data Trans</h1>

        <p>PT Global Data Trans adalah perusahaan teknologi terkemuka yang fokus pada penyediaan solusi data yang inovatif dan berkualitas tinggi. Kami mengkhususkan diri dalam layanan data management, sistem informasi, dan teknologi jaringan yang mendukung perusahaan dalam menghadapi tantangan digitalisasi di era modern.</p>

        <div class="card">
            <h3>Visi</h3>
            <p>Menjadi perusahaan penyedia solusi data dan teknologi terdepan di Indonesia dengan komitmen untuk memberikan layanan terbaik yang membantu pelanggan mencapai kesuksesan.</p>
        </div>

        <div class="card">
            <h3>Misi</h3>
            <p>Memberikan layanan teknologi yang dapat diandalkan, berfokus pada kualitas dan efisiensi dalam memenuhi kebutuhan data dan solusi teknologi yang terus berkembang di pasar global.</p>
        </div>

        <div class="card">
            <h3>Nilai Perusahaan</h3>
            <p>Integritas, inovasi, dan keberlanjutan adalah nilai inti yang kami anut dalam setiap langkah dan keputusan bisnis kami. Kami selalu berusaha untuk memberikan nilai tambah bagi pelanggan dan mitra kami.</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php /**PATH C:\laragon\www\sistem-pemesanan-dan-pemasangan1\resources\views/pelanggan/about.blade.php ENDPATH**/ ?>