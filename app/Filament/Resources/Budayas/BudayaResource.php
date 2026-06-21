<?php

namespace App\Filament\Resources\Budayas;

use App\Filament\Concerns\AuthorizeWithPermission;
use App\Filament\Resources\Budayas\Pages\CreateBudaya;
use App\Filament\Resources\Budayas\Pages\EditBudaya;
use App\Filament\Resources\Budayas\Pages\ListBudayas;
use App\Filament\Resources\Budayas\Pages\ViewBudaya;
use App\Filament\Resources\Budayas\Schemas\BudayaForm;
use App\Filament\Resources\Budayas\Schemas\BudayaInfolist;
use App\Filament\Resources\Budayas\Tables\BudayasTable;
use App\Models\Budaya;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class BudayaResource extends Resource
{
    use AuthorizeWithPermission;

    protected static string $permissionName = 'kelola_budaya';

    protected static ?string $model = Budaya::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSparkles;

    protected static string|UnitEnum|null $navigationGroup = 'Konten';

    protected static ?int $navigationSort = 5;

    protected static ?string $navigationLabel = 'Budaya';

    protected static ?string $modelLabel = 'Budaya';

    protected static ?string $pluralModelLabel = 'Budaya';

    protected static ?string $recordTitleAttribute = 'judul';

    public static function form(Schema $schema): Schema
    {
        return BudayaForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return BudayaInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BudayasTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBudayas::route('/'),
            'create' => CreateBudaya::route('/create'),
            'view' => ViewBudaya::route('/{record}'),
            'edit' => EditBudaya::route('/{record}/edit'),
        ];
    }
}
