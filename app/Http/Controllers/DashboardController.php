<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use App\Models\Pengguna;
use App\Models\Tempat;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dasboard() {

        if (auth()->user()->can('dashboard-index')) {
            return view('dashboard.index');
        }

    }

    public function index()
    {
        // $pengguna = Pengguna::count();
        $tempat = Tempat::count();
        // $kunjungan = Kunjungan::count();
        $user =  User::count();

        return view("dashboard.index", compact('tempat'));
    }
}