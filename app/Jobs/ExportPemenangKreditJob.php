<?php

namespace App\Jobs;

use App\Models\PemenangKredit;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ExportCompletedNotification;

class ExportPemenangKreditJob implements ShouldQueue
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
        $fileName = 'Pemenang_kredit_' . now()->format('YmdHis') . '.csv';
        $filePath = storage_path('app/exports/' . $fileName);

        $title    = '';
        $message  = '';

        $status = false;

        $row = 0;
        // Open file for writing
        $file = fopen($filePath, 'w');

        // Write CSV headers
        fputcsv($file, ['ID Peserta', 'ID Hadiah', 'No Kupon', 'Jenis Hadiah', 'Nama Hadiah', 'Nama Nasabah', 'Jumlah Kupon', 'Nomor CIF', 'Nomor Rekening','Saldo Akhir', 'Nomor KTP', 'Alamat']);

        // Get data from model
        PemenangKredit::chunk(2000, function ($PemenangKredits) use (&$row, $file) {
            foreach ($PemenangKredits as $Pemenang) {
                fputcsv($file, [
                    $Pemenang->id_peserta,
                    $Pemenang->id_hadiah,
                    $Pemenang->no_kupon,
                    $Pemenang->jenis_hadiah,
                    $Pemenang->nama_hadiah,
                    $Pemenang->nama_nasabah,
                    $Pemenang->jumlah_kupon,
                    $Pemenang->nomor_cif,
                    $Pemenang->nomor_rekening,
                    $Pemenang->saldo_akhir,
                    $Pemenang->no_ktp,
                    $Pemenang->alamat,
                ]);
        
                $row++;
            }
        });

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
            $title = "Export Pemenang Kredit Selesai";
            $message = "Proses export Pemenang kredit selesai, sebanyak ".number_format($row)." berhasil di export ke file csv.";

            $user->notify(new ExportCompletedNotification($fileName, $title, $message));
        }
    }
}