
<!-- Main content -->
<section class="content ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card mb-4 mb-10">
                    <div class="card-body" >
                        <h2 class="card-title">{{ $informasi->judul }}</h2>
                        <p class="card-text text-muted">{{ $informasi->tanggal_publish }}</p>
                        <img src="{{ asset('img/gambar/' . $informasi->foto) }}" class="img-fluid mb-4 center" alt="{{ $informasi->judul }}">
                        <p class="card-text" style="text-align:justify">{{ $informasi->keterangan }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->

<!-- CSS -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
