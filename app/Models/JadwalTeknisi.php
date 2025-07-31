<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class JadwalTeknisi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',  // perbaikan dari 'id_teknisi'
        'id_pemesanan',
        'tanggal',
        'waktu',
        'status_kehadiran',
        'bukti_foto'
    ];

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'id_pemesanan');
    }

    // Relasi ke tabel users
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
