<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="text-center">Riwayat Pembayaran</h1>

    <!-- Tampilkan pesan jika tidak ada riwayat pembayaran -->
    @if($pembayaran->isEmpty())
        <div class="alert alert-warning">
            Belum ada pembayaran yang berhasil.
        </div>
    @else
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nomor Pemesanan</th>
                    <th>Layanan</th>
                    <th>Jumlah Pembayaran</th>
                    <th>Status Pembayaran</th>
                    <th>Tanggal Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pembayaran as $index => $p)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ 'ORDER-' . $p->user->id_pemesanan }}</td>
                    <td>{{ optional($p->user->pemesanan->layanan)->nama_layanan ?? 'Layanan tidak ditemukan' }}</td>
                    <td>Rp {{ number_format($p->user->jumlah, 0, ',', '.') }}</td>
                    <td>
                        @if($p->status_pembayaran == 'settlement')
                            <span class="badge bg-success">Berhasil</span>
                        @else
                            <span class="badge bg-danger">Gagal</span>
                        @endif
                    </td>
                    <td>{{ $p->tanggal_bayar->format('d-m-Y ') }}</td>
                </tr>
            @endforeach
            
            </tbody>
        </table>
    @endif

    <div class="text-center mt-4">
        <a href="{{ route('pelanggan.dashboard') }}" class="btn btn-primary">Kembali ke Beranda</a>
    </div>
</div>

</body>
</html>
