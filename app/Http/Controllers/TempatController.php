<?php

namespace App\Http\Controllers;

use App\Models\Tempat;
use Illuminate\Http\Request;

class TempatController extends Controller
{    public function show($id)
    {
        $tempat = Tempat::findOrFail($id);
        return view('tempat.show', compact('tempat'));
    }

    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $data = Tempat::where('nama_tempat', 'like', '%' . $request->cari . '%')->get();
        } else {
            $data = Tempat::orderBy('nama_tempat', 'asc')->get();
        }
        return view("tempat.index", compact("data", "request"));
    }

    public function create()
    {
        return view("tempat.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            "nama_tempat" => "required|unique:tempat_wisatas",
            "kategori" => "required",
            "daya_tampung" => "required",
            "fasilitas" => "required",
            "gambar" => "image|mimes:jpeg,png,jpg|max:2048",
            "lokasi" => "required",
            "deskripsi" => "required",
        ]);

        $input = $request->all();

        if ($request->hasFile('gambar')) {
            $destinationPath = 'gallery/';
            $image = $request->file('gambar');
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $input['gambar'] = $postImage;
        }

        Tempat::create($input);
        return redirect()->route("tempat.index")->with("success", "Data berhasil disimpan");
    }

    public function edit($id)
    {
        $tempat = Tempat::findOrFail($id);
        return view('tempat.edit', compact('tempat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "nama_tempat" => "required",
            "kategori" => "required",
            "daya_tampung" => "required",
            "fasilitas" => "required",
            "gambar" => "image|mimes:jpeg,png,jpg|max:2048",
            "lokasi" => "required",
            "deskripsi" => "required",
        ]);

        $tempat = Tempat::findOrFail($id);
        $input = $request->all();

        if ($request->hasFile('gambar')) {
            $destinationPath = 'gallery/';
            if ($tempat->gambar && file_exists($destinationPath . $tempat->gambar)) {
                unlink($destinationPath . $tempat->gambar);
            }

            $image = $request->file('gambar');
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $input['gambar'] = $postImage;
        }

        $tempat->update($input);
        return redirect()->route("tempat.index")->with("success", "Data berhasil diupdate");
    }

    public function destroy($id)
    {
        $tempat = Tempat::findOrFail($id);
        if ($tempat->gambar && file_exists('gallery/' . $tempat->gambar)) {
            unlink('gallery/' . $tempat->gambar);
        }
        $tempat->delete();
        return redirect()->route("tempat.index")->with("success", "Data berhasil dihapus");
    }

    public function rateWisata(Request $request, $id)
    {
        $tempat = Tempat::findOrFail($id);
        $tempat->rating = $request->input('rating');
        $tempat->save();

        return response()->json(['success' => true]);
    }
}
