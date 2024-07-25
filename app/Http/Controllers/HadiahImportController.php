<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\HadiahImport;

class HadiahImportController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        Excel::import(new HadiahImport, $request->file('file'));

        return redirect()->route('hadiah.index')->with('success', 'Hadiah imported successfully.');
    }
}
