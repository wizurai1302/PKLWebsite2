<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaJSONController extends Controller
{
    /**
     * Menampilkan daftar siswa dengan pagination.
     *
     * @return \Illuminate\Http\Response
     */
    public function showsiswa()
    {
        /**
         * Menentukan jumlah data per halaman untuk pagination.
         *
         * @var int $perPage
         * Jumlah data yang ingin ditampilkan per halaman.
         */
        $perPage = 10;

        /**
         * Mengambil data siswa dari tabel "siswa", memilih kolom-kolom tertentu dan melakukan pagination.
         *
         * @var \Illuminate\Pagination\LengthAwarePaginator $siswaPaginated
         * Paginator yang berisi data siswa yang dipilih.
         */
        $siswaPaginated = Siswa::select('Nisn', 'Nama', 'JK', 'Kelas', 'Kota', 'Keahlian')->paginate($perPage);

        /**
         * Mengembalikan data dalam format JSON dengan status berhasil, pesan sukses, dan data paginasi terpisah.
         *
         * @return \Illuminate\Http\JsonResponse
         * Respon JSON yang berisi kunci-kunci berikut:
         *   - 'status' (string): Menandakan status keberhasilan sebagai 'true'.
         *   - 'message' (string): Pesan sukses yang menunjukkan bahwa pengambilan data berhasil.
         *   - 'data' (array): Data paginasi siswa dari tabel "siswa".
         *   - 'pagination' (array): Informasi tentang pagination, seperti total data, halaman saat ini, dll.
         */
        return response()->json([
            'status' => 'true',
            'message' => 'Data Berhasil Di Ambil',
            'data' => $siswaPaginated->items(),
            'pagination' => $this->formatPagination($siswaPaginated),
        ]);
    }

    /**
     * Format informasi pagination untuk disertakan dalam respons JSON.
     *
     * @param \Illuminate\Pagination\LengthAwarePaginator $paginator
     * @return array
     */
    private function formatPagination(\Illuminate\Pagination\LengthAwarePaginator $paginator)
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
