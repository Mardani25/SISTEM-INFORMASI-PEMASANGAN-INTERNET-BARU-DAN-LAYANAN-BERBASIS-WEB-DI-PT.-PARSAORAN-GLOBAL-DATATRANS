@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Pemesanan</h2>
    <a href="{{ route('pemesanans.create') }}" class="btn btn-primary mb-3">Tambah Pemesanan</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Pelanggan</th>
                <th>Layanan</th>
                <th>Jadwal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pemesanans as $item)
            <tr>
                <td>{{ $item->pelanggan->nama }}</td>
                <td>{{ $item->layanan->nama_layanan }}</td>
                <td>{{ $item->jadwal_pemasangan }}</td>
                <td>{{ $item->status }}</td>
                <td>
                    <a href="{{ route('pemesanans.show', $item->id) }}" class="btn btn-sm btn-info">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
