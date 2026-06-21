<?php

namespace App\Http\Controllers;

use App\Models\Wisata;

class WisataController extends Controller
{
    public function index()
    {
        return view('pages.wisata', [
            'wisatas' => Wisata::query()->active()->orderByDesc('is_featured')->latest()->get(),
        ]);
    }

    public function show(Wisata $wisata)
    {
        return view('pages.wisata-detail', [
            'wisata' => $wisata,
            'lainnya' => Wisata::query()->active()->where('id', '!=', $wisata->id)->latest()->take(3)->get(),
        ]);
    }
}
