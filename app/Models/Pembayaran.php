<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = ['id_pemesanan', 'jumlah', 'status_pembayaran', 'tanggal_bayar'];

    protected $casts = [
        'tanggal_bayar' => 'datetime',
    ];

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'id_pemesanan');
    }
}
