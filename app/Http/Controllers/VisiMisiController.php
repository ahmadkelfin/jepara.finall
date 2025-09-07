<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    public function index()
    {
        $data = VisiMisi::first(); // ambil 1 record visi & misi
        return view('visi-misi', compact('data'));
    }
    public function create()
    {
        return view('admin.visimisi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'visi' => 'required',
            'misi' => 'required',
        ]);

        VisiMisi::create($request->all());

        return redirect()->route('visimisi.index')->with('success', 'Visi Misi berhasil ditambahkan');
    }

    public function edit(VisiMisi $visimisi)
    {
        return view('admin.visimisi.edit', compact('visimisi'));
    }

    public function update(Request $request, VisiMisi $visimisi)
    {
        $request->validate([
            'visi' => 'required',
            'misi' => 'required',
        ]);

        $visimisi->update($request->all());

        return redirect()->route('visimisi.index')->with('success', 'Visi Misi berhasil diperbarui');
    }
}
