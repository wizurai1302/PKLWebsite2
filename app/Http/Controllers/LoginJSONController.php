<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginJSONController extends Controller
{
    /**
     * Otentikasi pengguna dan mengembalikan token akses.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(Request $request)
    {
        /**
         * Validasi data masukan untuk otentikasi.
         *
         * @var array $login
         * Data masukan yang telah divalidasi dan memenuhi syarat berikut:
         *   - 'status' (boolean): Menandakan status keberhasilan otentikasi.
         *   - 'message' (string): Pesan yang menandakan bahwa token telah berhasil diambil.
         *   - 'email' (string): Alamat email yang diberikan oleh pengguna untuk otentikasi.
         *   - 'password' (string): Kata sandi yang diberikan oleh pengguna untuk otentikasi.
         */

        $login = $request->validate([
            'status' => 'true',
            'message' => 'Berhasil mengambil token',
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        /**
         * Cari pengguna berdasarkan alamat email yang diberikan.
         *
         * @var \App\Models\User|null $user
         * Pengguna yang sesuai dengan alamat email yang diberikan, atau null jika tidak ditemukan.
         */
        $user = User::where('email', $request->email)->first();

        /**
         * Validasi keberhasilan otentikasi pengguna.
         *
         * @throws \Illuminate\Validation\ValidationException
         * Jika otentikasi gagal, lemparkan pengecualian dengan pesan kesalahan.
         */
        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Kredensial yang diberikan tidak benar.'],
            ]);
        }

        /**
         * Mengembalikan respon JSON berisi token akses yang berhasil dibuat.
         *
         * @return \Illuminate\Http\JsonResponse
         * Respon JSON yang berisi kunci-kunci berikut:
         *   - 'status' (boolean): Menandakan status keberhasilan sebagai true.
         *   - 'message' (string): Pesan yang menandakan bahwa token telah berhasil diperoleh.
         *   - 'token' (string): Token akses yang dibuat untuk pengguna saat masuk.
         */
        $response = [
            'status' => true,
            'message' => 'Berhasil mendapatkan token',
            'token' => $user->createToken('user login')->plainTextToken,
            'data' => $user
        ];

        $response['data']['token']=$response['token'];
        unset($response['token']);

        return response()->json($response);
    }
}
