<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Roles, permissions, dan akun default tiap role.
        $this->call(RolePermissionSeeder::class);

        // 2. Pertahankan akun admin lama sebagai Super Admin.
        $admin = User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            ['name' => 'Admin', 'password' => Hash::make('12345678')],
        );
        $admin->syncRoles(['super_admin']);

        // 3. Pengaturan & profil desa (branding, peta, statistik).
        $this->call(DesaProfileSeeder::class);

        // 4. Konten contoh (aparatur, layanan, wisata, budaya, berita, dll).
        $this->call(ContentSeeder::class);
    }
}
