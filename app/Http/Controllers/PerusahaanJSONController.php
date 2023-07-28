<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class PerusahaanJSONController extends Controller
{
    /**
     * Tampilkan daftar sumber daya dengan pagination.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /**
         * Menentukan jumlah data per halaman untuk pagination.
         *
         * @var int $perPage
         * Jumlah data yang ingin ditampilkan per halaman.
         */
        $perPage = 10; // Ubah angka ini sesuai dengan jumlah data yang ingin ditampilkan per halaman.

        /**
         * Mengambil data dari tabel "perusahaans", memilih kolom-kolom tertentu dan melakukan pagination.
         *
         * @var \Illuminate\Pagination\LengthAwarePaginator $perusahaanPaginated
         * Paginator yang berisi data perusahaan yang dipilih.
         */
        $perusahaanPaginated = Perusahaan::select('nama', 'about', 'lokasi', 'keunggulan', 'jurusan', 'alamat', 'photo')->paginate($perPage);

        /**
         * Mengembalikan data dalam format JSON dengan status berhasil, pesan sukses, dan data paginasi terpisah.
         *
         * @return \Illuminate\Http\JsonResponse
         * Respon JSON yang berisi kunci-kunci berikut:
         *   - 'status' (string): Menandakan status keberhasilan sebagai 'true'.
         *   - 'messages' (string): Pesan sukses yang menunjukkan bahwa pengambilan data berhasil.
         *   - 'data' (array): Data paginasi dari tabel "perusahaans".
         *   - 'pagination' (array): Informasi tentang pagination, seperti total data, halaman saat ini, dll.
         */
        return response()->json([
            'status' => 'true',
            'messages' => 'Data Berhasil Di Ambil', // Deskripsi: Pesan ini menunjukkan bahwa pengambilan data berhasil.
            'data' => $perusahaanPaginated->items(), // Deskripsi: Data paginasi dari tabel "perusahaans".
            'pagination' => $this->formatPagination($perusahaanPaginated),
        ]);
    }

    /**
     * Format informasi pagination untuk disertakan dalam respons JSON.
     *
     * @param \Illuminate\Pagination\LengthAwarePaginator $paginator
     * @return array
     */
    private function formatPagination(LengthAwarePaginator $paginator)
    {
        return [
            'total' => $paginator->total(),
            'per_page' => $paginator->perPage(),
            'current_page' => $paginator->currentPage(),
            'last_page' => $paginator->lastPage(),
            'from' => $paginator->firstItem(),
            'to' => $paginator->lastItem(),
        ];
    }
}
