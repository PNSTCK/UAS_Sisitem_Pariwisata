<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    use HasFactory;

    protected $table = 'kunjungan_wisatas';

    protected $fillable = [
        'id_kunjungan',
        'kode_wisata',
        'no_ktp',
        'rating',
    ];
}
