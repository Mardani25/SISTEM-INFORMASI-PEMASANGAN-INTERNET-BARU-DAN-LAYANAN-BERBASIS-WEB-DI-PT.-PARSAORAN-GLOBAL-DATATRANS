<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Layanan;
use App\Models\User;
use App\Models\Pemesanan;
use App\Models\Pembayaran;
use App\Models\Notification;
use App\Models\JadwalTeknisi;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Redirect user berdasarkan role setelah login.
     */
    public function redirectByRole()
    {
        $user = Auth::user();

        switch ($user->role) {
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'teknisi':
                return redirect()->route('teknisi.dashboard');
            case 'pelanggan':
                return redirect()->route('pelanggan.dashboard');
            default:
                Auth::logout();
                return redirect('/login')->withErrors(['role' => 'Role tidak dikenali.']);
        }
    }

    /**
     * Tampilkan dashboard admin.
     */
    public function adminDashboard()
    {
        $jumlahLayanan = Layanan::count();
        $jumlahTeknisi = User::where('role', 'teknisi')->count();
        $jumlahPelanggan = User::where('role', 'pelanggan')->count();
        $jumlahPemesanan = Pemesanan::count();
        $jumlahPembayaran = Pembayaran::count();

        $notifications = Notification::where('id_user', Auth::id())
                            ->orderBy('created_at', 'desc')
                            ->get();

        $unreadCount = Notification::where('id_user', Auth::id())
                            ->where('is_read', false)
                            ->count();

        return view('dashboard.admin', compact(
            'jumlahLayanan',
            'jumlahTeknisi',
            'jumlahPelanggan',
            'jumlahPemesanan',
            'jumlahPembayaran',
            'notifications',
            'unreadCount'
        ));
    }

    /**
     * Tampilkan dashboard teknisi.
     */
public function teknisiDashboard(Request $request)
{
    $jumlahLayanan = Layanan::count();
    $jumlahTeknisi = User::where('role', 'teknisi')->count();
    $jumlahPelanggan = User::where('role', 'pelanggan')->count();
    $jumlahPemesanan = Pemesanan::count();
    $jumlahPembayaran = Pembayaran::count();

    $idUser = Auth::id();

    $tanggal = $request->input('tanggal', now()->toDateString());

    // Ganti id_teknisi => id_user
    $jadwals = JadwalTeknisi::where('id_user', $idUser)
                    ->with(['pemesanan', 'user']) 
                    ->get();

    $jumlahJadwalSelesaiBulanIni = JadwalTeknisi::where('id_user', $idUser)
        ->where('status_kehadiran', 'hadir')
        ->whereMonth('updated_at', Carbon::now()->month)
        ->whereYear('updated_at', Carbon::now()->year)
        ->count();

    $notifications = Notification::where('id_user', $idUser)
                        ->orderBy('created_at', 'desc')
                        ->get();

    $unreadCount = Notification::where('id_user', $idUser)
                        ->where('is_read', false)
                        ->count();

    return view('dashboard.teknisi', compact(
        'jumlahLayanan',
        'jumlahTeknisi',
        'jumlahPelanggan',
        'jumlahPemesanan',
        'jumlahPembayaran',
        'jadwals',
        'tanggal',
        'jumlahJadwalSelesaiBulanIni',
        'notifications',
        'unreadCount'
    ));
}


    /**
     * Tampilkan dashboard pelanggan.
     */
    public function pelangganDashboard()
    {
        $layanans = Layanan::all();
        return view('dashboard.pelanggan', compact('layanans'));
    }

    /**
     * Tampilkan halaman welcome (landing page).
     */
    public function welcome()
    {
        $layanans = Layanan::all();
        return view('dashboard.welcome', compact('layanans'));
    }
}
