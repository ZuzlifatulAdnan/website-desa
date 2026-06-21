<?php

namespace App\Filament\Resources\PermohonanLayanans\Schemas;

use App\Models\PermohonanLayanan;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PermohonanLayananInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Permohonan')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('kode')->weight('bold')->copyable(),
                        TextEntry::make('status')
                            ->badge()
                            ->formatStateUsing(fn ($state) => PermohonanLayanan::STATUS[$state] ?? $state)
                            ->color(fn ($state) => PermohonanLayanan::STATUS_COLOR[$state] ?? 'gray'),
                        TextEntry::make('layanan.judul')->label('Layanan'),
                        TextEntry::make('created_at')->label('Diajukan')->dateTime('d M Y H:i'),
                    ]),
                Section::make('Data Pemohon')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('nama'),
                        TextEntry::make('nik')->label('NIK')->placeholder('-'),
                        TextEntry::make('no_telp')->label('No. Telepon'),
                        TextEntry::make('email')->placeholder('-'),
                        TextEntry::make('alamat')->placeholder('-')->columnSpanFull(),
                        TextEntry::make('keperluan')->columnSpanFull(),
                        TextEntry::make('lampiran_url')
                            ->label('Lampiran')
                            ->placeholder('Tidak ada')
                            ->url(fn ($record) => $record->lampiran_url, true)
                            ->formatStateUsing(fn ($state) => $state ? 'Unduh Lampiran' : 'Tidak ada')
                            ->columnSpanFull(),
                        TextEntry::make('catatan')->label('Catatan Petugas')->placeholder('-')->columnSpanFull(),
                    ]),
            ]);
    }
}
