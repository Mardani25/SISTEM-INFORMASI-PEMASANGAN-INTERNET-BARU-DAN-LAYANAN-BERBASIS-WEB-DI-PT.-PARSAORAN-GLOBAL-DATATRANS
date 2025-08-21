<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teknisi;
use App\Models\JadwalTeknisi;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
use App\Models\User;

class TeknisiController extends Controller
{
    // Menampilkan jadwal teknisi berdasarkan tanggal
public function lihatJadwal(Request $request)
{
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
    }

    $tanggal = $request->input('tanggal', \Carbon\Carbon::today()->toDateString());

    $jadwals = JadwalTeknisi::with(['pemesanan.layanan', 'pemesanan.user'])
        ->where('id_user', Auth::id())
        ->whereDate('tanggal', $tanggal)
        ->orderBy('waktu', 'asc')
        ->paginate(10);

    return view('teknisi.jadwal', compact('jadwals', 'tanggal'));
}


    // Menampilkan detail pemesanan
    public function detailPemesanan($id)
    {
        $pemesanan = Pemesanan::with(['user', 'layanan'])->findOrFail($id);
        return view('teknisi.detail_pemesanan', compact('pemesanan'));
    }

    // Menandai kehadiran teknisi
    public function hadir($id)
    {
        $jadwal = JadwalTeknisi::findOrFail($id);
        $teknisi = Auth::user()->teknisi;

        if (!$teknisi || $jadwal->id_teknisi !== $teknisi->id) {
            return back()->with('error', 'Akses ditolak.');
        }

        $jadwal->status_kehadiran = 'hadir';
        $jadwal->save();

        $this->kirimNotifikasiAdmin('kehadiran', 'Teknisi ' . Auth::user()->name . ' telah hadir pada jadwal #' . $jadwal->id);

        return back()->with('success', 'Kehadiran berhasil dicatat.');
    }

    // Memperbarui status kehadiran teknisi
    public function updateKehadiran(Request $request, $id)
    {
        $request->validate([
            'status_kehadiran' => 'required|in:hadir,tidak_hadir',
        ]);

        $jadwal = JadwalTeknisi::findOrFail($id);
        $jadwal->status_kehadiran = $request->status_kehadiran;
        $jadwal->save();

        $this->kirimNotifikasiAdmin('kehadiran', 'Status kehadiran teknisi diperbarui untuk jadwal #' . $jadwal->id);

        return back()->with('success', 'Status kehadiran berhasil diperbarui.');
    }

    // Upload bukti foto kehadiran
public function uploadBukti(Request $request, $id)
{
    $jadwal = JadwalTeknisi::findOrFail($id);

    if ($request->hasFile('bukti_foto')) {
        $file = $request->file('bukti_foto');
        $filename = time() . '_' . $file->getClientOriginalName();

        // Simpan ke storage/app/public/bukti_foto
        $file->storeAs('bukti_foto', $filename, 'public');

        $jadwal->bukti_foto = $filename;
        $jadwal->save();
    }

    return redirect()->back()->with('success', 'Bukti foto berhasil diupload');
}


    // Fungsi bantu untuk mengirim notifikasi ke semua admin
    protected function kirimNotifikasiAdmin($type, $message)
    {
        
        $admins = User::where('role', 'admin')->get();
        foreach ($admins as $admin) {
            Notification::create([
                'id_user' => $admin->id,
                'role' => 'admin',
                'type' => $type,
                'message' => $message,
                'is_read' => false,
            ]);
        }
    }
}
