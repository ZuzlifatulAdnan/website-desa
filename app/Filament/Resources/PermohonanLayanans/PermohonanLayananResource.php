<?php

namespace App\Filament\Resources\PermohonanLayanans;

use App\Filament\Concerns\AuthorizeWithPermission;
use App\Filament\Resources\PermohonanLayanans\Pages\EditPermohonanLayanan;
use App\Filament\Resources\PermohonanLayanans\Pages\ListPermohonanLayanans;
use App\Filament\Resources\PermohonanLayanans\Pages\ViewPermohonanLayanan;
use App\Filament\Resources\PermohonanLayanans\Schemas\PermohonanLayananForm;
use App\Filament\Resources\PermohonanLayanans\Schemas\PermohonanLayananInfolist;
use App\Filament\Resources\PermohonanLayanans\Tables\PermohonanLayanansTable;
use App\Models\PermohonanLayanan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class PermohonanLayananResource extends Resource
{
    use AuthorizeWithPermission;

    protected static string $permissionName = 'kelola_permohonan';

    protected static ?string $model = PermohonanLayanan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedInboxArrowDown;

    protected static string|UnitEnum|null $navigationGroup = 'Komunikasi';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = 'Permohonan Layanan';

    protected static ?string $modelLabel = 'Permohonan Layanan';

    protected static ?string $pluralModelLabel = 'Permohonan Layanan';

    protected static ?string $recordTitleAttribute = 'kode';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getNavigationBadge(): ?string
    {
        if (! static::canAccess()) {
            return null;
        }

        $count = PermohonanLayanan::query()->where('status', 'menunggu')->count();

        return $count > 0 ? (string) $count : null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }

    public static function form(Schema $schema): Schema
    {
        return PermohonanLayananForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PermohonanLayananInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PermohonanLayanansTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPermohonanLayanans::route('/'),
            'view' => ViewPermohonanLayanan::route('/{record}'),
            'edit' => EditPermohonanLayanan::route('/{record}/edit'),
        ];
    }
}
