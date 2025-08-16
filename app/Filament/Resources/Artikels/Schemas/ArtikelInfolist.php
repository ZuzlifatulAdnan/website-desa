<?php

namespace App\Filament\Resources\Artikels\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ArtikelInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('judul'),
                TextEntry::make('slug'),
                TextEntry::make('gambar'),
                TextEntry::make('kategori_id')
                    ->numeric(),
                TextEntry::make('user_id')
                    ->numeric(),
                TextEntry::make('published_at')
                    ->dateTime(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
