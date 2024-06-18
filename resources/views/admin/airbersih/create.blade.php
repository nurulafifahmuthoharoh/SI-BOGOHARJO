@extends('layouts.master')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Air Bersih</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('lumbungpadi.index') }}">Air Bersih</a></li>
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
                            <a href="{{ route('airbersih.index')}}" class="btn">
                                <i class="fas fa-arrow-left text-purple"></i>
                            </a>
                            <span>Form Tambah Data</span>
                        </div>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body" >
                        <form method="POST" action="{{ route('airbersih.store') }}" enctype="multipart/form-data">
                            @csrf
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-5 px-5">
                                <div class="form-group">
                                    <label for="foto">Bukti Pembayaran</label>
                                    <input type="file" class="form-control logo @error('foto') is-invalid @enderror" name="foto" id="foto" value="{{ old('foto') }}" data-default-file="{{ old('foto') }}"  data-height="282">
                                    @error('foto')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>                                
                            </div>
                            <!-- /.col-md -->

                            <div class="col-md-5 px-3">
                                <div class="form-group">
                                    <label for="id_pelanggan">ID Pelanggan</label>
                                        <input type="text" class="form-control @error('id_pelanggan') is-invalid @enderror" name="id_pelanggan" id="id_pelanggan" value="{{ old('id_pelanggan') }}" placeholder="ID Pelanggan" autofocus>
                                        @error('id_pelanggan')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama') }}" placeholder="Nama Pelanggan" autofocus>
                                    @error('nama')
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
                                    <input type="text" class="form-control @error('no_telepon') is-invalid @enderror" name="no_telepon" id="no_telepon" value="{{ old('no_telepon') }}" placeholder="Nomor Telepon" autofocus>
                                    @error('no_telepon')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="batas_pembayaran">Batas Pembayaran</label>
                                    <input type="date" class="form-control @error('batas_pembayaran') is-invalid @enderror" name="batas_pembayaran" id="batas_pembayaran" value="{{ old('batas_pembayaran') }}">
                                    @error('batas_pembayaran')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="total_pemakaian">Jumlah Pemakaian</label>
                                    <input type="number" class="form-control @error('total_pemakaian') is-invalid @enderror" name="total_pemakaian" id="total_pemakaian" value="{{ old('total_pemakaian') }}"  placeholder="Jumlah Pemakaian">
                                    @error('total_pemakaian')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tagihan">Tagihan</label>
                                    <input type="text" class="form-control @error('tagihan') is-invalid @enderror" name="tagihan" id="tagihan" value="{{ old('tagihan') }}"  placeholder="Tagihan">
                                    @error('tagihan')
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
                            <div class="col-12">
                                

                            </div>
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
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });
    });
</script>
@endsection
