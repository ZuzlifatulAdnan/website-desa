<?php

namespace App\Filament\Resources\Aparaturs;

use App\Filament\Resources\Aparaturs\Pages\CreateAparatur;
use App\Filament\Resources\Aparaturs\Pages\EditAparatur;
use App\Filament\Resources\Aparaturs\Pages\ListAparaturs;
use App\Filament\Resources\Aparaturs\Pages\ViewAparatur;
use App\Filament\Resources\Aparaturs\Schemas\AparaturForm;
use App\Filament\Resources\Aparaturs\Schemas\AparaturInfolist;
use App\Filament\Resources\Aparaturs\Tables\AparatursTable;
use App\Models\Aparatur;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AparaturResource extends Resource
{
    protected static ?string $model = Aparatur::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Aparatur';

    public static function form(Schema $schema): Schema
    {
        return AparaturForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AparaturInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AparatursTable::configure($table);
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
            'index' => ListAparaturs::route('/'),
            'create' => CreateAparatur::route('/create'),
            'view' => ViewAparatur::route('/{record}'),
            'edit' => EditAparatur::route('/{record}/edit'),
        ];
    }
}
