<?php

namespace App\Filament\Resources\Apbdes\Tables;

use App\Models\Apbdes;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ApbdesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('tahun', 'desc')
            ->columns([
                TextColumn::make('tahun')
                    ->sortable(),
                TextColumn::make('jenis')
                    ->badge()
                    ->formatStateUsing(fn ($state) => Apbdes::JENIS[$state] ?? $state)
                    ->color(fn ($state) => match ($state) {
                        'pendapatan' => 'success',
                        'belanja' => 'danger',
                        default => 'warning',
                    }),
                TextColumn::make('uraian')
                    ->searchable()
                    ->wrap(),
                TextColumn::make('jumlah')
                    ->money('IDR', locale: 'id')
                    ->sortable()
                    ->summarize(\Filament\Tables\Columns\Summarizers\Sum::make()->money('IDR', locale: 'id')),
                TextColumn::make('order')
                    ->label('Urutan')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('jenis')->options(Apbdes::JENIS),
                SelectFilter::make('tahun')
                    ->options(fn () => Apbdes::query()->distinct()->orderByDesc('tahun')->pluck('tahun', 'tahun')->all()),
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
