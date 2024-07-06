<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{

    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $data = Pengguna::where('nama_pengguna', 'like', '%' . $request->cari . '%')->get();
        } else {
            $data = Pengguna::orderBy('nama_pengguna', 'asc')->get();
        }
        return view("pengguna.index", compact("data", "request"));
    }
    public function create()
    {
        $data_pengguna = Pengguna::all();
        return view("pengguna.create", compact('data_pengguna'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // "image" => "|image|mimes:jpeg,png,jpg",
            "id_pengguna" => "required|unique:penggunas",
            "KTP" => "required|unique:penggunas",
            "nama_pengguna" => "required|unique:penggunas",
            "alamat_pengguna" => "required",
            "jenis_kelamin" => "required",
            "hoby" => "required",
            "tanggal_lahir" => "required",

        ]);

        $input = $request->all();

        //upload gambar
        if ($image = $request->file('image')) {
            $destinationPath = 'gallery/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $input['image'] = "$postImage";
        }


        Pengguna::create($input);
        return redirect()->route("pengguna.index")->with("success", "Data berhasil disimpan");
    }

    public function edit(Pengguna $pengguna)
    {
        $data_pengguna = Pengguna::all();
        return view("pengguna.edit", compact("pengguna", "data_pengguna"));
    }

    public function update(Request $request, Pengguna $pengguna)
    {
        $request->validate([
            "id_pengguna" => "required",
            "KTP" => "required",
            "nama_pengguna" => "required",
            "alamat_pengguna" => "required",
            "jenis_kelamin" => "required",
            "hoby" => "required",
            "tanggal_lahir" => "required",
            // "image" => "image|mimes:jpeg,png,jpg",
        ]);

        $input = $request->except('image');

        if ($request->hasFile('image')) {
            $destinationPath = 'gallery/';

            // Hapus gambar lama jika ada
            if ($pengguna->image && file_exists($destinationPath . $pengguna->image)) {
                unlink($destinationPath . $pengguna->image);
            }


            $image = $request->file('image');
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $input['image'] = $postImage;
        }

        $pengguna->update($input);
        return redirect()->route("pengguna.index")->with("success", "Data berhasil diupdate");
    }

    public function destroy(Pengguna $pengguna)
    {
        $pengguna->delete();
        return to_route("pengguna.index")->with("success", "Data berhasil disimpan");
    }

}
