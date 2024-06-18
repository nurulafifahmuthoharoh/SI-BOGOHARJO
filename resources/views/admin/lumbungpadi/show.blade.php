@extends('layouts.master')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Data Peminjam Lumbung Padi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('lumbungpadi.index') }}">Data Peminjam Lumbung Padi</a></li>
                        <li class="breadcrumb-item active">Detail Peminjam</li>
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
                            <a href="{{ route('lumbungpadi.index')}}" class="btn">
                                <i class="fas fa-arrow-left  text-purple  "></i>
                            </a>
                            <span>Detail Data Peminjam</span>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>Nomor KTP</th>
                                        <td>{{ $lumbungpadi->no_ktp }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Peminjam</th>
                                        <td>{{ $lumbungpadi->nama_peminjam }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nomor Telepon</th>
                                        <td>{{ $lumbungpadi->no_telepon }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>{{ $lumbungpadi->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Pinjam</th>
                                        <td>{{ $lumbungpadi->tanggal_pinjam }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Kembali</th>
                                        <td>{{ $lumbungpadi->tanggal_kembali }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total Pinjam (kg)</th>
                                        <td>{{ $lumbungpadi->total_pinjam }}</td>
                                    </tr>
                                    <tr>
                                        <th>Denda</th>
                                        <td> Rp. {{ number_format($lumbungpadi->denda) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            @if ($lumbungpadi->status == 'Lunas')
                                            <div class="badge badge-success">Lunas</div>
                                        @elseif ($lumbungpadi->status == 'Terlambat')
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
