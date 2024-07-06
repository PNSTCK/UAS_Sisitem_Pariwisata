<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function dashboard()
    {
        $data = Pesanan::all();  // Mengubah variabel menjadi $data
        return view('dashboard.driver', compact('data'));  // Mengirimkan $data ke view
    }

    public function updateStatus(Request $request, $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui');
    }
}