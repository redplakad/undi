<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarHadiah; // Pastikan model ini sudah dibuat

class GetHadiahController extends Controller
{
    //
    public function getHadiahById($id)
    {
        // Cari data berdasarkan ID
        $hadiah = DaftarHadiah::find($id);

        // Periksa apakah data ditemukan
        if ($hadiah) {
            return response()->json([
                'status' => 'success',
                'data' => $hadiah
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Data hadiah tidak ditemukan.'
            ], 404);
        }
    }
}
