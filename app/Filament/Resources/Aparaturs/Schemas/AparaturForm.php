<?php

namespace App\Filament\Resources\Aparaturs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AparaturForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required(),
                TextInput::make('posisi')
                    ->required(),
                TextInput::make('gambar')
                    ->required(),
                TextInput::make('order')
                    ->required()
                    ->numeric(),
            ]);
    }
}
