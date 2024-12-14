<?php

namespace App\Filament\Resources\PesertaDepositoResource\Pages;

use App\Filament\Resources\PesertaDepositoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPesertaDeposito extends EditRecord
{
    protected static string $resource = PesertaDepositoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\DeleteAction::make(),
        ];
    }
}
