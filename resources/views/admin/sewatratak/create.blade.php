@extends('layouts.master')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sewa Tratak</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('lumbungpadi.index') }}">Sewa Tratak</a></li>
                        <li class="breadcrumb-item active">Create Data</li>
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
                            
                            <span>Form Tambah Data</span>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" >
                        <form method="POST" action="{{ route('sewatratak.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-5 px-3">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama') }}" placeholder="Nama" autofocus>
                                    @error('nama')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-5 px-3">
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
                                    <label for="tujuan">Tujuan</label>
                                    <input type="text" class="form-control @error('no_tujuan') is-invalid @enderror" name="no_tujuan" id="no_tujuan" value="{{ old('no_tujuan') }}" placeholder="Tujuan" autofocus>
                                    @error('no_tujuan')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_sewa">Tanggal Sewa</label>
                                    <input type="date" class="form-control @error('tanggal_sewa') is-invalid @enderror" name="tanggal_sewa" id="tanggal_sewa" value="{{ old('tanggal_sewa') }}">
                                    @error('tanggal_sewa')
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
                                    <label for="total_kursi">Total Kursi</label>
                                    <input type="text" class="form-control @error('total_kursi') is-invalid @enderror" name="total_kursi" id="total_kursi" value="{{ old('total_kursi') }}" placeholder="Total Kursi">
                                    @error('total_kursi')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            
                                <div class="form-group">
                                    <label for="total_tenda">Total Tenda</label>
                                    <input type="text" class="form-control @error('total_tenda') is-invalid @enderror" name="total_tenda" id="total_tenda" value="{{ old('total_tenda') }}" placeholder="Total Tenda">
                                    @error('total_tenda')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            
                                <div class="form-group">
                                    <label for="pembayaran">Pembayaran</label>
                                    <input type="text" class="form-control @error('pembayaran') is-invalid @enderror" name="pembayaran" id="pembayaran" value="{{ old('pembayaran') }}" placeholder="Pembayaran">
                                    @error('pembayaran')
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
