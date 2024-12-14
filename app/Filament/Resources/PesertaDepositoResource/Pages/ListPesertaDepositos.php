<?php

namespace App\Filament\Resources\PesertaDepositoResource\Pages;

use App\Filament\Resources\PesertaDepositoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPesertaDepositos extends ListRecords
{
    protected static string $resource = PesertaDepositoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\CreateAction::make(),
        ];
    }
}
