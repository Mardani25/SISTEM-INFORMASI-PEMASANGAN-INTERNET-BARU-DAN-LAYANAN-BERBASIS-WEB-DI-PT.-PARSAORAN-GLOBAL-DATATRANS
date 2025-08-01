<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'telepon',
        'alamat',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Relasi untuk pelanggan yang memesan layanan
    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class, 'id_user');
    }

    // Relasi untuk teknisi yang memiliki jadwal kerja
    public function jadwalTeknisis()
    {
        return $this->hasMany(JadwalTeknisi::class, 'id_user');
    }

    // Relasi jika user berperan sebagai pelanggan dan mengirimkan komplain
    public function complains()
    {
        return $this->hasMany(Complain::class, 'id_user');
    }
}
