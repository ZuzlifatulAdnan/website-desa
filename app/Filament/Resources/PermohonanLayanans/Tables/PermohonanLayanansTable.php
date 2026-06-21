<?php

namespace App\Filament\Resources\PermohonanLayanans\Tables;

use App\Models\PermohonanLayanan;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class PermohonanLayanansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('kode')
                    ->searchable()
                    ->copyable()
                    ->weight('bold'),
                TextColumn::make('layanan.judul')
                    ->label('Layanan')
                    ->badge()
                    ->color('info'),
                TextColumn::make('nama')
                    ->searchable(),
                TextColumn::make('no_telp')
                    ->label('Telepon')
                    ->toggleable(),
                TextColumn::make('status')
                    ->badge()
                    ->formatStateUsing(fn ($state) => PermohonanLayanan::STATUS[$state] ?? $state)
                    ->color(fn ($state) => PermohonanLayanan::STATUS_COLOR[$state] ?? 'gray'),
                TextColumn::make('created_at')
                    ->label('Diajukan')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')->options(PermohonanLayanan::STATUS),
                SelectFilter::make('layanan_id')->relationship('layanan', 'judul')->label('Layanan'),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make()->label('Proses'),
                Action::make('selesai')
                    ->label('Tandai Selesai')
                    ->icon('heroicon-m-check-circle')
                    ->color('success')
                    ->visible(fn (PermohonanLayanan $record) => $record->status !== 'selesai')
                    ->requiresConfirmation()
                    ->action(fn (PermohonanLayanan $record) => $record->update(['status' => 'selesai'])),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
