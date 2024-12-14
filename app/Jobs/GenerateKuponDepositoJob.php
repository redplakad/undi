<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;  // <-- Make sure this is here
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\KuponDeposito;


class GenerateKuponDepositoJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $peserta;
    protected $jumlah_kupon;
    protected $set_saldo_kupon;
    protected $jumlah_row;

    /**
     * Create a new job instance.
     */
    public function __construct($peserta, $jumlah_kupon, $set_saldo_kupon)
    {
        $this->peserta = $peserta;
        $this->jumlah_kupon = $jumlah_kupon;
        $this->set_saldo_kupon = $set_saldo_kupon;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        for ($i = 1; $i <= $this->jumlah_kupon; $i++) { 
            do {
                // Menghasilkan kode kupon
                $totalKupon = KuponDeposito::count() + $i;
                $kode_kupon = (rand(1123456789, 9123456789)) + $totalKupon;
    
                // Cek apakah kode kupon sudah ada
                $isExist = KuponDeposito::where('kode_kupon', $kode_kupon)->exists();
            } while ($isExist); // Jika ada duplikasi, ulangi hingga kode unik ditemukan
    
            // Menyimpan ke database
            KuponDeposito::create([
                'noid_peserta' => $this->peserta->id,
                'nomor_cif' => $this->peserta->nomor_cif,
                'nomor_rekening' => $this->peserta->nomor_rekening,
                'nama_nasabah' => $this->peserta->nama_nasabah,
                'kode_kupon' => $kode_kupon,
                'produk' => $this->peserta->jenis_deposito,
                'status' => 0
            ]);

            $this->jumlah_row += 1;
        }
    }
}
