<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplainController extends Controller
{
    // ✅ Index komplain sesuai role
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        if ($user->role === 'pelanggan') {
            // Pelanggan hanya lihat komplainnya sendiri
            $complains = Complain::where('id_user', $user->id)->latest()->paginate(5);
            return view('pelanggan.komplain', compact('complains'));
        }

        if ($user->role === 'teknisi') {
            // Teknisi lihat semua komplain yg dia kirim
            $complains = Complain::where('id_user', $user->id)->latest()->paginate(5);
            return view('teknisi.komplain', compact('complains'));
        }

        if ($user->role === 'admin') {
            // Admin lihat semua komplain (dari pelanggan & teknisi)
            $complains = Complain::latest()->paginate(10);
            return view('admin.komplain', compact('complains'));
        }
    }

// Simpan komplain
public function store(Request $request)
{
    $request->validate([
        'pesan' => 'required|string|max:1000',
    ]);

    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login');
    }

    // Simpan komplain tanpa kolom tujuan
    $complain = Complain::create([
        'id_user' => $user->id,
        'pesan'   => $request->pesan,
    ]);

    // Tentukan penerima notifikasi berdasarkan role pengirim
    $receivers = collect(); // default kosong
    if ($user->role === 'pelanggan' || $user->role === 'teknisi') {
        // pelanggan/teknisi selalu ke admin
        $receivers = User::where('role', 'admin')->get();
    } elseif ($user->role === 'admin') {
        // admin hanya ke teknisi
        $receivers = User::where('role', 'teknisi')->get();
    }

    foreach ($receivers as $receiver) {
        Notification::create([
            'id_user' => $receiver->id,
            'role'    => $receiver->role,
            'type'    => 'komplain',
            'message' => ucfirst($user->role) . ' ' . $user->name . ' mengirimkan komplain baru.',
            'is_read' => false,
        ]);
    }

    return back()->with('success', 'Pesan berhasil dikirim.');
}


    // ✅ Admin memberi tanggapan
    public function tanggapi(Request $request, $id)
    {
        $request->validate([
            'tanggapan' => 'required|string|max:1000',
        ]);

        $complain = Complain::findOrFail($id);
        $complain->tanggapan = $request->tanggapan;
        $complain->save();

        return back()->with('success', 'Tanggapan berhasil dikirim.');
    }
}
