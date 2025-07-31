<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pekerjaan Teknisi</title>
</head>
<body>
    <h1>Laporan Pekerjaan Teknisi</h1>

    <!-- Menampilkan Form untuk input laporan -->
    <form action="{{ route('teknisi.laporan.store', $jadwal->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="laporan_deskripsi">Deskripsi Laporan</label>
            <textarea name="laporan_deskripsi" id="laporan_deskripsi" rows="5" required>{{ old('laporan_deskripsi') }}</textarea>
        </div>

        <div>
            <label for="laporan_foto">Foto Pekerjaan (Opsional)</label>
            <input type="file" name="laporan_foto" id="laporan_foto">
        </div>

        <div>
            <button type="submit">Simpan Laporan</button>
        </div>
    </form>

    <div>
        <a href="{{ route('teknisi.dashboard') }}">Kembali ke Dashboard</a>
    </div>
</body>
</html>
