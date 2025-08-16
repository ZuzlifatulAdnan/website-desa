<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BudayaController extends Controller
{
    public function index()
    {
        return view('pages.budaya');
    }
    public function create()
    {
        return view('pages.budaya-detail');
    }
}
