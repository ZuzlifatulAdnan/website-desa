<?php

namespace App\Filament\Resources\Demografis;

use App\Filament\Concerns\AuthorizeWithPermission;
use App\Filament\Resources\Demografis\Pages\CreateDemografi;
use App\Filament\Resources\Demografis\Pages\EditDemografi;
use App\Filament\Resources\Demografis\Pages\ListDemografis;
use App\Filament\Resources\Demografis\Schemas\DemografiForm;
use App\Filament\Resources\Demografis\Tables\DemografisTable;
use App\Models\Demografi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class DemografiResource extends Resource
{
    use AuthorizeWithPermission;

    protected static string $permissionName = 'kelola_demografi';

    protected static ?string $model = Demografi::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChartPie;

    protected static string|UnitEnum|null $navigationGroup = 'Profil Desa';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationLabel = 'Data Demografi';

    protected static ?string $modelLabel = 'Data Demografi';

    protected static ?string $pluralModelLabel = 'Data Demografi';

    protected static ?string $recordTitleAttribute = 'label';

    public static function form(Schema $schema): Schema
    {
        return DemografiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DemografisTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDemografis::route('/'),
            'create' => CreateDemografi::route('/create'),
            'edit' => EditDemografi::route('/{record}/edit'),
        ];
    }
}
