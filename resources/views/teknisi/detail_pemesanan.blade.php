<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h2 class="mb-4">📍 Detail Pemesanan</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Informasi Pelanggan</h5>
            <p><strong>Nama:</strong> {{ $pemesanan->pelanggan->user->name }}</p>
            <p><strong>Email:</strong> {{ $pemesanan->pelanggan->user->email }}</p>
            <p><strong>Alamat:</strong> {{ $pemesanan->pelanggan->user->alamat ?? '-' }}</p>

            <hr>

            <h5 class="card-title">Detail Pemesanan</h5>
            <p><strong>Layanan:</strong> {{ $pemesanan->layanan->nama_layanan ?? '-' }}</p>
            <p><strong>Keterangan:</strong> {{ $pemesanan->keterangan }}</p>
            <p><strong>Status:</strong> {{ ucfirst($pemesanan->status) }}</p>
            <p><strong>Jadwal Pemasangan:</strong> {{ \Carbon\Carbon::parse($pemesanan->jadwal_pemasangan)->translatedFormat('d F Y H:i') }}</p>
        </div>
    </div>

    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Kembali</a>
</div>

</body>
</html>
