<?php

namespace App\Filament\Resources\Budayas\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class BudayaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Textarea::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('gambar')
                    ->required(),
                TextInput::make('jadwal')
                    ->required(),
                Textarea::make('aktivitas')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
