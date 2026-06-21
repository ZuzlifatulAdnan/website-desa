<?php

namespace App\Providers\Filament;

use App\Filament\Widgets\DemografiChart;
use App\Filament\Widgets\LatestPesanWidget;
use App\Filament\Widgets\StatsDesaOverview;
use App\Models\DesaProfile;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        [$brandName, $brandLogo, $favicon, $primary] = $this->branding();

        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->profile()
            ->brandName($brandName)
            ->brandLogo($brandLogo)
            ->favicon($favicon)
            ->colors([
                'primary' => $primary,
            ])
            ->sidebarCollapsibleOnDesktop()
            ->navigationGroups([
                'Profil Desa',
                'Konten',
                'Komunikasi',
                'Sistem',
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                StatsDesaOverview::class,
                DemografiChart::class,
                LatestPesanWidget::class,
                AccountWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }

    /**
     * Ambil branding dari pengaturan desa (aman walau tabel belum ada).
     *
     * @return array{0:string,1:?string,2:?string,3:mixed}
     */
    protected function branding(): array
    {
        $brandName = 'Portal Desa Digital';
        $brandLogo = null;
        $favicon = null;
        $primary = Color::Emerald;

        try {
            if (Schema::hasTable('desa_profiles')) {
                $desa = DesaProfile::current();
                $brandName = $desa->nama_web ?: $brandName;
                $brandLogo = $desa->logo ? Storage::url($desa->logo) : null;
                $favicon = $desa->favicon ? Storage::url($desa->favicon) : null;
                if (! empty($desa->warna_primary)) {
                    $primary = Color::hex($desa->warna_primary);
                }
            }
        } catch (\Throwable $e) {
            // fallback default
        }

        return [$brandName, $brandLogo, $favicon, $primary];
    }
}
