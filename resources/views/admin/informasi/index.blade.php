@extends('layouts.master')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Berita</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Berita</li>
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
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('informasi.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus-circle    "></i>
                                Tambah Postingan
                            </a>
                            
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <form action="{{ route('informasi.index') }}" method="GET" id="searchForm">
                        <div class="input-group mb-3 float-right" style="width: 250px;">
                            <input type="text" name="keyword" id="keyword" class="form-control float-right" placeholder="Search" value="{{ request()->query('keyword') }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                <a href="{{ route('informasi.index') }}" title="Refresh" class="btn btn-default"><i class="fas fa-circle-notch"></i></a>
                            </div>
                        </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-head-fixed text-nowrap table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th style="width: 5%">No</th>
                                        <th style="width: 15%">Foto</th>
                                        <th style="width: 25%">Judul</th>
                                        <th style="width: 15%">Tanggal Publish</th>
                                        <th style="width: 5%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($informasi as $row)
                                        <tr>
                                            
                                            <td style="width: 5%" class="text-center">{{ $loop->iteration + $informasi->firstItem() - 1 }}</td>
                                            <td style="width: 15%" class="text-center">
                                                <a href="{{asset('/img/gambar').'/'.$row->foto}}" data-fancybox data-caption="{{ $row->judul}}">
                                                    <img width="64px" height="64px" src="{{asset('/img/gambar').'/'. $row->foto}}" alt="">
                                                </a>
                                            </td>
                                            <td style="width: 25%">
                                                <a href="{{ route('informasi.show', $row->id) }}" style="color: black;">
                                                    {{ strlen($row->judul) > 30 ? substr($row->judul, 0, 30).'...' : $row->judul }}
                                                </a>
                                            </td>
                                           
                                            <td style="width: 15%" class="text-center">
                                                <a href="{{ route('informasi.show', $row->id) }}" style="color: black;">
                                                    {{$row->tanggal_publish}}</td>

                                                    <td style="width: 10px">
                                 
                                                        <a href="{{ route('informasi.edit', $row->id) }}" class="btn btn-success">
                                                            <i class="fas fa-edit fa-sm"></i>
                                                        </a>
                                                        <a href="#" onclick="handleDelete({{ $row->id }})" class="btn btn-danger">
                                                            <i class="fas fa-trash fa-sm"></i>
                                                        </a>
                                                        <a href="{{ route('informasi.show', $row->id) }}" class="btn btn-primary">
                                                            <i class="fas fa-eye fa-sm"></i>
                                                        </a>
                                            
                                                </td>       
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Data Tidak Ada</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $informasi->appends(['keyword' => request()->query('keyword')])->links() }}
                        </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <span class="text-sm float-right">Total Entries : {{$informasi->total()}}</span>
                        </div>
                        </div>
                        
                <!-- /.card -->
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>

<!-- Modal Delete-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Hapus Berita </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="mt-3">Apakah kamu yakin menghapus Berita?</p>
            </div>
            <div class="modal-footer">
                <form action="" method="POST" id="deleteForm">
                    @method('DELETE')
                    @csrf
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak, Kembali</button>
                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Import File-->
<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
    
            <div class="modal-footer">
                {{-- <form action="" method="POST" id="deleteForm">
                    @method('DELETE')
                    @csrf --}}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                {{-- </form> --}}
            </div>
        </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')


@section('scripts')

<script>
    
    var delayTimer;
    var keywordInput = document.getElementById('keyword');
    keywordInput.addEventListener('input', function() {
        clearTimeout(delayTimer);
        delayTimer = setTimeout(function() {
            document.getElementById('searchForm').submit(); 
            keywordInput.focus(); 
        },); 
    });
</script>

<script>
    function handleDelete(id) {
        let form = document.getElementById('deleteForm')
        form.action = `./informasi/${id}`
        console.log(form)
        $('#deleteModal').modal('show')
    }

</script>


@if(session()->has('success'))
    <script>
        $(document).ready(function () {
            toastr["success"]('{{ session()->get('success') }}')
        });

    </script>
@endif

@if(session()->has('error'))
    <script>
        $(document).ready(function () {
            toastr["info"]('{{ session()->get('error') }}')
        });

    </script>
@endif

@endsection
