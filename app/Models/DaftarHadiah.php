<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarHadiah extends Model
{
    
        // Nama tabel
        protected $table = 'daftar_hadiah';

        // Kolom yang bisa diisi (mass assignable)
        protected $fillable = [
            'level_hadiah',
            'nama_hadiah',
            'jumlah_hadiah',
            'gambar_hadiah',
            'deskripsi_hadiah',
        ];
}
