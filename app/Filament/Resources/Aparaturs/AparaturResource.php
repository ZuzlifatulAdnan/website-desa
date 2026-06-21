<?php

namespace App\Filament\Resources\Aparaturs;

use App\Filament\Concerns\AuthorizeWithPermission;
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
use UnitEnum;

class AparaturResource extends Resource
{
    use AuthorizeWithPermission;

    protected static string $permissionName = 'kelola_aparatur';

    protected static ?string $model = Aparatur::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserGroup;

    protected static string|UnitEnum|null $navigationGroup = 'Profil Desa';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = 'Aparatur Desa';

    protected static ?string $modelLabel = 'Aparatur';

    protected static ?string $pluralModelLabel = 'Aparatur Desa';

    protected static ?string $recordTitleAttribute = 'nama';

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
