<?php

namespace App\Filament\Resources\Kontaks;

use App\Filament\Resources\Kontaks\Pages\CreateKontak;
use App\Filament\Resources\Kontaks\Pages\EditKontak;
use App\Filament\Resources\Kontaks\Pages\ListKontaks;
use App\Filament\Resources\Kontaks\Pages\ViewKontak;
use App\Filament\Resources\Kontaks\Schemas\KontakForm;
use App\Filament\Resources\Kontaks\Schemas\KontakInfolist;
use App\Filament\Resources\Kontaks\Tables\KontaksTable;
use App\Models\Kontak;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KontakResource extends Resource
{
    protected static ?string $model = Kontak::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'kontak';

    public static function form(Schema $schema): Schema
    {
        return KontakForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return KontakInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KontaksTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListKontaks::route('/'),
            'create' => CreateKontak::route('/create'),
            'view' => ViewKontak::route('/{record}'),
            'edit' => EditKontak::route('/{record}/edit'),
        ];
    }
}
