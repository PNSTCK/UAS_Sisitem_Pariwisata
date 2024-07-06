<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;

    protected $table = 'penggunas';

    protected $fillable = [
        'id_pengguna',
        'KTP',
        'nama_pengguna',
        'alamat_pengguna',
        'jenis_kelamin',
        'hoby',
        'tanggal_lahir',
    ];
}
