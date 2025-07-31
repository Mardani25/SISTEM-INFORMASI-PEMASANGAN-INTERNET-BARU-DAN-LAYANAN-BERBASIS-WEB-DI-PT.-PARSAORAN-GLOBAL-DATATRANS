<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PT PARSAORAN GLOBAL</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
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
.package-card {
  border: none;
  border-radius: 16px;
  padding: 20px;
  background: #fff;
  transition: all 0.3s ease-in-out;
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.05);
  display: flex;
  flex-direction: column;
  height: 100%;
}

.package-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 12px 25px rgba(0, 0, 0, 0.08);
}

  </style>


</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <!-- Navbar -->
 <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

<nav class="navbar navbar-expand-lg navbar-light bg-light ftco_navbar site-navbar-target" id="ftco-navbar">
  <div class="container">
    <a class="navbar-brand" href="/">ION</a>
    
    <!-- Tombol Toggle untuk Mobile -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu Navigasi -->
    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a href="/" class="nav-link"><span>Home</span></a></li>
        <li class="nav-item"><a href="#about-section" class="nav-link"><span>About</span></a></li>
        <li class="nav-item"><a href="#jamu-section" class="nav-link"><span>Internet</span></a></li>
        <li class="nav-item"><a href="login" class="nav-link"><span>Komplain</span></a></li>
        <li class="nav-item"><a href="#kontak-section" class="nav-link"><span>Kontak</span></a></li>

        <!-- Daftar & Login Masuk di Menu Mobile -->
        <li class="nav-item d-block d-lg-none"><a href="{{ route('register') }}" class="nav-link">Daftar</a></li>
        <li class="nav-item d-block d-lg-none"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
      </ul>
    </div>

    <!-- Daftar & Login Desktop -->
    <div class="d-none d-lg-block">
      <p class="mb-0 register-link">
        <a href="{{ route('register') }}" class="mr-3" style="color: black;">Daftar</a>
        <a href="{{ route('login') }}" style="color: black;">Login</a>
      </p>
    </div>

  </div>
</nav>


  <!-- Hero Section -->
  <section class="hero-wrap js-fullheight" 
    style="background-image: url('{{ asset('images/internet.png') }}'); 
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

  <!-- Paket Internet -->
<section id="jamu-section" class="py-5 bg-light">
  <div class="container">
    <div class="row justify-content-center mb-4">
      <div class="col-md-10 text-center">
        <h2 class="fw-bold">Paket Internet</h2>
        <p class="text-muted fs-5">Pilih paket internet terbaik sesuai kebutuhan Anda</p>
      </div>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
      @foreach ($layanans as $layanan)
        <div class="col">
          <div class="card h-100 shadow-sm package-card text-center">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title fw-bold">{{ $layanan->nama_layanan }}</h5>
              <p class="card-text text-primary fs-4">Rp {{ number_format($layanan->harga, 0, ',', '.') }} / bulan</p>
              <p class="text-muted">🚀 Kecepatan hingga <strong>{{ $layanan->kecepatan }} Mbps</strong></p>

              <div class="mt-auto">
                @auth
                  <a href="{{ route('pemesanan.create', ['layananId' => $layanan->id]) }}" class="btn btn-primary w-100">Pilih Paket</a>
                @endauth
                @guest
                  <a href="{{ route('login') }}" class="btn btn-primary w-100">Pilih Paket</a>
                @endguest
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>



  <!-- About Section -->
  <section id="about-section" class="py-5 bg-light">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 mb-4">
          <img src="{{ asset('images/pt.jpg') }}" alt="Tentang PT Parsaoran" class="img-fluid rounded shadow">
        </div>
        <div class="col-md-6">
          <h2 class="fw-bold mb-3">Tentang <span class="text-primary">PT Parsaoran Global Data Trans</span></h2>
          <p class="text-muted fs-5">
            PT Parsaoran Global Data Trans adalah perusahaan teknologi yang menyediakan layanan internet cepat, stabil, dan terjangkau ke berbagai wilayah Indonesia.
          </p>
          <p class="text-muted">
            Kami berkomitmen menghadirkan solusi digital terbaik untuk mendukung pertumbuhan bisnis, pendidikan, dan kehidupan masyarakat Indonesia.
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

  <!-- Layanan dan Komplain -->
  <section class="ftco-section py-5" id="perawatan-section">
    <div class="container-fluid px-5">
      <div class="row justify-content-center mb-5 pb-2">
        <div class="col-md-8 text-center heading-section ftco-animate">
          <h2 class="mb-4">Layanan Internet & Komplain</h2>
          <p>Informasi mengenai layanan internet serta sistem komplain pelanggan kami.</p>
        </div>
      </div>
      <div class="row">
        <!-- Internet -->
        <div class="col-md-6 ftco-animate">
          <div class="department-wrap p-4 d-flex flex-column h-100">
            <div class="text p-2 text-center flex-grow-1">
              <span class="icon-globe mb-3" style="font-size: 3rem; color: #007bff;"></span>
              <h3><a href="login">Layanan Internet</a></h3>
              <p>Koneksi internet fiber optik stabil & cepat, cocok untuk rumah dan bisnis.</p>
              <p><strong>Fitur:</strong> Kecepatan tinggi, jangkauan luas, dukungan 24/7.</p>
              <p><strong>Cara Berlangganan:</strong> Pilih paket & daftar.</p>
            </div>
          </div>
        </div>

        <!-- Komplain -->
        <div class="col-md-6 ftco-animate">
          <div class="department-wrap p-4 d-flex flex-column h-100">
            <div class="text p-2 text-center flex-grow-1">
              <span class="icon-headset mb-3" style="font-size: 3rem; color: #dc3545;"></span>
              <h3><a href="login">Layanan Komplain</a></h3>
              <p>Sistem pengaduan cepat dan responsif untuk keluhan pelanggan.</p>
              <p><strong>Saluran:</strong> WhatsApp, Email, Form Online.</p>
              <p><strong>Jam Layanan:</strong> 08.00 - 22.00 WIB setiap hari.</p>
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


  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

  <!-- Footer -->
  <footer class="ftco-footer ftco-section img" style="background-color: #1d4e81; color: white;">
    <div class="container-fluid px-md-5">
      <div class="row mb-5">
        <div class="col-md">
          <h2 class="ftco-heading-2">PT PARSAORAN GLOBAL</h2>
          <p><i class="bi bi-building"></i> Gedung Graha PGD</p>
          <p><i class="bi bi-geo-alt"></i> Jl. Taman Margasatwa Raya No.3, Pasar Minggu, Jakarta Selatan</p>
        </div>
        <div class="col-md">
          <h2 class="ftco-heading-2">Links</h2>
          <ul class="list-unstyled">
            <li><a href="#"><i class="bi bi-arrow-right-short me-2"></i>Home</a></li>
            <li><a href="#about-section"><i class="bi bi-arrow-right-short me-2"></i>About</a></li>
            <li><a href="#jamu-section"><i class="bi bi-arrow-right-short me-2"></i>Internet</a></li>
            <li><a href="login"><i class="bi bi-arrow-right-short me-2"></i>Komplain</a></li>
            <li><a href="#kontak-section"><i class="bi bi-arrow-right-short me-2"></i>Kontak</a></li>
          </ul>
        </div>
        <div class="col-md">
          <h2 class="ftco-heading-2">Hubungi Kami</h2>
          <p><i class="bi bi-telephone"></i> 0812-9906-3283</p>
          <p><i class="bi bi-telephone"></i> 0877-7666-7354</p>
          <p><i class="bi bi-envelope"></i> support@ionnetwork.co.id</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">
          <p>&copy; <script>document.write(new Date().getFullYear());</script> All rights reserved</p>
        </div>
      </div>
    </div>
  </footer>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</html>