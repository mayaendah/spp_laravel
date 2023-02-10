<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pembayaranspp;
use App\Http\Controllers\bulancontroller;
use App\Http\Controllers\siswacontroller;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/getbulan',[bulancontroller::class,'index']);
Route::get('/getsiswa',[siswacontroller::class,'index']);
Route::get('/getinfosiswa/{id}',[siswacontroller::class,'getInfoSiswaById']);

Route::post('/detailsimpanspp',[pembayaranspp::class,'detailSimpanSpp']);

Route::get('/tampilbayarspp/{idSiswa}/{tahun}', function ($idSiswa,$tahun) {
    $tampil=new pembayaranspp($idSiswa,$tahun);
    return $tampil->tampilSppById($idSiswa,$tahun);
    // return $idSiswa.$tahun;
});

Route::get('/caribayarspp/{idbulan}/{idSiswa}/{tahun}', function ($idBulan, $idSiswa,$tahun) {
    $bayar=new pembayaranspp($idBulan, $idSiswa,$tahun);
    return $bayar->index($idBulan, $idSiswa,$tahun);
});

Route::delete('/hapusbayar/{id}',[pembayaranspp::class,'hapusPembayaran']);
