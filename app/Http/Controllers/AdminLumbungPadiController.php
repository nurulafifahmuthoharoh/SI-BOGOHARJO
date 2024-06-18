<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use App\LumbungPadi;
use Illuminate\Support\Str;
use App\Exports\LumbungPadiExport;
use App\Imports\LumbungPadiImport;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\LumbungPadi\StoreLumbungPadiRequest;
use App\Http\Requests\LumbungPadi\UpdateLumbungPadiRequest;


class AdminLumbungPadiController extends Controller
{
    public $keyword = '';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lumbungpadi = LumbungPadi::latest();

        if (!empty($request->keyword)) {
            $this->keyword = $request->keyword;
            
            $lumbungpadi = $lumbungpadi->where('nama_peminjam','like',"%".$this->keyword."%");
        }
        return view('admin.lumbungpadi.index')->with('lumbungpadi', $lumbungpadi->paginate(10));
    }

    public function create()
        {
        
            return view('admin.lumbungpadi.create');
        }


    public function store(StoreLumbungPadiRequest $request)
    {
        LumbungPadi::create([
            'no_ktp' => $request->no_ktp,
            'nama_peminjam' => $request->nama_peminjam,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'total_pinjam' => $request->total_pinjam,
            'denda' => $request->denda,
            'status' => $request->status,
        ]);
    
        session()->flash('success', 'Data peminjaman lumbungpadi Berhasil Ditambahkan');
        session()->flash('lumbungpadi_notification', 'Pengajuan Baru Lumbung Padi');
    
        return redirect(route('lumbungpadi.index'));
    }
    

    public function show(LumbungPadi $lumbungpadi)
    {
        return view('admin.lumbungpadi.show')->with('lumbungpadi', $lumbungpadi);
    }

    

    public function edit(LumbungPadi $lumbungpadi)
    {
        return view('admin.lumbungpadi.edit')
                ->with('lumbungpadi', $lumbungpadi);

    }

    public function update(UpdateLumbungPadiRequest $request, LumbungPadi $lumbungpadi)
    {
        $data = $request->only([
            'no_ktp',
            'nama_peminjam',
            'no_telepon',
            'alamat',
            'tanggal_pinjam', 
            'tanggal_kembali', 
            'total_pinjam', 
            'denda', 
            'status',
        ]);

        $lumbungpadi->update($data);

        session()->flash('success', "Data : $lumbungpadi->nama_peminjam  Berhasil Di ubah");

        //redirect user
        return redirect(route('lumbungpadi.index'));
    }

    public function destroy(LumbungPadi $lumbungpadi)
    {
    
        $lumbungpadi->delete();

        session()->flash('success', "Data  : $lumbungpadi->nama_peminjam Berhasil Dihapus");

        return redirect(route('lumbungpadi.index'));
    }

    public function reportPdf(LumbungPadi $lumbungpadi)
    {
        
        $lumbungpadi = LumbungPadi::all();
        
        $pdf = PDF::setOptions([
            'dpi' => 150, 
            'defaultFont' => 'sans-serif',  
            ])
            ->loadView('admin.lumbungpadi.report.pdf', [
                'lumbungpadi' => $lumbungpadi,
            ]);

        return $pdf->stream();
        
    }

    public function export() 
    {
        return (new LumbungPadiExport())->download('laporan-data-lumbungpadi.xlsx');
    
    }

    public function import(Request $request) 
    {
        $this->validate($request, [
            'import_lumbungpadi' => 'required|nullable|mimes:xls,xlsx|max:10'
        ]);

        $file = request()->file('import_lumbungpadi');
                
        Excel::import(new LumbungPadiImport, request()->file('import_lumbungpadi'));
        
        session()->flash('success', "Data Berhasil di import");

        //redirect user
        return redirect(route('lumbungpadi.index'));
    }



}