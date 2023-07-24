<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Kelas ChartController
 * @package App\Http\Controllers
 */
class ChartController extends Controller
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

        return view('admin.homeadmin')->with('cityCounts', $cityCounts);
    }
}
