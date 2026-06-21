<?php

namespace App\Filament\Resources\Pengumumen\Schemas;

use App\Models\Pengumuman;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PengumumanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                Select::make('tipe')
                    ->options(Pengumuman::TIPE)
                    ->default('info')
                    ->required()
                    ->native(false),
                DatePicker::make('tanggal')
                    ->default(now()),
                RichEditor::make('isi')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('lampiran')
                    ->directory('pengumuman')
                    ->downloadable()
                    ->columnSpanFull(),
                Toggle::make('is_active')
                    ->label('Aktif / Tampilkan')
                    ->default(true),
            ]);
    }
}
