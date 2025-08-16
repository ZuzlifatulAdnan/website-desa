<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        return view('pages.layanan');
    }
    public function create()
    {
        return view('pages.layanan-detail');
    }
}
