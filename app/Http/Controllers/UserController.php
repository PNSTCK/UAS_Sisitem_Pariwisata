<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'hak_akses' => 'required|string|in:admin,client,driver',
        ]);

        $user->hak_akses = $request->hak_akses;
        $user->save();

        return redirect()->route('users.index')->with('success', 'Hak akses berhasil diupdate.');
    }
}