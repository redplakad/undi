<?php

namespace App\Jobs;

use App\Models\KuponKredit;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ExportCompletedNotification;

class ExportKuponKreditJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $userId;

    /**
     * Create a new job instance.
     *
     * @param int $userId
     */
    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $fileName = 'kupon_kredit_' . now()->format('YmdHis') . '.csv';
        $filePath = storage_path('app/exports/' . $fileName);

        $title    = '';
        $message  = '';

        $status = false;

        $row = 0;
        // Open file for writing
        $file = fopen($filePath, 'w');

        // Write CSV headers
        fputcsv($file, ['ID Peserta', 'Nomor CIF', 'Nomor Rekening', 'Nama Nasabah', 'Kode Kupon', 'Status', 'Wilayah']);

        // Get data from model
        $kuponKredits = KuponKredit::all();
        
        // Write each row to CSV
        foreach ($kuponKredits as $kupon) {
            fputcsv($file, [
                $kupon->noid_peserta,
                $kupon->nomor_cif,
                $kupon->nomor_rekening,
                $kupon->nama_nasabah,
                $kupon->kode_kupon,
                $kupon->status_kredit,
                $kupon->wilayah
            ]);

            $row++;
        }

        // Close the file
        fclose($file);

        // Store the file
        if(Storage::put($fileName, file_get_contents($filePath)))
        {
            $status = true;
        }

        // Notify user when export is complete
        $user = \App\Models\User::find($this->userId);
        if ($status && $user) {
            $title = "Export Kupon Kredit Selesai";
            $message = "Proses export kupon kredit selesai, sebanyak ".number_format($row)." berhasil di export ke file csv.";

            $user->notify(new ExportCompletedNotification($fileName, $title, $message));
        }
    }
}