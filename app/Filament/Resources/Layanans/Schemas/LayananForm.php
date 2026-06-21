<?php

namespace App\Filament\Resources\Layanans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class LayananForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                TextInput::make('icon')
                    ->label('Ikon (FontAwesome)')
                    ->default('fa-file-alt')
                    ->helperText('Contoh: fa-file-alt, fa-store, fa-heartbeat')
                    ->required(),
                TextInput::make('waktu_pelayanan')
                    ->placeholder('1-3 hari kerja'),
                TextInput::make('biaya')
                    ->placeholder('Gratis'),
                TextInput::make('order')
                    ->label('Urutan')
                    ->numeric()
                    ->default(0),
                Textarea::make('deskripsi')
                    ->required()
                    ->rows(3)
                    ->columnSpanFull(),
                Textarea::make('persyaratan')
                    ->helperText('Satu syarat per baris.')
                    ->rows(4)
                    ->columnSpanFull(),
                Textarea::make('prosedur')
                    ->helperText('Satu langkah per baris.')
                    ->rows(4)
                    ->columnSpanFull(),
                Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
            ]);
    }
}
