<?php

namespace App\Filament\Resources\Aparaturs\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AparaturForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('gambar')
                    ->label('Foto')
                    ->image()
                    ->avatar()
                    ->directory('aparatur')
                    ->imageEditor()
                    ->columnSpanFull(),
                TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                TextInput::make('posisi')
                    ->label('Jabatan')
                    ->required()
                    ->maxLength(255),
                TextInput::make('nip')
                    ->label('NIP')
                    ->maxLength(255),
                TextInput::make('order')
                    ->label('Urutan')
                    ->numeric()
                    ->default(0),
            ]);
    }
}
