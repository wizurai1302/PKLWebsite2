<?php

namespace App\Http\Controllers;
use App\Models\perusahaan;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perusahaan = perusahaan::where('lokasi', ['Yogyakarta'])->get();
        return view('lokasi.jogja', compact('perusahaan'));
    }

    public function jabodetabek()
    {
        $perusahaan = perusahaan::where('lokasi', ['Jabodetabek'])->get();
        return view('lokasi.jabodetabek', compact('perusahaan'));
    }
    public function batam()
    {
        $perusahaan = perusahaan::where('lokasi', ['Batam'])->get();
        return view('lokasi.batam', compact('perusahaan'));
    }
    public function pekanbaru()
    {
        $perusahaan = perusahaan::where('lokasi', ['Pekanbaru'])->get();
        return view('lokasi.pekanbaru', compact('perusahaan'));
    }
    public function padang()
    {
        $perusahaan = perusahaan::where('lokasi', ['Padang'])->get();
        return view('lokasi.padang', compact('perusahaan'));
    }

    // jurusan

    public function rpl()
    {
        $perusahaan = Perusahaan::whereIn('jurusan', ['RPL'])->get();
        return view('jurusan.RPL', compact('perusahaan'));
        
    }

    public function mm()
    {
        $perusahaan = Perusahaan::whereIn('jurusan', ['MM'])->get();
        return view('jurusan.MM', compact('perusahaan'));
        
    }
    public function tkj()
    {
        $perusahaan = Perusahaan::whereIn('jurusan', ['TKJ'])->get();
        return view('jurusan.TKJ', compact('perusahaan'));
        
    }
    public function bc()
    {
        $perusahaan = Perusahaan::whereIn('jurusan', ['BC'])->get();
        return view('jurusan.MM', compact('perusahaan'));
        
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}