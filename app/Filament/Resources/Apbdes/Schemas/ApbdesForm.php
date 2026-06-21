<?php

namespace App\Filament\Resources\Apbdes\Schemas;

use App\Models\Apbdes;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ApbdesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('tahun')
                    ->numeric()
                    ->minValue(2000)
                    ->maxValue(2100)
                    ->default((int) date('Y'))
                    ->required(),
                Select::make('jenis')
                    ->options(Apbdes::JENIS)
                    ->required()
                    ->native(false),
                TextInput::make('uraian')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                TextInput::make('jumlah')
                    ->label('Jumlah (Rp)')
                    ->numeric()
                    ->prefix('Rp')
                    ->default(0)
                    ->required(),
                TextInput::make('order')
                    ->label('Urutan')
                    ->numeric()
                    ->default(0),
                Textarea::make('keterangan')
                    ->rows(2)
                    ->columnSpanFull(),
            ]);
    }
}
