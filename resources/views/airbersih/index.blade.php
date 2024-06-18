@include('header')

<!-- start banner Area -->
<section class="unit-banner relative">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="about-content col-lg-12">
        <h1 class="text-white">
        Air Bersih
        </h1>
        <p class="text-white link-nav">Melalui unit usaha Air Bersih kami, kami menyediakan akses mudah dan aman kepada masyarakat untuk mendapatkan air bersih yang berkualitas. Dengan teknologi modern dan proses penyaringan yang canggih, kami memastikan bahwa setiap tetes air yang kami sediakan adalah yang terbaik untuk Anda dan keluarga Anda.
  </div>
</section>
<!-- End banner Area -->


<!-- Start Tagihan Area -->
<section>
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-md-10 col-xl-8 text-center">
        <h2 class="fw-bold mb-4">Cek Tagihan Air Bersih</h2>
        <p class="mb-4 pb-2 mb-md-5 pb-md-0">
          Masukkan nomor ID air bersih Anda, cek, dan bayarkan tagihan Air bersih bulan ini
        </p>
      </div>
      <div class="input-group mb-2" style="border-radius: 50%; max-width: 400px;">
        <input type="number" class="form-control" placeholder="Masukkan ID Pelanggan" id="idPelanggan" aria-label="Cek Tagihan" aria-describedby="button-addon2">
        <div class="input-group-append">
          <button class="btn btn-success" type="button" id="btnSearch">Search</button>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Tagihan Area -->


<!-- Start Informasi Area -->
<section id="informasi" style="background-color: #F6FAF7;" class="section-gap">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="menu-content pb-10 col-lg-8">
        <div class="title text-center">
          <h1 class="mb-0">Informasi Air Bersih</h1>
          </div>
      </div>
      <div class="container overflow-hidden">
        <div class="row gy-4 gy-lg-0">
          @foreach ($informasi as $row)
          <div class="col-12 col-lg-4">
            <article class="news-article border p-4 mb-4" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
              <div class="card-img-top position-relative overflow-hidden">
                <div class="position-absolute top-0 start-0 bg-success text-white p-2">
                  @if (!empty($row->tanggal_publish))
                    <small>{{ $row->tanggal_publish }}</small>
                  @else
                    <small>Tanggal belum ditetapkan</small>
                  @endif
                </div>
                <a href="{{asset('/img/gambar').'/'.$row->foto}}" data-fancybox data-caption="{{ $row->judul}}">
                  <img class="img-fluid bsb-scale bsb-hover-scale-up" loading="lazy" src="{{asset('/img/gambar').'/'. $row->foto}}" alt="Business" width="100%" height="200px">
                </a>
              </div>
              <div class="card-body p-0">
                <h2 class="card-title entry-title h4 mb-3" style="color: black;">
                  <a class="link-dark text-decoration-none" href="{{ route('user.informasi.detail', $row->id) }}">{{ $row->judul }}</a>
              </h2>
              
                
                <p class="card-text entry-summary text-secondary">
                  {{ substr($row->keterangan, 0, 100) }}...
                </p>
                <a href="{{ route('user.informasi.detail', $row->id) }}" class="btn btn-success read-more">Baca Selengkapnya</a>
              </div>
            </article>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End informasi Area -->


<!-- start Testimoni Area -->
<section >
  <div class="container py-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-10 col-xl-8 text-center">
        <h2 class="fw-bold mb-4">Apa Yang Dirasakan Masyarakat ?</h2>
        <p class="mb-4 pb-2 mb-md-5 pb-md-0">
        "Menelusuri Pengalaman: Bagaimana Layanan Air Bersih Dirasakan oleh Masyarakat"
        </p>
      </div>
    </div>
    <div class="row text-center">
      <div class="col-md-4 mb-4 mb-md-0">
        <div class="card shadow" style="border-radius: .3rem;">
          <div class="card-body py-4 mt-2">
            <div class="d-flex justify-content-center mb-4">
              <img src="img/gambar/supriyono.jpeg" class="rounded-circle shadow-5-strong" width="100" height="100" />
            </div>
            <h5 class="font-weight-bold">Supriyono</h5>
             <h6 class="font-weight-bold my-2">Warga Bogoharjo</h6>
            <ul class="list-unstyled d-flex justify-content-center">
              <li>
                <i class="fas fa-star fa-sm text-info"></i>
              </li>
              <li>
                <i class="fas fa-star fa-sm text-info"></i>
              </li>
              <li>
                <i class="fas fa-star fa-sm text-info"></i>
              </li>
              <li>
                <i class="fas fa-star fa-sm text-info"></i>
              </li>
              <li>
                <i class="fas fa-star-half-alt fa-sm text-info"></i>
              </li>
            </ul>
            <p class="mb-2">
              <i class="fas fa-quote-left pe-2"></i>Terima kasih BUMDes Bogoharjo atas air bersih yang andal! Layanan cepat dan kualitas air yang baik membuat kami merasa aman dan nyaman. Kami sangat menghargai kontribusi besar BUMDes Bogoharjo dalam meningkatkan kesejahteraan kami.
              <i class="fas fa-quote-right pe-2"></i></p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4 mb-md-0">
        <div class="card shadow">
          <div class="card-body py-4 mt-2">
            <div class="d-flex justify-content-center mb-4">
              <img src="img/gambar/paini.jpeg" class="rounded-circle shadow-1-strong" width="100" height="100" />
            </div>
            <h5 class="font-weight-bold">Paini</h5>
            <h6 class="font-weight-bold my-3">Warga Bogoharjo</h6>
            <ul class="list-unstyled d-flex justify-content-center">
              <li>
                <i class="fas fa-star fa-sm text-info"></i>
              </li>
              <li>
                <i class="fas fa-star fa-sm text-info"></i>
              </li>
              <li>
                <i class="fas fa-star fa-sm text-info"></i>
              </li>
              <li>
                <i class="fas fa-star fa-sm text-info"></i>
              </li>
              <li>
                <i class="fas fa-star fa-sm text-info"></i>
              </li>
            </ul>
            <p class="mb-2">
              <i class="fas fa-quote-left pe-2"></i>Air bersih dari BUMDes Bogoharjo sangat membantu kami dalam kehidupan sehari-hari. Ketersediaannya yang terjamin dan kualitasnya yang baik membuat kami merasa lebih aman dan nyaman. Terima kasih BUMDes Bogoharjo atas layanan yang luar biasa!
              <i class="fas fa-quote-right pe-2"></i>
            </p></div>
        </div>
      </div>
      <div class="col-md-4 mb-0">
        <div class="card shadow">
          <div class="card-body py-4 mt-2">
            <div class="d-flex justify-content-center mb-4">
              <img src="img/gambar/sitikhoiroh.jpeg" class="rounded-circle shadow-1-strong" width="100" height="100" />
            </div>
            <h5 class="font-weight-bold">Siti Khoiroh</h5>
            <h6 class="font-weight-bold my-3">Warga Bogoharjo</h6>
            <ul class="list-unstyled d-flex justify-content-center">
              <li>
                <i class="fas fa-star fa-sm text-info"></i>
              </li>
              <li>
                <i class="fas fa-star fa-sm text-info"></i>
              </li>
              <li>
                <i class="fas fa-star fa-sm text-info"></i>
              </li>
              <li>
                <i class="fas fa-star fa-sm text-info"></i>
              </li>
              <li>
                <i class="far fa-star fa-sm text-info"></i>
              </li>
            </ul>
            <p class="mb-2">
              <i class="fas fa-quote-left pe-2"></i>Layanan air bersih dari BUMDes Bogoharjo sangatlah mirip dengan air PDAM! Kualitasnya sama baiknya, bahkan lebih baik, dan pengirimannya tepat waktu. Terima kasih atas kontribusi besar yang telah membantu kami menjaga kebersihan dan kesehatan keluarga kami.  <i class="fas fa-quote-right pe-2"></i></p>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- Icon Slider Area -->
<div class="text-center py-2">
  <i class="fas fa-chevron-left fa-2x mx-3 text-primary"></i>
  <i class="fas fa-circle fa-xs mx-1 text-primary"></i>
  <i class="fas fa-circle fa-xs mx-1 text-primary"></i>
  <i class="fas fa-circle fa-xs mx-1 text-primary"></i>
  <i class="fas fa-chevron-right fa-2x mx-3 text-primary"></i>
</div>
</section>
<!-- End Testimoni Area -->


<div class="modal fade" id="tagihanModal" tabindex="-1" aria-labelledby="tagihanModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="overflow-y: auto;">
    <div class="modal-content">
   
      <div class="modal-header">
        <h5 class="modal-title" id="tagihanModalLabel">Detail Tagihan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="tagihanModalBody"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<script>
 document.getElementById('btnSearch').addEventListener('click', async () => {
    const idPelanggan = document.getElementById('idPelanggan').value; // Mengambil nilai dari input ID Pelanggan
  
    try {
        const response = await fetch(`/cek-tagihan?id_pelanggan=${idPelanggan}`); // Menggunakan query parameter id_pelanggan
  
        if (!response.ok) {
            throw new Error('Masukan ID Pelanggan');
        }
      
        const data = await response.json();
  
        const id_pelanggan = data.id_pelanggan;
        if (id_pelanggan) {
            // Tampilkan modal
            $('#tagihanModal').modal('show');
            // Tampilkan informasi tagihan di dalam modal
            document.getElementById('tagihanModalBody').innerHTML = `
                <div class="customer-details">
                    <p>ID Pelanggan: ${data.id_pelanggan}</p>
                    <p>Nama: ${data.nama}</p>
                    <p>Tagihan: ${data.tagihan}</p>
                    <p>Status: ${data.status}</p>
                </div>

                <form id="updateForm" action="{{ route('user.airbersih.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_pelanggan" value="${data.id_pelanggan}">
                    <div class="form-group">
                        <label for="foto">Upload Bukti Pembayaran</label>
                        <input type="file" class="form-control-file" id="foto" name="foto">
                    </div>
                    <button type="submit" class="btn btn-success">Upload Bukti Pembayaran</button>
                </form>

                <!-- Informasi Pembayaran -->
                <div class="payment-info pt-4">
                    <p>Kirim pembayaran tagihan ke rekening:</p>
                    <ul>
                        <li>Mandiri 8765389903837</li>
                        <li>a/n BUMDES BOGOHARJO</li>
                        <li>atau</li>
                        <li>BRI 32783276736736737</li>
                        <li>a/n BUMDES BOGOHARJO</li>
                    </ul>
                    <p><em>*pastikan anda membayar sesuai nominal tagihan</em></p>
                </div>
            `;
        } else {
            throw new Error('Data not found');
        }
    } catch (error) {
        alert('Terjadi kesalahan: ' + error.message);
    }
});

  </script>
  
<script>
// Dapatkan tombol close
var closeButton = document.querySelector('.modal-header .close, .modal-footer .btn-secondary');

// Tambahkan event listener untuk menutup modal ketika tombol close ditekan
closeButton.addEventListener('click', function() {
  // Tutup modal
  $('#tagihanModal').modal('hide');
});

// Initialize the modal with click option set to false
$('#tagihanModal').modal({
  backdrop: 'static',
  keyboard: false
});
</script>

@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


@if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif
  




@include('footer')