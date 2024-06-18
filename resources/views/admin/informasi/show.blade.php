@extends('layouts.master')


@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Berita</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('informasi.index') }}">Data Berita</a></li>
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
                    <div class="card-body text-justify">
                        <h1 style="text-align: center">{{ $informasi->judul }}</h1>
                        <p class="card-text text-muted"  style="text-align: center">{{ $informasi->tanggal_publish }}</p>

                        <img src="{{ asset('img/gambar/' . $informasi->foto) }}" class="img-fluid mb-4" alt="{{ $informasi->judul }}" style="display: block; margin: 0 auto;">
                        <p class="card-text">{{ $informasi->keterangan }}</p>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
@endsection


