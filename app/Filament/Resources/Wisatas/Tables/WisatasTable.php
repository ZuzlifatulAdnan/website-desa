<?php

namespace App\Filament\Resources\Wisatas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class WisatasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('gambar')
                    ->disk('public')
                    ->height(48)
                    ->width(72),
                TextColumn::make('judul')
                    ->searchable()
                    ->weight('bold'),
                TextColumn::make('harga_tiket')
                    ->badge()
                    ->color('success'),
                TextColumn::make('jam_buka')->time('H:i')->toggleable(),
                TextColumn::make('jam_tutup')->time('H:i')->toggleable(),
                IconColumn::make('is_featured')
                    ->label('Unggulan')
                    ->boolean(),
                ToggleColumn::make('is_active')
                    ->label('Aktif'),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
