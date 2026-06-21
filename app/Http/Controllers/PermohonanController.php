<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\PermohonanLayanan;
use Illuminate\Http\Request;

class PermohonanController extends Controller
{
    public function create()
    {
        return view('pages.permohonan', [
            'layanans' => Layanan::query()->active()->orderBy('order')->get(),
            'terpilih' => request('layanan'),
            'permohonan' => null,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'layanan_id' => ['required', 'exists:layanans,id'],
            'nama' => ['required', 'string', 'max:255'],
            'nik' => ['nullable', 'string', 'max:20'],
            'email' => ['nullable', 'email', 'max:255'],
            'no_telp' => ['required', 'string', 'max:30'],
            'alamat' => ['nullable', 'string', 'max:500'],
            'keperluan' => ['required', 'string'],
            'lampiran' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:4096'],
        ]);

        if ($request->hasFile('lampiran')) {
            $data['lampiran'] = $request->file('lampiran')->store('permohonan', 'public');
        }

        $permohonan = PermohonanLayanan::create($data);

        return redirect()
            ->route('permohonan.create')
            ->with('success', 'Permohonan Anda berhasil dikirim!')
            ->with('kode', $permohonan->kode);
    }

    public function lacak(Request $request)
    {
        $permohonan = null;

        if ($kode = $request->query('kode')) {
            $permohonan = PermohonanLayanan::query()
                ->with('layanan')
                ->where('kode', trim($kode))
                ->first();
        }

        return view('pages.permohonan', [
            'layanans' => Layanan::query()->active()->orderBy('order')->get(),
            'terpilih' => null,
            'permohonan' => $permohonan,
            'kodeDicari' => $kode ?? null,
        ]);
    }
}
