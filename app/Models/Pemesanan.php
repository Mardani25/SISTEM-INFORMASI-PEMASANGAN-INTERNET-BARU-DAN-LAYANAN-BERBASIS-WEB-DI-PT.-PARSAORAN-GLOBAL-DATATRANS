<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Pemesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user', 
        'id_layanan', 
        'status', 
        'jadwal_pemasangan', 
        'keterangan'
    ];

    /**
     * Relasi ke user yang memesan layanan (pelanggan).
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user')->where('role', 'pelanggan');
    }

    /**
     * Relasi ke layanan.
     */
    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'id_layanan');
    }

    /**
     * Relasi ke pembayaran.
     */
    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'id_pemesanan');
    }

    /**
     * Relasi ke semua jadwal teknisi yang terkait dengan pemesanan ini.
     */
    public function jadwalTeknisis()
    {
        return $this->hasMany(JadwalTeknisi::class, 'id_pemesanan');
    }
}
