<?php

namespace App\Http\Controllers;

use App\Models\DaftarHadiah;
use App\Models\KuponKredit;
use Illuminate\Http\Request;
use App\Models\PemenangKredit;

class PemenangKreditController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'id_peserta' => 'required|integer',
            'id_hadiah' => 'required|integer',
            'no_kupon' => 'required|string|max:50',
            'jenis_hadiah' => 'required|string|max:50',
            'nama_hadiah' => 'required|string|max:100',
            'nama_nasabah' => 'required|string|max:100',
            'jumlah_kupon' => 'required|integer',
            'nomor_cif' => 'required|string|max:20',
            'nomor_rekening' => 'required|string|max:30',
            'saldo_akhir' => 'required|numeric',
            'no_ktp' => 'required|string|max:30',
            'alamat' => 'required|string|max:255',
            'wilayah' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        // Simpan data ke database
        $pemenang = PemenangKredit::create($validated);

        // Update status peserta menjadi 1 agar tidak diikutkan dalam undian berikutnya
        $Kupon = KuponKredit::where('nomor_cif', $request->nomor_cif)
                              ->update(['status' => 1]);

        // Update jumlah hadiah menjadi -1
        $hadiah = DaftarHadiah::findOrFail($request->id_hadiah);
        $hadiah->jumlah_hadiah -= 1;
        $hadiah->save();

        if($pemenang)
        {
            return response()->json([
                'message' => 'Data berhasil disimpan.',
                'data' => $pemenang,
                'status' => 201,
            ], 201);
        }else{
            return response()->json([
                'message' => 'Terjadi error, data gagal disimpan',
                'data' => $pemenang,
                'status' => 500,
            ], 500);         
        }
    }
}
