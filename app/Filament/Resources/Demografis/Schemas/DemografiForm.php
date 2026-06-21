<?php

namespace App\Filament\Resources\Demografis\Schemas;

use App\Models\Demografi;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DemografiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('kategori')
                    ->options(Demografi::KATEGORI)
                    ->required()
                    ->native(false),
                TextInput::make('label')
                    ->required()
                    ->maxLength(255)
                    ->helperText('Contoh: Petani, SD, Islam, 0-14 tahun, Dusun 1'),
                TextInput::make('jumlah')
                    ->numeric()
                    ->default(0)
                    ->required(),
                TextInput::make('order')
                    ->label('Urutan')
                    ->numeric()
                    ->default(0),
            ]);
    }
}
