<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemenangTabungan extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan oleh model
    protected $table = 'pemenang_tabungan';

    // Kolom-kolom yang dapat diisi secara massal
    protected $fillable = [
        'id_peserta',
        'id_hadiah',
        'no_kupon',
        'jenis_hadiah',
        'nama_hadiah',
        'nama_nasabah',
        'jumlah_kupon',
        'nomor_cif',
        'nomor_rekening',
        'saldo_akhir',
        'no_ktp',
        'alamat',
    ];
}
