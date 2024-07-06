<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Tempat;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    public function create($tempat_id)
    {
        // $tempat_wisatas = Pesanan::all();
         // Ambil data tempat wisata berdasarkan $tempat_id
         $tempat_wisatas = Tempat::findOrFail($tempat_id);
        return view('pesanan.create', compact('tempat_wisatas'));
    }

    public function show($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        return view('pesanan.create', compact('pesanan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jumlah_orang' => 'required|integer',
            'lokasi_penjemputan' => 'nullable|string',
            'waktu_penjemputan' => 'nullable|date_format:H:i',
            'kebutuhan_khusus' => 'nullable|string',
            'kontak' => 'nullable|string',
        ]);

        Pesanan::create([
            'user_id' => auth()->id(),
            'tempat_wisata_id' => $request->tempat_wisata_id,
            'tanggal' => $request->tanggal,
            'jumlah_orang' => $request->jumlah_orang,
            'lokasi_penjemputan' => $request->lokasi_penjemputan,
            'waktu_penjemputan' => $request->waktu_penjemputan,
            'kebutuhan_khusus' => $request->kebutuhan_khusus,
            'kontak' => $request->kontak,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Pesanan berhasil dibuat');
    }


    public function index()
    {
        // Ambil data pesanan dari database
        $data = Pesanan::all(); // Mengubah variabel menjadi $data

        // Kirim data ke view
        return view('dashboard.driver', compact('data'));
    }
}
