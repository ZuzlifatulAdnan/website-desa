<?php

namespace App\Filament\Resources\Kontaks\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class KontakInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nama'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('no_telp'),
                TextEntry::make('subjek'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
