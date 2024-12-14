<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\GenerateKuponTabungan;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;


use Illuminate\Support\Facades\Notification;
class ProcessPesertaTabunganJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $pesertaTabungan;
    private $setSaldoKupon;
    private $statusTabungan;
    private $jumlah_kupon;

    /**
     * Create a new job instance.
     *
     * @param \Illuminate\Support\Collection $pesertaTabungan
     * @param int $setSaldoKupon
     * @param string $statusTabungan
     */
    public function __construct($pesertaTabungan, $setSaldoKupon)
    {
        $this->pesertaTabungan = $pesertaTabungan;
        $this->setSaldoKupon = $setSaldoKupon;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->pesertaTabungan as $peserta) {
            if ($peserta->saldo_akhir >= $this->setSaldoKupon) {
                $jumlahKupon = floor($peserta->saldo_akhir / $this->setSaldoKupon);

                if ($jumlahKupon > 0) {
                    // Kirim job ke queue

                    GenerateKuponTabunganJob::dispatch($peserta, $jumlahKupon, $this->setSaldoKupon, $this->statusTabungan);

                    $this->jumlah_kupon += $jumlahKupon;
                }
            }
        }


        $user = User::find(1);

        $user = User::find(auth()->user()->id);

        $message = "Proses generate kupon tabungan berhasil. Sebanyak " . $this->jumlah_kupon . " Kupon berhasil generate.";

        $user->notify(new GenerateKuponTabungan($message));
    }
}