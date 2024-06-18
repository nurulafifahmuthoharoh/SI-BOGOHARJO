@extends('layouts.master')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lumbung Padi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('lumbungpadi.index') }}">Lumbung Padi</a></li>
                        <li class="breadcrumb-item active">Create Data Peminjam</li>
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
                            
                            <span>Form Tambah Data</span>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" >
                        <form method="POST" action="{{ route('lumbungpadi.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-5 px-3">
                                <div class="form-group">
                                    <label for="no_ktp">Nomor KTP</label>
                                    <input type="number" class="form-control @error('no_ktp') is-invalid @enderror" name="no_ktp" id="no_ktp" value="{{ old('no_ktp') }}"  placeholder="Nomor KTP" autofocus>
                                    @error('no_ktp')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-5 px-3">
                                <div class="form-group">
                                    <label for="nama_peminjam">Nama Peminjam</label>
                                    <input type="text" class="form-control @error('nama_peminjam') is-invalid @enderror" name="nama_peminjam" id="nama_peminjam" value="{{ old('nama_peminjam') }}"  placeholder="Nama Peminjam" autofocus>
                                    @error('nama_peminjam')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" value="{{ old('alamat') }}" placeholder="Alamat" autofocus>
                                        @error('alamat')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="no_telepon">Nomor Telepon</label>
                                        <input type="number" class="form-control @error('no_telepon') is-invalid @enderror" name="no_telepon" id="no_telepon" value="{{ old('no_telepon') }}" placeholder="Nomor Telepon" autofocus>
                                        @error('no_telepon')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>                    
                                <div class="form-group">
                                    <label for="tanggal_pinjam">Tanggal Pinjam</label>
                                    <input type="date" class="form-control @error('tanggal_pinjam') is-invalid @enderror" name="tanggal_pinjam" id="tanggal_pinjam" value="{{ old('tanggal_pinjam') }}">
                                    @error('tanggal_pinjam')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                        
                                <div class="form-group">
                                    <label for="tanggal_kembali">Tanggal Kembali</label>
                                    <input type="date" class="form-control @error('tanggal_kembali') is-invalid @enderror" name="tanggal_kembali" id="tanggal_kembali" value="{{ old('tanggal_kembali') }}">
                                    @error('tanggal_kembali')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                        
                                <div class="form-group">
                                    <label for="total_pinjam">Total Pinjam (kg)</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('total_pinjam') is-invalid @enderror" name="total_pinjam" id="total_pinjam" value="{{ old('total_pinjam') }}"  placeholder="Total Pinjam">
                                        <div class="input-group-append">
                                            <span class="input-group-text">kg</span>
                                        </div>
                                    </div>
                                    @error('total_pinjam')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="denda">Denda</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="number" class="form-control @error('denda') is-invalid @enderror" name="denda" id="denda" value="{{ old('denda') }}"  placeholder="Denda">
                                    </div>
                                    @error('denda')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                        
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                        <option value="">-Pilih Status-</option>
                                        <option value="Belum Lunas" @if(old('status') == 'Belum Lunas') selected @endif>Belum Lunas</option>
                                        <option value="Lunas" @if(old('status') == 'Lunas') selected @endif>Lunas</option>
                                        <option value="Terlambat" @if(old('status') == 'Terlambat') selected @endif>Terlambat</option>
                                    </select>
                                    @error('status')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                        
                                <div class="form-group d-flex justify-content-end">
                                    <a class="btn btn-default" href="{{ route('users.index') }}">Batal</a>
                                    <button type="submit" class="btn btn-primary ml-2">Simpan</button>
                                </div>
                            </div>
                            <!-- /.col-md -->
                            <div class="col-md-1"></div>
                        </div>
                        <div class="row">
                            <div class="col-12"></div>
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
            $('#kategori_id').select2()

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
