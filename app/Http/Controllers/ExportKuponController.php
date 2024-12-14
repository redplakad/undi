<?php

namespace App\Http\Controllers;

use App\Jobs\ExportKuponKreditJob;
use App\Jobs\ExportKuponDepositoJob;
use App\Jobs\ExportKuponTabunganJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExportKuponController extends Controller
{
    /**
     * Trigger export and dispatch job.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function exportKuponDeposito()
    {
        $userId = auth()->id(); // Assuming user is authenticated
        ExportKuponDepositoJob::dispatch($userId);

        session()->flash('message', 'Proses export kupon deposito telah dimulai. Anda akan diberitahu setelah selesai.');

        // Redirect ke halaman tertentu, misalnya ke dashboard
        return redirect()->route('filament.undian.pages.export-kupon');
    }

    public function exportKuponTabungan()
    {
        $userId = auth()->id(); // Assuming user is authenticated
        ExportKuponTabunganJob::dispatch($userId);

        session()->flash('message', 'Proses export kupon tabungan telah dimulai. Anda akan diberitahu setelah selesai.');

        // Redirect ke halaman tertentu, misalnya ke dashboard
        return redirect()->route('filament.undian.pages.export-kupon');
    }

    public function exportKuponKredit()
    {
        $userId = auth()->id(); // Assuming user is authenticated
        ExportKuponKreditJob::dispatch($userId);

        session()->flash('message', 'Proses export kupon kredit telah dimulai. Anda akan diberitahu setelah selesai.');

        // Redirect ke halaman tertentu, misalnya ke dashboard
        return redirect()->route('filament.undian.pages.export-kupon');
    }

    /**
     * Download CSV file.
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function download(Request $request)
    {
        $filePath = 'exports/' . $request->query('file');

        if (!Storage::exists($filePath)) {
            abort(404, 'File tidak ditemukan.');
        }

        return Storage::download($filePath);
    }
}
