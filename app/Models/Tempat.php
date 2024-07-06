<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tempat extends Model
{
    use HasFactory;

    protected $table = 'tempat_wisatas';

    protected $fillable = [
        'nama_tempat',
        'kategori',
        'daya_tampung',
        'fasilitas',
        'gambar',
        'deskripsi',
        'lokasi',
        'rating',
    ];

    public function index()
    {
        $tempatWisata = Tempat::all();
        return view('home', compact('tempatWisata'));
    }

    public function pesanans()
    {
        return $this->hasMany(Pesanan::class);
    }
}