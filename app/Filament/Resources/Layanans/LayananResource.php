<?php

namespace App\Filament\Resources\Layanans;

use App\Filament\Concerns\AuthorizeWithPermission;
use App\Filament\Resources\Layanans\Pages\CreateLayanan;
use App\Filament\Resources\Layanans\Pages\EditLayanan;
use App\Filament\Resources\Layanans\Pages\ListLayanans;
use App\Filament\Resources\Layanans\Pages\ViewLayanan;
use App\Filament\Resources\Layanans\Schemas\LayananForm;
use App\Filament\Resources\Layanans\Schemas\LayananInfolist;
use App\Filament\Resources\Layanans\Tables\LayanansTable;
use App\Models\Layanan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class LayananResource extends Resource
{
    use AuthorizeWithPermission;

    protected static string $permissionName = 'kelola_layanan';

    protected static ?string $model = Layanan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentList;

    protected static string|UnitEnum|null $navigationGroup = 'Konten';

    protected static ?int $navigationSort = 6;

    protected static ?string $navigationLabel = 'Layanan';

    protected static ?string $modelLabel = 'Layanan';

    protected static ?string $pluralModelLabel = 'Layanan';

    protected static ?string $recordTitleAttribute = 'judul';

    public static function form(Schema $schema): Schema
    {
        return LayananForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return LayananInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LayanansTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListLayanans::route('/'),
            'create' => CreateLayanan::route('/create'),
            'view' => ViewLayanan::route('/{record}'),
            'edit' => EditLayanan::route('/{record}/edit'),
        ];
    }
}
