<?php

namespace App\Filament\Resources\PemenangKreditResource\Pages;

use App\Filament\Resources\PemenangKreditResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPemenangKredit extends EditRecord
{
    protected static string $resource = PemenangKreditResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\DeleteAction::make(),
        ];
    }
}
