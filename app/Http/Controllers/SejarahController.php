<?php

namespace App\Http\Controllers;

use App\Models\Sambutan;
use Illuminate\Http\Request;

class SambutanController extends Controller
{
    public function index()
    {
        $sambutan = Sambutan::first();
        return view('post.profil-kota.sambutan', compact('sambutan'));
    }
}
