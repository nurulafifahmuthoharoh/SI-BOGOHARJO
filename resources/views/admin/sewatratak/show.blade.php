@extends('layouts.master')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Data Sewa Tratak</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('sewatratak.index') }}">Data Sewa Tratak</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class=" d-flex align-items-center justify-content-between">
                            <a href="{{ route('sewatratak.index')}}" class="btn">
                                <i class="fas fa-arrow-left  text-purple  "></i>
                            </a>
                            <span>Detail</span>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>Nama</th>
                                        <td>{{ $sewatratak->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>{{ $sewatratak->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nomor Telepon</th>
                                        <td>{{ $sewatratak->no_telepon }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tujuan</th>
                                        <td>{{ $sewatratak->no_tujuan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Sewa</th>
                                        <td>{{ $sewatratak->tanggal_sewa }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Kembali</th>
                                        <td>{{ $sewatratak->tanggal_kembali }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total Kursi</th>
                                        <td>{{ $sewatratak->total_kursi }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total Tenda</th>
                                        <td>{{ $sewatratak->total_tenda }}</td>
                                    </tr>
                                    <tr>
                                        <th>Pembayaran</th>
                                        <td>  Rp. {{ number_format($sewatratak->pembayaran) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            @if ($sewatratak->status == 'Lunas')
                                            <div class="badge badge-success">Lunas</div>
                                        @elseif ($sewatratak->status == 'Terlambat')
                                            <div class="badge badge-danger">Terlambat</div>
                                        @else
                                            <div class="badge badge-warning">Belum Lunas</div>
                                        @endif        
                                        </td>
                                    </tr>                                                                              
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
@endsection
