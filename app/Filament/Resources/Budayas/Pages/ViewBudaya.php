<?php

namespace App\Filament\Resources\Budayas\Pages;

use App\Filament\Resources\Budayas\BudayaResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewBudaya extends ViewRecord
{
    protected static string $resource = BudayaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
