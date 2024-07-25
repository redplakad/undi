<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PesertaImport;

class PesertaImportController extends Controller
{
    public function index()
    {
        return view('import.peserta'); // Pastikan view ini ada
    }

    public function import(Request $request)
    {
        // Validasi input
        $request->validate([
            'file' => 'required|mimes:csv,txt|max:2048', // Validasi file
        ]);

        // Ambil file dari request
        $file = $request->file('file');

        // Impor file menggunakan Maatwebsite Excel
        Excel::import(new PesertaImport, $file);

        return redirect()->back()->with('success', 'CSV imported successfully!');
    }
}