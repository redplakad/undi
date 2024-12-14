<?php

namespace App\Filament\Resources\PemenangTabunganResource\Pages;

use App\Filament\Resources\PemenangTabunganResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPemenangTabungans extends ListRecords
{
    protected static string $resource = PemenangTabunganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\CreateAction::make(),
        ];
    }
}
