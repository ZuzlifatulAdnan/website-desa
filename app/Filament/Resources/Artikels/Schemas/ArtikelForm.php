<?php

namespace App\Filament\Resources\Artikels\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ArtikelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Konten Artikel')
                    ->columns(2)
                    ->schema([
                        TextInput::make('judul')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, callable $set) =>
                                $operation === 'create' ? $set('slug', Str::slug($state)) : null)
                            ->columnSpanFull(),
                        TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->columnSpanFull(),
                        Textarea::make('ringkasan')
                            ->rows(2)
                            ->maxLength(500)
                            ->helperText('Ringkasan singkat yang tampil di daftar berita.')
                            ->columnSpanFull(),
                        RichEditor::make('deskripsi')
                            ->label('Isi Artikel')
                            ->required()
                            ->columnSpanFull(),
                    ]),
                Section::make('Pengaturan')
                    ->columns(2)
                    ->schema([
                        FileUpload::make('gambar')
                            ->label('Gambar Sampul')
                            ->image()
                            ->directory('artikel')
                            ->imageEditor()
                            ->columnSpanFull(),
                        Select::make('kategori_id')
                            ->label('Kategori')
                            ->relationship('kategori', 'nama')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->createOptionForm([
                                TextInput::make('nama')->required(),
                            ]),
                        Select::make('status')
                            ->options(['draft' => 'Draft', 'published' => 'Terbit'])
                            ->default('draft')
                            ->required()
                            ->native(false),
                        DateTimePicker::make('published_at')
                            ->label('Tanggal Terbit')
                            ->default(now()),
                        Toggle::make('is_featured')
                            ->label('Jadikan Berita Unggulan'),
                        Hidden::make('user_id')
                            ->default(fn () => auth()->id()),
                    ]),
            ]);
    }
}
