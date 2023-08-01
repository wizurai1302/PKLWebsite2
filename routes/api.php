<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartJSONController;
use App\Http\Controllers\LoginJSONController;
use App\Http\Controllers\SiswaJSONController;
use App\Http\Controllers\PerusahaanJSONController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/authenticate', [LoginJSONController::class, 'authenticate']);

Route::get('/admin',[ChartJSONController::class, 'showChart'])->name('admin.show')->middleware('auth:sanctum');
Route::get('/datasiswa', [SiswaJSONController::class, 'showsiswa'])->name('admin.datasiswa')->middleware('auth:sanctum');

Route::get('/home', [PerusahaanJSONController::class, 'index'])->name('homeuser.index')->middleware('auth:sanctum');

Route::get('/tambahdata', [App\Http\Controllers\SiswaController::class, 'tambahdata'])->name('homeuser.tambahdata');