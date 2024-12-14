<?php

namespace App\Http\Controllers;

use App\Models\KuponKredit;
use App\Models\PesertaKredit;
use Illuminate\Http\JsonResponse;

class KuponKreditController extends Controller
{
    /**
     * Mengambil daftar nomor rekening.
     *
     * @return JsonResponse
     */
    public function getNomorRekening($wilayah): JsonResponse
    {
        // Ambil semua nomor rekening dari model PesertaKredit
        $nomorKupon = KuponKredit::where('status',0)->where('wilayah', $wilayah)->pluck('kode_kupon');

        // Kembalikan dalam format JSON
        return response()->json([
            'success' => true,
            'data' => $nomorKupon,
        ]);
    }

    public function getKuponByWinner($winner)
    {
        $kupon = KuponKredit::where('kode_kupon', $winner)->first();
        $pemenang = PesertaKredit::where('nomor_cif', $kupon->nomor_cif)->first();
        $pemenang->kupon = $kupon->kode_kupon;

        $jumlah_kupon = KuponKredit::where('nomor_cif', $pemenang->nomor_cif)->count();

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