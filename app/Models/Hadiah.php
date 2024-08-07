<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hadiah extends Model
{
    use HasFactory;

    protected $table = 'hadiah';

    protected $fillable = [
        'nama_hadiah',
        'stok_hadiah',
        'foto',
        'keterangan',
        'level',
    ];
}
