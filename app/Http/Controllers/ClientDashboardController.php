<?php

namespace App\Http\Controllers;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ClientDashboardController extends Controller
{
    public function index()
    {
        $data = Pesanan::where('user_id', Auth::id())->get();
        return view('dashboard.client', compact('data'));
    }

    public function updateStatus(Request $request, $id)
    {
        $pesanan = Pesanan::findOrFail($id);

        // Pastikan pesanan tersebut milik user yang sedang login
        if ($pesanan->user_id != Auth::id()) {
            return redirect()->back()->with('error', 'Anda tidak berhak memperbarui status pesanan ini');
        }

        $pesanan->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui');
    }
}
