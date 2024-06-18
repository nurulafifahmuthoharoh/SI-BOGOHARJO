<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Informasi;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File; // Tambahkan ini untuk menggunakan kelas File
use App\Http\Requests\Informasi\StoreInformasiRequest;
use App\Http\Requests\Informasi\UpdateInformasiRequest;

class AdminInformasiController extends Controller
{
    public $keyword = '';

    public function index(Request $request)
    {
        $informasi = Informasi::latest();

        if (!empty($request->keyword)) {
            $this->keyword = $request->keyword;
            
            $informasi = $informasi->where('judul','like',"%".$this->keyword."%");
        }
        return view('admin.informasi.index')->with('informasi', $informasi->paginate(10));
    }

    public function create()
    {
        return view('admin.informasi.create');
    }

    public function store(StoreInformasiRequest $request)
    {
        $foto = '';
        if($request->hasFile('foto')){
            $foto = $this->uploadGambar($request);
        }else{
            $foto = "foto.jpg";
        }
        Informasi::create([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'tanggal_publish' => $request->tanggal_publish,
            'tag' => $request->tag,
            'foto' => $foto, 
        ]);

        session()->flash('success', 'Postingan Informasi Berhasil Ditambahkan');

        return redirect(route('informasi.index'));
    }

    public function show(Informasi $informasi)
    {
        return view('admin.informasi.show')->with('informasi', $informasi);
    }

    public function edit(Informasi $informasi)
    {
        return view('admin.informasi.edit')
                ->with('informasi', $informasi);
    }

    public function update(UpdateInformasiRequest $request, Informasi $informasi)
    {
        $data = $request->only([
            'judul', 
            'keterangan',
            'tanggal_publish',
            'tag'
        ]);

        if($request->hasFile('foto')){
            $foto = $this->uploadGambar($request);

            if($informasi->foto !== "foto.jpg"){
                File::delete('img/gambar/'.$informasi->foto);
            }

            $data['foto'] = $foto; // Perbaiki penyimpanan nama file
        }
        
        $informasi->update($data);

        session()->flash('success', "Informasi : $informasi->judul  Berhasil Di ubah");

        return redirect(route('informasi.index'));
    }

    public function destroy(informasi $informasi)
    {
        if($informasi->foto !== "foto.jpg"){
            File::delete('img/gambar/'.$informasi->foto);
        }
        
        $informasi->delete();

        session()->flash('success', "Informasi : $informasi->judul Berhasil Dihapus");

        return redirect(route('informasi.index'));
    }

    public function uploadGambar($request)
    {
        $namaFile = Str::slug($request->judul);
        $ext = $request->foto->getClientOriginalExtension(); // Gunakan method ini untuk mendapatkan ekstensi file
        $uniq = uniqid();
        $foto = "$namaFile-$uniq.$ext";
        $request->foto->move(public_path('img/gambar'), $foto);

        return $foto;
    }

}
