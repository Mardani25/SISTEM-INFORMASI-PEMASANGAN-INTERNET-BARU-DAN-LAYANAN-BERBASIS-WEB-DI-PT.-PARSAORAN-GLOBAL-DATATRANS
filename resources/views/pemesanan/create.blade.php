<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <a href="/dashboard" class="btn btn-outline-primary mb-4">
        ← Kembali ke Dashboard
    </a>

    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Form Pemesanan - {{ $layanan->nama_layanan }}</h4>
        </div>

        <div class="card-body">
            @if(session('success')) 
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('pemesanan.store') }}" method="POST">
                @csrf

                <input type="hidden" name="id_layanan" value="{{ $layanan->id }}">
                <input type="hidden" name="status" value="pending">

                <!-- Nama Pengguna -->
                <div class="mb-3">
                    <label for="nama_user" class="form-label">Nama Pengguna</label>
                    <input type="text" id="nama_user" class="form-control" value="{{ Auth::user()->name }}" readonly>
                    <input type="hidden" name="id_user" value="{{ Auth::id() }}">
                </div>

                <!-- Jadwal Pemasangan -->
                <div class="mb-3">
                    <label for="jadwal_pemasangan" class="form-label">Jadwal Pemasangan</label>
                    <input type="date" name="jadwal_pemasangan" id="jadwal_pemasangan" class="form-control" required>
                </div>

                <!-- Keterangan -->
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan (Opsional)</label>
                    <textarea name="keterangan" id="keterangan" class="form-control" rows="4"></textarea>
                </div>

                <button type="submit" class="btn btn-success w-100">Simpan Pemesanan</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
