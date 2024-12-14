<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class GenerateKuponDeposito extends Page
{
    protected static ?string $navigationIcon = 'heroicon-c-finger-print';

    protected static ?string $navigationGroup = 'Undian Deposito';
    
    protected static string $view = 'filament.pages.generate-kupon-deposito';
}
