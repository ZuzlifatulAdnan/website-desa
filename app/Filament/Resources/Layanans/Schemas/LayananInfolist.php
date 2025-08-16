<?php

namespace App\Filament\Resources\Layanans\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class LayananInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('judul'),
                TextEntry::make('slug'),
                TextEntry::make('icon'),
                TextEntry::make('waktu_pelayanan'),
                TextEntry::make('biaya'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
