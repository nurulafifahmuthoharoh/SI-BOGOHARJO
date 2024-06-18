<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='icon' href='{{ public_path('/storage/').\Setting::getSetting()->favicon }}' type='image/x-icon' />
    <title>Laporan Data Air Bersih</title>
    <style>
        body{
            padding: 0;
            margin: 0;
        }
        .page{
            max-width: 80em;
            /* margin: 0 auto;' */
            /* position: absolute; */
            /* top: 170px; */
            position: relative;
            top: 5;
        }
         table th,
        table td{
            text-align: left;
        }
        
        table.layout{
            width: 100%;
            border-collapse: collapse;
        }
        
        table.display{
            margin: 1em 0;
        }
        table.display th,
        table.display td{
            border: 1px solid #B3BFAA;
            padding: .5em 1em;
        }

        table.display th{ background: #D5E0CC; }
        table.display td{ background: #fff; }
        
        /* table.responsive-table{
            box-shadow: 0 1px 10px rgba(0, 0, 0, 0.2);
        }  */

        .customer {
            padding-left: 600px;
        }

        .logo{
            position: absolute;
            left: 150px;
            top: 20px;
            z-index: 999;
        }

        .koplaporan{
            position: relative;
            height: 120px;
        }

        .logo img{
            width: 120px;
            height: 120px;
            /* position: absolute; */
            
        }

        .judul{
            position: absolute;
            top: 0;
            text-align: center;
        }

        .garis{
            margin-top: 160px;
            height: 3px;
            border-top: 3px solid black;
            border-bottom: 1px solid black;
        }

        .info{
            position: relative;
            top: 45px;
            font-size: 20px;
            text-align: right;
        }

        
    </style>
</head>
<body>
    <div class="header">
        <div class="koplaporan">
            <div class="logo">
                <img src="img/logo.png" alt="logo">
            </div>
            <div class="judul">
                <p>
                    Sistem Informasi Pengelolaan Air Bersih BUMDes Bogoharjo<br>
                    Jl. Bogoharjo Kaliori - Rembang<br>
                    Website : https://www.bogoharjo-rembang.desa.id/<br>

                </p>
            </div>
            <div class="garis"></div>
        </div>
        
        {{-- <h5>Dicetak Tanggal : {{ date("d-m-Y") }}</h5> --}}
        {{-- <br> --}}
        @if (!empty($start_date))
            <table>
                <tr>
                    <td>Dari Tanggal</td>
                    <td>: {{ date_format(date_create($start_date), "d/m/Y") }}</td>
                </tr>
                <tr>
                    <td>Sampai Tanggal</td>
                    <td>: {{ date_format(date_create($end_date), "d/m/Y") }}</td>
                </tr>
            </table>    
        @endif
        {{-- <p><small style="opacity: 0.5;">{{ $penjualan->created_at->format('d-m-Y H:i:s') }}</small></p> --}}
    </div>
    <div class="info">
        <p>Dicetak Tanggal : {{ date("d-m-Y") }}</p>
    </div>
    <div class="page">
        
        <table class="layout display responsive-table" style="font-size: 18px">
            <thead>
                <tr>
                    <th>No</th>
                    <th>id_pelanggan</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Batas Pembayaran</th>
                    <th>Jumlah pemakaian</th>
                    <th>Tagihan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($airbersih as $row)
                <tr >
                    <td style="text-align:center; border: 1px solid black">{{ $loop->iteration }}</td>
                    <td style="text-align:left; border: 1px solid black">{{ $row->id_pelanggan}}</td>
                    <td style="text-align:left; border: 1px solid black">{{ $row->nama }}</td>
                    <td style="text-align:left; border: 1px solid black">{{ $row->alamat }}</td>
                    <td style="text-align:left; border: 1px solid black">{{ $row->no_telepon }}</td>
                    <td style="text-align:center; border: 1px solid black">{{ $row->batas_pembayaran}}</td>
                    <td style="text-align:center; border: 1px solid black">{{ $row->total_pemakaian}}</td>
                    <td style="text-align:center; border: 1px solid black">Rp {{ number_format($row->tagihan) }}</td>
                    <td style="text-align:center; border: 1px solid black">{{ $row->status }}</td>
                    {{-- <td style="text-align:left; border: 1px solid black">{{ date_format(date_create($row->created_at), "d/m/Y") }}</td> --}}
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>