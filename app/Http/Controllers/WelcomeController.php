<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Informasi;

class WelcomeController extends Controller
{
    public function index()
    {
        $informasi = Informasi::all();
    
        return view('welcome', compact('informasi'));
    }

    public function detail($informasi)
    {
        $informasi = Informasi::findOrFail($informasi);
        return view('informasi.detail', compact('informasi'));
    }
    
}
