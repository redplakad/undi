<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Symfony\Component\CssSelector\Node\FunctionNode;

class undiKredit extends Page
{
    protected static ?string $navigationIcon = 'heroicon-s-play';

    protected static string $view = 'filament.pages.undi-kredit';

    protected static ?string $navigationGroup = 'Undian Kredit';

    public function mount()
    {
        return redirect()->route('undi.kredit');
    }
}
