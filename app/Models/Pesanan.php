<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tempat_wisata_id',
        'tanggal',
        'jumlah_orang',
        'status',
        'lokasi_penjemputan',
        'waktu_penjemputan',
        'kebutuhan_khusus',
        'kontak',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tempatWisata()
    {
        return $this->belongsTo(Tempat::class);
    }
}
