<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Symfony\Component\CssSelector\Node\FunctionNode;

class UndiDeposito extends Page
{
    protected static ?string $navigationIcon = 'heroicon-s-play';

    protected static string $view = 'filament.pages.undi-deposito';

    protected static ?string $navigationGroup = 'Undian Deposito';

    public function mount()
    {
        return redirect()->route('undi.deposito');
    }
}
