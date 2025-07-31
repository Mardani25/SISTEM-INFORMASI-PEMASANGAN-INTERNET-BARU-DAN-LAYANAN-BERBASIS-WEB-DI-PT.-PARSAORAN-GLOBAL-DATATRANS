<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Daftar Jadwal Teknisi</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet" />

  <!-- CSS Responsif -->
  <style>
    .back-button {
      position: fixed;
      top: 20px;
      left: 20px;
      z-index: 1000;
    }

    @media (max-width: 576px) {
      .table th,
      .table td {
        font-size: 0.75rem;
        padding: 0.5rem;
      }

      h2 {
        font-size: 1.25rem;
      }

      .btn,
      .form-control,
      select {
        font-size: 0.85rem;
      }

      .back-button {
        top: 10px;
        left: 10px;
        padding: 0.4rem 0.8rem;
        font-size: 0.8rem;
      }

      .btn-sm {
        font-size: 0.7rem;
        padding: 0.25rem 0.5rem;
      }

      input[type="file"] {
        font-size: 0.75rem;
      }
    }
  </style>
</head>
<body class="bg-light text-dark">

  <!-- Tombol Kembali -->
  <a href="/admin/dashboard" class="btn btn-outline-primary rounded-pill px-4 py-2 shadow-sm d-inline-flex align-items-center back-button">
    <i class="bi bi-arrow-left me-2"></i> Kembali
  </a>

  <div class="container mt-5 pt-5">
    <h2 class="mb-4">Daftar Jadwal Teknisi</h2>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.teknisi.jadwal.create') }}" class="btn btn-primary mb-3">Tambah Jadwal</a>

    <div class="table-responsive">
      <table class="table table-bordered table-hover align-middle">
        <thead class="table-light text-center">
          <tr>
            <th>No</th>
            <th>Nama Teknisi</th>
            <th>Jadwal</th>
            <th>Waktu</th>
            <th>Pelanggan</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Keterangan</th>
            <th>Kehadiran</th>
            <th>Bukti</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($jadwals as $index => $jadwal)
          <tr>
            <td class="text-center">{{ ($jadwals->currentPage() - 1) * $jadwals->perPage() + $index + 1 }}</td>
            <td>{{ $jadwal->teknisi->name ?? '-' }}</td>
            <td class="text-center">{{ \Carbon\Carbon::parse($jadwal->tanggal)->format('d-m-Y') }}</td>
            <td class="text-center">{{ \Carbon\Carbon::parse($jadwal->waktu)->format('H:i') }}</td>
            <td>{{ $jadwal->pemesanan->pelanggan->name ?? '-' }}</td>
            <td>{{ $jadwal->pemesanan->pelanggan->alamat ?? '-' }}</td>
            <td>{{ $jadwal->pemesanan->pelanggan->telepon ?? '-' }}</td>
            <td>{{ $jadwal->pemesanan->keterangan ?? '-' }}</td>
            <td class="text-center">
              <form action="{{ route('teknisi.updateKehadiran', $jadwal->id) }}" method="POST" class="m-0 p-0">
                @csrf
                @method('PUT')
                <select name="status_kehadiran" class="form-select form-select-sm" onchange="this.form.submit()">
                  <option value="belum_hadir" {{ $jadwal->status_kehadiran == 'belum_hadir' ? 'selected' : '' }}>Belum Hadir</option>
                  <option value="hadir" {{ $jadwal->status_kehadiran == 'hadir' ? 'selected' : '' }}>Hadir / Selesai</option>
                </select>
              </form>
            </td>
            <td class="text-center">
              @if ($jadwal->status_kehadiran == 'hadir' && !$jadwal->bukti_foto)
                <form action="{{ route('teknisi.uploadBukti', $jadwal->id) }}" method="POST" enctype="multipart/form-data" class="mb-0">
                  @csrf
                  <input type="file" name="bukti_foto" class="form-control form-control-sm mb-1" required>
                  <button type="submit" class="btn btn-sm btn-primary w-100">Upload</button>
                </form>
              @elseif ($jadwal->bukti_foto)
                <a href="{{ asset('storage/bukti_foto/' . $jadwal->bukti_foto) }}" target="_blank" class="btn btn-outline-info btn-sm">Lihat</a>
              @else
                <span class="text-muted">Belum ada</span>
              @endif
            </td>
            <td class="text-center">
              <form action="{{ route('admin.teknisi.jadwal.destroy', $jadwal->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus jadwal ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="11" class="text-center">Belum ada jadwal teknisi.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
      {{ $jadwals->links('pagination::bootstrap-5') }}
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
