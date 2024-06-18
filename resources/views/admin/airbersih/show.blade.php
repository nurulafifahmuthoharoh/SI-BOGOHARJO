@extends('layouts.master')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Data Air Bersih</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('lumbungpadi.index') }}">Data Air Bersih</a></li>
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
                            <a href="{{ route('airbersih.index')}}" class="btn">
                                <i class="fas fa-arrow-left  text-purple  "></i>
                            </a>
                            <span>Detail </span>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>ID Pelanggan</th>
                                        <td>{{ $airbersih->id_pelanggan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama</th>
                                        <td>{{ $airbersih->nama}}</td>
                                    </tr>
                                    <tr>
                                        <th>Nomor Telepon</th>
                                        <td>{{ $airbersih->no_telepon }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>{{ $airbersih->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <th>Batas Pembayaran</th>
                                        <td>{{ $airbersih->batas_pembayaran }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jumlah Pemakaian</th>
                                        <td>{{ $airbersih->total_pemakaian }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tagihan</th>
                                        <td> Rp. {{ number_format($airbersih->tagihan) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>     @if ($airbersih->status == 'Lunas')
                                            <div class="badge badge-success">Lunas</div>
                                        @elseif ($airbersih->status == 'Terlambat')
                                            <div class="badge badge-danger">Terlambat</div>
                                        @else
                                            <div class="badge badge-warning">Belum Lunas</div>
                                        @endif        </td>
                                    </tr>   
                                    <tr>
                                        <img src="{{ asset('img/gambar/' . $airbersih->foto) }}" class="img-fluid mb-4" alt="{{ $airbersih->nama }}" style="display: block; margin: 0 auto;">
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
