<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\GenerateKuponKredit;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;


use Illuminate\Support\Facades\Notification;
class ProcessPesertaKreditJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $pesertaKredit;
    private $setSaldoKupon;
    private $statusKredit;
    private $jumlah_kupon;

    /**
     * Create a new job instance.
     *
     * @param \Illuminate\Support\Collection $pesertaKredit
     * @param int $setSaldoKupon
     * @param string $statusKredit
     */
    public function __construct($pesertaKredit, $setSaldoKupon, $statusKredit)
    {
        $this->pesertaKredit = $pesertaKredit;
        $this->setSaldoKupon = $setSaldoKupon;
        $this->statusKredit = $statusKredit;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->pesertaKredit as $peserta) {
            if ($peserta->saldo_akhir >= $this->setSaldoKupon) {
                $jumlahKupon = floor($peserta->saldo_akhir / $this->setSaldoKupon);

                if ($jumlahKupon > 0) {
                    // Kirim job ke queue
                    GenerateKuponKreditJob::dispatch($peserta, $jumlahKupon, $this->setSaldoKupon, $this->statusKredit);
                    $this->jumlah_kupon += $jumlahKupon;
                }
            }
        }

        $user = User::find(auth()->user()->id);

        $message = "Proses generate kupon kredit berhasil. Sebanyak " . $this->jumlah_kupon . " kupon berhasil digenerate.";
        $user->notify(new GenerateKuponKredit($message));
    }
}