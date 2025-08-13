<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Buat Jadwal Teknisi</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Gaya tambahan agar mobile-friendly -->
    <style>
        .form-label {
            font-weight: bold;
        }
        .back-button {
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 1000;
        }

        @media (max-width: 576px) {
            h2 {
                font-size: 1.25rem;
            }

            .btn {
                font-size: 0.9rem;
                padding: 0.4rem 0.8rem;
            }

            .form-control,
            .form-select {
                font-size: 0.9rem;
            }

            .select2-container .select2-selection--single {
                height: 38px;
                padding: 4px;
                font-size: 0.9rem;
            }

            .select2-container--default .select2-selection--single .select2-selection__rendered {
                line-height: 28px;
            }

            .select2-container--default .select2-selection--single .select2-selection__arrow {
                top: 5px;
            }
        }
    </style>
</head>
<body class="bg-light p-4">

    <!-- Tombol kembali -->
    <a href="/admin/dashboard" class="btn btn-outline-primary rounded-pill shadow-sm d-inline-flex align-items-center back-button">
        <i class="bi bi-arrow-left me-2"></i> Kembali
    </a>

    <div class="container mt-5 pt-4">
        <h2 class="mb-4 text-center">Buat Jadwal Teknisi</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan!</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.teknisi.jadwal.store') }}" method="POST" class="shadow-sm p-4 rounded bg-white">
            @csrf

            <div class="mb-3">
                <label for="id_teknisi" class="form-label">Teknisi</label>
                <select id="id_teknisi" name="id_teknisi" class="form-select" required>
                    <option value="">Pilih Teknisi</option>
                    @foreach ($teknisis as $teknisi)
                        <option value="{{ $teknisi->id }}">{{ $teknisi->name }}</option>
                    @endforeach
                </select>
            </div>

<div class="mb-3">
    <label for="id_pemesanan" class="form-label">Pemesanan</label>
    <select id="id_pemesanan" name="id_pemesanan" class="form-select" required>
        <option value="">Pilih Pemesanan</option>
        @foreach ($pemesanans as $pemesanan)
            <option value="{{ $pemesanan->id }}">
                #{{ $pemesanan->id }} - 
                {{ $pemesanan->user->name ?? 'Tanpa Nama' }} |
                {{ $pemesanan->layanan->nama_layanan ?? '-' }} |
                Rp{{ number_format($pemesanan->layanan->harga ?? 0, 0, ',', '.') }} |
                    Jadwal: {{ $pemesanan->jadwal_pemasangan ? \Carbon\Carbon::parse($pemesanan->jadwal_pemasangan)->format('Y-m-d') : '-' }}
            </option>
        @endforeach
    </select>
</div>



            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" class="form-control" required />
            </div>

            <div class="mb-3">
                <label for="waktu" class="form-label">Waktu</label>
                <input type="time" id="waktu" name="waktu" class="form-control" required />
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Simpan Jadwal</button>
                <a href="{{ route('admin.teknisi.jadwal.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#id_teknisi').select2({
                placeholder: 'Pilih Teknisi',
                allowClear: true,
                width: '100%'
            });

            $('#id_pemesanan').select2({
                placeholder: 'Pilih Pemesanan',
                allowClear: true,
                width: '100%'
            });
        });
    </script>
</body>
</html>
