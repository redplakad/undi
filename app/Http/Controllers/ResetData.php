<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Notifications\ResetData as NotificationsResetData;

class ResetData extends Controller
{
    //
    public function generate(Request $request)
    {
        // Hapus semua data di tabel kupon_Deposito
        // Ambil input saldo kupon dari request
        $konfirmasi = str_replace(",","",$request->input('konfirmasi'));

        if($konfirmasi == "OKE")
        {
            DB::table('pemenang_deposito')->truncate();
            DB::table('pemenang_tabungan')->truncate();
            DB::table('pemenang_kredit')->truncate();
        }

        $user = User::find(auth()->user()->id);

        $message = "Sukses Reset Data, Semua data pemenang berhasil di hapus semua.";
        $user->notify(new NotificationsResetData($message));
        // Lanjutkan dengan logika penyimpanan hasil atau pengolahan lainnya...
        Session::flash('success', 'Sukses Reset Data, semua data pemenang sekarang sudah kosong.');
        return redirect()->back();
    }
}
