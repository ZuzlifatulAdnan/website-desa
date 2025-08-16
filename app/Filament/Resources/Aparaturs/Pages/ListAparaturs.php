<?php

namespace App\Filament\Resources\Aparaturs\Pages;

use App\Filament\Resources\Aparaturs\AparaturResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAparaturs extends ListRecords
{
    protected static string $resource = AparaturResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
