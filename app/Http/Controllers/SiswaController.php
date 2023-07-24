<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;

/**
 * Kelas SiswaController
 * @package App\Http\Controllers
 */
class SiswaController extends Controller
{
    /**
     * Tampilkan daftar siswa.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::all();
        return view('homeuser.user', compact('siswa'));
    }

    /**
     * Tampilkan halaman tambah data siswa.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambahdata()
    {
        return view('homeuser.tambahdata');
    }

    /**
     * Tampilkan daftar siswa untuk admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function showsiswa()
    {
        $siswa = Siswa::all();
        return view('admin.datasiswa', compact('siswa'));
    }

    /**
     * Ekspor daftar siswa dalam format PDF.
     *
     * @return \Illuminate\Http\Response
     */
    public function exportpdf()
    {
        $siswa = Siswa::all();

        view()->share('siswa', $siswa);
        $pdf = PDF::loadView('admin.datasiswa-pdf');
        return $pdf->download('datasiswa.pdf');
    }

    /**
     * Tampilkan form untuk membuat siswa baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('homeuser.home');
    }

    /**
     * Simpan data siswa yang baru dibuat ke dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nisn' => 'required',
            'Nama' => 'required',
            'JK' => 'required',
            'Kelas' => 'required',
            'Kota' => 'required',
            'Keahlian' => 'required',
        ]);

        Siswa::create([
            'Nisn' => $request->Nisn,
            'Nama' => $request->Nama,
            'JK' => $request->JK,
            'Kelas' => $request->Kelas,
            'Kota' => $request->Kota,
            'Keahlian' => $request->Keahlian,
        ]);

        return view('homeuser.tambahdata');
    }

    // ... (sisa dari method-method lain)

    /**
     * Hapus data siswa dari database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('admin.datasiswa')->with('success', 'Data siswa berhasil dihapus.');
    }
}
