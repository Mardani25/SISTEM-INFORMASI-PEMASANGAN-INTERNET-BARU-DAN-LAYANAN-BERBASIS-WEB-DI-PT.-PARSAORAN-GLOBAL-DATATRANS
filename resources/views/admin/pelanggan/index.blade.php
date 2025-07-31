<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Manajemen Pelanggan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <!-- Tombol Kembali -->
    <a href="/admin/dashboard" class="btn btn-outline-primary rounded-pill px-4 py-2 shadow-sm d-inline-flex align-items-center mb-3">
        <i class="bi bi-arrow-left me-2"></i>
        Kembali ke Dashboard
    </a>

    <h2 class="mb-4 text-primary">Manajemen Data Pelanggan</h2>

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Form Tambah --}}
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">Tambah Pelanggan Baru</div>
        <div class="card-body">
            <form action="{{ route('admin.pelanggan.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Telepon</label>
                        <input type="text" name="telepon" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control">
                    </div>
                </div>
                <div class="mt-3 text-end">
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Tabel Data --}}
<div class="card">
    <div class="card-header bg-secondary text-white">Daftar Pelanggan</div>
    <div class="card-body table-responsive">
        <table class="table table-bordered table-sm align-middle">
            <thead class="table-light">
                <tr>
                    <th style="min-width: 120px;">Nama</th>
                    <th style="min-width: 150px;">Email</th>
                    <th style="min-width: 100px;">Telepon</th>
                    <th style="min-width: 150px;">Alamat</th>
                    <th class="text-center" style="min-width: 120px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pelanggan as $p)
                <tr class="align-top">
                    <td>
                        <form action="{{ route('admin.pelanggan.update', $p->id) }}" method="POST" class="d-flex flex-column gap-2">
                            @csrf
                            @method('PUT')
                            <input type="text" name="name" value="{{ $p->name }}" class="form-control form-control-sm" required>
                    </td>
                    <td>
                            <input type="email" name="email" value="{{ $p->email }}" class="form-control form-control-sm" required>
                    </td>
                    <td>
                            <input type="text" name="telepon" value="{{ $p->telepon }}" class="form-control form-control-sm">
                    </td>
                    <td>
                            <input type="text" name="alamat" value="{{ $p->alamat }}" class="form-control form-control-sm">
                    </td>
                    <td class="text-center">
                        <div class="d-flex flex-column gap-1">
                            <button type="submit" class="btn btn-warning btn-sm w-100">Update</button>
                        </form>
                        <form action="{{ route('admin.pelanggan.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pelanggan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm w-100">Hapus</button>
                        </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginasi -->
        <div class="mt-3">
            {{ $pelanggan->appends(request()->query())->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
