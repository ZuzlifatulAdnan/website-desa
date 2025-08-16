<?php

namespace App\Filament\Resources\Budayas\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class BudayaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('judul'),
                TextEntry::make('slug'),
                TextEntry::make('gambar'),
                TextEntry::make('jadwal'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
