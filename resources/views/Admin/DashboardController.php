<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kunjungan;
use App\Models\Pengguna;
use App\Models\Tempat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pengguna = Pengguna::count();
        $tempat = Tempat::count();
        $kunjungan = Kunjungan::count();

        return view("dashboard.index", compact('pengguna', 'kunjungan', 'tempat'));
    }
}
