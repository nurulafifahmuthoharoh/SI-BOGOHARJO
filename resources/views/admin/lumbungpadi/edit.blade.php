@extends('layouts.master')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Lumbung Padi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('lumbungpadi.index') }}">Data</a></li>
                        <li class="breadcrumb-item active">Edit Peminjam</li>
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
                            
                            <span>Form Edit Data</span>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" >
                        <form method="POST" action="{{ route('lumbungpadi.update', $lumbungpadi->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-5 px-3">
                                    <div class="form-group">
                                        <label for="no_ktp">Nomor KTP</label>
                                        <input type="text" class="form-control @error('no_ktp') is-invalid @enderror" name="no_ktp" id="no_ktp" value="{{ $lumbungpadi->no_ktp }}"  placeholder="Nomor KTP" autofocus>
                                        @error('no_ktp')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="nama_peminjam">Nama Peminjam</label>
                                        <input type="text" class="form-control @error('nama_peminjam') is-invalid @enderror" name="nama_peminjam" id="nama_peminjam" value="{{ $lumbungpadi->nama_peminjam }}" placeholder="Nama Peminjam" autofocus>
                                        @error('nama_peminjam')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="tanggal_pinjam">Tanggal Pinjam</label>
                                        <input type="date" class="form-control @error('tanggal_pinjam') is-invalid @enderror" name="tanggal_pinjam" id="tanggal_pinjam" value="{{ $lumbungpadi->tanggal_pinjam }}" placeholder="Tanggal Pinjam" autofocus>
                                        @error('tanggal_pinjam')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="tanggal_kembali">Tanggal Kembali</label>
                                        <input type="date" class="form-control @error('tanggal_kembali') is-invalid @enderror" name="tanggal_kembali" id="tanggal_kembali" value="{{ $lumbungpadi->tanggal_kembali }}" placeholder="Tanggal Kembali" autofocus>
                                        @error('tanggal_kembali')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="total_pinjam">Total Pinjam</label>
                                        <input type="text" class="form-control @error('total_pinjam') is-invalid @enderror" name="total_pinjam" id="total_pinjam" value="{{ $lumbungpadi->total_pinjam}}" placeholder="Total Pinjam" autofocus>
                                        @error('total_pinjam')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="denda">Denda</label>
                                        <input type="text" class="form-control @error('denda') is-invalid @enderror" name="denda" id="denda" value="{{ $lumbungpadi->denda }}" placeholder="Denda" autofocus>
                                        @error('denda')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                            <option value="">-Pilih Status-</option>
                                            <option value="Belum Lunas" {{ $lumbungpadi->status == 'Belum Lunas' ? 'selected' : '' }}>Belum Lunas</option>
                                            <option value="Lunas" {{ $lumbungpadi->status == 'Lunas' ? 'selected' : '' }}>Lunas</option>
                                            <option value="Terlambat" {{ $lumbungpadi->status == 'Terlambat' ? 'selected' : '' }}>Terlambat</option>
                                        </select>
                                        @error('status')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group d-flex justify-content-end">
                                        <a class="btn btn-default " href="{{ route('users.index') }}">Batal</a>
                                        <button type="submit" class="btn btn-primary ml-2">
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                                <!-- /.col-md -->
                                <div class="col-md-1"></div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                    {{-- <div class="card-footer clearfix">
                        tes
                    </div> --}}
                </div>
                <!-- /.card -->
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
@endsection

@section('scripts')
<script>
    
        $(document).ready(function () {
            $('.logo').dropify({
                messages: {
                    'default': '',
                    'replace': 'Drag and drop or click to replace',
                    'remove':  'Remove',
                    'error':   'Ooops, something wrong happended.'
                }
            });

        });

</script>



@endsection
