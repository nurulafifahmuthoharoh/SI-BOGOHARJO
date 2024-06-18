<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AirBersih; 
use App\Informasi;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AirBersihController extends Controller
{
    public function index()
    {

        $informasi = Informasi::where('tag', 'Air Bersih')->latest()->get();

        return view('airbersih.index', compact('informasi'));
    }

    public function cekTagihan(Request $request)
{
    // Ambil id_pelanggan dari query parameter
    $idPelanggan = $request->query('id_pelanggan');

    // Lakukan query ke database untuk mendapatkan data tagihan berdasarkan id_pelanggan
    $tagihanData = AirBersih::where('id_pelanggan', $idPelanggan)->first();

    // Jika data ditemukan
    if ($tagihanData) {
        $nama = $tagihanData->nama; // Ambil status dari model
        $tagihan = $tagihanData->tagihan; // Ambil tagihan dari model
        $status = $tagihanData->status; // Ambil status dari model

        // Format data untuk dikirim sebagai respons JSON
        $data = [
            'id_pelanggan' => $idPelanggan,
            'nama' => $nama,
            'tagihan' => $tagihan,
            'status' => $status,
            
        ];

        // Kembalikan data dalam format JSON
        return response()->json($data);
    } else {
        // Jika data tidak ditemukan, kirim respons JSON dengan pesan error
        return response()->json(['message' => 'Data not found'], 404);
    }
    
}
public function update(Request $request)
{
    // Validasi input
    $validatedData = $request->validate([
        'id_pelanggan' => 'required',
        'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2000'
    ]);

    // Temukan data AirBersih yang akan diupdate berdasarkan id_pelanggan
    $airBersih = AirBersih::where('id_pelanggan', $validatedData['id_pelanggan'])->first();

    // Pastikan data ditemukan
    if ($airBersih) {
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
        // Simpan file gambar ke dalam storage
        if ($request->hasFile('foto')) {
            $imagePath = $this->uploadGambar($request);
            $data['foto'] = $imagePath;

            // Hapus file lama jika bukan default
            if ($airBersih->foto !== "buktipembayaran.jpg") {
                File::delete(public_path('img/gambar/') . $airBersih->foto);
            }
        }

        // Simpan perubahan ke database
        $airBersih->update($data);

       
        return redirect()->route('airbersih')->with('success', 'Berhasil, Refresh setiap 1 menit untuk berubah status');
    }
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
