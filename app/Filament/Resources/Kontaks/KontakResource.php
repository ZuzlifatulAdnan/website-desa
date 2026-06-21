<?php

namespace App\Filament\Resources\Kontaks;

use App\Filament\Concerns\AuthorizeWithPermission;
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
use UnitEnum;

class KontakResource extends Resource
{
    use AuthorizeWithPermission;

    protected static string $permissionName = 'kelola_kontak';

    protected static ?string $model = Kontak::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedEnvelope;

    protected static string|UnitEnum|null $navigationGroup = 'Komunikasi';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel = 'Pesan Masuk';

    protected static ?string $modelLabel = 'Pesan';

    protected static ?string $pluralModelLabel = 'Pesan Masuk';

    protected static ?string $recordTitleAttribute = 'subjek';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getNavigationBadge(): ?string
    {
        if (! static::canAccess()) {
            return null;
        }

        $count = Kontak::query()->where('is_read', false)->count();

        return $count > 0 ? (string) $count : null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'danger';
    }

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

    public static function getPages(): array
    {
        return [
            'index' => ListKontaks::route('/'),
            'view' => ViewKontak::route('/{record}'),
            'edit' => EditKontak::route('/{record}/edit'),
        ];
    }
}
