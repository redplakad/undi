<?php

namespace App\Http\Controllers;

use Filament\Facades\Filament;
use Illuminate\Http\Request;

class ViewPengundianKredit extends Controller
{
    //
    public function index()
    {
        if (!Filament::auth()->check()) {
            return redirect()->route('filament.undian.auth.login');
        }

        return view('frontend.undi.kredit');
    }
}
