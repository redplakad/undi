<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaKredit extends Model
{
    use HasFactory;

    protected $table = 'peserta_kredit';

    // Kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'nama_nasabah',
        'nomor_cif',
        'nomor_rekening',
        'jenis_kredit',
        'saldo_akhir',
        'no_ktp',
        'alamat',
        'wilayah',
        'status'
    ];
}
