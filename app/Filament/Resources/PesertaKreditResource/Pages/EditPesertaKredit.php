<?php

namespace App\Filament\Resources\PesertaKreditResource\Pages;

use App\Filament\Resources\PesertaKreditResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPesertaKredit extends EditRecord
{
    protected static string $resource = PesertaKreditResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\DeleteAction::make(),
        ];
    }
}
