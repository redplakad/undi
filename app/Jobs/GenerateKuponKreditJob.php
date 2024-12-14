<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;  // <-- Make sure this is here
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

use App\Models\KuponKredit;
use App\Models\User;
use App\Notifications\GenerateKuponKredit;

class GenerateKuponKreditJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $peserta;
    protected $jumlah_kupon;
    protected $set_saldo_kupon;
    protected $status_kredit;

    /**
     * Create a new job instance.
     */
    public function __construct($peserta, $jumlah_kupon, $set_saldo_kupon, $status_kredit)
    {
        $this->peserta = $peserta;
        $this->jumlah_kupon = $jumlah_kupon;
        $this->set_saldo_kupon = $set_saldo_kupon;
        $this->status_kredit = $status_kredit;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        for ($i = 1; $i <= $this->jumlah_kupon; $i++) { 
            do {
                // Menghasilkan kode kupon
                $totalKupon = KuponKredit::count() + $i;
                $kode_kupon = (rand(1123456789, 9123456789)) + $totalKupon;
    
                // Cek apakah kode kupon sudah ada
                $isExist = KuponKredit::where('kode_kupon', $kode_kupon)->exists();
            } while ($isExist); // Jika ada duplikasi, ulangi hingga kode unik ditemukan
    
            // Menyimpan ke database
            KuponKredit::create([
                'noid_peserta' => $this->peserta->id,
                'nomor_cif' => $this->peserta->nomor_cif,
                'nomor_rekening' => $this->peserta->nomor_rekening,
                'nama_nasabah' => $this->peserta->nama_nasabah,
                'kode_kupon' => $kode_kupon,
                'status_kredit' => $this->status_kredit,
                'wilayah' => $this->peserta->wilayah,
                'status' => 0
            ]);
        }
    }
}