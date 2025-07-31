<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Biznet Home Clone</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
 <style>
  
    /* ===== Hero Section ===== */
    .hero,
    .hero-wrap {
      background: linear-gradient(to right, #4a00e0, #8e2de2);
      color: white;
      min-height: 100vh;
      padding: 80px 0;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
    }

    .hero-wrap .container {
      padding-top: 0;
    }

    .hero-wrap .row {
      width: 100%;
      display: flex;
      justify-content: flex-start;
      align-items: center;
    }

    @media (max-width: 768px) {
      .hero,
      .hero-wrap {
        min-height: 80vh;
        padding-top: 30px;
      }

      .hero-wrap .container {
        padding-top: 40px;
      }
    }

    /* ===== Navbar ===== */
    .navbar-brand {
      font-weight: bold;
      letter-spacing: 1px;
      font-size: 1.4rem;
    }

    .navbar-dark .navbar-nav .nav-link {
      font-weight: 500;
      transition: color 0.3s ease;
    }

    .navbar-dark .navbar-nav .nav-link:hover {
      color: #00d4ff;
    }

    @media (max-width: 768px) {
      .navbar-brand {
        font-size: 1.2rem;
      }
    }

    /* ===== Button Style ===== */
    .btn-primary {
      background-color: #007bff;
      border: none;
      border-radius: 30px;
      padding: 10px 25px;
      transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #0056b3;
    }

    @media (max-width: 768px) {
      .btn-primary {
        padding: 8px 20px;
        font-size: 0.9rem;
      }
    }

    /* ===== Package Card ===== */
    .package-card {
      border: none;
      border-radius: 16px;
      padding: 30px;
      background: #fff;
      transition: all 0.4s ease-in-out;
      box-shadow: 0 0 0 rgba(0, 0, 0, 0);
    }

    .package-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
    }

    /* ===== Department Section ===== */
    .department-wrap {
      background: #f8f9fa;
      border-radius: 16px;
      transition: all 0.3s ease-in-out;
    }

    .department-wrap:hover {
      background: #ffffff;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
      transform: translateY(-3px);
    }

    .icon span {
      font-size: 3rem;
      color: #8e2de2;
    }

    h2 span {
      color: #8e2de2;
    }

    .list-unstyled li {
      font-size: 16px;
      color: #333;
      font-weight: 500;
    }

    /* ===== Scrollable Card Section ===== */
    .scroll-container {
      overflow-x: auto;
      scroll-snap-type: x mandatory;
      -webkit-overflow-scrolling: touch;
    }

    .scroll-row {
      display: flex;
      gap: 1rem;
      padding-bottom: 1rem;
    }

    .scroll-card {
      flex: 0 0 calc(33.333% - 1rem);
      scroll-snap-align: start;
      border: 1px solid #ddd;
      border-radius: 1rem;
      padding: 1rem;
      background-color: #fff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
      transition: transform 0.2s ease;
    }

    .scroll-card:hover {
      transform: translateY(-4px);
    }

    @media (max-width: 992px) {
      .scroll-card {
        flex: 0 0 calc(50% - 1rem);
      }
    }

    @media (max-width: 576px) {
      .scroll-card {
        flex: 0 0 100%;
      }
    }

    /* ===== Custom Scrollbar ===== */
    .scroll-container::-webkit-scrollbar {
      height: 8px;
    }

    .scroll-container::-webkit-scrollbar-thumb {
      background: #007bff;
      border-radius: 10px;
    }

    .scroll-container {
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
}

.scroll-row {
  display: flex;
  flex-wrap: nowrap;
  gap: 1rem;
}

.scroll-card {
  min-width: 250px;
  flex: 0 0 auto;
  padding: 1rem;
  background: #f8f9fa;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}
@media (max-width: 768px) {
  .hero-wrap {
    background-size: contain !important;   /* Biar gambar tidak terlalu besar */
    background-position: top center !important;
    background-repeat: no-repeat !important;
    min-height: 40vh !important;           /* Kurangi tinggi hero */
    padding-top: 100px;
    padding-bottom: 10px;
  }

  .hero-wrap .container {
    padding: 0 15px;
  }

  .hero-wrap .row {
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
  }

  .hero-wrap .col-md-6 {
    width: 100%;
    margin-top: 20px;
  }

  .hero-wrap .mt-5 {
    margin-top: 10px !important;
    font-size: 14px;
  }

  .hero-wrap h1 {
    font-size: 1.6rem !important;
  }

  .hero-wrap p {
    font-size: 1rem !important;
  }
}

  </style>


</head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

<nav class="navbar navbar-expand-lg navbar-light bg-light ftco_navbar site-navbar-target" id="ftco-navbar">
  <div class="container">
    <a class="navbar-brand" href="/">ION</a>

    <!-- Tombol Toggle untuk Mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu Navigasi -->
    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a href="/" class="nav-link"><span>Home</span></a></li>
        <li class="nav-item"><a href="#about-section" class="nav-link"><span>About</span></a></li>
        <li class="nav-item"><a href="#jamu-section" class="nav-link"><span>Internet</span></a></li>
        <li class="nav-item"><a href="/complains" class="nav-link"><span>Komplain</span></a></li>
        <li class="nav-item"><a href="#kontak-section" class="nav-link"><span>Kontak</span></a></li>
        <li class="nav-item"><a href="/pemesanante" class="nav-link"><span>Status Pemasangan</span></a></li>
        <li class="nav-item"><a href="/riwayat" class="nav-link"><span>Riwayat</span></a></li>

        <!-- Hanya tampil di tampilan mobile -->
        <?php if(auth()->guard()->check()): ?>
        <li class="nav-item d-block d-lg-none">
          <a class="nav-link" href="<?php echo e(route('profile.edit')); ?>">
            <i class="bi bi-person me-1"></i> My Profile
          </a>
        </li>
        <li class="nav-item d-block d-lg-none">
          <form method="POST" action="<?php echo e(route('logout')); ?>">
            <?php echo csrf_field(); ?>
            <button class="nav-link btn btn-link p-0" type="submit">
              <i class="bi bi-box-arrow-right me-1"></i> Log Out
            </button>
          </form>
        </li>
        <?php else: ?>
        <li class="nav-item d-block d-lg-none"><a href="<?php echo e(route('register')); ?>" class="nav-link">Daftar</a></li>
        <li class="nav-item d-block d-lg-none"><a href="<?php echo e(route('login')); ?>" class="nav-link">Login</a></li>
        <?php endif; ?>
      </ul>
    </div>

    <!-- Kanan Atas (Hanya tampil di desktop) -->
    <div class="d-none d-lg-block">
      <?php if(auth()->guard()->check()): ?>
      <div class="d-flex align-items-center gap-3">
        <a class="text-dark text-decoration-none" href="<?php echo e(route('profile.edit')); ?>">
          <i class="bi bi-person-circle me-1"></i> My Profile
        </a>
        <form method="POST" action="<?php echo e(route('logout')); ?>">
          <?php echo csrf_field(); ?>
          <button class="btn btn-sm btn-outline-danger" type="submit">
            <i class="bi bi-box-arrow-right me-1"></i> Logout
          </button>
        </form>
      </div>
      <?php else: ?>
      <p class="mb-0 register-link">
        <a href="<?php echo e(route('register')); ?>" class="me-3 text-dark text-decoration-none">Daftar</a>
        <a href="<?php echo e(route('login')); ?>" class="text-dark text-decoration-none">Login</a>
      </p>
      <?php endif; ?>
    </div>
  </div>
</nav>

	  
  
  <!-- Hero Section -->
  <section class="hero-wrap js-fullheight" 
    style="background-image: url('<?php echo e(asset('images/internet.png')); ?>'); 
           background-size: cover; background-position: center; 
           background-repeat: no-repeat; min-height: 110vh;" 
    data-section="home" data-stellar-background-ratio="0.5">

    <div class="overlay" style="background-color: #ffffff;"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start">
        <div class="col-md-6 pt-5 ftco-animate">
          <div class="mt-5 text-white" style="margin-top: 150px;">
            <!-- Tambahkan konten hero jika diperlukan -->
          </div>
        </div>
      </div>
    </div>
  </section>

     <section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb" id="jamu-section">       
      <div class="container py-5">
        <div class="row justify-content-center">
          <div class="col-md-10 text-center heading-section ftco-animate">
            <h2 class="mb-4 fw-bold">Paket Internet <span style="color: #007bff;"></span></h2>
            <p class="text-muted fs-5">Pilih paket internet terbaik sesuai kebutuhan Anda</p>
          </div>
        </div>
      </div>

<!-- Paket Section -->
<section id="jamu-section" class="py-5 bg-light">
  <div class="container">
    <div class="row justify-content-center mb-4">
      <div class="col-md-10 text-center">
        <h2 class="fw-bold">Paket Internet</h2>
        <p class="text-muted fs-5">Pilih paket internet terbaik sesuai kebutuhan Anda</p>
      </div>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
      <?php $__currentLoopData = $layanans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $layanan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col">
          <div class="card h-100 shadow-sm package-card text-center">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title fw-bold"><?php echo e($layanan->nama_layanan); ?></h5>
              <p class="card-text text-primary fs-4">Rp <?php echo e(number_format($layanan->harga, 0, ',', '.')); ?> / bulan</p>
              <p class="text-muted">🚀 Kecepatan hingga <strong><?php echo e($layanan->kecepatan); ?> Mbps</strong></p>

              <div class="mt-auto">
                <?php if(auth()->guard()->check()): ?>
                  <a href="<?php echo e(route('pemesanan.create', ['layananId' => $layanan->id])); ?>" class="btn btn-primary w-100">Pilih Paket</a>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</section>


<section id="about-section" class="py-5 bg-light">
  <div class="container">
    <div class="row align-items-center">

      <!-- Gambar -->
      <div class="col-md-6 mb-4 mb-md-0">
        <img src="<?php echo e(asset('images/pt.jpg')); ?>" 
            alt="Tentang PT Parsaoran" 
            class="img-fluid rounded shadow" 
            style="max-width: 100%; height: auto; object-fit: contain;">
      </div>

      <!-- Konten -->
      <div class="col-md-6">
        <h2 class="fw-bold mb-3">Tentang <span style="color: #007bff;">PT Parsaoran Global Data Trans</span></h2>
        <p class="text-muted fs-5">
          PT Parsaoran Global Data Trans adalah perusahaan teknologi yang bergerak di bidang layanan internet dan solusi data, menghadirkan konektivitas cepat, stabil, dan terjangkau ke berbagai wilayah Indonesia.
        </p>
        <p class="text-muted">
          Berdiri dengan semangat transformasi digital, kami berkomitmen untuk menyediakan layanan internet terbaik, infrastruktur jaringan modern, dan dukungan pelanggan yang responsif, demi mendukung pertumbuhan bisnis, pendidikan, dan kehidupan digital masyarakat Indonesia.
        </p>
        <ul class="list-unstyled mt-3">
          <li class="mb-2">✅ Internet Fiber Optik Cepat & Stabil</li>
          <li class="mb-2">✅ Layanan Korporat & Rumah Tangga</li>
          <li class="mb-2">✅ Support 24/7 & Tim Profesional</li>
          <li class="mb-2">✅ Jangkauan Luas hingga ke Daerah</li>
        </ul>
      </div>

    </div>
  </div>
</section>


<section class="ftco-section py-5" id="perawatan-section">
  <div class="container-fluid px-5">
    <div class="row justify-content-center mb-5 pb-2">
      <div class="col-md-8 text-center heading-section ftco-animate">
        <h2 class="mb-4">Layanan Internet & Komplain</h2>
        <p>Informasi mengenai layanan internet yang tersedia serta sistem komplain untuk pelanggan kami.</p>
      </div>
    </div>
    <div class="row">

      <!-- Section Layanan Internet -->
      <div class="col-md-6 ftco-animate">
        <div class="department-wrap p-4 d-flex flex-column h-100">
          <div class="text p-2 text-center flex-grow-1">
            <div class="icon mb-3">
              <span class="icon-globe" style="font-size: 3rem; color: #007bff;"></span>
            </div>
            <h3><a href="login">Layanan Internet</a></h3>
            <p>Kami menyediakan koneksi internet stabil dan cepat berbasis fiber optik, cocok untuk kebutuhan rumah tangga maupun bisnis.</p>
            <p><strong>Fitur Unggulan:</strong> Kecepatan tinggi, jangkauan luas, dukungan teknis 24/7.</p>
            <p><strong>Cara Berlangganan:</strong> Pilih paket, isi formulir pendaftaran, dan nikmati layanan kami.</p>
          </div>
        </div>
      </div>

      <!-- Section Layanan Komplain -->
      <div class="col-md-6 ftco-animate">
        <div class="department-wrap p-4 d-flex flex-column h-100">
          <div class="text p-2 text-center flex-grow-1">
            <div class="icon mb-3">
              <span class="icon-headset" style="font-size: 3rem; color: #dc3545;"></span>
            </div>
            <h3><a href="login">Layanan Komplain</a></h3>
            <p>Kami menyediakan sistem pengaduan yang responsif untuk membantu pelanggan mengatasi gangguan layanan atau menyampaikan masukan.</p>
            <p><strong>Saluran Komplain:</strong> WhatsApp, Email, dan Formulir Online.</p>
            <p><strong>Jam Layanan:</strong> Setiap hari, pukul 08.00 - 22.00 WIB.</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Kontak -->
<section id="kontak-section" class="ftco-section contact-section">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 heading-section text-center ftco-animate">
        <h2 class="mb-4">Contact Us</h2>
        <p>Hubungi kami untuk bantuan, pertanyaan, atau informasi layanan.</p>
      </div>
    </div>

    <div class="row justify-content-center">
      <!-- Address -->
      <div class="col-md-4 mb-4 ftco-animate">
        <div class="department-wrap p-4 d-flex flex-column h-100 shadow-sm rounded text-center">
          <div class="icon mb-3" style="font-size: 3rem; color: #dc3545;">
            <i class="bi bi-geo-alt-fill"></i>
          </div>
          <h4 class="mb-3">Address</h4>
          <p class="mb-0">Gedung Graha PGD</p>
          <p class="mb-0">Jl. Taman Margasatwa Raya No.3</p>
          <p class="mb-0">Pasar Minggu, Jakarta Selatan 12540</p>
        </div>
      </div>

      <!-- Contact Number -->
      <div class="col-md-4 mb-4 ftco-animate">
        <div class="department-wrap p-4 d-flex flex-column h-100 shadow-sm rounded text-center">
          <div class="icon mb-3" style="font-size: 3rem; color: #dc3545;">
            <i class="bi bi-telephone-fill"></i>
          </div>
          <h4 class="mb-3">Contact Number</h4>
          <p class="mb-1"><i class="bi bi-telephone"></i> 0812-9906-3283</p>
          <p class="mb-0"><i class="bi bi-telephone"></i> 0877-7666-7354</p>
        </div>
      </div>

      <!-- Email Address -->
      <div class="col-md-4 mb-4 ftco-animate">
        <div class="department-wrap p-4 d-flex flex-column h-100 shadow-sm rounded text-center">
          <div class="icon mb-3" style="font-size: 3rem; color: #dc3545;">
            <i class="bi bi-envelope-fill"></i>
          </div>
          <h4 class="mb-3">Email Address</h4>
          <p class="mb-0">
            <a href="mailto:support@ionnetwork.co.id" class="text-decoration-none">
              support@ionnetwork.co.id
            </a>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>


<style>
  /* CSS untuk memastikan kotak memiliki ukuran yang sama */
  .contact-info .box {
    height: 100%; /* agar semua kotak punya tinggi sama */
    display: flex;
    flex-direction: column;
    justify-content: center;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
  }

  /* Ikon yang berada di tengah kotak */
  .contact-info .icon {
    font-size: 2rem;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: #007bff;
    color: white;
    margin: 0 auto 20px auto;
  }

  /* Menyusun kotak dalam grid yang rapi di tengah */
  .contact-info {
    justify-content: center;
    gap: 20px;
  }

  /* Menyesuaikan lebar kolom dalam grid */
  .contact-info .col-md-6 {
    display: flex;
    justify-content: center;
  }

  /* Menambahkan margin untuk bagian bawah kotak */
  .contact-info .box {
    margin-bottom: 20px;
  }
</style>

<!-- Footer -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

<!-- Footer -->
<footer class="ftco-footer ftco-section img" style="background-color: #1d4e81; color: white;">
  <div class="overlay"></div>
  <div class="container-fluid px-md-5">
    <div class="row mb-5">
      <div class="col-md">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">PT PARSAORAN GLOBAL</h2>
          <div>
            <p><i class="bi bi-building"></i> Gedung Graha PGD</p>
            <p><i class="bi bi-geo-alt"></i> Jl. Taman Margasatwa Raya No.3 RT.001 RW.001 Pasar Minggu, Jakarta Selatan 12540</p>

          </div>
        </div>
      </div>
      <div class="col-md">
        <div class="ftco-footer-widget mb-4 ml-md-4">
          <h2 class="ftco-heading-2">Links</h2>
          <ul class="list-unstyled">
            <li><a href="#"><i class="bi bi-arrow-right-short me-2"></i>Home</a></li>
            <li><a href="#tv-channel-section"><i class="bi bi-arrow-right-short me-2"></i>About</a></li>
            <li><a href="#jamu-section"><i class="bi bi-arrow-right-short me-2"></i>Internet</a></li>
            <li><a href="#"><i class="bi bi-arrow-right-short me-2"></i>Komplain</a></li>
            <li><a href="#fasilitas-section"><i class="bi bi-arrow-right-short me-2"></i>Kontak</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">Services</h2>
          <ul class="list-unstyled">
            <li><a href="#"><i class="bi bi-arrow-right-short me-2"></i>Komplain</a></li>
            <li><a href="#fasilitas-section"><i class="bi bi-arrow-right-short me-2"></i>Kontak</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">Hubungi Kami</h2>
          <div class="block-23 mb-3">
            <ul>
            <p><i class="bi bi-telephone"></i> 0812-9906-3283</p>
            <p><i class="bi bi-telephone"></i> 0877-7666-7354</p>
            <p><i class="bi bi-envelope"></i> support@ionnetwork.co.id</p>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center">
        <p>
          Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved 
        </p>
      </div>
    </div>
  </div>
</footer>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>
<?php /**PATH C:\laragon\www\sistem-pemesanan-dan-pemasangan1\resources\views/dashboard/pelanggan.blade.php ENDPATH**/ ?>