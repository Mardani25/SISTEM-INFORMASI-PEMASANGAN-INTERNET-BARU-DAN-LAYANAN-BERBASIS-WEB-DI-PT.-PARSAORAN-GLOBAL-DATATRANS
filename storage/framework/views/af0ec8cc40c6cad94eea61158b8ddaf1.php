<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="<?php echo e(route('admin.dashboard')); ?>" class="app-brand-link">
      <span class="app-brand-logo demo">
        <i class="bx bxs-user" style="font-size: 26px; color: #696cff;"></i>
      </span>
      <span class="app-brand-text demo menu-text fw-bolder ms-2">Ion</span>
    </a>

    <!-- Toggle button untuk menu (untuk layar kecil) -->
    <a href="javascript:void(0);" id="menu-toggle" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none" aria-label="Toggle Menu">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item active">
      <a href="<?php echo e(route('admin.dashboard')); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>

    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Pages</span>
    </li>

    <li class="menu-item">
      <a href="<?php echo e(route('teknisi.index')); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-dock-top"></i>
        <div data-i18n="Teknisi">Kelola Teknisi</div>
      </a>
    </li>

    <li class="menu-item">
      <a href="<?php echo e(route('admin.teknisi.jadwal.index')); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-calendar"></i>
        <div data-i18n="Jadwal Teknisi">Jadwal Teknisi</div>
      </a>
    </li>

    <li class="menu-item">
      <a href="<?php echo e(route('admin.teknisi.jadwal.create')); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-calendar-plus"></i>
        <div data-i18n="Tambah Jadwal Teknisi">Tambah Jadwal Teknisi</div>
      </a>
    </li>

    <li class="menu-item">
      <a href="<?php echo e(route('admin.pelanggan.index')); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div data-i18n="Data Pelanggan">Data Pelanggan</div>
      </a>
    </li>

    <li class="menu-item">
      <a href="<?php echo e(route('admin.komplain')); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-message-alt-error"></i>
        <div data-i18n="Data Komplain">Data Komplain</div>
      </a>
    </li>

    <li class="menu-item">
      <a href="<?php echo e(route('pemesanan.index')); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-cart-alt"></i>
        <div data-i18n="Pemesanan">Pemesanan</div>
      </a>
    </li>

    <li class="menu-item">
      <a href="<?php echo e(route('layanan.index')); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-plus-circle"></i>
        <div data-i18n="Tambah Layanan">Tambah Layanan</div>
      </a>
    </li>
  </ul>
</aside>


<!-- Core JS -->
<script src="../assets/vendor/libs/jquery/jquery.js"></script>
<script src="../assets/vendor/libs/popper/popper.js"></script>
<script src="../assets/vendor/js/bootstrap.js"></script>
<script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="../assets/vendor/js/menu.js"></script>

<!-- Vendors JS -->
<script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

<!-- Main JS -->

<!-- Page JS -->
<script src="../assets/js/dashboards-analytics.js"></script>

<!-- GitHub Buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<?php /**PATH /home/u816639003/domains/ionwifi.site/public_html/resources/views/admin/sidebar.blade.php ENDPATH**/ ?>