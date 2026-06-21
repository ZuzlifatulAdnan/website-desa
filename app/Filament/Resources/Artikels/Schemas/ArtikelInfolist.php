<?php

namespace App\Filament\Resources\Artikels\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ArtikelInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ImageEntry::make('gambar')
                    ->label('Sampul')
                    ->disk('public')
                    ->columnSpanFull(),
                TextEntry::make('judul')
                    ->weight('bold')
                    ->size('lg')
                    ->columnSpanFull(),
                TextEntry::make('kategori.nama')->badge()->label('Kategori'),
                TextEntry::make('user.name')->label('Penulis'),
                TextEntry::make('status')->badge(),
                IconEntry::make('is_featured')->label('Unggulan')->boolean(),
                TextEntry::make('views')->label('Dilihat'),
                TextEntry::make('published_at')->dateTime('d M Y H:i')->label('Terbit'),
                TextEntry::make('ringkasan')->columnSpanFull(),
                TextEntry::make('deskripsi')
                    ->html()
                    ->columnSpanFull(),
            ]);
    }
}
