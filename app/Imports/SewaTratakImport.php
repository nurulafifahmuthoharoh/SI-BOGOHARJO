<?php

namespace App\Imports;

use App\SewaTratak;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
// use Maatwebsite\Excel\Concerns\WithBatchInserts;
// use Maatwebsite\Excel\Concerns\WithLimit;


class SewaTratakImport implements ToModel, WithHeadingRow
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
    
        $sewatratak= new SewaTratak([
            'nama' => $row['nama'],
            'no_telepon' => $row['no_telepon'],
            'alamat' => $row['alamat'],
            'no_tujuan' => $row['no_tujuan'],
            'tanggal_sewa' => $row['tanggal_sewa'],
            'tanggal_kembali' => $row['tanggal_kembali'],
            'total_kursi' => $row['total_kursi'],
            'total_tenda' => $row['total_tenda'],
            'pembayaran' => $row['pembayaran'],
            'status' => $row['status'],
            
            
        ]);

        return $sewatratak;
    }

    // public function limit(): int
    // {
    //     return $this->limit;
    // }

}
