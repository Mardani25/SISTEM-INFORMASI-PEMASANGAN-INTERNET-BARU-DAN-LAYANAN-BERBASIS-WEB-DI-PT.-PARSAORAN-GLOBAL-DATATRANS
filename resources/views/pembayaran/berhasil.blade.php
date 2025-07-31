<h1>Pembayaran Berhasil</h1>
<p>Terima kasih, pembayaran Anda berhasil diproses.</p>

<h3>Riwayat Pembayaran Anda:</h3>
<ul>
@foreach($pembayarans as $pembayaran)
    <li>{{ $pembayaran->tanggal_bayar }} - Rp{{ number_format($pembayaran->jumlah) }} - Status: {{ $pembayaran->status_pembayaran }}</li>
@endforeach
</ul>
