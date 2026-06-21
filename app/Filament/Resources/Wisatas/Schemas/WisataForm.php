<?php

namespace App\Filament\Resources\Wisatas\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class WisataForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Wisata')
                    ->columns(2)
                    ->schema([
                        TextInput::make('judul')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        FileUpload::make('gambar')
                            ->image()
                            ->directory('wisata')
                            ->imageEditor()
                            ->columnSpanFull(),
                        Textarea::make('deskripsi')
                            ->required()
                            ->rows(4)
                            ->columnSpanFull(),
                        TimePicker::make('jam_buka')->seconds(false),
                        TimePicker::make('jam_tutup')->seconds(false),
                        TextInput::make('harga_tiket')->placeholder('Gratis / Rp 10.000'),
                        TextInput::make('fasilitas')
                            ->helperText('Pisahkan dengan koma. Contoh: Toilet, Parkir, Musholla'),
                        Textarea::make('lokasi')
                            ->rows(2)
                            ->columnSpanFull(),
                        TextInput::make('maps_embed')
                            ->label('Link/Embed Google Maps')
                            ->url()
                            ->columnSpanFull(),
                    ]),
                Section::make('Status')
                    ->columns(2)
                    ->schema([
                        Toggle::make('is_featured')->label('Destinasi Unggulan'),
                        Toggle::make('is_active')->label('Aktif')->default(true),
                    ]),
            ]);
    }
}
