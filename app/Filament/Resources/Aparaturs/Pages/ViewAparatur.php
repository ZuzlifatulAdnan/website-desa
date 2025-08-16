<?php

namespace App\Filament\Resources\Aparaturs\Pages;

use App\Filament\Resources\Aparaturs\AparaturResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewAparatur extends ViewRecord
{
    protected static string $resource = AparaturResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
