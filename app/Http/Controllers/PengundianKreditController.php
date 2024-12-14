<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemenangDeposito;
use App\Models\DaftarHadiah;
use Illuminate\Support\Facades\DB;

class PengundianDepositoController extends Controller
{
    //
    public function simpan(Request $request)
    {
        // Validasi input form
        $validated = $request->validate([
            'form_id_peserta' => 'required|exists:peserta_Deposito,id', // Sesuaikan dengan kolom di tabel peserta_Deposito
            'form_id_hadiah' => 'required|exists:daftar_hadiah,id', // Sesuaikan dengan kolom di tabel daftar_hadiah
            'form_no_kupon' => 'required|string',
            'form_jenis_hadiah' => 'required|string',
            'form_nama_hadiah' => 'required|string',
            'form_nama_nasabah' => 'required|string',
            'form_jumlah_kupon' => 'required|integer',
            'form_nomor_cif' => 'required|string',
            'form_nomor_rekening' => 'required|string',
            'form_saldo' => 'required|numeric',
            'form_no_ktp' => 'required|string',
            'form_alamat' => 'required|string',
        ]);
        
        // Simpan data pemenang_Deposito
        try {
            $savePemenang = PemenangDeposito::create([
                'id_peserta' => $validated['form_id_peserta'],
                'id_hadiah' => $validated['form_id_hadiah'],
                'no_kupon' => $validated['form_no_kupon'],
                'jenis_hadiah' => $validated['form_jenis_hadiah'],
                'nama_hadiah' => $validated['form_nama_hadiah'],
                'nama_nasabah' => $validated['form_nama_nasabah'],
                'jumlah_kupon' => $validated['form_jumlah_kupon'],
                'nomor_cif' => $validated['form_nomor_cif'],
                'nomor_rekening' => $validated['form_nomor_rekening'],
                'saldo_akhir' => $validated['form_saldo'],
                'no_ktp' => $validated['form_no_ktp'],
                'alamat' => $validated['form_alamat'],
            ]);

            if($savePemenang)
            {
                $hadiah = DaftarHadiah::findOrFail($validated['form_id_hadiah']);

                // Kurangi jumlah_hadiah sebanyak 1
                $hadiah->jumlah_hadiah = $hadiah->jumlah_hadiah - 1;
            
                // Simpan perubahan pada tabel DaftarHadiah
                $hadiah->save();
            }

            // Jika berhasil disimpan, beri notifikasi sukses
            return redirect()->back()->with('success', 'Data pemenang berhasil disimpan!');
        } catch (\Exception $e) {
            // Jika terjadi error, beri notifikasi gagal
            return redirect()->back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }
}
