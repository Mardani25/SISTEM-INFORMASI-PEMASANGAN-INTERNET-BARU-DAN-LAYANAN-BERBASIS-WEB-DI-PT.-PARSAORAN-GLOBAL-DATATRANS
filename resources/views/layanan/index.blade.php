<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Manajemen Layanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Tombol dengan margin atas dan kiri -->
    <a href="/admin/dashboard" class="btn btn-outline-primary rounded-pill px-4 py-2 shadow-sm d-inline-flex align-items-center mt-4 ms-4">
        <i class="bi bi-arrow-left me-2"></i> Kembali ke Dashboard
    </a>
</head>
<body class="bg-light">
<div class="container py-5">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h2 class="mb-4 text-primary">Tambah Layanan Baru</h2>
    <div class="card mb-5">
        <div class="card-body">
            <form action="/layanan" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-4">
                        <input type="text" name="nama_layanan" class="form-control" placeholder="Nama Layanan" required />
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="kecepatan" class="form-control" placeholder="Kecepatan" required />
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="harga" class="form-control harga-format" placeholder="Harga" required />
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>


    <h2 class="mb-4 text-secondary">Daftar Layanan</h2>
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Nama Layanan</th>
                        <th>Kecepatan</th>
                        <th>Harga</th>
                        <th colspan="2" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($layanan as $data)
                    <tr>
                        <form action="/layanan/{{ $data->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <td>
                                <input type="text" name="nama_layanan" class="form-control" value="{{ $data->nama_layanan }}" />
                            </td>
                            <td>
                                <input type="text" name="kecepatan" class="form-control" value="{{ $data->kecepatan }}" />
                            </td>
                            <td>
                                <input type="text" name="harga" class="form-control harga-format" value="{{ number_format($data->harga, 0, ',', '.') }}" />
                            </td>
                            <td class="text-center">
                                <button type="submit" class="btn btn-warning btn-sm">Update</button>
                            </td>
                        </form>
                        <td class="text-center">
                            <form action="/layanan/{{ $data->id }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus layanan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @if($layanan->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center">Belum ada layanan tersedia.</td>
                        </tr>
                    @endif
                </tbody>
            </table>

            <!-- Pagination di bawah tabel -->
            <div class="mt-3 d-flex justify-content-center">
                {!! $layanan->links() !!}
            </div>



        </div>

    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
  function formatRupiah(angka, prefix) {
    let number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
      let separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix === undefined ? rupiah : (rupiah ? prefix + ' ' + rupiah : '');
  }

  document.querySelectorAll('.harga-format').forEach(function(input) {
    input.addEventListener('keyup', function(e) {
      this.value = formatRupiah(this.value, 'Rp');
    });
  });
</script>
</body>
</html>
