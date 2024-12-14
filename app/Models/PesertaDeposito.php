<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use Filament\Forms\Components\Checkbox;

class PesertaDeposito extends Model
{
    use HasFactory;

    protected $table = 'peserta_deposito';

    // Kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'nama_nasabah',
        'nomor_cif',
        'nomor_rekening',
        'jenis_deposito',
        'saldo_akhir',
        'no_ktp',
        'alamat'
    ];
}