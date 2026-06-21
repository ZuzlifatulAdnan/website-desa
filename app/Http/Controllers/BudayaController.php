<?php

namespace App\Http\Controllers;

use App\Models\Budaya;

class BudayaController extends Controller
{
    public function index()
    {
        return view('pages.budaya', [
            'budayas' => Budaya::query()->active()->latest()->get(),
        ]);
    }

    public function show(Budaya $budaya)
    {
        return view('pages.budaya-detail', [
            'budaya' => $budaya,
            'lainnya' => Budaya::query()->active()->where('id', '!=', $budaya->id)->latest()->take(3)->get(),
        ]);
    }
}
