<?php

namespace App\Filament\Resources\Wisatas\Pages;

use App\Filament\Resources\Wisatas\WisataResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewWisata extends ViewRecord
{
    protected static string $resource = WisataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
