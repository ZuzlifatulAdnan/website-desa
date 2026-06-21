<?php

namespace App\Filament\Resources\PermohonanLayanans\Pages;

use App\Filament\Resources\PermohonanLayanans\PermohonanLayananResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPermohonanLayanans extends ListRecords
{
    protected static string $resource = PermohonanLayananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
