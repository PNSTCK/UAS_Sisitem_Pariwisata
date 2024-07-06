<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\TravelPackage;
use App\Models\Tempat;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tempat = Tempat::all();
        // $travel_packages = TravelPackage::with('galleries')->get();
        // $blogs = Blog::get()->take(3);

        return view('homepage', compact('tempat'));
    }

    public function rateWisata(Request $request, $id)
    {
        $wisata = Tempat::findOrFail($id);
        $wisata->rating = $request->input('rating');
        $wisata->save();

        return response()->json(['success' => true]);
    }

    // public function index()
    // {

    //     return view('home', compact('tempat'));
    // }


}