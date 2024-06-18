<?php

namespace App\Http\Controllers;


use PDF;
use Illuminate\Http\Request;
use App\AirBersih;
use Illuminate\Support\Str;
use App\Exports\AirBersihExport;
use App\Imports\AirBersihImport;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AirBersih\StoreAirBersihRequest;
use App\Http\Requests\AirBersih\UpdateAirBersihRequest;


class AdminAirBersihController extends Controller
{
    public $keyword = '';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $airbersih = AirBersih::latest();

        if (!empty($request->keyword)) {
            $this->keyword = $request->keyword;
            
            $airbersih = $airbersih->where('nama','like',"%".$this->keyword."%");
        }
        return view('admin.airbersih.index')->with('airbersih', $airbersih->paginate(10));
    }

    public function create()
    {
    
        return view('admin.airbersih.create');
    }


    public function store(StoreAirBersihRequest $request)
    {
        $foto = '';
        if($request->hasFile('foto')){
            $foto = $this->uploadGambar($request);
        }else{
            $foto = "buktipembayaran.jpg";
        }

        AirBersih::create([
            'id_pelanggan' => $request->id_pelanggan,
            'nama' => $request->nama,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
            'batas_pembayaran' => $request->batas_pembayaran,
            'total_pemakaian' => $request->total_pemakaian,
            'tagihan' => $request->tagihan,
            'status' => $request->status,
            'foto' => $foto, 
        ]);

        session()->flash('success', 'Data Produk Berhasil Ditambahkan');

        return redirect(route('airbersih.index'));
    }

    
    public function show(AirBersih $airbersih)
    {
        return view('admin.airbersih.show')->with('airbersih', $airbersih);
    }

    public function edit(AirBersih $airbersih)
    {
        return view('admin.airbersih.edit')
                ->with('airbersih', $airbersih);

    }

    public function update(UpdateAirBersihRequest $request, AirBersih $airbersih)
    {
        $data = $request->only([
            'id_pelanggan',
            'nama',
            'no_telepon',
            'alamat',
            'batas_pembayaran',
            'total_pemakaian',
            'tagihan',
            'status',
        ]);

        if($request->hasFile('foto')){
            $foto = $this->uploadGambar($request);

            if($airbersih->foto !== "buktipembayaran.jpg"){
                File::delete('img/gambar/'.$airbersih->foto);
            }

            $data['foto'] = $foto; // Perbaiki penyimpanan nama file
        }
        

        $airbersih ->update($data);

        session()->flash('success', "Data : $airbersih->nama  Berhasil Di ubah");

        //redirect user
        return redirect(route('airbersih.index'));
    }

    public function destroy(AirBersih $airbersih)
    {
        if($airbersih->foto !== "buktipembayaran.jpg"){
            File::delete('img/gambar/'.$airbersih->foto);
        }
    
        $airbersih->delete();

        session()->flash('success', "Data  : $airbersih->nama Berhasil Dihapus");

        return redirect(route('airbersih.index'));
    }

    public function reportPdf(AirBersih $airbersih)
    {
        
        $airbersih = AirBersih::all();
        
        $pdf = PDF::setOptions([
            'dpi' => 150, 
            'defaultFont' => 'sans-serif',  
            ])
            ->loadView('admin.airbersih.report.pdf', [
                'airbersih' => $airbersih,
            ]);

        return $pdf->stream();
        
    }

    public function export() 
    {
        return (new AirBersihExport())->download('laporan-data-airbersih.xlsx');
    
    }

    public function import(Request $request) 
    {
        $this->validate($request, [
            'import_airbersih' => 'required|nullable|mimes:xls,xlsx|max:10'
        ]);

        $file = request()->file('import_airbersih');
                
        Excel::import(new AirBersihImport, request()->file('import_airbersih'));
        
        session()->flash('success', "Data Berhasil di import");

        //redirect user
        return redirect(route('airbersih.index'));
    }

    

    public function uploadGambar($request)
    {
        $namaFile = Str::slug($request->nama);
        $ext = $request->foto->getClientOriginalExtension();
        $uniq = uniqid(); // Gunakan uniqid() untuk mendapatkan nilai yang unik
        $foto = "$namaFile-$uniq.$ext";
        $request->foto->move(public_path('img/gambar'), $foto);
    
        return $foto; // Mengembalikan nama file yang sesuai
    }
    



}
