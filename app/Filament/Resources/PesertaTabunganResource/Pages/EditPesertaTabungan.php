<?php

namespace App\Filament\Resources\PesertaTabunganResource\Pages;

use App\Filament\Resources\PesertaTabunganResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPesertaTabungan extends EditRecord
{
    protected static string $resource = PesertaTabunganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\DeleteAction::make(),
        ];
    }
}
