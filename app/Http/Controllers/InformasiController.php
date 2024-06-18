<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Informasi;

class InformasiController extends Controller
{
    public function index()
    {
        $informasi = Informasi::all();
        return view('informasi.index', compact('informasi'));
    }

    public function detail($id)
    {
        $informasi = Informasi::findOrFail($id);
        return view('informasi.show', compact('informasi'));
    }
    
    
}
