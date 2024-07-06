<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Pesanan;


class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        // Cek hak akses pengguna dan arahkan ke tampilan profil yang sesuai
        switch ($user->hak_akses) {
            case 'driver':
                $pesanan = Pesanan::where('status', 'pending')->get();
                return view('profile.show-driver', compact('user', 'pesanan'));
            case 'client':
                return view('profile.show-client', compact('user'));
                case 'admin':
                    return view('profile.show', compact('user'));
        }
    }

    public function update(ProfileUpdateRequest $request)
    {
        $data = $request->only(['name', 'email', 'jenis_mobil', 'plat_nomor', 'nomor_telepon', 'warna_mobil']);

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('foto_profil')) {
            $filePath = $request->file('foto_profil')->store('profile_photos', 'public');
            $data['foto_profil'] = $filePath;

            // Delete the old profile photo if exists
            if (auth()->user()->foto_profil) {
                Storage::disk('public')->delete(auth()->user()->foto_profil);
            }
        }

        auth()->user()->update($data);

        return redirect()->back()->with('success', 'Profile updated.');
    }
}
