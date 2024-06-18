<?php

namespace App\Imports;

use App\LumbungPadi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
// use Maatwebsite\Excel\Concerns\WithBatchInserts;
// use Maatwebsite\Excel\Concerns\WithLimit;


class LumbungPadiImport implements ToModel, WithHeadingRow
{
    // private $rows = 0;
    // public $limit = 12;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // ++$this->rows;
        // dd($row);
        // dd($row);
    
        $lumbungpadi= new LumbungaPadi([
            'no_ktp' => $row['no_ktp'],
            'nama_peminjam' => $row['nama_peminjam'],
            'no_telepon' => $row['no_telepon'],
            'alamat' => $row['alamat'],
            'tanggal_pinjam' => $row['tanggal_pinjam'],
            'tanggal_kembali' => $row['tanggal_kembali'],
            'total_pinjam' => $row['total_pinjam'],
            'denda' => $row['denda'],
            'status' => $row['status'],            
            
        ]);

        return $lumbungpadi;
    }

    // public function limit(): int
    // {
    //     return $this->limit;
    // }

}
