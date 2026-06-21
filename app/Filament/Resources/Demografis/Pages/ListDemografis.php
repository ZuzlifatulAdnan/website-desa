<?php

namespace App\Filament\Resources\Demografis\Pages;

use App\Filament\Resources\Demografis\DemografiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDemografis extends ListRecords
{
    protected static string $resource = DemografiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
