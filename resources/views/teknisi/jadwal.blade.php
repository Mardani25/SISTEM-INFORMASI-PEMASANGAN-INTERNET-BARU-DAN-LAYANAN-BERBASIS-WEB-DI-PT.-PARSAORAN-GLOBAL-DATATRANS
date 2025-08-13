    <!DOCTYPE html>
    <html lang="id">
    <head>
        @include('teknisi.header')
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Jadwal Teknisi</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container py-4">
            <!-- Tombol Kembali -->
            <a href="/teknisi/dashboard" class="btn btn-outline-primary rounded-pill px-4 py-2 shadow-sm d-inline-flex align-items-center mb-3">
                <i class="bi bi-arrow-left me-2"></i> Kembali ke Dashboard
            </a>

            <!-- Judul -->
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
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>Waktu</th>
                                <th>Pelanggan</th>
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
                    </a>
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
        </div>
    </body>
    </html>
