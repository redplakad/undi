<?php

namespace App\Filament\Resources\PesertaTabunganResource\Pages;

use App\Filament\Resources\PesertaTabunganResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPesertaTabungans extends ListRecords
{
    protected static string $resource = PesertaTabunganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\CreateAction::make(),
        ];
    }
}
