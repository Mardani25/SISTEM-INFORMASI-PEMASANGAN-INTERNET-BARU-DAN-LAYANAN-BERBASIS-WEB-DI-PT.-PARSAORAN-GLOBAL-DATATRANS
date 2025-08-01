<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Pemesanan;
use App\Models\Pembayaran;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemesananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::all();
        $pemesanans = Pemesanan::with('user', 'layanan')->paginate(10);
        $pemesanan = $pemesanans->first();

        // Ambil pembayaran yang sesuai dengan pemesanan
        $pembayaranIds = $pemesanans->pluck('id');
        $pembayaran = Pembayaran::whereIn('id_pemesanan', $pembayaranIds)->get();

        return view('pemesanan.index', compact('pemesanans', 'layanans', 'pemesanan', 'pembayaran'));
    }

public function indexte()
{
    $userId = Auth::id();

    // Pastikan user yang login memiliki role pelanggan
    $user = Auth::user();
    if ($user->role !== 'pelanggan') {
        return redirect()->back()->with('error', 'Hanya pelanggan yang dapat mengakses halaman ini.');
    }

    // Ambil data pemesanan milik pelanggan yang sedang login
    $pemesanans = Pemesanan::with([
        'user',
        'layanan',
        'jadwalTeknisis.teknisi.user'
    ])->whereHas('user', function ($query) {
        $query->where('role', 'pelanggan');
    })->where('id_user', $userId)->get();

    $pemesanan = $pemesanans->first();

    $pembayaranIds = $pemesanans->pluck('id');
    $pembayarans = Pembayaran::whereIn('id_pemesanan', $pembayaranIds)->get();

    return view('pemesanan.indexte', compact('pemesanans', 'pemesanan', 'pembayarans'));
}


    public function verifikasi($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->status = 'confirmed';
        $pemesanan->save();

        return redirect()->route('pemesanan.index')->with('status', 'Pemesanan disetujui!');
    }

    public function tolak($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->status = 'canceled';
        $pemesanan->save();

        return redirect()->route('pemesanan.index')->with('status', 'Pemesanan ditolak!');
    }

    public function create($layananId)
    {
        $layanan = Layanan::findOrFail($layananId);
        return view('pemesanan.create', compact('layanan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_layanan' => 'required|exists:layanans,id',
            'status' => 'required|string',
            'jadwal_pemasangan' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        if (!Auth::check()) {
            return redirect()->back()->with('error', 'Anda belum login.');
        }

        $pemesanan = Pemesanan::create([
            'id_layanan' => $request->id_layanan,
            'id_user' => Auth::id(),
            'status' => $request->status,
            'jadwal_pemasangan' => $request->jadwal_pemasangan,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('pembayaran.index', ['pemesananId' => $pemesanan->id]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jadwal_pemasangan' => 'required|date',
            'status' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->update($request->only('jadwal_pemasangan', 'status', 'keterangan'));

        return redirect()->route('pemesanan.index')->with('status', 'Pemesanan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->delete();

        return redirect()->route('pemesanan.index')->with('status', 'Pemesanan berhasil dihapus.');
    }

    public function edit($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $layanans = Layanan::all();
        $statuses = ['pending', 'confirmed', 'completed', 'canceled'];

        return view('pemesanan.edit', compact('pemesanan', 'statuses', 'layanans'));
    }

    public function show($id)
    {
        $pemesanan = Pemesanan::with('user', 'layanan')->findOrFail($id);

        return view('pemesanan.show', compact('pemesanan'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,canceled,completed',
        ]);

        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->status = $request->input('status');
        $pemesanan->save();

        return back()->with('success', 'Status berhasil diperbarui');
    }
}
