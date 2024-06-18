<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use App\SewaTratak;
use Illuminate\Support\Str;
use App\Exports\SewaTratakExport;
use App\Imports\SewaTratakImport;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SewaTratak\StoreSewaTratakRequest;
use App\Http\Requests\SewaTratak\UpdateSewaTratakRequest;

class AdminSewaTratakController extends Controller
{
    public $keyword = '';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sewatratak = SewaTratak::latest();

        if (!empty($request->keyword)) {
            $this->keyword = $request->keyword;
            
            $sewatratak = $sewatratak->where('nama','like',"%".$this->keyword."%");
        }
        return view('admin.sewatratak.index')->with('sewatratak', $sewatratak->paginate(10));
}

    public function create()
        {
        
            return view('admin.sewatratak.create');
        }


    public function store(StoreSewaTratakRequest $request)
    {
        SewaTratak::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'no_tujuan' => $request->no_tujuan,
            'tanggal_sewa' => $request->tanggal_sewa,
            'tanggal_kembali' => $request->tanggal_kembali,
            'total_kursi' => $request->total_kursi,
            'total_tenda' => $request->total_tenda,
            'pembayaran' => $request->pembayaran,
            'status' => $request->status,
        ]);
    
        session()->flash('success', 'Data Produk Berhasil Ditambahkan');
    
        return redirect(route('sewatratak.index'));
    }
    

    public function show(SewaTratak $sewatratak)
    {
        return view('admin.sewatratak.show')->with('sewatratak', $sewatratak);
  
    }

    public function edit(SewaTratak $sewatratak)
    {
        return view('admin.sewatratak.edit')
                ->with('sewatratak', $sewatratak);

    }

    public function update(UpdateSewaTratakRequest $request, SewaTratak $sewatratak)
    {
        $data = $request->only([
            'nama',
            'no_telepon',
            'alamat',
            'no_tujuan',
            'tanggal_sewa', 
            'tanggal_kembali', 
            'total_kursi',
            'total_tenda', 
            'pembayaran', 
            'status',
        ]);

        $sewatratak->update($data);

        session()->flash('success', "Data : $sewatratak->nama  Berhasil Di ubah");

        //redirect user
        return redirect(route('sewatratak.index'));
    }

    public function destroy(SewaTratak $sewatratak)
    {
    
        $sewatratak->delete();

        session()->flash('success', "Data  : $sewatratak->nama Berhasil Dihapus");

        return redirect(route('sewatratak.index'));
    }

    public function reportPdf(SewaTratak $sewatratak)
    {
        
        $sewatratak = SewaTratak::all();
        
        $pdf = PDF::setOptions([
            'dpi' => 150, 
            'defaultFont' => 'sans-serif',  
            ])
            ->loadView('admin.sewatratak.report.pdf', [
                'sewatratak' => $sewatratak,
            ]);

        return $pdf->stream();
        
    }

    public function export() 
    {
        return (new SewaTratakExport())->download('laporan-data-sewatratak.xlsx');
    
    }

    public function import(Request $request) 
    {
        $this->validate($request, [
            'import_sewatratak' => 'required|nullable|mimes:xls,xlsx|max:10'
        ]);

        $file = request()->file('import_sewatratak');
                
        Excel::import(new SewaTratakImport, request()->file('import_sewatratak'));
        
        session()->flash('success', "Data Berhasil di import");

        //redirect user
        return redirect(route('sewatratak.index'));
    }



}
