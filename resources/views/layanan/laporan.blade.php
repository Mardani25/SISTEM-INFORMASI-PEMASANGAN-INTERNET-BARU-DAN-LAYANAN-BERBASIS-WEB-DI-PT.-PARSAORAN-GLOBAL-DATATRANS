<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Layanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-2">
        <div class="card mb-4">
            <div class="row g-0 align-items-center">
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Selamat Datang, {{ Auth::user()->name }}! 🎉</h5>
                        <p class="mb-0">
                            Kami senang melihat Anda kembali! Pantau terus layanan Anda dan tingkatkan performa bersama kami.
                        </p>
                    </div>
                </div>
                
                <div class="col-md-4 text-center">
                    <img
                        src="../assets/img/illustrations/man-with-laptop-light.png"
                        height="140"
                        alt="View Badge User"
                        class="img-fluid p-3"
                        data-app-dark-img="illustrations/man-with-laptop-dark.png"
                        data-app-light-img="illustrations/man-with-laptop-light.png"
                    />
                </div>
            </div>
        </div>

        <h1 class="mb-4">📊 Laporan Layanan</h1>
        
        <div class="row g-4">
            <!-- Jumlah Layanan -->
            <div class="col-md-3">
                <div class="card border-success h-100">
                    <div class="card-header bg-success text-white">Jumlah Layanan</div>
                    <div class="card-body text-center">
                        <h5 class="card-title text-success">{{ $jumlahLayanan }}</h5>
                        <p class="card-text">Total layanan yang tersedia.</p>
                    </div>
                </div>
            </div>

            <!-- Teknisi Aktif -->
            <div class="col-md-3">
                <div class="card border-primary h-100">
                    <div class="card-header bg-primary text-white">Teknisi Aktif</div>
                    <div class="card-body text-center">
                        <h5 class="card-title text-primary">{{ $jumlahTeknisi }}</h5>
                        <p class="card-text">Jumlah teknisi aktif saat ini.</p>
                    </div>
                </div>
            </div>

            <!-- Pelanggan Aktif -->
            <div class="col-md-3">
                <div class="card border-info h-100">
                    <div class="card-header bg-info text-white">Pelanggan Aktif</div>
                    <div class="card-body text-center">
                        <h5 class="card-title text-info">{{ $jumlahPelanggan }}</h5>
                        <p class="card-text">Jumlah pelanggan aktif yang terdaftar.</p>
                    </div>
                </div>
            </div>

            <!-- Jumlah Pemesanan -->
            <div class="col-md-3">
                <div class="card border-warning h-100">
                    <div class="card-header bg-warning text-white">Jumlah Pemesanan</div>
                    <div class="card-body text-center">
                        <h5 class="card-title text-warning">{{ $jumlahPemesanan }}</h5>
                        <p class="card-text">Total pemesanan yang telah dilakukan.</p>
                    </div>
                </div>
            </div>

            <!-- Jumlah Pembayaran -->
            <div class="col-md-3">
                <div class="card border-danger h-100">
                    <div class="card-header bg-danger text-white">Jumlah Pembayaran</div>
                    <div class="card-body text-center">
                        <h5 class="card-title text-danger">{{ $jumlahPembayaran }}</h5>
                        <p class="card-text">Total pembayaran yang telah diterima.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
