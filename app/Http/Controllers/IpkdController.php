<?php

namespace App\Http\Controllers;

use App\Models\Ipkd;
use Illuminate\Http\Request;

class IpkdController extends Controller
{
    public function index()
    {
        $columns = \Schema::getColumnListing('ipkds');

        if (in_array('year', $columns)) {
            $ipkdList = Ipkd::orderBy('year', 'desc')->get();
        } else {
            $ipkdList = Ipkd::orderBy('created_at', 'desc')->get();
        }

        // arahkan ke view yg bener
        return view('informasi-publik.ipkd', compact('ipkdList'));
    }

    public function show($id)
    {
        $ipkd = Ipkd::findOrFail($id);

        // arahkan ke view yg bener
        return view('informasi-publik.ipkd-show', compact('ipkd'));
    }
}

