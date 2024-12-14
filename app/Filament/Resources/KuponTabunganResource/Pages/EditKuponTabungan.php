<?php

namespace App\Filament\Resources\KuponTabunganResource\Pages;

use App\Filament\Resources\KuponTabunganResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKuponTabungan extends EditRecord
{
    protected static string $resource = KuponTabunganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\DeleteAction::make(),
        ];
    }
}
