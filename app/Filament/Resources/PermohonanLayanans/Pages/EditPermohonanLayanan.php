<?php

namespace App\Filament\Resources\PermohonanLayanans\Pages;

use App\Filament\Resources\PermohonanLayanans\PermohonanLayananResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPermohonanLayanan extends EditRecord
{
    protected static string $resource = PermohonanLayananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
