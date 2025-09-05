<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;

class DokumenController extends Controller
{
    public function index()
    {
        // Ambil terbaru duluan
        $dokumens = Dokumen::orderByDesc('created_at')->get();

        return view('informasi-publik.dokumen', [
            'title'     => 'Semua Dokumen',
            'dokumens'  => $dokumens,
        ]);
    }
}
