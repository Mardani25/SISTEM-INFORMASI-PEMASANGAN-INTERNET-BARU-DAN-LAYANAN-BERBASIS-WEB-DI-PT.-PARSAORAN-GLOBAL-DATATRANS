<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pemasangan</title>
    <style>
        /* Styling tambahan untuk tampilan halaman */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        h3 {
            color: #4A90E2;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4A90E2;
            color: white;
            font-size: 16px;
        }

        td {
            font-size: 14px;
        }

        .btn {
            padding: 10px 15px;
            color: #fff;
            background-color: #4A90E2;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .btn-danger {
            background-color: #E94E77;
        }

        .btn:hover {
            background-color: #3e7fd2;
        }

        .btn-danger:hover {
            background-color: #e0445f;
        }

        .status-change {
            padding: 5px 10px;
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            background-color: #f9f9f9;
            cursor: pointer;
        }

        select:focus {
            outline: none;
            border-color: #4A90E2;
        }

        .status-change option {
            padding: 8px;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .action-buttons {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .form-update {
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Status Pemasangan</h1>

        <div class="table-responsive">
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Pelanggan</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Layanan</th>
            <th>Harga</th>
            <th>Keterangan</th>
            <th>Status</th>
        </tr>
    </thead>
<tbody>
    @foreach ($pembayarans as $pembayaran)
        @php
            $pemesan = $pembayaran->pemesanan;
            $pelanggan = $pemesan->pelanggan ?? null;
            $user = $pelanggan->user ?? null;
            $layanan = $pemesan->layanan ?? null;
        @endphp
        <tr>
            <td>{{ $pemesan->id ?? '-' }}</td>
            <td>{{ $user->name ?? 'Tidak Tersedia' }}</td>
            <td>{{ $user->telepon ?? '-' }}</td>
            <td>{{ $user->alamat ?? '-' }}</td>
            <td>{{ $layanan->nama_layanan ?? '-' }}</td>
            <td>Rp {{ number_format($layanan->harga ?? 0, 0, ',', '.') }}</td>
            <td>{{ $pemesan->keterangan ?? '-' }}</td>
            <td>
                <span class="badge" style="
                    padding: 5px 10px;
                    border-radius: 4px;
                    background-color: 
                        {{ $pemesan->status == 'completed' ? '#28a745' : 
                        ($pemesan->status == 'confirmed' ? '#007bff' : 
                        ($pemesan->status == 'pending' ? '#ffc107' : '#dc3545')) }};
                    color: white;
                ">
                    {{ ucfirst($pemesan->status) }}
                </span>
            </td>
        </tr>
    @endforeach
</tbody>
<tbody>
    @foreach ($pembayarans as $pembayaran)
        @php
            $pemesan = $pembayaran->pemesanan;
            $pelanggan = $pemesan->pelanggan ?? null;
            $user = $pelanggan->user ?? null;
            $layanan = $pemesan->layanan ?? null;
        @endphp
        <tr>
            <td>{{ $pemesan->id ?? '-' }}</td>
            <td>{{ $user->name ?? 'Tidak Tersedia' }}</td>
            <td>{{ $user->telepon ?? '-' }}</td>
            <td>{{ $user->alamat ?? '-' }}</td>
            <td>{{ $layanan->nama_layanan ?? '-' }}</td>
            <td>Rp {{ number_format($layanan->harga ?? 0, 0, ',', '.') }}</td>
            <td>{{ $pemesan->keterangan ?? '-' }}</td>
            <td>
                <span class="badge" style="
                    padding: 5px 10px;
                    border-radius: 4px;
                    background-color: 
                        {{ $pemesan->status == 'completed' ? '#28a745' : 
                        ($pemesan->status == 'confirmed' ? '#007bff' : 
                        ($pemesan->status == 'pending' ? '#ffc107' : '#dc3545')) }};
                    color: white;
                ">
                    {{ ucfirst($pemesan->status) }}
                </span>
            </td>
        </tr>
    @endforeach
</tbody>

</table>

        </div>
    </div>
</body>
</html>
