<?php

namespace App\Filament\Resources\Budayas\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class BudayaForm
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
                    ->image()
                    ->directory('budaya')
                    ->imageEditor()
                    ->columnSpanFull(),
                Textarea::make('deskripsi')
                    ->required()
                    ->rows(4)
                    ->columnSpanFull(),
                TextInput::make('jadwal')
                    ->placeholder('Setiap Tahun / Bulan Muharram'),
                Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
                Textarea::make('aktivitas')
                    ->label('Rangkaian Kegiatan')
                    ->helperText('Satu kegiatan per baris.')
                    ->rows(4)
                    ->columnSpanFull(),
            ]);
    }
}
