<?php

namespace App\Filament\Resources\Aparaturs\Pages;

use App\Filament\Resources\Aparaturs\AparaturResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditAparatur extends EditRecord
{
    protected static string $resource = AparaturResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
