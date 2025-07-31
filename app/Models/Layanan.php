<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $fillable = ['nama_layanan', 'kecepatan', 'harga'];

    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class, 'id_layanan');
    }
}
