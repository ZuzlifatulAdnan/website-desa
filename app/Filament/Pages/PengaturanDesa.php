<?php

namespace App\Filament\Pages;

use App\Models\DesaProfile;
use BackedEnum;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class PengaturanDesa extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string|UnitEnum|null $navigationGroup = 'Profil Desa';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel = 'Pengaturan & Profil';

    protected static ?string $title = 'Pengaturan & Profil Desa';

    protected string $view = 'filament.pages.pengaturan-desa';

    public ?array $data = [];

    public static function canAccess(): bool
    {
        return auth()->user()?->can('kelola_pengaturan') ?? false;
    }

    public function mount(): void
    {
        $this->form->fill(DesaProfile::current()->attributesToArray());
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->components([
                Tabs::make()
                    ->columnSpanFull()
                    ->tabs([
                        Tab::make('Branding Situs')
                            ->icon('heroicon-o-paint-brush')
                            ->schema([
                                TextInput::make('nama_web')
                                    ->label('Nama Website')
                                    ->required(),
                                TextInput::make('footer_deskripsi')
                                    ->label('Deskripsi Footer'),
                                ColorPicker::make('warna_primary')
                                    ->label('Warna Utama'),
                                ColorPicker::make('warna_secondary')
                                    ->label('Warna Sekunder (gelap)'),
                                FileUpload::make('logo')
                                    ->image()
                                    ->directory('branding')
                                    ->imageEditor(),
                                FileUpload::make('favicon')
                                    ->directory('branding')
                                    ->helperText('Format .ico / .png ukuran kecil.'),
                                FileUpload::make('foto_sampul')
                                    ->label('Foto Sampul (Hero)')
                                    ->image()
                                    ->directory('branding')
                                    ->imageEditor()
                                    ->columnSpanFull(),
                            ])->columns(2),

                        Tab::make('Identitas Desa')
                            ->icon('heroicon-o-identification')
                            ->schema([
                                TextInput::make('nama_desa')->required(),
                                TextInput::make('kepala_desa'),
                                TextInput::make('kecamatan'),
                                TextInput::make('kabupaten'),
                                TextInput::make('provinsi'),
                                TextInput::make('kode_pos'),
                                TextInput::make('tahun_berdiri'),
                                TextInput::make('luas_wilayah')->placeholder('15.2 km²'),
                                Textarea::make('alamat')->rows(2)->columnSpanFull(),
                                FileUpload::make('foto_kantor')
                                    ->label('Foto Kantor Desa')
                                    ->image()
                                    ->directory('branding')
                                    ->imageEditor()
                                    ->columnSpanFull(),
                            ])->columns(2),

                        Tab::make('Profil')
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                RichEditor::make('sambutan')
                                    ->label('Sambutan Kepala Desa')
                                    ->columnSpanFull(),
                                RichEditor::make('sejarah')
                                    ->label('Sejarah Desa')
                                    ->columnSpanFull(),
                                Textarea::make('visi')
                                    ->rows(3)
                                    ->columnSpanFull(),
                                Repeater::make('misi')
                                    ->simple(TextInput::make('misi')->required())
                                    ->label('Misi')
                                    ->addActionLabel('Tambah Misi')
                                    ->columnSpanFull(),
                            ]),

                        Tab::make('Kontak & Sosial Media')
                            ->icon('heroicon-o-phone')
                            ->schema([
                                TextInput::make('telepon'),
                                TextInput::make('whatsapp')->label('WhatsApp')->placeholder('628123456789')->prefixIcon('heroicon-o-chat-bubble-left-right'),
                                TextInput::make('email')->email(),
                                TextInput::make('website')->url(),
                                TextInput::make('jam_pelayanan')->placeholder('Senin - Jumat, 08:00 - 16:00 WIB')->columnSpanFull(),
                                TextInput::make('facebook')->url()->prefixIcon('heroicon-o-globe-alt'),
                                TextInput::make('instagram')->url()->prefixIcon('heroicon-o-globe-alt'),
                                TextInput::make('youtube')->url()->prefixIcon('heroicon-o-globe-alt'),
                                TextInput::make('tiktok')->url()->prefixIcon('heroicon-o-globe-alt'),
                            ])->columns(2),

                        Tab::make('Lokasi & Peta')
                            ->icon('heroicon-o-map')
                            ->schema([
                                TextInput::make('latitude')->placeholder('-5.7501'),
                                TextInput::make('longitude')->placeholder('105.5731'),
                                TextInput::make('peta_zoom')
                                    ->label('Zoom Peta')
                                    ->numeric()
                                    ->default(13),
                                Textarea::make('maps_embed')
                                    ->label('Embed Google Maps (URL src)')
                                    ->helperText('Tempel URL src dari "Bagikan → Sematkan peta" Google Maps. Dipakai di halaman Kontak.')
                                    ->rows(2)
                                    ->columnSpanFull(),
                                Textarea::make('peta_geojson')
                                    ->label('GeoJSON Batas Wilayah Desa')
                                    ->helperText('Tempel data GeoJSON (FeatureCollection/Feature) batas desa. Digambar di peta interaktif (MapLibre) pada halaman Profil.')
                                    ->rows(8)
                                    ->columnSpanFull(),
                            ])->columns(3),

                        Tab::make('Statistik Ringkas')
                            ->icon('heroicon-o-chart-bar')
                            ->schema([
                                TextInput::make('jumlah_penduduk')->numeric()->default(0),
                                TextInput::make('jumlah_kk')->label('Jumlah KK')->numeric()->default(0),
                                TextInput::make('jumlah_laki')->label('Laki-laki')->numeric()->default(0),
                                TextInput::make('jumlah_perempuan')->label('Perempuan')->numeric()->default(0),
                                TextInput::make('jumlah_dusun')->label('Jumlah Dusun')->numeric()->default(0),
                            ])->columns(2),
                    ]),
            ]);
    }

    public function save(): void
    {
        $data = $this->form->getState();
        DesaProfile::current()->update($data);

        Notification::make()
            ->title('Pengaturan berhasil disimpan')
            ->success()
            ->send();
    }
}
