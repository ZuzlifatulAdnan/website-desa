<?php

namespace App\Filament\Resources\Aparaturs\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class AparaturInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nama'),
                TextEntry::make('posisi'),
                TextEntry::make('gambar'),
                TextEntry::make('order')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
