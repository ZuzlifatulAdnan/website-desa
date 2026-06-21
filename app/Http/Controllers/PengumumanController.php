<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;

class PengumumanController extends Controller
{
    public function show(Pengumuman $pengumuman)
    {
        abort_unless($pengumuman->is_active, 404);

        return view('pages.pengumuman-detail', [
            'pengumuman' => $pengumuman,
            'lainnya' => Pengumuman::query()->active()
                ->where('id', '!=', $pengumuman->id)
                ->latest('tanggal')
                ->take(5)
                ->get(),
        ]);
    }
}
