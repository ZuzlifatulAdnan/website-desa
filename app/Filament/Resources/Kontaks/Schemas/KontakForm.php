<?php

namespace App\Filament\Resources\Kontaks\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class KontakForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('no_telp')
                    ->tel()
                    ->required(),
                TextInput::make('subjek')
                    ->required(),
                Textarea::make('pesan')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
