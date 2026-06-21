<?php

namespace App\Filament\Resources\Wisatas;

use App\Filament\Concerns\AuthorizeWithPermission;
use App\Filament\Resources\Wisatas\Pages\CreateWisata;
use App\Filament\Resources\Wisatas\Pages\EditWisata;
use App\Filament\Resources\Wisatas\Pages\ListWisatas;
use App\Filament\Resources\Wisatas\Pages\ViewWisata;
use App\Filament\Resources\Wisatas\Schemas\WisataForm;
use App\Filament\Resources\Wisatas\Schemas\WisataInfolist;
use App\Filament\Resources\Wisatas\Tables\WisatasTable;
use App\Models\Wisata;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class WisataResource extends Resource
{
    use AuthorizeWithPermission;

    protected static string $permissionName = 'kelola_wisata';

    protected static ?string $model = Wisata::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedMapPin;

    protected static string|UnitEnum|null $navigationGroup = 'Konten';

    protected static ?int $navigationSort = 4;

    protected static ?string $navigationLabel = 'Wisata';

    protected static ?string $modelLabel = 'Wisata';

    protected static ?string $pluralModelLabel = 'Wisata';

    protected static ?string $recordTitleAttribute = 'judul';

    public static function form(Schema $schema): Schema
    {
        return WisataForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return WisataInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WisatasTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListWisatas::route('/'),
            'create' => CreateWisata::route('/create'),
            'view' => ViewWisata::route('/{record}'),
            'edit' => EditWisata::route('/{record}/edit'),
        ];
    }
}
