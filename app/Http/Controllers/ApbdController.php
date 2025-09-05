<?php

namespace App\Http\Controllers;

use App\Models\Apbd;

class ApbdController extends Controller
{
    public function index()
    {
        $apbdList = Apbd::orderBy('year', 'desc')->get();
        // arahkan ke resources/views/informasi-publik/apbd.blade.php
        return view('informasi-publik.apbd', compact('apbdList'));
    }

    public function show($id)
    {
        $apbd = Apbd::findOrFail($id);
        // arahkan ke resources/views/informasi-publik/apbd-show.blade.php
        return view('informasi-publik.apbd-show', compact('apbd'));
    }
}
