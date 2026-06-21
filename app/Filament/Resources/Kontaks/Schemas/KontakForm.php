<?php

namespace App\Filament\Resources\Kontaks\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class KontakForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->disabled(),
                TextInput::make('email')
                    ->email()
                    ->disabled(),
                TextInput::make('no_telp')
                    ->label('No. Telepon')
                    ->disabled(),
                TextInput::make('subjek')
                    ->disabled()
                    ->columnSpanFull(),
                Textarea::make('pesan')
                    ->disabled()
                    ->rows(5)
                    ->columnSpanFull(),
                Toggle::make('is_read')
                    ->label('Tandai sudah dibaca'),
            ]);
    }
}
