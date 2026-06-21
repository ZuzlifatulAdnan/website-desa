<?php

namespace App\Http\Controllers;

use App\Models\Apbdes;
use App\Models\Aparatur;
use App\Models\Demografi;

class ProfilController extends Controller
{
    public function index()
    {
        $tahunApbdes = Apbdes::query()->max('tahun');

        return view('pages.profile', [
            'aparaturs' => Aparatur::query()->ordered()->get(),
            'demografi' => Demografi::query()->orderBy('order')->get()->groupBy('kategori'),
            'apbdes' => Apbdes::query()->where('tahun', $tahunApbdes)->orderBy('order')->get()->groupBy('jenis'),
            'tahunApbdes' => $tahunApbdes,
        ]);
    }
}
