<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Jobs\ProcessPesertaTabunganJob;

class GenerateKuponTabungan extends Controller
{
    //
    public function generate(Request $request)
    {
        // Hapus semua data di tabel kupon_tabungan
        DB::table('kupon_tabungan')->truncate();
        // Ambil input saldo kupon dari request
        $set_saldo_kupon = str_replace(",","",$request->input('saldo_kupon'));

        // Ambil data saldo akhir dari tabel peserta_tabungan
        $pesertaTabungan = DB::table('peserta_tabungan')->where('saldo_akhir','>=', $set_saldo_kupon)->get();

        // Cek jika tabel peserta_tabungan kosong
        if ($pesertaTabungan->isEmpty()) {
            // Set notifikasi gagal ke session dan redirect ke halaman form
            Session::flash('error', 'Gagal: Data tabel peserta tabungan kosong.');
            return redirect()->back();
        }

        ProcessPesertaTabunganJob::dispatch($pesertaTabungan, $set_saldo_kupon);
        // Lanjutkan dengan logika penyimpanan hasil atau pengolahan lainnya...
        Session::flash('success', 'Proses generate kupon telah dimulai dan akan diproses di background.');
        return redirect()->back();
    }
}
