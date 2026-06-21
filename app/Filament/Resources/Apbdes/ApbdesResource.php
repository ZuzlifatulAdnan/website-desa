<?php

namespace App\Filament\Resources\Apbdes;

use App\Filament\Concerns\AuthorizeWithPermission;
use App\Filament\Resources\Apbdes\Pages\CreateApbdes;
use App\Filament\Resources\Apbdes\Pages\EditApbdes;
use App\Filament\Resources\Apbdes\Pages\ListApbdes;
use App\Filament\Resources\Apbdes\Schemas\ApbdesForm;
use App\Filament\Resources\Apbdes\Tables\ApbdesTable;
use App\Models\Apbdes;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ApbdesResource extends Resource
{
    use AuthorizeWithPermission;

    protected static string $permissionName = 'kelola_apbdes';

    protected static ?string $model = Apbdes::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBanknotes;

    protected static string|UnitEnum|null $navigationGroup = 'Profil Desa';

    protected static ?int $navigationSort = 4;

    protected static ?string $navigationLabel = 'APBDes';

    protected static ?string $modelLabel = 'APBDes';

    protected static ?string $pluralModelLabel = 'APBDes';

    protected static ?string $recordTitleAttribute = 'uraian';

    public static function form(Schema $schema): Schema
    {
        return ApbdesForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ApbdesTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListApbdes::route('/'),
            'create' => CreateApbdes::route('/create'),
            'edit' => EditApbdes::route('/{record}/edit'),
        ];
    }
}
