<?php

namespace App\Filament\Resources\PemenangDepositoResource\Pages;

use App\Filament\Resources\PemenangDepositoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPemenangDepositos extends ListRecords
{
    protected static string $resource = PemenangDepositoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\CreateAction::make(),
        ];
    }
}
