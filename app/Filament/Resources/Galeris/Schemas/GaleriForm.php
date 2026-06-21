<?php

namespace App\Filament\Resources\Galeris\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class GaleriForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                FileUpload::make('gambar')
                    ->label('Foto')
                    ->image()
                    ->directory('galeri')
                    ->imageEditor()
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('kategori')
                    ->datalist(['Kegiatan', 'Pembangunan', 'Wisata', 'Budaya', 'Lainnya'])
                    ->maxLength(255),
                TextInput::make('order')
                    ->label('Urutan')
                    ->numeric()
                    ->default(0),
                Textarea::make('deskripsi')
                    ->rows(3)
                    ->columnSpanFull(),
            ]);
    }
}
