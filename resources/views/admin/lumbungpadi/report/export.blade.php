<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Peminjam Lumbung Padi</title>
</head>
<body>
    <div class="header">
        <h3>Data Peminjam Lumbung Padi</h3>
        {{-- <h4 style="line-height: 0px;">Invoice: #{{ $penjualan->invoice }}</h4>
        <p><small style="opacity: 0.5;">{{ $penjualan->created_at->format('d-m-Y H:i:s') }}</small></p> --}}
    </div>
    @if (!empty($start_date))
        <div class="customer">
            <table>
                <tr>
                    <th>Dari Tanggal</th>
                    <td></td>
                    <td>{{ $start_date }}</td>
                </tr>
                <tr>
                    <th>Sampai Tanggal</th>
                    <td></td>
                    <td>{{ $end_date }}</td>
                </tr>
            </table>
        </div>
    @else 
        <p>Dicetak Tanggal : {{ date("d-m-Y") }}</p>
        <p></p>       
        <p></p>       
    @endif
    <div class="page">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>No KTP</th>
                    <th>Nama Peminjam</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Total Pinjam</th>
                    <th>Denda</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($lumbungpadi as $row)
                <tr >
                    <td style="text-align:center; border: 1px solid black">{{ $loop->iteration }}</td>
                    <td style="text-align:left; border: 1px solid black">{{ $row->no_ktp }}</td>
                    <td style="text-align:left; border: 1px solid black">{{ $row->nama_peminjam }}</td>
                    <td style="text-align:left; border: 1px solid black">{{ $row->alamat}}</td>
                    <td style="text-align:left; border: 1px solid black">{{ $row->no_telepon }}</td>
                    <td style="text-align:center; border: 1px solid black">{{ $row->tanggal_pinjam}}</td>
                    <td style="text-align:center; border: 1px solid black">{{ $row->tanggal_kembali}}</td>
                    <td style="text-align:center; border: 1px solid black">{{ number_format($row->total_pinjam) }}</td>
                    <td style="text-align:center; border: 1px solid black">Rp {{ number_format($row->denda) }}</td>
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