@extends('layouts.master')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Berit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('informasi.index') }}">Berita</a></li>
                        <li class="breadcrumb-item active">Edit Berita</li>
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
                            
                            <a href="{{ route('informasi.index')}}" class="btn">
                                <i class="fas fa-arrow-left  text-purple  "></i>
                            </a>
                            
                            <span>Form Edit Berita</span>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" >
                        <form method="POST" action="{{ route('informasi.update', $informasi->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-5 px-5">
                                    <div class="form-group">
                                        <label for="foto">Foto</label>
                                        <input type="file" class="form-control logo @error('foto') is-invalid @enderror" name="foto" id="foto" value="{{ old('foto') }}" data-default-file="{{ asset('/img/gambar/'.$informasi->foto) }}" data-height="282">
                                        @error('foto')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>                                    
                                </div>
                                <!-- /.col-md -->

                                <div class="col-md-5 px-3">
                                    <div class="form-group">
                                        <label for="judul">Judul</label>
                                        <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul" value="{{ $informasi->judul }}" placeholder="judul" autofocus>
                                        @error('judul')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan" rows="3">{{ $informasi->keterangan }}</textarea>
                                        @error('keterangan')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="tanggal_publish">Tanggal Publish</label>
                                        <input type="date" class="form-control @error('tanggal_publish') is-invalid @enderror" name="tanggal_publish" id="tanggal_publish" value="{{ $informasi->tanggal_publish }}">
                                        @error('tanggal_publish')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>                
                                    
                                    
                                <div class="form-group">
                                    <label for="tag">Tag</label>
                                    <input type="string" class="form-control @error('tag') is-invalid @enderror" name="tag" id="tag" value="{{ $informasi->tag }}">
                                    @error('tag')
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
