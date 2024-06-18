<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class KontakMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nama;
    public $pesan;

    public function __construct($data)
    {
        $this->nama = $data['nama'];
        $this->pesan = $data['pesan'];
    }

    public function build()
    {
        return $this->subject('Pesan dari Formulir Kontak')
                    ->view('kontak.index');
    }
}
