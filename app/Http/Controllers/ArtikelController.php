<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        return view('pages.berita');
    }
    public function create()
    {
        return view('pages.berita-detail');
    }
}
