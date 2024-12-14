<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenerateKuponTabungan;
use App\Http\Controllers\GenerateKuponDeposito;
use App\Http\Controllers\GenerateKuponKredit;
use App\Http\Controllers\PengundianTabunganController;
use App\Http\Controllers\PengundianDepositoController;
use App\Http\Controllers\ResetData;
use App\Http\Controllers\ViewPengundianTabungan;
use App\Http\Controllers\ViewPengundianDeposito;
use App\Http\Controllers\ViewPengundianKredit;
use App\Http\Controllers\ExportKuponController;

/*
|------------------
*/

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('filament.undian.auth.login'); // redirect user to login page
});

Route::post('/undian/generate-kupon-tabungan', [GenerateKuponTabungan::class, 'generate'])->name('generate.kupon.tabungan');
Route::post('/undian/generate-kupon-deposito', [GenerateKuponDeposito::class, 'generate'])->name('generate.kupon.deposito');
Route::post('/undian/generate-kupon-kredit', [GenerateKuponKredit::class, 'generate'])->name('generate.kupon.kredit');

Route::post('/undian/pengundian-tabungan', [PengundianTabunganController::class, 'simpan'])->name('pengundian.simpan.tabungan');
Route::post('/undian/pengundian-deposito', [PengundianDepositoController::class, 'simpan'])->name('pengundian.simpan.deposito');

Route::get('/tabungan', [ViewPengundianTabungan::class, 'index'])->name('undi.tabungan');
Route::get('/deposito', [ViewPengundianDeposito::class, 'index'])->name('undi.deposito');
Route::get('/kredit', [ViewPengundianKredit::class, 'index'])->name('undi.kredit');


Route::post('/undian/reset-data', [ResetData::class, 'generate'])->name('reset.data');

Route::get('/export-kupon-deposito', [ExportKuponController::class, 'exportKuponDeposito'])->name('export-kupon-deposito');
Route::get('/export-kupon-tabungan', [ExportKuponController::class, 'exportKuponTabungan'])->name('export-kupon-tabungan');
Route::get('/export-kupon-kredit', [ExportKuponController::class, 'exportKuponKredit'])->name('export-kupon-kredit');
Route::get('/download-csv', [ExportKuponController::class, 'download'])->name('download-csv');
