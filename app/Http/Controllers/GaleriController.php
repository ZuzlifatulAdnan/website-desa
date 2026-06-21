<?php

namespace App\Http\Controllers;

use App\Models\Galeri;

class GaleriController extends Controller
{
    public function index()
    {
        $kategori = request('kategori');

        $query = Galeri::query()->orderBy('order')->latest();

        if ($kategori) {
            $query->where('kategori', $kategori);
        }

        return view('pages.galeri', [
            'galeris' => $query->paginate(12)->withQueryString(),
            'kategoris' => Galeri::query()->whereNotNull('kategori')->distinct()->pluck('kategori'),
            'aktif' => $kategori,
        ]);
    }
}
