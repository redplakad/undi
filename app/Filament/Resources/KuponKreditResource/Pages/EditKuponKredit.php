<?php

namespace App\Filament\Resources\KuponKreditResource\Pages;

use App\Filament\Resources\KuponKreditResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKuponKredit extends EditRecord
{
    protected static string $resource = KuponKreditResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\DeleteAction::make(),
        ];
    }
}
