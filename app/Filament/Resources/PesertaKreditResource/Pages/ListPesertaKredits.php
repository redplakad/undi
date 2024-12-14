<?php

namespace App\Filament\Resources\PesertaKreditResource\Pages;

use App\Filament\Resources\PesertaKreditResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPesertaKredits extends ListRecords
{
    protected static string $resource = PesertaKreditResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\CreateAction::make(),
        ];
    }
}
