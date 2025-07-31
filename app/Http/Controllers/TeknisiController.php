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
    $tanggal = $request->input('tanggal', date('Y-m-d'));

    $jadwals = JadwalTeknisi::with('pemesanan.layanan', 'pemesanan.pelanggan')
        ->where('id_user', Auth::id())
        ->whereDate('tanggal', $tanggal)
        ->orderBy('waktu')
        ->paginate(10);

    return view('teknisi.jadwal', compact('jadwals', 'tanggal'));
}

    // Menampilkan detail pemesanan
    public function detailPemesanan($id)
    {
        $pemesanan = Pemesanan::with(['pelanggan.user', 'layanan'])->findOrFail($id);
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
        try {
            $teknisi = Auth::user()->teknisi;
            $jadwal = JadwalTeknisi::findOrFail($id);

            if (!$teknisi || $jadwal->id_teknisi !== $teknisi->id) {
                return back()->with('error', 'Akses ditolak. Anda bukan teknisi yang ditugaskan.');
            }

            $request->validate([
                'bukti_foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $file = $request->file('bukti_foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('bukti_foto', $filename, 'public');

            $jadwal->update([
                'bukti_foto' => $filename,
                'status_kehadiran' => 'hadir'
            ]);

            $this->kirimNotifikasiAdmin('bukti', 'Teknisi ' . Auth::user()->name . ' mengunggah bukti kehadiran untuk jadwal #' . $jadwal->id);

            return back()->with('success', 'Bukti foto berhasil diupload.');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengupload bukti: ' . $e->getMessage());
        }
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
