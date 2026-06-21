<?php

namespace App\Providers;

use App\Models\DesaProfile;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Super Admin melewati semua pengecekan permission (god mode).
        Gate::before(function ($user, string $ability) {
            return method_exists($user, 'hasRole') && $user->hasRole('super_admin') ? true : null;
        });

        // Bagikan pengaturan/branding desa ke seluruh view publik.
        if (Schema::hasTable('desa_profiles')) {
            View::share('desa', DesaProfile::current());
        }
    }
}
