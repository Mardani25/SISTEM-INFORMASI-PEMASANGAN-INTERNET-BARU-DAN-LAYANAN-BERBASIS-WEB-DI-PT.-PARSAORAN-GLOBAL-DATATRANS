<!DOCTYPE html>
<html lang="en" class="light-sty   layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  @include('admin.header')
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

      <!-- Sidebar -->
      @include('admin.sidebar')
      <!-- /Sidebar -->

      <!-- Layout page -->
      <div class="layout-page">

        <!-- Navbar -->
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light ftco_navbar site-navbar-target" id="ftco-navbar">
  <div class="container">
    <a class="navbar-brand" href="/">ION</a>

    <!-- Tombol Toggle untuk Mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu Navigasi -->
    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ms-auto"> <!-- note: ml-auto diganti ms-auto di Bootstrap 5 -->
        <li class="nav-item"><a href="/" class="nav-link"><span>Home</span></a></li>
        <li class="nav-item"><a href="#about-section" class="nav-link"><span>About</span></a></li>
        <li class="nav-item"><a href="#jamu-section" class="nav-link"><span>Internet</span></a></li>
        <li class="nav-item"><a href="/complains" class="nav-link"><span>Komplain</span></a></li>
        <li class="nav-item"><a href="#kontak-section" class="nav-link"><span>Kontak</span></a></li>
        <li class="nav-item"><a href="/pemesanante" class="nav-link"><span>Status Pemasangan</span></a></li>
        <li class="nav-item"><a href="/riwayat" class="nav-link"><span>Riwayat</span></a></li>

        <!-- Auth Links -->
        @auth
          <li class="nav-item d-block d-lg-none">
            <a class="nav-link" href="{{ route('profile.edit') }}">
              <i class="bi bi-person me-1"></i> My Profile
            </a>
          </li>
          <li class="nav-item d-block d-lg-none">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button class="nav-link btn btn-link p-0" type="submit">
                <i class="bi bi-box-arrow-right me-1"></i> Log Out
              </button>
            </form>
          </li>
        @else
          <li class="nav-item d-block d-lg-none"><a href="{{ route('register') }}" class="nav-link">Daftar</a></li>
          <li class="nav-item d-block d-lg-none"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
        @endauth
      </ul>
    </div>

    <!-- Kanan Atas (Hanya tampil di desktop) -->
    <div class="d-none d-lg-block">
      @auth
      <div class="d-flex align-items-center gap-3">
        <a class="text-dark text-decoration-none" href="{{ route('profile.edit') }}">
          <i class="bi bi-person-circle me-1"></i> My Profile
        </a>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button class="btn btn-sm btn-outline-danger" type="submit">
            <i class="bi bi-box-arrow-right me-1"></i> Logout
          </button>
        </form>
      </div>
      @else
      <p class="mb-0 register-link">
        <a href="{{ route('register') }}" class="me-3 text-dark text-decoration-none">Daftar</a>
        <a href="{{ route('login') }}" class="text-dark text-decoration-none">Login</a>
      </p>
      @endauth
    </div>
  </div>
</nav>

        <!-- /Navbar -->

          <!-- Content -->
          <div class="container mt-3">
            <div class="card mb-4">
              <div class="row g-0 align-items-center">
                <div class="col-md-8 mt-3">
                  <div class="card-body">
                    <h5 class="card-title text-primary">Selamat Datang, {{ Auth::user()->name }}! 🎉</h5>
                    <p class="mb-0">
                      Kami senang melihat Anda kembali! Pantau terus layanan Anda dan tingkatkan performa bersama kami.
                    </p>
                  </div>
                </div>
                <div class="col-md-4 text-center">
                  <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" class="img-fluid p-3" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
                </div>
              </div>
            </div>

          {{-- <div class="container mt-2">
            <div id="notif-wrapper" class="alert alert-info d-none">
              <h5 class="mb-2">🔔 Aktifkan Notifikasi</h5>
              <p>Izinkan notifikasi untuk mendapatkan update penting seperti:</p>
              <ul>
                <li>Status janji temu</li>
                <li>Pengingat pembayaran</li>
                <li>Notifikasi admin real-time</li>
              </ul>
              <button onclick="mintaIzinNotifikasi()" class="btn btn-primary">Izinkan Notifikasi</button>
            </div>

            <div id="notif-denied" class="alert alert-danger d-none">
              <h5>❌ Notifikasi Diblokir</h5>
              <p>Silakan aktifkan manual dari pengaturan browser:</p>
              <ol>
                <li>Klik ikon gembok di address bar (sebelah kiri URL)</li>
                <li>Pilih "Site settings"</li>
                <li>Set "Notifications" ke "Allow"</li>
                <li>Reload halaman ini</li>
              </ol>
            </div>
          </div> --}}


          <!-- /Content -->
          <h1 class="mb-4">📊 Laporan Layanan</h1>

          <div class="row g-4">
            <!-- Jumlah Layanan -->
            <div class="col-md-3">
              <div class="card border-success h-100">
                <div class="card-header bg-success text-white">Jumlah Layanan</div>
                <div class="card-body text-center">
                  <h5 class="card-title text-success mt-3">{{ $jumlahLayanan }}</h5>
                  <p class="card-text">Total layanan yang tersedia.</p>
                </div>
              </div>
            </div>

            <!-- Teknisi Aktif -->
            <div class="col-md-3">
              <div class="card border-primary h-100">
                <div class="card-header bg-primary text-white">Teknisi Aktif</div>
                <div class="card-body text-center">
                  <h5 class="card-title text-primary mt-3">{{ $jumlahTeknisi }}</h5>
                  <p class="card-text">Jumlah teknisi aktif saat ini.</p>
                </div>
              </div>
            </div>

            <!-- Pelanggan Aktif -->
            <div class="col-md-3">
              <div class="card border-info h-100">
                <div class="card-header bg-info text-white">Pelanggan Aktif</div>
                <div class="card-body text-center">
                  <h5 class="card-title text-info mt-3">{{ $jumlahPelanggan }}</h5>
                  <p class="card-text">Jumlah pelanggan aktif yang terdaftar.</p>
                </div>
              </div>
            </div>

            <!-- Jumlah Pemesanan -->
            <div class="col-md-3">
              <div class="card border-warning h-100">
                <div class="card-header bg-warning text-white">Jumlah Pemesanan</div>
                <div class="card-body text-center">
                  <h5 class="card-title text-warning mt-3">{{ $jumlahPemesanan }}</h5>
                  <p class="card-text">Total pemesanan yang telah dilakukan.</p>
                </div>
              </div>
            </div>

              <!-- Jumlah Pembayaran -->
              <div class="col-md-3 mb-4">
                <div class="card border-danger h-100">
                  <div class="card-header bg-danger text-white">Jumlah Pembayaran</div>
                  <div class="card-body text-center">
                    <h5 class="card-title text-danger mt-3">{{ $jumlahPembayaran }}</h5>
                    <p class="card-text">Total pembayaran yang telah diterima.</p>
                  </div>
                </div>
              </div>

        </div>
        <!-- /Content wrapper -->

      </div>
      <!-- /Layout page -->

    </div>
    <!-- /Layout container -->

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

  </div>
<!-- Core JS -->
<script src="../assets/vendor/libs/jquery/jquery.js"></script> <!-- Jika butuh jQuery -->
<script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="../assets/vendor/js/menu.js"></script> <!-- Script khusus menu/sidebar -->

<!-- Bootstrap Bundle (include Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Vendor JS -->
<script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

<!-- Main JS -->
<script src="../assets/js/main.js"></script>

<!-- Page JS -->
<script src="../assets/js/dashboards-analytics.js"></script>

<!-- GitHub Buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

</body>

</html>
