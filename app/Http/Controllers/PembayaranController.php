<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Notification;
use App\Models\User;
use Midtrans\Config as MidtransConfig;

class PembayaranController extends Controller
{

public function index($pemesananId)
{
    $pemesanan = Pemesanan::with('layanan')->findOrFail($pemesananId);

    MidtransConfig::$serverKey = env('MIDTRANS_SERVER_KEY', config('midtrans.server_key'));
    MidtransConfig::$clientKey = env('MIDTRANS_CLIENT_KEY', config('midtrans.client_key'));
    MidtransConfig::$isProduction = filter_var(env('MIDTRANS_IS_PRODUCTION', false), FILTER_VALIDATE_BOOLEAN);
    MidtransConfig::$isSanitized = true;
    MidtransConfig::$is3ds = true;

    if (empty(MidtransConfig::$serverKey) || empty(MidtransConfig::$clientKey)) {
        \Illuminate\Support\Facades\Log::error('Midtrans keys missing', [
            'MIDTRANS_SERVER_KEY' => env('MIDTRANS_SERVER_KEY'),
            'MIDTRANS_CLIENT_KEY' => env('MIDTRANS_CLIENT_KEY')
        ]);
        abort(500, 'Midtrans configuration missing.');
    }

    $params = [
        'transaction_details' => [
            'order_id' => 'ORDER-' . $pemesanan->id . '-' . time(),
            'gross_amount' => $pemesanan->layanan->harga,
        ],
        'customer_details' => [
            'first_name' => 'Pelanggan',
            'email' => $pemesanan->email ?? 'pelanggan@example.com',
        ],
    ];

    $snapToken = \Midtrans\Snap::getSnapToken($params);

    return view('pembayaran.index', compact('pemesanan', 'snapToken'));
}



public function simpan(Request $request)
{
    // Simpan data pembayaran
    Pembayaran::create([
        'id_pemesanan' => $request->id,
        'jumlah' => $request->gross_amount,
        'status_pembayaran' => $request->transaction_status,
        'tanggal_bayar' => now(),
    ]);

    // Ambil data pemesanan (untuk informasi tambahan di notifikasi)
    $pemesanan = Pemesanan::with('layanan')->find($request->id);

    // Kirim notifikasi ke semua admin
    $admins = User::where('role', 'admin')->get();
    foreach ($admins as $admin) {
        Notification::create([
            'id_user' => $admin->id,
            'role' => 'admin',
            'type' => 'pembayaran',
            'message' => 'Pelanggan ' . Auth::user()->name . ' telah melakukan pembayaran untuk layanan "' . ($pemesanan->layanan->nama_layanan ?? '-') . '".',
            'is_read' => false,
        ]);
    }

    return response()->json(['redirect' => url('/pembayaran/sukses/' . $request->id)]);
}

    
    public function sukses($pemesananId)
    {
        $pembayaran = Pembayaran::where('id_pemesanan', $pemesananId)->latest()->first();
        return view('pembayaran.sukses', compact('pembayaran'));
    }


public function riwayat()
{
    $userId = Auth::id();

    // Ambil semua pembayaran untuk user yang login
    $pembayaran = Pembayaran::whereHas('pemesanan', function ($query) use ($userId) {
        $query->where('id_user', $userId); // Ganti dari id_pelanggan
    })
    ->with('pemesanan.layanan')
    ->orderByDesc('tanggal_bayar')
    ->get();

    return view('riwayat', compact('pembayaran'));
}


    
}
