<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Komplain Teknisi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<!-- Tombol Kembali -->
<a href="/teknisi/dashboard" class="btn btn-outline-primary rounded-pill px-4 py-2 shadow-sm d-inline-flex align-items-center mt-4 ms-4">
    <i class="bi bi-arrow-left me-2"></i> Dashboard Teknisi
</a>

<div class="container mt-4">
    <h2 class="text-primary">Kontrol Teknisi ke Admin</h2>

    <!-- Alert -->
    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif

    <!-- Form Komplain -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('teknisi.complain.store') }}" method="POST">
                @csrf
                <textarea name="pesan" class="form-control mb-2" rows="3" placeholder="Tulis pesan/komplain untuk Admin..." required></textarea>
                <button type="submit" class="btn btn-primary w-100">Kirim</button>
            </form>
        </div>
    </div>

    <!-- Daftar Komplain -->
    <h5>Riwayat Komplain</h5>
    @if($complains->isEmpty())
        <p class="mt-2 text-muted">Belum ada Pesan Kontrol.</p>
    @else
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Pesan</th>
                        <th>Tanggapan Admin</th>
                        <th>Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($complains as $complain)
                        <tr>
                            <td>{{ $complain->pesan }}</td>
                            <td>
                                @if($complain->tanggapan)
                                    {{ $complain->tanggapan }}
                                @else
                                    <em class="text-muted">Belum ditanggapi</em>
                                @endif
                            </td>
                            <td>{{ $complain->created_at->format('d M Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-3">
            {{ $complains->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
