<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\JadwalTeknisi;
use App\Models\Pemesanan;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    // ================== TEKNISI ==================
    public function index(Request $request)
    {
        $query = User::where('role', 'teknisi');

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
            });
        }

        $teknisis = $query->paginate(5);

        return view('admin.teknisi.index', compact('teknisis'));
    }

    public function create()
    {
        return view('admin.teknisi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'telepon' => 'nullable|string|max:15',
            'alamat' => 'nullable|string|max:255',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'teknisi',
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('teknisi.index')->with('success', 'Akun teknisi berhasil dibuat');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'telepon' => 'nullable|string|max:15',
            'alamat' => 'nullable|string|max:255',
        ]);

        $user->update($request->only(['name', 'email', 'telepon', 'alamat']));

        return redirect()->route('teknisi.index')->with('success', 'Data teknisi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $teknisi = User::findOrFail($id);
        $teknisi->delete();

        Notification::create([
            'id_user' => Auth::id(),
            'message' => 'Akun teknisi ' . $teknisi->name . ' telah dihapus.',
        ]);

        return redirect()->route('teknisi.index')->with('success', 'Akun teknisi berhasil dihapus');
    }

    // ================== JADWAL TEKNISI ==================
    public function jadwalIndex()
    {
        $jadwals = JadwalTeknisi::with(['teknisi', 'pemesanan'])->paginate(10);
        return view('admin.teknisi.jadwal_index', compact('jadwals'));
    }

public function jadwalCreate()
{
    $teknisis = User::where('role', 'teknisi')->get();

    // Ambil hanya pemesanan yang sudah dibayar (lunas)
    $pemesanans = Pemesanan::with('pelanggan')
        ->where('status_pembayaran', 'lunas')
        ->get();

    return view('admin.teknisi.jadwal_create', compact('teknisis', 'pemesanans'));
}


    public function jadwalStore(Request $request)
    {
        $request->validate([
            'id_teknisi' => 'required|exists:users,id',
            'id_pemesanan' => 'required|exists:pemesanans,id',
            'tanggal' => 'required|date|after_or_equal:today',
            'waktu' => 'required|date_format:H:i',
        ]);

        JadwalTeknisi::create([
            'id_teknisi' => $request->id_teknisi,
            'id_pemesanan' => $request->id_pemesanan,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
        ]);

        Notification::create([
            'id_user' => $request->id_teknisi,
            'message' => 'Jadwal baru telah dibuat untuk Anda pada tanggal ' . $request->tanggal . ' pukul ' . $request->waktu,
        ]);

        return redirect()->route('admin.teknisi.jadwal.index')->with('success', 'Jadwal teknisi berhasil dibuat');
    }

    public function jadwalDestroy(JadwalTeknisi $jadwal)
    {
        $jadwal->delete();

        Notification::create([
            'id_user' => Auth::id(),
            'message' => 'Jadwal teknisi ID ' . $jadwal->id_teknisi . ' telah dihapus.',
        ]);

        return redirect()->route('admin.teknisi.jadwal.index')->with('success', 'Jadwal teknisi berhasil dihapus');
    }

    // ================== PELANGGAN ==================
    public function pelangganIndex()
    {
        $pelanggan = User::where('role', 'pelanggan')->paginate(5);
        return view('admin.pelanggan.index', compact('pelanggan'));
    }

    public function pelangganStore(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'alamat' => $request->email,
            'role' => 'pelanggan',
            'password' => bcrypt('default123'),
        ]);

        Notification::create([
            'id_user' => Auth::id(),
            'message' => 'Pelanggan baru bernama ' . $request->name . ' berhasil ditambahkan.',
        ]);

        return redirect()->route('admin.pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    public function pelangganUpdate(Request $request, $id)
    {
        $pelanggan = User::findOrFail($id);
        $pelanggan->update($request->only(['name', 'email', 'telepon', 'alamat']));

        Notification::create([
            'id_user' => Auth::id(),
            'message' => 'Pelanggan ' . $request->name . ' berhasil diperbarui.',
        ]);

        return redirect()->route('admin.pelanggan.index')->with('success', 'Pelanggan berhasil diupdate.');
    }

    public function pelangganDestroy($id)
    {
        $pelanggan = User::findOrFail($id);
        $pelanggan->delete();

        Notification::create([
            'id_user' => Auth::id(),
            'message' => 'Pelanggan ' . $pelanggan->name . ' telah dihapus.',
        ]);

        return redirect()->route('admin.pelanggan.index')->with('success', 'Pelanggan berhasil dihapus.');
    }
}
