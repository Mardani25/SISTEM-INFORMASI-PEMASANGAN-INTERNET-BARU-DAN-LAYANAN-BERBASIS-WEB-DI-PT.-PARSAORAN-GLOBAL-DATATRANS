<!DOCTYPE html>
<html lang="id">
<head>
    @include('teknisi.header')

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal & Komplain Teknisi</title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-4">

        <!-- Tombol Kembali -->
        <a href="/teknisi/dashboard" class="btn btn-outline-primary rounded-pill px-4 py-2 shadow-sm d-inline-flex align-items-center mb-3">
            <i class="bi bi-arrow-left me-2"></i> Kembali ke Dashboard
        </a>

        <!-- ================== JADWAL TEKNISI ================== -->
        <h2 class="mb-4">📅 Jadwal Tugas Teknisi - 
            {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('l, d F Y') }}
        </h2>

        <!-- Form Filter Tanggal -->
        <form method="GET" action="{{ route('teknisi.jadwal') }}" class="mb-4">
            <label for="tanggal">Pilih Tanggal:</label>
            <input type="date" name="tanggal" id="tanggal" value="{{ $tanggal }}" class="form-control" onchange="this.form.submit()">
        </form>

        <!-- Tabel Jadwal -->
@if($jadwals->isEmpty())
    <div class="alert alert-info">Tidak ada jadwal tugas untuk tanggal ini.</div>
@else
    <div class="table-responsive mb-5">
        <table class="table table-bordered">
    <thead class="thead-light">
        <tr>
            <th>Waktu</th>
            <th>Pelanggan</th>
            <th>Alamat</th>
            <th>Layanan</th>
            <th>Keterangan</th>
            <th>Status Kehadiran</th>
            <th>Foto Bukti</th>
            <th>Pesan Kontrol</th> <!-- Tambahan kolom -->
        </tr>
    </thead>
    <tbody>
    @foreach($jadwals as $jadwal)
        <tr>
            <td>{{ \Carbon\Carbon::parse($jadwal->waktu)->format('H:i') }}</td>
            <td>{{ $jadwal->pemesanan->user->name ?? '-' }}</td>
            <td>{{ $jadwal->pemesanan->user->alamat ?? '-' }}</td>
            <td>{{ $jadwal->pemesanan->layanan->nama_layanan ?? '-' }}</td>
            <td>{{ $jadwal->pemesanan->keterangan ?? '-' }}</td>
            
            <!-- Status Kehadiran -->
            <td>
                <form action="{{ route('teknisi.updateKehadiran', $jadwal->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <select name="status_kehadiran" class="form-control form-control-sm" onchange="this.form.submit()">
                        <option value="belum_hadir" {{ $jadwal->status_kehadiran == 'belum_hadir' ? 'selected' : '' }}>
                            Belum Hadir
                        </option>
                        <option value="hadir" {{ $jadwal->status_kehadiran == 'hadir' ? 'selected' : '' }}>
                            Hadir / Selesai
                        </option>
                    </select>
                </form>
            </td>

            <!-- Upload/Lihat Bukti -->
            <td>
                @if ($jadwal->status_kehadiran == 'hadir' && !$jadwal->bukti_foto)
                    <form action="{{ route('teknisi.uploadBukti', $jadwal->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">  
                            <input type="file" name="bukti_foto" class="form-control form-control-sm" required>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">Upload Foto</button>
                    </form>
                @elseif ($jadwal->bukti_foto)
                    <a href="{{ asset('/storage/app/public/bukti_foto/' . $jadwal->bukti_foto) }}" target="_blank" class="btn btn-outline-info btn-sm">Lihat</a>
                @else
                    <span class="text-muted">Belum ada</span>
                @endif
            </td>

            <!-- Pesan/Complain -->
            <td>
                <form action="{{ route('teknisi.kirimComplain', $jadwal->id) }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="pesan" class="form-control form-control-sm" 
                               value="{{ $jadwal->complain->pesan ?? '' }}" 
                               placeholder="Tulis pesan...">
                        <button class="btn btn-sm btn-success" type="submit">Kirim</button>
                    </div>
                    @if($jadwal->complain && $jadwal->complain->tanggapan)
                        <small class="text-muted">Tanggapan: {{ $jadwal->complain->tanggapan }}</small>
                    @endif
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>    
</table>

    </div>

    <!-- 🔥 Form Komplain -->
    <div class="card mb-4">
        <div class="card-header bg-warning text-white">
            Kirim Komplain / Pesan ke Admin
        </div>
        <div class="card-body">
            <form action="{{ route('teknisi.complain.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <textarea name="pesan" class="form-control" rows="3" placeholder="Tuliskan pesan atau komplain..." required></textarea>
                </div>
                <button type="submit" class="btn btn-warning">Kirim</button>
            </form>
        </div>
    </div>

    <!-- 🔥 Riwayat Komplain -->
    <h5>Riwayat Komplain</h5>
    @if($complains->isEmpty())
        <p class="text-muted">Belum ada komplain yang dikirim.</p>
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
                        <td>{{ $complain->tanggapan ?? 'Belum ada tanggapan' }}</td>
                        <td>{{ $complain->created_at->format('d-m-Y H:i') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $complains->links() }}
        </div>
    @endif
@endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
