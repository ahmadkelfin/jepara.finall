<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // ambil semua data dari tabel heroes
        $heroes = Hero::all();

        // lempar ke view home.blade.php
        return view('home', compact('heroes'));
    }
}
