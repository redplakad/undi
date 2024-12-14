<?php

namespace App\Filament\Resources\KuponTabunganResource\Pages;

use App\Filament\Resources\KuponTabunganResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKuponTabungans extends ListRecords
{
    protected static string $resource = KuponTabunganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\CreateAction::make(),
        ];
    }
}
