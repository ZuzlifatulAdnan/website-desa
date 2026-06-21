<?php

namespace App\Filament\Resources\Pengumumen\Tables;

use App\Models\Pengumuman;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class PengumumenTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('tanggal', 'desc')
            ->columns([
                TextColumn::make('judul')
                    ->searchable()
                    ->wrap()
                    ->weight('bold'),
                TextColumn::make('tipe')
                    ->badge()
                    ->formatStateUsing(fn ($state) => Pengumuman::TIPE[$state] ?? $state)
                    ->color(fn ($state) => match ($state) {
                        'penting' => 'danger',
                        'kegiatan' => 'warning',
                        default => 'info',
                    }),
                TextColumn::make('tanggal')
                    ->date('d M Y')
                    ->sortable(),
                IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
            ])
            ->filters([
                SelectFilter::make('tipe')->options(Pengumuman::TIPE),
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
