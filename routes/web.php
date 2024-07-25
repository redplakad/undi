<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\PrizeController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\WinnerController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\PesertaImportController;



Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/vouchers', [VoucherController::class, 'index'])->name('vouchers.index');
    Route::get('/vouchers/create', [VoucherController::class, 'create'])->name('vouchers.create');
    Route::post('/vouchers', [VoucherController::class, 'store'])->name('vouchers.store');
    Route::get('/vouchers/{voucher}/edit', [VoucherController::class, 'edit'])->name('vouchers.edit');
    Route::put('/vouchers/{voucher}', [VoucherController::class, 'update'])->name('vouchers.update');
    Route::delete('/vouchers/{voucher}', [VoucherController::class, 'destroy'])->name('vouchers.destroy');
    Route::get('/vouchers/import', [VoucherController::class, 'showImportForm'])->name('vouchers.import.form');
    Route::post('/vouchers/import', [VoucherController::class, 'import'])->name('vouchers.import');
    Route::resource('prizes', PrizeController::class);
    Route::resource('regions', RegionController::class);
    Route::resource('winners', WinnerController::class);


    Route::get('/import', [PesertaImportController::class, 'index'])->name('import.peserta');
    Route::post('/import', [PesertaImportController::class, 'import'])->name('peserta.import');


    Route::get('/peserta', [PesertaController::class, 'index'])->name('peserta.index');
    Route::get('/peserta/create', [PesertaController::class, 'create'])->name('peserta.create');
    Route::post('/peserta', [PesertaController::class, 'store'])->name('peserta.store');
    Route::get('/peserta/{id}', [PesertaController::class, 'show'])->name('peserta.show');
    Route::get('/peserta/{id}/edit', [PesertaController::class, 'edit'])->name('peserta.edit');
    Route::put('/peserta/{id}', [PesertaController::class, 'update'])->name('peserta.update');
    Route::delete('/peserta/{id}', [PesertaController::class, 'destroy'])->name('peserta.destroy');
});

require __DIR__.'/auth.php';
