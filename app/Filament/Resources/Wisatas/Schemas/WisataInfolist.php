<?php

namespace App\Filament\Resources\Wisatas\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class WisataInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('judul'),
                TextEntry::make('slug'),
                TextEntry::make('gambar'),
                TextEntry::make('jam_buka')
                    ->time(),
                TextEntry::make('jam_tutup')
                    ->time(),
                TextEntry::make('harga_tiket'),
                TextEntry::make('fasilitas'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
