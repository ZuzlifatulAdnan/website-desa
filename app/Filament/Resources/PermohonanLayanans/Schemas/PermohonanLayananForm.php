<?php

namespace App\Filament\Resources\PermohonanLayanans\Schemas;

use App\Models\PermohonanLayanan;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PermohonanLayananForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Data Pemohon')
                    ->columns(2)
                    ->schema([
                        TextInput::make('kode')->disabled(),
                        TextInput::make('layanan.judul')->label('Layanan')->disabled(),
                        TextInput::make('nama')->disabled(),
                        TextInput::make('nik')->label('NIK')->disabled(),
                        TextInput::make('no_telp')->label('No. Telepon')->disabled(),
                        TextInput::make('email')->disabled(),
                        TextInput::make('alamat')->disabled()->columnSpanFull(),
                        Textarea::make('keperluan')->disabled()->rows(3)->columnSpanFull(),
                    ]),
                Section::make('Proses Permohonan')
                    ->columns(2)
                    ->schema([
                        Select::make('status')
                            ->options(PermohonanLayanan::STATUS)
                            ->required()
                            ->native(false),
                        Textarea::make('catatan')
                            ->label('Catatan untuk Pemohon')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
