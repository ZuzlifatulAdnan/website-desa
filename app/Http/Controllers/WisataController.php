<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WisataController extends Controller
{
    public function index()
    {
        return view('pages.wisata');
    }
    public function create()
    {
        return view('pages.wisata-detail');
    }
}
