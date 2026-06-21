<?php

namespace App\Filament\Concerns;

/**
 * Gating akses resource Filament berdasarkan satu permission modul.
 *
 * Resource cukup mendefinisikan: protected static string $permissionName = 'kelola_xxx';
 * Super Admin otomatis lolos lewat Gate::before di AppServiceProvider.
 */
trait AuthorizeWithPermission
{
    public static function canAccess(): bool
    {
        $user = auth()->user();

        if (! $user) {
            return false;
        }

        return ! isset(static::$permissionName) || $user->can(static::$permissionName);
    }
}
