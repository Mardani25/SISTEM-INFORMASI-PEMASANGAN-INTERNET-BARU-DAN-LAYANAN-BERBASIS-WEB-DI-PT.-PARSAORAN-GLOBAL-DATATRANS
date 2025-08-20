<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Complain;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notification;

class ComplainController extends Controller
{
    // ✅ Index komplain (role-based)
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        // Pelanggan & Teknisi → hanya lihat komplain miliknya
        if ($user->role === 'pelanggan' || $user->role === 'teknisi') {
            $complains = Complain::where('id_user', $user->id)
                ->orderByDesc('created_at')
                ->paginate(5);

            $view = $user->role . '.komplain'; // pelanggan.komplain / teknisi.komplain
            return view($view, compact('complains'));
        }

        // Admin diarahkan ke halaman admin
        if ($user->role === 'admin') {
            return $this->adminIndex();
        }

        // Default: tidak diizinkan
        return abort(403, 'Unauthorized');
    }

    // ✅ Simpan komplain
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
        $receivers = collect(); 
        if ($user->role === 'pelanggan' || $user->role === 'teknisi') {
            // pelanggan/teknisi → selalu kirim ke admin
            $receivers = User::where('role', 'admin')->get();
        } elseif ($user->role === 'admin') {
            // admin → kirim ke teknisi
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

    // ✅ Daftar semua komplain untuk admin
    public function adminIndex()
    {
        $complains = Complain::orderBy('created_at', 'desc')
            ->paginate(5);

        return view('admin.komplain', compact('complains'));
    }

    // ✅ Admin memberikan tanggapan
    public function tanggapi(Request $request, $id)
    {
        $request->validate([
            'tanggapan' => 'required|string|max:1000',
        ]);

        $complain = Complain::findOrFail($id);
        $complain->tanggapan = $request->tanggapan;
        $complain->save();

        return redirect()->route('admin.komplain')->with('success', 'Tanggapan berhasil dikirim.');
    }
}
