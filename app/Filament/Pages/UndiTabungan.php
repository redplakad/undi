<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Symfony\Component\CssSelector\Node\FunctionNode;

class undiTabungan extends Page
{
    protected static ?string $navigationIcon = 'heroicon-s-play';

    protected static string $view = 'filament.pages.undi-tabungan';

    protected static ?string $navigationGroup = 'Undian Tabungan';

    public function mount()
    {
        return redirect()->route('undi.tabungan');
    }
}
