<?php

namespace App\Http\Controllers;

use App\Models\Sambutan;

class ProfilKotaController extends Controller
{
    public function sambutan()
    {
        $sambutan = Sambutan::first(); // ambil 1 sambutan
        return view('profil-kota.sambutan', compact('sambutan'));
    }
}
