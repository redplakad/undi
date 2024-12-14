<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use Filament\Forms\Components\Checkbox;

class PesertaTabungan extends Model
{
    use HasFactory;

    protected $table = 'peserta_tabungan';

    // Kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'nama_nasabah',
        'nomor_cif',
        'nomor_rekening',
        'jenis_tabungan',
        'saldo_akhir',
        'no_ktp',
        'alamat'
    ];
}