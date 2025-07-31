<?php

use App\Http\Controllers\PemesananController;
use App\Http\Controllers\TeknisiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ComplainController;
use Illuminate\Support\Facades\Route;

// Halaman utama
Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
Route::get('/redirect-by-role', [HomeController::class, 'redirectByRole'])->name('redirect-by-role');

// Rute untuk admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');

    Route::get('/teknisi', [AdminController::class, 'index'])->name('teknisi.index');
    Route::post('/teknisi', [AdminController::class, 'store'])->name('teknisi.store');
    Route::put('/teknisi/{id}', [AdminController::class, 'update'])->name('teknisi.update');
    Route::delete('/teknisi/{teknisi}', [AdminController::class, 'destroy'])->name('teknisi.destroy');

    Route::get('teknisi/jadwal', [AdminController::class, 'jadwalIndex'])->name('admin.teknisi.jadwal.index');
    Route::get('teknisi/jadwal/create', [AdminController::class, 'jadwalCreate'])->name('admin.teknisi.jadwal.create');
    Route::post('teknisi/jadwal', [AdminController::class, 'jadwalStore'])->name('admin.teknisi.jadwal.store');
    Route::delete('teknisi/jadwal/{jadwal}', [AdminController::class, 'jadwalDestroy'])->name('admin.teknisi.jadwal.destroy');

    Route::get('pelanggan', [AdminController::class, 'pelangganIndex'])->name('admin.pelanggan.index');
    Route::post('pelanggan', [AdminController::class, 'pelangganStore'])->name('admin.pelanggan.store');
    Route::put('pelanggan/{id}', [AdminController::class, 'pelangganUpdate'])->name('admin.pelanggan.update');
    Route::delete('pelanggan/{id}', [AdminController::class, 'pelangganDestroy'])->name('admin.pelanggan.destroy');

    Route::get('/admin/complain', [ComplainController::class, 'adminIndex'])->name('admin.komplain');
    Route::post('/admin/complain/{id}/tanggapi', [ComplainController::class, 'tanggapi'])->name('admin.complain.tanggapi');
});

// Rute teknisi
Route::middleware(['auth', 'role:teknisi'])->prefix('teknisi')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'teknisiDashboard'])->name('teknisi.dashboard');
    Route::get('/jadwal', [TeknisiController::class, 'lihatJadwal'])->name('teknisi.jadwal');
    Route::get('/pemesanan/{id}', [TeknisiController::class, 'detailPemesanan'])->name('teknisi.pemesanan.detail');
    Route::post('/jadwal/{id}/hadir', [TeknisiController::class, 'hadir'])->name('teknisi.hadir');
    Route::put('/jadwal/{id}/kehadiran', [TeknisiController::class, 'updateKehadiran'])->name('teknisi.updateKehadiran');
    Route::post('/upload-bukti/{id}', [TeknisiController::class, 'uploadBukti'])->name('teknisi.uploadBukti');
    Route::patch('/konfirmasi/{id}', [TeknisiController::class, 'konfirmasi'])->name('teknisi.konfirmasi');
});

// Rute pelanggan
Route::middleware(['auth', 'role:pelanggan'])->group(function () {
    Route::get('/pelanggan/dashboard', [HomeController::class, 'pelangganDashboard'])->name('pelanggan.dashboard');
    Route::get('/pemesanan/create/{layananId}', [PemesananController::class, 'create'])->name('pemesanan.create');
    Route::post('/pemesanan/store', [PemesananController::class, 'store'])->name('pemesanan.store');
    Route::get('/about', [PelangganController::class, 'about'])->name('pelanggan.about');
    Route::get('/kontak', [PelangganController::class, 'kontak'])->name('pelanggan.kontak');
    Route::post('/kontak', [PelangganController::class, 'kirimKontak'])->name('pelanggan.kontak.kirim');
    Route::get('/complains', [ComplainController::class, 'index'])->name('pelanggan.komplain');
    Route::post('/complains', [ComplainController::class, 'store'])->name('complain.store');
});

// Rute umum dengan auth
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/layanan', [LayananController::class, 'index'])->name('layanan.index');
    Route::post('/layanan', [LayananController::class, 'store'])->name('layanan.store');
    Route::put('/layanan/{id}', [LayananController::class, 'update'])->name('layanan.update');
    Route::delete('/layanan/{id}', [LayananController::class, 'destroy'])->name('layanan.destroy');

    Route::get('/pemesanan', [PemesananController::class, 'index'])->name('pemesanan.index');
    Route::get('/pemesanante', [PemesananController::class, 'indexte'])->name('pemesanan.indexte');
    Route::put('/pemesanan/{id}', [PemesananController::class, 'update'])->name('pemesanan.update');
    Route::delete('/pemesanan/{id}', [PemesananController::class, 'destroy'])->name('pemesanan.destroy');
    Route::get('/pemesanan/{id}/edit', [PemesananController::class, 'edit'])->name('pemesanan.edit');
    Route::get('/pemesanan/{id}', [PemesananController::class, 'show'])->name('pemesanan.show');
    Route::put('/pemesanan/{id}', [PemesananController::class, 'updateStatus'])->name('pemesanan.updateStatus');

    Route::get('/pembayaran/{pemesananId}', [PembayaranController::class, 'index'])->name('pembayaran.index');
    Route::post('/midtrans/callback', [PembayaranController::class, 'callback']);
    Route::post('/pembayaran/simpan', [PembayaranController::class, 'simpan'])->name('pembayaran.simpan');
    Route::get('/pembayaran/sukses/{id}', [PembayaranController::class, 'sukses'])->name('pembayaran.sukses');
    Route::get('/riwayat', [PembayaranController::class, 'riwayat'])->name('riwayat');

    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::patch('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
});

// Auth
require __DIR__.'/auth.php';
