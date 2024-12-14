<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Jobs\GenerateKuponKreditJob;
use App\Jobs\ProcessPesertaKreditJob;

class GenerateKuponKredit extends Controller
{
    //
    public function generate(Request $request)
    {
        // Ambil input saldo kupon dari request
        $set_saldo_kupon = str_replace(",","",$request->input('saldo_kupon'));
        $status_kredit = str_replace(",","",$request->input('status'));

        // Hapus semua data di tabel kupon_tabungan
        DB::table('kupon_kredit')->where('status_kredit', $status_kredit)->delete();

        // Ambil data saldo akhir dari tabel peserta_tabungan
        $pesertaKredit = DB::table('peserta_kredit')->where('saldo_akhir','>=', $set_saldo_kupon)->where('status', $status_kredit)->get();

        // Cek jika tabel peserta_tabungan kosong
        if ($pesertaKredit->isEmpty()) {
            // Set notifikasi gagal ke session dan redirect ke halaman form
            Session::flash('error', 'Gagal: Data tabel peserta kredit kosong.');
            return redirect()->back();
        }

        ProcessPesertaKreditJob::dispatch($pesertaKredit, $set_saldo_kupon, $status_kredit);
        // Lanjutkan dengan logika penyimpanan hasil atau pengolahan lainnya...
        Session::flash('success', 'Proses generate kupon telah dimulai dan akan diproses di background.');
        return redirect()->back();
    }
}
