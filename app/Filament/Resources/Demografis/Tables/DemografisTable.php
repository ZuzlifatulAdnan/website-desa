<?php

namespace App\Filament\Resources\Demografis\Tables;

use App\Models\Demografi;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class DemografisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultGroup('kategori')
            ->defaultSort('order')
            ->columns([
                TextColumn::make('kategori')
                    ->badge()
                    ->formatStateUsing(fn ($state) => Demografi::KATEGORI[$state] ?? $state)
                    ->sortable(),
                TextColumn::make('label')
                    ->searchable(),
                TextColumn::make('jumlah')
                    ->numeric(locale: 'id')
                    ->sortable(),
                TextColumn::make('order')
                    ->label('Urutan')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('kategori')->options(Demografi::KATEGORI),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
