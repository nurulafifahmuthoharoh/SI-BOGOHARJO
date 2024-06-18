<?php

namespace App\Imports;

use App\AirBersih;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
// use Maatwebsite\Excel\Concerns\WithBatchInserts;
// use Maatwebsite\Excel\Concerns\WithLimit;


class AirBersihImport implements ToModel, WithHeadingRow
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
    
        $airbersih= new AirBersih([
            'id_pelanggan' => $row['id_pelanggan'],
            'nama' => $row['nama'],
            'no_telepon' => $row['no_telepon'],
            'alamat' => $row['alamat'],
            'batas_pembayaran' => $row['batas_pembayaran'],
            'total_pemakaian' => $row['total_pemakaian'],
            'tagihan' => $row['tagihan'],
            'status' => $row['status'],            
            
        ]);

        return $airbersih;
    }

    // public function limit(): int
    // {
    //     return $this->limit;
    // }

}
