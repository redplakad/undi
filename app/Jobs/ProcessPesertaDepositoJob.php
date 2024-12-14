<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\GenerateKuponDeposito;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;


use Illuminate\Support\Facades\Notification;
class ProcessPesertaDepositoJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $pesertaDeposito;
    private $setSaldoKupon;
    private $statusDeposito;
    private $jumlah_kupon;

    /**
     * Create a new job instance.
     *
     * @param \Illuminate\Support\Collection $pesertaDeposito
     * @param int $setSaldoKupon
     * @param string $statusDeposito
     */
    public function __construct($pesertaDeposito, $setSaldoKupon)
    {
        $this->pesertaDeposito = $pesertaDeposito;
        $this->setSaldoKupon = $setSaldoKupon;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->pesertaDeposito as $peserta) {
            if ($peserta->saldo_akhir >= $this->setSaldoKupon) {
                $jumlahKupon = floor($peserta->saldo_akhir / $this->setSaldoKupon);

                if ($jumlahKupon > 0) {
                    // Kirim job ke queue
                    GenerateKuponDepositoJob::dispatch($peserta, $jumlahKupon, $this->setSaldoKupon, $this->statusDeposito);
                    $this->jumlah_kupon += $jumlahKupon;
                }
            }
        }

        $user = User::find(auth()->user()->id);

        $message = "Proses generate kupon deposito berhasil. Sebanyak " . $this->jumlah_kupon . " Kupon berhasil generate.";
        $user->notify(new GenerateKuponDeposito($message));
    }
}