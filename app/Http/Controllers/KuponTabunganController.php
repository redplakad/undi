<?php

namespace App\Http\Controllers;

use App\Models\KuponTabungan;
use App\Models\PesertaTabungan;
use Illuminate\Http\JsonResponse;

class KuponTabunganController extends Controller
{
    /**
     * Mengambil daftar nomor rekening.
     *
     * @return JsonResponse
     */
    public function getNomorRekening($produk): JsonResponse
    {
        // Ambil semua nomor rekening dari model PesertaTabungan
        $nomorKupon = KuponTabungan::where('status',0)->where('produk', $produk)->pluck('kode_kupon');

        // Kembalikan dalam format JSON
        return response()->json([
            'success' => true,
            'data' => $nomorKupon,
        ]);
    }

    public function getKuponByWinner($winner)
    {
        $kupon = KuponTabungan::where('kode_kupon', $winner)->first();
        $pemenang = PesertaTabungan::where('nomor_cif', $kupon->nomor_cif)->first();
        $pemenang->kupon = $kupon->kode_kupon;

        $jumlah_kupon = KuponTabungan::where('nomor_cif', $pemenang->nomor_cif)->count();

        $pemenang->total_kupon = $jumlah_kupon;

        if($kupon)
        {
            return response()->json([
                'status' => 'success',
                'data' => $pemenang
            ], 200);
        }else{
            return response()->json([
                'status'    =>  'error',
                'message'   =>  'Kupon tidak ditemukan.'
            ], 404);
        }
    }
}