<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\KontakMail; 

class KontakController extends Controller
{
    public function index()
    {
        return view('kontak.index');
    }

    public function kirimPesan(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'pesan' => 'required',
        ]);

        // Kirim email
        Mail::to('nurulafifah200107@gmail.com')
            ->send(new KontakMail($request->all(), 'nurulafifahmuthoharoh@gmail.com'));

        // Redirect atau berikan respons sesuai kebutuhan Anda
        return redirect()->back()->with('success', 'Pesan Anda telah berhasil dikirim.');
    }
}

