<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalTeknisi;
use App\Models\Notification;
use App\Models\User;

class JadwalTeknisiController extends Controller
{
    /**
     * Update status kehadiran teknisi untuk jadwal tertentu.
     * - 'belum' => 'hadir'
     * - 'hadir' => 'selesai'
     */
    public function konfirmasiKehadiran($id)
    {
        $jadwal = JadwalTeknisi::findOrFail($id);

        // Ubah status kehadiran secara bertahap
        if ($jadwal->status_kehadiran === 'belum') {
            $jadwal->status_kehadiran = 'hadir';
        } elseif ($jadwal->status_kehadiran === 'hadir') {
            $jadwal->status_kehadiran = 'selesai';
        }

        $jadwal->save();

        // Kirim notifikasi ke semua admin
        $admins = User::where('role', 'admin')->get();

        foreach ($admins as $admin) {
            Notification::create([
                'id_user' => $admin->id,
                'role'    => 'admin',
                'type'    => 'jadwal',
                'message' => "Status kehadiran teknisi untuk jadwal ID {$jadwal->id} telah diperbarui menjadi '{$jadwal->status_kehadiran}'.",
                'is_read' => false,
            ]);
        }

        return redirect()->back()->with('success', 'Status kehadiran berhasil diperbarui.');
    }
}
