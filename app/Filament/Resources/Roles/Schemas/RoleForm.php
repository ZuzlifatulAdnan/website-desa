<?php

namespace App\Filament\Resources\Roles\Schemas;

use Database\Seeders\RolePermissionSeeder;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Spatie\Permission\Models\Permission;

class RoleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Role')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                    ]),
                Section::make('Hak Akses (Permission)')
                    ->description('Pilih modul yang boleh dikelola oleh role ini.')
                    ->schema([
                        CheckboxList::make('permissions')
                            ->hiddenLabel()
                            ->relationship('permissions', 'name')
                            ->getOptionLabelFromRecordUsing(
                                fn (Permission $record) => RolePermissionSeeder::PERMISSIONS[$record->name] ?? $record->name
                            )
                            ->columns(2)
                            ->bulkToggleable()
                            ->searchable(),
                    ]),
            ]);
    }
}
