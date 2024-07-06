<?php

namespace App\Http\Controllers;
use App\Models\Pesanan;

class DriverDashboardController extends Controller
{
    public function index()
    {
        $data = Pesanan::all();
        return view('dashboard.driver', compact('data'));
    }
}
