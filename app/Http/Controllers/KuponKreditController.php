<?php

namespace App\Http\Controllers;

use App\Models\DaftarHadiah;
use App\Models\KuponKredit;
use App\Models\PesertaKredit;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class KuponKreditController extends Controller
{
    /**
     * Mengambil daftar nomor rekening.
     *
     * @return JsonResponse
     */
    public function getNomorRekening($wilayah, Request $request): JsonResponse
    {
        // Ambil hadiah berdasarkan ID wilayah dari input
        $cek_hadiah = DaftarHadiah::where('id', $request->input('id_wilayah'))->first();

        // Inisialisasi variabel nomorKupon
        $nomorKupon = [];

        if ($cek_hadiah && !empty($cek_hadiah->deskripsi_hadiah)) {
            // Jika deskripsi_hadiah tidak kosong, lakukan query dengan filter wilayah
            
            $nomorKupon = KuponKredit::where('status', 0)
                ->whereIn('wilayah', $cek_hadiah->deskripsi_hadiah)
                ->pluck('kode_kupon');
        } else {
            // Jika hadiah tidak ditemukan atau deskripsi_hadiah kosong, gunakan wilayah default
            $nomorKupon = KuponKredit::where('status', 0)
                ->where('wilayah', $wilayah)
                ->pluck('kode_kupon');
        }
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