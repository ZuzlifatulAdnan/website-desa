<?php

namespace App\Http\Controllers;

use App\Models\Layanan;

class LayananController extends Controller
{
    public function index()
    {
        return view('pages.layanan', [
            'layanans' => Layanan::query()->active()->orderBy('order')->get(),
        ]);
    }

    public function show(Layanan $layanan)
    {
        return view('pages.layanan-detail', [
            'layanan' => $layanan,
            'lainnya' => Layanan::query()->active()->where('id', '!=', $layanan->id)->orderBy('order')->take(4)->get(),
        ]);
    }
}
