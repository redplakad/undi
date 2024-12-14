<?php

namespace App\Filament\Resources\PemenangKreditResource\Pages;

use App\Filament\Resources\PemenangKreditResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPemenangKredits extends ListRecords
{
    protected static string $resource = PemenangKreditResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\CreateAction::make(),
        ];
    }
}
