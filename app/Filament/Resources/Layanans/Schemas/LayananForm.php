<?php

namespace App\Filament\Resources\Layanans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class LayananForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('icon')
                    ->required(),
                Textarea::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('persyaratan')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('prosedur')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('waktu_pelayanan')
                    ->required(),
                TextInput::make('biaya')
                    ->required(),
            ]);
    }
}
