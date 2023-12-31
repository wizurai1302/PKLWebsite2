<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login.login');
});
// Login COntroller
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
//Route Register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'register']);
Route::group(['middleware' => ['auth', 'AdminMiddleware:0']], function(){

    Route::get('/card', [PerusahaanController::class, 'card'])->name('homeuser.card');
    Route::get('/dataperusahaan', [PerusahaanController::class, 'showperusahaan'])->name('admin.dataperusahaan');

    // chartController
    Route::get('/homeadmin', [ChartController::class, 'getCityCounts']);
    Route::get('/admin',[ChartController::class, 'showChart'])->name('admin.show');

    // Edit
    Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('edit-siswa');
    Route::post('/siswa/update/{id}', [SiswaController::class, 'update'])->name('update-siswa');

    Route::get('/edit/{id}', [PerusahaanController::class, 'edit'])->name('edit-perusahaan');
    Route::post('/update/{id}', [PerusahaanController::class, 'update'])->name('update-perusahaan');
    Route::get('/datasiswa', [SiswaController::class, 'showsiswa'])->name('admin.datasiswa');
 

    // delete
    Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('admin.data');
    Route::delete('/perusahaan/{id}', [PerusahaanController::class, 'destroy'])->name('admin-dataperusahaan');

    // Export PDF
    Route::get('/exportpdf', [SiswaController::class, 'exportpdf'])->name('exportpdf');

});



Route::group(['middleware' => ['auth', 'AdminMiddleware:0,1,2,3']], function(){

Route::get('/home', [PerusahaanController::class, 'index'])->name('homeuser.index');
// SiswaController
Route::get('/tambahdata', [App\Http\Controllers\SiswaController::class, 'tambahdata'])->name('homeuser.tambahdata');
Route::post('/store', [App\Http\Controllers\SiswaController::class, 'store'])->name('store');


// PerusahaanController
Route::post('/perusahaan', [PerusahaanController::class, 'store'])->name('perusahaan');
Route::get('/show/{id}', [PerusahaanController::class, 'show'])->name('homeuser.show');



// Lokasi
Route::get('/jogja', [CategoryController::class, 'index'])->name('prrr.jogja');
Route::get('/jabodetabek', [CategoryController::class, 'jabodetabek'])->name('jabodetabek');
Route::get('/batam', [CategoryController::class, 'batam'])->name('batam');
Route::get('/pekanbaru', [CategoryController::class, 'pekanbaru'])->name('pekanbaru');
Route::get('/padang', [CategoryController::class, 'padang'])->name('padang');


// jurusan

Route::get('/rpl', [CategoryController::class, 'rpl'])->name('rpl');
Route::get('/mm', [CategoryController::class, 'mm'])->name('mm');
Route::get('/tkj', [CategoryController::class, 'tkj'])->name('tkj');
Route::get('/bc', [CategoryController::class, 'bc'])->name('bc');

});














