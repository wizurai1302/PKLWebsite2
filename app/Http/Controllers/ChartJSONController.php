<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartJSONController extends Controller
{


    /**
     * Mendapatkan jumlah siswa berdasarkan kota.
     *
     * @return array
     */
    public function getCityCounts()
    {
        $cityCounts = Siswa::select('Kota', DB::raw('COUNT(*) as total'))
            ->groupBy('Kota')
            ->pluck('total', 'Kota')
            ->toArray();

        return $cityCounts;
    }


    
    /**
     * Menampilkan chart untuk data jumlah siswa berdasarkan kota.
     *
     * @return \Illuminate\View\View
     */
    public function showChart()
    {
        $cityCounts = $this->getCityCounts();

        return response()->json([
            'status' => 'true',
            'message' => 'Data Berhasil Di Ambil',
            'data' => $cityCounts
        ]);
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
