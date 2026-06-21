<?php

namespace App\Filament\Resources\PermohonanLayanans\Pages;

use App\Filament\Resources\PermohonanLayanans\PermohonanLayananResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPermohonanLayanan extends ViewRecord
{
    protected static string $resource = PermohonanLayananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
