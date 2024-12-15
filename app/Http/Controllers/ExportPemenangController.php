<?php

namespace App\Http\Controllers;

use App\Jobs\ExportPemenangKreditJob;
use App\Jobs\ExportPemenangDepositoJob;
use App\Jobs\ExportPemenangTabunganJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExportPemenangController extends Controller
{
    /**
     * Trigger export and dispatch job.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function exportPemenangDeposito()
    {
        $userId = auth()->id(); // Assuming user is authenticated
        ExportPemenangDepositoJob::dispatch($userId);

        session()->flash('message', 'Proses export Pemenang deposito telah dimulai. Anda akan diberitahu setelah selesai.');

        // Redirect ke halaman tertentu, misalnya ke dashboard
        return redirect()->route('filament.undian.pages.export-kupon');
    }

    public function exportPemenangTabungan()
    {
        $userId = auth()->id(); // Assuming user is authenticated
        ExportPemenangTabunganJob::dispatch($userId);

        session()->flash('message', 'Proses export Pemenang tabungan telah dimulai. Anda akan diberitahu setelah selesai.');

        // Redirect ke halaman tertentu, misalnya ke dashboard
        return redirect()->route('filament.undian.pages.export-kupon');
    }

    public function exportPemenangKredit()
    {
        $userId = auth()->id(); // Assuming user is authenticated
        ExportPemenangKreditJob::dispatch($userId);

        session()->flash('message', 'Proses export Pemenang kredit telah dimulai. Anda akan diberitahu setelah selesai.');

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
