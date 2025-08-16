<?php

namespace App\Filament\Resources\Wisatas\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Schema;

class WisataForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Textarea::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('gambar')
                    ->required(),
                TimePicker::make('jam_buka')
                    ->required(),
                TimePicker::make('jam_tutup')
                    ->required(),
                TextInput::make('harga_tiket')
                    ->required(),
                TextInput::make('fasilitas')
                    ->required(),
                Textarea::make('lokasi')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
