<?php

namespace App\Filament\Resources\DaftarHadiahResource\Pages;

use App\Filament\Resources\DaftarHadiahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDaftarHadiah extends EditRecord
{
    protected static string $resource = DaftarHadiahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
