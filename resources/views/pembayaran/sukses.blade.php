<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pembayaran Berhasil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Penting untuk responsif -->
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Style -->
    <style>
        body {
            background: linear-gradient(135deg, #e0f7fa, #e8f5e9);
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .success-container {
            background-color: #ffffff;
            padding: 30px 20px;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            animation: fadeIn 1s ease-out;
            width: 100%;
            max-width: 450px;
        }

        .success-icon {
            width: 80px;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 1.75rem;
            color: #28a745;
            margin-bottom: 10px;
        }

        .lead {
            font-size: 1rem;
            margin-bottom: 24px;
        }

        .btn-primary {
            background: linear-gradient(to right, #007bff, #0056b3);
            border: none;
            padding: 10px 24px;
            font-weight: bold;
            border-radius: 8px;
            font-size: 1rem;
            transition: background 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(to right, #0056b3, #007bff);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<div class="success-container">
    <img src="https://cdn-icons-png.flaticon.com/512/845/845646.png" alt="Success Icon" class="success-icon">
    <h1>Pembayaran Berhasil!</h1>
    <p class="lead">Terima kasih, pembayaran Anda telah diproses dengan sukses.</p>
    <a href="{{ route('riwayat') }}" class="btn btn-primary">Lihat Riwayat</a>
</div>

</body>
</html>
