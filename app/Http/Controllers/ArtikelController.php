<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;

class ArtikelController extends Controller
{
    public function index()
    {
        $query = Artikel::query()->published()->with(['kategori', 'user']);

        if ($slug = request('kategori')) {
            $query->whereHas('kategori', fn ($q) => $q->where('slug', $slug));
        }

        if ($search = request('q')) {
            $query->where('judul', 'like', "%{$search}%");
        }

        return view('pages.berita', [
            'artikels' => $query->latest('published_at')->paginate(9)->withQueryString(),
            'kategoris' => Kategori::query()->withCount('artikels')->orderBy('nama')->get(),
            'populer' => Artikel::query()->published()->orderByDesc('views')->take(5)->get(),
        ]);
    }

    public function show(Artikel $artikel)
    {
        abort_unless($artikel->status === 'published', 404);

        $artikel->increment('views');

        return view('pages.berita-detail', [
            'artikel' => $artikel->load(['kategori', 'user']),
            'terkait' => Artikel::query()->published()
                ->where('id', '!=', $artikel->id)
                ->where('kategori_id', $artikel->kategori_id)
                ->latest('published_at')
                ->take(3)
                ->get(),
        ]);
    }
}
