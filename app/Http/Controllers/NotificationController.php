<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Tampilkan daftar notifikasi pengguna yang login.
     */
    public function index()
    {
        $userId = Auth::id();

        // Ambil semua notifikasi milik user, urutkan terbaru, 10 per halaman
        $notifications = Notification::where('id_user', $userId)
                            ->orderBy('created_at', 'desc')
                            ->paginate(10);

        // Tandai semua notifikasi belum dibaca sebagai sudah dibaca
        Notification::where('id_user', $userId)
            ->where('is_read', false)
            ->update(['is_read' => true]);

        return view('notifications.index', compact('notifications'));
    }

    /**
     * Tandai satu notifikasi sebagai sudah dibaca.
     */
    public function markAsRead($id)
    {
        $notification = Notification::where('id_user', Auth::id())
                            ->findOrFail($id);

        if (!$notification->is_read) {
            $notification->is_read = true;
            $notification->save();
        }

        return redirect()->route('notifications.index');
    }
}
