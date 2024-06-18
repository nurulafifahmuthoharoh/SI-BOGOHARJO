<?php

namespace App\Http\Controllers;

use App\LumbungPadi;
use App\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\LumbungPadi\StoreLumbungPadiRequest;

class LumbungPadiController extends Controller
{
    public function index()
    {
        $informasi = Informasi::where('tag', 'Lumbung Padi')->latest()->get();
        return view('lumbungpadi.index', compact('informasi')); 
    }

    public function store(StoreLumbungPadiRequest $request)
    {
        $data = [
            'no_ktp' => $request->no_ktp,
            'nama_peminjam' => $request->nama_peminjam,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'total_pinjam' => $request->total_pinjam,
        ];

        LumbungPadi::create($data);
    
        return response()->json(['success' => 'Data Pengajuan Berhasil Diajukan, silahkan tunggu untuk dihubungi admin']);
        return redirect()->route('lumbungpadi')->with('success', 'Data berhasil ditambahkan');
    }
    

}
