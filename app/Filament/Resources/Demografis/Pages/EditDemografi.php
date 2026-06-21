<?php

namespace App\Filament\Resources\Demografis\Pages;

use App\Filament\Resources\Demografis\DemografiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDemografi extends EditRecord
{
    protected static string $resource = DemografiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
