<?php

namespace App\Filament\Widgets;

use App\Models\Kontak;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestPesanWidget extends BaseWidget
{
    protected static ?int $sort = 2;

    protected int|string|array $columnSpan = 'full';

    public static function canView(): bool
    {
        return auth()->user()?->can('kelola_kontak') ?? false;
    }

    public function table(Table $table): Table
    {
        return $table
            ->heading('Pesan Masuk Terbaru')
            ->query(Kontak::query()->latest()->limit(5))
            ->paginated(false)
            ->columns([
                IconColumn::make('is_read')
                    ->label('Dibaca')
                    ->boolean(),
                TextColumn::make('nama')
                    ->weight('bold'),
                TextColumn::make('subjek')
                    ->wrap(),
                TextColumn::make('created_at')
                    ->label('Waktu')
                    ->since(),
            ]);
    }
}
