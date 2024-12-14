<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KuponKredit extends Model
{
    use HasFactory;

    protected $table = 'kupon_kredit';

    // Kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'noid_peserta',
        'nomor_cif',
        'nomor_rekening',
        'nama_nasabah',
        'kode_kupon',
        'status_kredit',
        'wilayah',
        'status'
    ];
}
