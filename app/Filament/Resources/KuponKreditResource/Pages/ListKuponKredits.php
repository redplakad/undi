<?php

namespace App\Filament\Resources\KuponKreditResource\Pages;

use App\Filament\Resources\KuponKreditResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKuponKredits extends ListRecords
{
    protected static string $resource = KuponKreditResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\CreateAction::make(),
        ];
    }
}
