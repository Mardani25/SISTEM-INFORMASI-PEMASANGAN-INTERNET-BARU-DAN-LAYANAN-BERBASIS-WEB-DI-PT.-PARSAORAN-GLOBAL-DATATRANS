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
    // ✅ Komplain pelanggan (index)
    public function index()
    {
        $user = Auth::user();

        if (!$user || $user->role !== 'pelanggan') {
            return view('pelanggan.komplain', ['complains' => collect()]);
        }

        $complains = Complain::where('id_user', $user->id)
            ->orderByDesc('created_at')
            ->paginate(5);  // 5 data per halaman

        return view('pelanggan.komplain', compact('complains'));
    }

    // ✅ Simpan komplain dari pelanggan
    public function store(Request $request)
    {
        $request->validate([
            'pesan' => 'required|string|max:1000',
        ]);

        $user = Auth::user();

        if (!$user || $user->role !== 'pelanggan') {
            return redirect()->route('complain.index')->with('error', 'Anda belum login sebagai pelanggan.');
        }

        // Simpan komplain
        Complain::create([
            'id_user' => $user->id,
            'pesan' => $request->pesan,
        ]);

        // Kirim notifikasi ke semua admin
        $admins = User::where('role', 'admin')->get();
        foreach ($admins as $admin) {
            Notification::create([
                'id_user' => $admin->id,
                'role' => 'admin',
                'type' => 'komplain',
                'message' => 'Pelanggan ' . $user->name . ' mengirimkan komplain baru.',
                'is_read' => false,
            ]);
        }

        return redirect()->route('pelanggan.komplain')->with('success', 'Komplain berhasil dikirim.');
    }

    // ✅ Tampilkan daftar semua komplain untuk admin
    public function adminIndex()
    {
        $complains = Complain::where('created_at', '>=', Carbon::now()->subDays(3))
            ->orderBy('created_at', 'desc')
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
