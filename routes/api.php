<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\KuponTabunganController;
use App\Http\Controllers\KuponDepositoController;
use App\Http\Controllers\GetHadiahController;
use App\Http\Controllers\KuponKreditController;
use App\Http\Controllers\PemenangTabunganController;
use App\Http\Controllers\PemenangDepositoController;
use App\Http\Controllers\PemenangKreditController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/hadiah/{id}', [GetHadiahController::class, 'getHadiahById'])->name('api.get.hadiah');

Route::get('/nomor-kupon-tabungan/{produk}', [KuponTabunganController::class, 'getNomorRekening'])->name('api.nomor_kupon_tabungan');
Route::get('/kupon-tabungan/{winner}', [KuponTabunganController::class, 'getKuponByWinner'])->name('api.get.kupon.tabungan');

Route::get('/nomor-kupon-deposito/{produk}', [KuponDepositoController::class, 'getNomorRekening'])->name('api.nomor_kupon_deposito');
Route::get('/kupon-deposito/{winner}', [KuponDepositoController::class, 'getKuponByWinner'])->name('api.get.kupon.deposito');

Route::get('/nomor-kupon-kredit/{wilayah}', [KuponKreditController::class, 'getNomorRekening'])->name('api.nomor_kupon_kredit');
Route::get('/kupon-kredit/{winner}', [KuponKreditController::class, 'getKuponByWinner'])->name('api.get.kupon.kredit');

Route::post('/pemenang-tabungan', [PemenangTabunganController::class, 'store'])->name('simpan.pemenang.tabungan');
Route::post('/pemenang-deposito', [PemenangDepositoController::class, 'store'])->name('simpan.pemenang.deposito');
Route::post('/pemenang-kredit', [PemenangKreditController::class, 'store'])->name('simpan.pemenang.kredit');