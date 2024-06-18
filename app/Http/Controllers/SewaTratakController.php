<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SewaTratak;
use App\Informasi;
use Illuminate\Support\Str;
use App\Http\Requests\SewaTratak\StoreSewaTratakRequest;

class SewaTratakController extends Controller
{
    public function index()
    {
        $informasi = Informasi::where('tag', 'Sewa Tratak')->latest()->get();
        return view('sewatratak.index', compact('informasi'));
    }

    public function store(StoreSewaTratakRequest $request)
    {
        // Cek apakah tanggal sewa tratak sudah ada di database
       // $existingSewaTratak = SewaTratak::where('tanggal_sewa', $request->tanggal_sewa)->first();
        
        // Jika tanggal sewa tratak sudah ada, kembalikan user dengan pesan error
       // if ($existingSewaTratak) {
        //    return redirect()->back()->with('error', 'Sewa Tratak pada tanggal tersebut tidak tersedia, silahkan pilih tanggal lain');
        //}
    
        // Jika tidak ada, simpan data baru
        $data = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'no_tujuan' => $request->no_tujuan,
            'tanggal_sewa' => $request->tanggal_sewa,
            'tanggal_kembali' => $request->tanggal_kembali,
            'total_kursi' => $request->total_kursi,
            'total_tenda' => $request->total_tenda,
        ];
    
        SewaTratak::create($data);
    
        
        return response()->json(['success' => 'Pengajuan Sewa Berhasil, silahkan tunggu untuk dihubungi admin']);
        return redirect()->route('sewatratak');
    }
    
    
}
