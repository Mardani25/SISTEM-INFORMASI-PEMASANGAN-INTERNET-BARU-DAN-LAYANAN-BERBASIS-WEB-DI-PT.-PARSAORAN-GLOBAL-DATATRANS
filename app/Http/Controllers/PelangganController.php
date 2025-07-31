<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Menampilkan halaman tentang kami.
     */
    public function about()
    {
        return view('pelanggan.about');
    }

    /**
     * Menampilkan halaman kontak.
     */
    public function kontak()
    {
        return view('pelanggan.kontak');
    }

    /**
     * Memproses form kontak.
     */
    public function kirimKontak(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // Di sini Anda bisa mengirim email, menyimpan ke database, atau keduanya
        // Contoh (jika pakai mail): Mail::to('info@parsadata.co.id')->send(new KontakMail($validated));

        return back()->with('success', 'Pesan Anda berhasil dikirim.');
    }
}
