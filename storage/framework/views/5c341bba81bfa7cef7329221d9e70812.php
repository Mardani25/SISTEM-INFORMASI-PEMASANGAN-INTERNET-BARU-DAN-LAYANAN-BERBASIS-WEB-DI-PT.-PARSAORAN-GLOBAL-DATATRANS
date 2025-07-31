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
  </nav><?php /**PATH C:\laragon\www\sistem-pemesanan-dan-pemasangan1\resources\views/dashboard/navbarpe.blade.php ENDPATH**/ ?>