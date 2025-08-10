<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  @include('teknisi.header')
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

      <!-- Sidebar -->
      @include('teknisi.sidebar')
      <!-- /Sidebar -->

      <!-- Layout page -->
      <div class="layout-page">

        <!-- Navbar -->
        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">


<ul class="navbar-nav flex-row align-items-center ms-auto">
  <!-- User -->
  <li class="nav-item navbar-dropdown dropdown-user dropdown">
    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
<div class="avatar avatar-online border border-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
  <i class="bx bx-user text-primary fs-4"></i>
</div>
    </a>
    <ul class="dropdown-menu dropdown-menu-end">
      <li>
        <a class="dropdown-item" href="#">
          <div class="d-flex align-items-center">
            <div class="flex-shrink-0 me-3">
              <div class="avatar avatar-online border border-primary rounded-circle p-2">
                  <i class="bx bx-user text-primary fs-4"></i>
              </div>
            </div>
            <div class="flex-grow-1">
              <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
              <small class="text-muted">{{ ucfirst(Auth::user()->role) }}</small>
            </div>
          </div>
        </a>
      </li>
      <li><div class="dropdown-divider"></div></li>
      <li>
        <a class="dropdown-item" href="{{ route('profile.edit') }}">
          <i class="bx bx-user me-2"></i>
          <span class="align-middle">My Profile</span>
        </a>
      </li>
      <li>
        <a class="dropdown-item" href="{{ route('notifications.index') }}">
          <i class="bx bx-bell me-2"></i>
          <span class="align-middle">
            Notifikasi
            @if(isset($unreadCount) && $unreadCount > 0)
              <span class="badge bg-danger">{{ $unreadCount }}</span>
            @endif
          </span>
        </a>
      </li>
      <li><div class="dropdown-divider"></div></li>
      <li>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="dropdown-item">
            <i class="bx bx-power-off me-2"></i>
            <span class="align-middle">Log Out</span>
          </button>
        </form>
      </li>
    </ul>
  </li>
  <!-- /User -->
</ul>

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
                  <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140" alt="" class="img-fluid p-3" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
                </div>
              </div>
            </div>
              <!-- Jadwal Selesai Bulan Ini -->
              <div class="col-md-3">
                <div class="card border-success h-100">
                  <div class="card-header bg-success text-white">Jadwal Selesai</div>
                  <div class="card-body text-center">
                    <h5 class="card-title text-success mt-3">{{ $jumlahJadwalSelesaiBulanIni }}</h5>
                    <p class="card-text">Jadwal selesai bulan ini.</p>
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

        </div>
        <!-- /Content wrapper -->

      </div>
      <!-- /Layout page -->

    </div>
    <!-- /Layout container -->

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

  </div>
  <!-- /Layout wrapper -->

  <!-- Core JS -->
  <script src="../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../assets/vendor/libs/popper/popper.js"></script>
  <script src="../assets/vendor/js/bootstrap.js"></script>
  <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="../assets/vendor/js/menu.js"></script>

  <!-- Vendors JS -->
  <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

  <!-- Main JS -->
  <script src="../assets/js/main.js"></script>

  <!-- Page JS -->
  <script src="../assets/js/dashboards-analytics.js"></script>

  <!-- GitHub Buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
