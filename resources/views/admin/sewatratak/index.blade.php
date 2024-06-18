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
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Sewa Tratak</li>
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
                            <a href="{{ route('sewatratak.create') }}" class="btn btn-primary">
                                <i class="fas fa-user-plus    "></i>
                                Tambah Data
                            </a>
                            <div class="">
                                <a href="" class="btn btn-default btn-flat " data-toggle="modal" data-target="#importModal" title="Import File">
                                    <i class="fas fa-file-import    "></i>
                                </a>
                                <a href="{{ route('admin.sewatratak.pdf') }}" target="blank" class="btn btn-default btn-flat" title="Cetak PDF">
                                    <i class="fas fa-file-pdf    "></i>
                                </a>
                                <a href="{{ route('admin.sewatratak.export') }}" class="btn btn-default btn-flat" title="Export Excel">
                                    <i class="fas fa-file-excel    "></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        
                        <form action="{{ route('sewatratak.index') }}" method="GET">
                            {{-- @csrf --}}
                            <div class="input-group input-group mb-3 float-right" style="width: 250px;">
                                <input type="text" name="keyword" class="form-control float-right"
                                placeholder="Search" value="{{request()->query('keyword')}}">
    
                                
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                                <div class="input-group-append">
                                    <a href="{{ route('sewatratak.index') }}" title="Refresh" class="btn btn-default"><i class="fas fa-circle-notch    "></i></a>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-head-fixed text-nowrap table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Tanggal Sewa</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Total Tenda</th>
                                        <th>Total Kursi</th>
                                        <th>Pembayaran</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($sewatratak as $row)
                                    <tr class="clickable-row" data-id="{{ $row->id }}">
                                      
                                            <td style="width: 50px" class="text-center">{{ $loop->iteration + $sewatratak->firstItem() - 1 }}</td>
                                            <td>
                                                <a href="{{ route('sewatratak.show', $row->id) }}" style="color: black;">
                                                    {{ $row->nama }}
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('sewatratak.show', $row->id) }}" style="color: black;">
                                                    {{ $row->tanggal_sewa }}
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('sewatratak.show', $row->id) }}" style="color: black;">
                                                    {{ $row->tanggal_kembali }}
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('sewatratak.show', $row->id) }}" style="color: black;">
                                                    {{ $row->total_tenda }}
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('sewatratak.show', $row->id) }}" style="color: black;">
                                                    {{ $row->total_kursi }}
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('sewatratak.show', $row->id) }}" style="color: black;">
                                                    Rp. {{ number_format($row->pembayaran) }}
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('sewatratak.show', $row->id) }}" style="color: black;">
                                                    @if ($row->status == 'Lunas')
                                                    <div class="badge badge-success">Lunas</div>
                                                @elseif ($row->status == 'Terlambat')
                                                    <div class="badge badge-danger">Terlambat</div>
                                                @else
                                                    <div class="badge badge-warning">Belum Lunas</div>
                                                @endif    
                                                </a>
                                            </td>         
                                            <td style="width: 10px">
                                 
                                                <a href="{{ route('sewatratak.edit', $row->id) }}" class="btn btn-success">
                                                    <i class="fas fa-edit fa-sm"></i>
                                                </a>
                                                <a href="#" onclick="handleDelete({{ $row->id }})" class="btn btn-danger">
                                                    <i class="fas fa-trash fa-sm"></i>
                                                </a>
                                                <a href="{{ route('sewatratak.show', $row->id) }}" class="btn btn-primary">
                                                    <i class="fas fa-eye fa-sm"></i>
                                                </a>
                                    
                                        </td>                                   
                                                </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Data Tidak Ada</td>
                                        </tr>
                                    @endforelse
    
                                </tbody>
                            </table>
                            {{ $sewatratak->appends(['keyword' => request()->query('keyword')])->links() }}
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <span class="text-sm float-right">Total Entries : {{$sewatratak->total()}}</span>
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
                <h5 class="modal-title" id="deleteModalLabel">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="mt-3">Apakah kamu yakin menghapus Data?</p>
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
                <h5 class="modal-title" id="deleteModalLabel">Import Data </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.sewatratak.import')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="import_sewatratak">Import File</label>
                      <input type="file" class="form-control-file" name="import_sewatratak" id="import_sewatratak" placeholder="" aria-describedby="fileHelpId" required>
                      <small id="fileHelpId" class="form-text text-muted">Tipe file : xls, xlsx</small>
                      <small id="fileHelpId" class="form-text text-muted">Pastikan file upload sesuai format. <br> <a href="{{ url('template/produk_template.xlsx') }}">Download contoh format file xlsx <i class="fas fa-download ml-1   "></i></a></small>
                    </div>
            </div>
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
<script>
    function handleDelete(id) {
        let form = document.getElementById('deleteForm')
        form.action = `./sewatratak/${id}`
        console.log(form)
        $('#deleteModal').modal('show')
    }

</script>

@error('import_sewatratak')
    {{-- <div class="text-danger small mt-1">{{ $message }}</div> --}}
    <script>
        $(document).ready(function () {
            toastr["error"]('{{ $message }}')
        });
    </script>
@enderror

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
