<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        return view('pages.kontak');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'no_telp' => ['nullable', 'string', 'max:30'],
            'subjek' => ['required', 'string', 'max:255'],
            'pesan' => ['required', 'string'],
        ]);

        Kontak::create($data);

        return redirect()
            ->route('kontak.index')
            ->with('success', 'Terima kasih! Pesan Anda telah terkirim dan akan segera kami tindak lanjuti.');
    }
}
