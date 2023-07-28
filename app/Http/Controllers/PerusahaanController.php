<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\perusahaan;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    /**
     * Tampilkan daftar perusahaan.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Ambil semua data perusahaan dari tabel 'perusahaan'
        $perusahaan = perusahaan::all();

        // Tampilkan view 'homeuser.index' dengan data 'perusahaan'
        return view('homeuser.index', compact('perusahaan'));
    }

    /**
     * Tampilkan daftar perusahaan dalam format kartu (mungkin untuk tampilan antarmuka pengguna).
     *
     * @return \Illuminate\Http\Response
     */
    public function card()
    {
        // Ambil semua data perusahaan dari tabel 'perusahaan'
        $perusahaan = perusahaan::all();

        // Tampilkan view 'homeuser.card' dengan data 'perusahaan'
        return view('homeuser.card', compact('perusahaan'));
    }

    /**
     * Tampilkan daftar perusahaan beserta siswa yang terkait untuk tampilan admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function showperusahaan()
    {
        // Ambil semua data perusahaan dari tabel 'perusahaan' beserta 'siswas' yang terkait
        $perusahaan = perusahaan::with('siswas')->get();

        // Tampilkan view 'admin.dataperusahaan' dengan data 'perusahaan'
        return view('admin.dataperusahaan', compact('perusahaan'));
    }

    /**
     * Tampilkan form untuk membuat sumber daya perusahaan baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Tidak diimplementasikan dalam potongan kode ini
    }

    /**
     * Simpan sumber daya perusahaan baru ke dalam penyimpanan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi data masukan dari form
        $request->validate([
            'nama' => 'required',
            'about' => 'required',
            'keunggulan' => 'required',
            'photo' => 'required|image|max:2048',
        ]);

        // Pindahkan foto yang diunggah ke folder 'photos'
        $name = $request->file('photo')->getClientOriginalName();
        $request->photo->move('photos/', $name);

        // Buat catatan perusahaan baru di tabel 'perusahaan'
        perusahaan::create([
            'nama' => $request->nama,
            'about' => $request->about,
            'keunggulan' => $request->keunggulan,
            'photo' => $name,
            'lokasi' => $request->lokasi,
            'jurusan' => $request->jurusan,
            'alamat' => $request->alamat,
        ]);

        // Alihkan ke tampilan 'homeuser.card' dengan pesan sukses
        return redirect()->route('homeuser.card')->with('success', 'Perusahaan berhasil dibuat.');
    }

    /**
     * Tampilkan sumber daya perusahaan tertentu.
     *
     * @param  \App\Models\perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function show(perusahaan $perusahaan, $id)
    {
        // Temukan catatan perusahaan dengan ID $id yang diberikan dan kirimkan ke tampilan 'homeuser.show'
        $perusahaan = perusahaan::findOrFail($id);
        return view('homeuser.show', compact('perusahaan'));
    }

    /**
     * Tampilkan form untuk mengedit sumber daya perusahaan tertentu.
     *
     * @param  \App\Models\perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Temukan catatan perusahaan dengan ID $id yang diberikan dan kirimkan ke tampilan 'admin.editadmin'
        $perusahaan = perusahaan::findOrFail($id);
        return view('admin.editadmin', compact('perusahaan'));
    }

    /**
     * Perbarui sumber daya perusahaan tertentu di dalam penyimpanan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $perusahaan)
    {
        // Temukan catatan perusahaan dengan ID $perusahaan yang diberikan
        $perusahaan = perusahaan::findOrFail($perusahaan);

        // Perbarui data perusahaan dengan nilai-nilai baru dari form
        $perusahaan->nama = $request->nama;
        $perusahaan->about = $request->about;
        $perusahaan->keunggulan = $request->keunggulan;
        $perusahaan->jurusan = $request->jurusan;
        $perusahaan->alamat = $request->alamat;

        // Jika foto baru diunggah, pindahkan ke folder 'photos' dan perbarui bidang 'photo'
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = $photo->getClientOriginalName();
            $request->photo->move('photos/', $filename);
            $perusahaan->photo = $filename;
        }

        // Simpan perubahan ke dalam database
        $perusahaan->save();

        // Alihkan kembali ke tampilan 'admin.dataperusahaan' dengan pesan sukses
        return redirect()->route('admin.dataperusahaan')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Hapus sumber daya perusahaan tertentu dari penyimpanan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Temukan catatan perusahaan dengan ID $id yang diberikan dan hapus
        $perusahaan = perusahaan::findOrFail($id);
        $perusahaan->delete();

        // Alihkan kembali ke tampilan 'admin.dataperusahaan' dengan pesan sukses
        return redirect()->route('admin.dataperusahaan')->with('success', 'User berhasil dihapus.');
    }
}
