<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="/teknisi/dashboard" class="app-brand-link">
<span class="app-brand-logo demo">
  <i class="bx bxs-user" style="font-size: 26px; color: #696cff;"></i>
</span>

        <a href="{{ route('teknisi.dashboard') }}" class="app-brand-text demo menu-text fw-bolder ms-2">Ion</a>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item active">
        <a href="{{ route('teknisi.dashboard') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>


<li class="menu-header small text-uppercase">
  <span class="menu-header-text">Pages</span>
</li>

<li class="menu-item">
  <a href="{{ route('teknisi.jadwal') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-dock-top"></i>
    <div data-i18n="Teknisi">Jadwal</div>
  </a>
</li>

    <li class="menu-item">
      <a href="{{ route('teknisi.komplain') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-message-alt-error"></i>
        <div data-i18n="Data Komplain">Data Pesan</div>
      </a>
    </li>
      </li>
    </ul>
  </aside>
  