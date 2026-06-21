<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->seed();
});

it('super admin dapat membuka semua halaman admin', function () {
    $user = User::where('email', 'admin@gmail.com')->first();

    $this->actingAs($user);

    $routes = [
        '/admin',
        '/admin/artikels',
        '/admin/artikels/create',
        '/admin/kategoris',
        '/admin/wisatas',
        '/admin/budayas',
        '/admin/layanans',
        '/admin/galeris',
        '/admin/pengumumen',
        '/admin/aparaturs',
        '/admin/demografis',
        '/admin/apbdes',
        '/admin/kontaks',
        '/admin/permohonan-layanans',
        '/admin/users',
        '/admin/roles',
        '/admin/pengaturan-desa',
    ];

    foreach ($routes as $route) {
        expect($this->get($route)->status())->toBe(200, "Gagal membuka {$route}");
    }
});

it('operator tidak bisa mengakses manajemen user, role, & pengaturan', function () {
    $operator = User::where('email', 'operator@desa.id')->first();

    $this->actingAs($operator);

    expect($this->get('/admin/artikels')->status())->toBe(200);
    expect($this->get('/admin/users')->status())->toBe(403);
    expect($this->get('/admin/roles')->status())->toBe(403);
    expect($this->get('/admin/pengaturan-desa')->status())->toBe(403);
});
