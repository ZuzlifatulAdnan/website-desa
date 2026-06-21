<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Daftar permission per modul (berbasis menu admin).
     */
    public const PERMISSIONS = [
        // Konten publik
        'kelola_artikel' => 'Kelola Berita & Artikel',
        'kelola_kategori' => 'Kelola Kategori',
        'kelola_wisata' => 'Kelola Wisata',
        'kelola_budaya' => 'Kelola Budaya',
        'kelola_layanan' => 'Kelola Layanan',
        'kelola_galeri' => 'Kelola Galeri',
        'kelola_pengumuman' => 'Kelola Pengumuman',
        // Profil desa
        'kelola_pengaturan' => 'Kelola Pengaturan & Profil Desa',
        'kelola_aparatur' => 'Kelola Aparatur Desa',
        'kelola_demografi' => 'Kelola Data Demografi',
        'kelola_apbdes' => 'Kelola APBDes',
        // Komunikasi
        'kelola_kontak' => 'Kelola Pesan Masuk',
        'kelola_permohonan' => 'Kelola Permohonan Layanan',
        // Sistem
        'kelola_user' => 'Kelola Pengguna',
        'kelola_role' => 'Kelola Role & Hak Akses',
    ];

    public const KONTEN = [
        'kelola_artikel', 'kelola_kategori', 'kelola_wisata', 'kelola_budaya',
        'kelola_layanan', 'kelola_galeri', 'kelola_pengumuman',
    ];

    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        // 1. Permissions
        foreach (array_keys(self::PERMISSIONS) as $name) {
            Permission::firstOrCreate(['name' => $name, 'guard_name' => 'web']);
        }

        // 2. Roles
        $superAdmin = Role::firstOrCreate(['name' => 'super_admin', 'guard_name' => 'web']);
        $admin = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $operator = Role::firstOrCreate(['name' => 'operator', 'guard_name' => 'web']);

        // super_admin: semua (juga lolos via Gate::before)
        $superAdmin->syncPermissions(Permission::all());

        // admin: semua kecuali kelola_user & kelola_role
        $admin->syncPermissions(
            array_diff(array_keys(self::PERMISSIONS), ['kelola_user', 'kelola_role'])
        );

        // operator: hanya konten
        $operator->syncPermissions(self::KONTEN);

        // 3. Akun default tiap role
        $this->makeUser('Super Admin', 'superadmin@desa.id', 'super_admin');
        $this->makeUser('Administrator', 'admin@desa.id', 'admin');
        $this->makeUser('Operator', 'operator@desa.id', 'operator');

        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }

    protected function makeUser(string $name, string $email, string $role): void
    {
        $user = User::firstOrCreate(
            ['email' => $email],
            ['name' => $name, 'password' => Hash::make('password')],
        );

        $user->syncRoles([$role]);
    }
}
