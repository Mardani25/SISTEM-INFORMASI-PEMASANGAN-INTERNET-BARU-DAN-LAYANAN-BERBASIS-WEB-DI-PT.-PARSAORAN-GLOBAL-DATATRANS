<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\User;
use App\Models\Pemesanan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    /**
     * Menampilkan laporan statistik layanan.
     */
    public function laporan()
    {
        $jumlahLayanan = Layanan::count();
        $jumlahTeknisi = User::where('role', 'teknisi')->count();
        $jumlahPelanggan = User::where('role', 'pelanggan')->count();
        $jumlahPemesanan = Pemesanan::count();
        $jumlahPembayaran = Pembayaran::count();

        return view('layanan.laporan', compact(
            'jumlahLayanan',
            'jumlahTeknisi',
            'jumlahPelanggan',
            'jumlahPemesanan',
            'jumlahPembayaran'
        ));
    }

    /**
     * Tampilkan daftar layanan (dengan paginasi).
     */
    public function index()
    {
        $layanan = Layanan::paginate(5); // 5 data per halaman
        return view('layanan.index', compact('layanan'));
    }

    /**
     * Simpan layanan baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'kecepatan' => 'required|string|max:255',
            'harga' => 'required|string',
        ]);

        $harga_bersih = (int) preg_replace('/[^0-9]/', '', $request->harga);

        Layanan::create([
            'nama_layanan' => $request->nama_layanan,
            'kecepatan'    => $request->kecepatan,
            'harga'        => $harga_bersih,
        ]);

        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil ditambahkan.');
    }

    /**
     * Update layanan berdasarkan ID.
     */
    public function update(Request $request, $id)
    {
        $layanan = Layanan::findOrFail($id);

        $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'kecepatan'    => 'required|string|max:255',
            'harga'        => 'required|string',
        ]);

        $harga_bersih = (int) preg_replace('/[^0-9]/', '', $request->harga);

        $layanan->update([
            'nama_layanan' => $request->nama_layanan,
            'kecepatan'    => $request->kecepatan,
            'harga'        => $harga_bersih,
        ]);

        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil diperbarui.');
    }

    /**
     * Hapus layanan.
     */
    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);
        $layanan->delete();

        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil dihapus.');
    }

    /**
     * Menampilkan data layanan untuk halaman pemesanan.
     */
    public function indexpe()
    {
        $layanan = Layanan::all();
        return view('pemesanan.index', compact('layanan'));
    }
}
