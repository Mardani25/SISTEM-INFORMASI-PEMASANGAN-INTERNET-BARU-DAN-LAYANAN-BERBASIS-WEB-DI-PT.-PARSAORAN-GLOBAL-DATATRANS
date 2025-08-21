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
                        </tr>
                    @endforeach
                    </tbody>    
                </table>
            </div>
        @endif

        <!-- ================== KOMPLAIN TEKNISI ================== -->
        <h2 class="text-primary">💬 Kontrol Teknisi ke Admin</h2>

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
