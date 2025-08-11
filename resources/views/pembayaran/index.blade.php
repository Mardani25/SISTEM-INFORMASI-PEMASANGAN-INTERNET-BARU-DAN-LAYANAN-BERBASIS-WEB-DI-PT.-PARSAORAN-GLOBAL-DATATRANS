<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pembayaran</title>

    <!-- Snap Midtrans -->
<script src="{{ config('midtrans.isProduction') ? 'https://app.midtrans.com/snap/snap.js' : 'https://app.sandbox.midtrans.com/snap/snap.js' }}" data-client-key="{{ config('midtrans.clientKey') }}"></script>

    <!-- Bootstrap & Google Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #e0eafc, #cfdef3);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
        }

        .btn-pay {
            background: linear-gradient(to right, #4a90e2, #007aff);
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            padding: 12px 24px;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 122, 255, 0.3);
        }

        .btn-pay:hover {
            background: linear-gradient(to right, #007aff, #4a90e2);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 122, 255, 0.4);
        }

        .back-link {
            margin-top: 10px;
            display: block;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card p-4">
        <h3 class="text-center mb-3">Pembayaran Layanan</h3>

        <div class="text-center mb-3">
            <p class="mb-1">Layanan: <strong>{{ $pemesanan->layanan->nama_layanan }}</strong></p>
            <p class="mb-4">Total: <strong>Rp{{ number_format($pemesanan->layanan->harga, 0, ',', '.') }}</strong></p>
            <button id="pay-button" class="btn btn-pay">Bayar Sekarang</button>
        </div>

        <div class="text-center">
            <a href="/pelanggan/dashboard" class="btn btn-outline-secondary">← Kembali ke Dashboard</a>
        </div>
    </div>
</div>

<!-- Midtrans Payment Script -->
<script>
document.getElementById('pay-button').addEventListener('click', function () {
    // Jika ada loading, bisa ditambahkan di sini

    snap.pay('{{ $snapToken }}', {
        onSuccess: function(result){
            fetch('/pembayaran/simpan', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    id: {{ $pemesanan->id }},
                    gross_amount: result.gross_amount,
                    transaction_status: result.transaction_status
                })
            })
            .then(response => response.json())
            .then(data => {
                window.location.href = data.redirect;
            })
            .catch(error => {
                console.error('Error saat menyimpan pembayaran:', error);
                alert('Terjadi kesalahan saat menyimpan pembayaran.');
            });
        },
        onPending: function() {
            alert("Menunggu pembayaran...");
        },
        onError: function() {
            alert("Pembayaran gagal.");
        },
        onClose: function() {
            alert("Anda menutup jendela pembayaran.");
        }
    });
});

</script>


</body>
</html>
