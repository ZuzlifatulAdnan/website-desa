<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Budaya;
use App\Models\Layanan;
use App\Models\Pengumuman;
use App\Models\Wisata;

class BerandaController extends Controller
{
    public function index()
    {
        return view('pages.beranda', [
            'layanans' => Layanan::query()->active()->orderBy('order')->take(6)->get(),
            'wisatas' => Wisata::query()->active()->orderByDesc('is_featured')->latest()->take(3)->get(),
            'budayas' => Budaya::query()->active()->latest()->take(2)->get(),
            'artikels' => Artikel::query()->published()->with('kategori')->latest('published_at')->take(3)->get(),
            'pengumumans' => Pengumuman::query()->active()->latest('tanggal')->take(3)->get(),
        ]);
    }
}
