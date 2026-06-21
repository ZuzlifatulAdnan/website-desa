<?php

namespace App\Filament\Widgets;

use App\Models\Artikel;
use App\Models\DesaProfile;
use App\Models\Kontak;
use App\Models\Wisata;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsDesaOverview extends StatsOverviewWidget
{
    protected ?string $heading = 'Ringkasan Desa';

    protected function getStats(): array
    {
        $desa = DesaProfile::current();

        return [
            Stat::make('Jumlah Penduduk', number_format($desa->jumlah_penduduk, 0, ',', '.'))
                ->description($desa->jumlah_kk . ' Kepala Keluarga')
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),

            Stat::make('Berita Terbit', Artikel::query()->where('status', 'published')->count())
                ->description(Artikel::query()->where('status', 'draft')->count() . ' draft')
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('info'),

            Stat::make('Destinasi Wisata', Wisata::query()->count())
                ->description('Total destinasi terdaftar')
                ->descriptionIcon('heroicon-m-map-pin')
                ->color('warning'),

            Stat::make('Pesan Belum Dibaca', Kontak::query()->where('is_read', false)->count())
                ->description('dari ' . Kontak::query()->count() . ' total pesan')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('danger'),
        ];
    }
}
