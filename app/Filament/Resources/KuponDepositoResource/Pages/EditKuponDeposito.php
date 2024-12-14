<?php

namespace App\Filament\Resources\KuponDepositoResource\Pages;

use App\Filament\Resources\KuponDepositoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKuponDeposito extends EditRecord
{
    protected static string $resource = KuponDepositoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\DeleteAction::make(),
        ];
    }
}
