<?php

namespace App\Filament\Resources\Kontaks\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Collection;

class KontaksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                IconColumn::make('is_read')
                    ->label('Dibaca')
                    ->boolean(),
                TextColumn::make('nama')
                    ->searchable()
                    ->weight(fn ($record) => $record->is_read ? null : 'bold'),
                TextColumn::make('subjek')
                    ->searchable()
                    ->wrap()
                    ->weight(fn ($record) => $record->is_read ? null : 'bold'),
                TextColumn::make('email')
                    ->searchable()
                    ->icon('heroicon-m-envelope')
                    ->toggleable(),
                TextColumn::make('no_telp')
                    ->label('Telepon')
                    ->toggleable(),
                TextColumn::make('created_at')
                    ->label('Diterima')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                TernaryFilter::make('is_read')
                    ->label('Status Baca')
                    ->placeholder('Semua')
                    ->trueLabel('Sudah dibaca')
                    ->falseLabel('Belum dibaca'),
            ])
            ->recordActions([
                ViewAction::make(),
                Action::make('toggleRead')
                    ->label(fn ($record) => $record->is_read ? 'Tandai belum dibaca' : 'Tandai dibaca')
                    ->icon('heroicon-m-check-circle')
                    ->action(fn ($record) => $record->update(['is_read' => ! $record->is_read])),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    \Filament\Actions\BulkAction::make('markRead')
                        ->label('Tandai sudah dibaca')
                        ->icon('heroicon-m-check-circle')
                        ->action(fn (Collection $records) => $records->each->update(['is_read' => true]))
                        ->deselectRecordsAfterCompletion(),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
