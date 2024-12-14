<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Jobs\GenerateKuponDepositoJob;
use App\Jobs\ProcessPesertaDepositoJob;

class GenerateKuponDeposito extends Controller
{
    //
    public function generate(Request $request)
    {
        // Hapus semua data di tabel kupon_Deposito
        DB::table('kupon_deposito')->truncate();
        // Ambil input saldo kupon dari request
        $set_saldo_kupon = str_replace(",","",$request->input('saldo_kupon'));

        // Ambil data saldo akhir dari tabel peserta_Deposito
        $pesertaDeposito = DB::table('peserta_deposito')->where('saldo_akhir','>=',  $set_saldo_kupon)->get();

        // Cek jika tabel peserta_Deposito kosong
        if ($pesertaDeposito->isEmpty()) {
            // Set notifikasi gagal ke session dan redirect ke halaman form
            Session::flash('error', 'Gagal: Data tabel peserta deposito kosong.');
            return redirect()->back();
        }

        // Inisialisasi total kupon
        $jumlah_kupon = 0;

        ProcessPesertaDepositoJob::dispatch($pesertaDeposito, $set_saldo_kupon);
        // Lanjutkan dengan logika penyimpanan hasil atau pengolahan lainnya...
        Session::flash('success', 'Proses generate kupon telah dimulai dan akan diproses di background.');
        return redirect()->back();
    }
}
