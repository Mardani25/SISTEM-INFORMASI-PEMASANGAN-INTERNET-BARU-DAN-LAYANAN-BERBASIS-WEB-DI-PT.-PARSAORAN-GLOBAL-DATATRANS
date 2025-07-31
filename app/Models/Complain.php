<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Complain extends Model
{
    use HasFactory;

    protected $fillable = ['id_user', 'pesan', 'tanggapan'];

    /**
     * Relasi ke User yang berperan sebagai pelanggan.
     * Note: Tidak perlu filter role di relasi karena bisa menyebabkan masalah saat eager loading.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
