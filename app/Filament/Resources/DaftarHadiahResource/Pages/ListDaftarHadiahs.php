<?php

namespace App\Filament\Resources\DaftarHadiahResource\Pages;

use App\Filament\Resources\DaftarHadiahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDaftarHadiahs extends ListRecords
{
    protected static string $resource = DaftarHadiahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
