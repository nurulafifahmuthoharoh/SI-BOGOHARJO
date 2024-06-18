@extends('layouts.master')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
                        {{-- <li class="breadcrumb-item active">Blank Page</li> --}}
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $lumbungpadi->total() }}</h3>

                        <p>Total Lumbung Padi</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-box-open"></i>
                    </div>
                    <a href="{{ route('lumbungpadi.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $sewatratak->total() }}</h3>

                        <p>Total Sewa Tratak</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-campground fa-lg"></i>
                    </div>
                    <a href="{{ route('sewatratak.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $airbersih->total() }}</h3>

                        <p>Total Air Bersih</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-water"></i>
                    </div>
                    <a href="{{ route('airbersih.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $informasi->total() }}</h3>

                        <p>Total Informasi</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-edit nav-icon   "></i>
                    </div>
                    <a href="{{ route('informasi.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Lumbung Padi</h3>

                        <div class="card-tools small">
                            <a href="{{ route('lumbungpadi.index') }}">Selengkapnya</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 235px;">
                        <table class="table table-head-fixed text-nowrap small">
                            <thead>
                                <tr>
                                    <th>Nama Peminjam</th>
                                    <th>Total Pinjam</th>
                                    <th>Denda</th>
                                    <th>Status</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lumbungpadi as $row)
                                    <tr>
                                        <td>{{ $row->nama_peminjam }}</td>
                                        <td >{{ $row->total_pinjam}}</td>
                                        <td >Rp. {{ number_format($row->denda) }}</td>
                                        <td > 
                                            @if ($row->status == 'Lunas')
                                            <div class="badge badge-success">Lunas</div>
                                        @elseif ($row->status == 'Terlambat')
                                            <div class="badge badge-warning">Belum Lunas</div>
                                        @else
                                            <div class="badge badge-danger">Terlambat</div>
                                        @endif
                                    </td>
                                    </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.col-md -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Air Bersih</h3>

                        <div class="card-tools small">
                            <a href="{{ route('airbersih.index') }}">Selengkapnya</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 235px;">
                        <table class="table table-head-fixed text-nowrap small">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Batas Pembayaran</th>
                                    <th>Tagihan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($airbersih as $row)
                                    <tr>
                                        <td>{{ $row->nama }}</td>
                                        <td >{{ $row->batas_pembayaran}}</td>
                                        <td >Rp.{{ number_format($row->tagihan) }}</td>
                                        <td > 
                                            @if ($row->status == 'Lunas')
                                            <div class="badge badge-success">Lunas</div>
                                        @elseif ($row->status == 'Terlambat')
                                            <div class="badge badge-warning">Belum Lunas</div>
                                        @else
                                            <div class="badge badge-danger">Terlambat</div>
                                        @endif
                                    </td>
                                    </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.col-md -->

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Sewa Tratak</h3>

                        <div class="card-tools small">
                            <a href="{{ route('sewatratak.index') }}">Selengkapnya</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 235px;">
                        <table class="table table-head-fixed text-nowrap small">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Pembayaran</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sewatratak as $row)
                                    <tr>
                                        <td>{{ $row->nama }}</td>
                                        <td >{{ $row->tanggal_kembali}}</td>
                                        <td >Rp. {{ number_format($row->pembayaran) }}</td>
                                        <td > 
                                            @if ($row->status == 'Lunas')
                                            <div class="badge badge-success">Lunas</div>
                                        @elseif ($row->status == 'Terlambat')
                                            <div class="badge badge-warning">Belum Lunas</div>
                                        @else
                                            <div class="badge badge-danger">Terlambat</div>
                                        @endif
                                    </td>
                                    </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

        </div>

    </section>
    <!-- /.content -->
</div>
@endsection
