@include('header')

<!-- start banner Area -->
<section class="unit-banner relative">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="about-content col-lg-12">
        <h1 class="text-white">
        Lumbung Padi
        </h1>
        <p class="text-white link-nav">Unit usaha Lumbung Padi kami memberikan solusi unik bagi para petani lokal. Kami menawarkan peminjaman padi sebelum panen, yang memungkinkan petani untuk mengakses padi sebelum masa panen mereka tiba.</p>
      </div>
    </div>
  </div>
</section>
<!-- End banner Area -->


<!-- start Pengajuan Area -->
<section>
  <div class="container py-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-10 col-xl-8 text-center">
        <h2 class="fw-bold mb-4">Formulir Pengajuan Peminjaman Padi</h2>
        <p class="mb-4 pb-2 mb-md-5 pb-md-0">
          Tekan Tombol dibawah ini untuk mengisi formulir pengajuan peminjaman lumbung padi di BUMDes Bohoharjo
        </p>
        <button id="openModalBtn" class="btn btn-lg btn-success text-sm-left">Formulir Pengajuan</button>
      </div>
    </div>
    <div id="myModal" class="modal">
      <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">
            
              <div class="card">
                <div class="card-header" style="background-color: #16A75C;">
                  <h4 class="mb-0 text-white">Formulir Pengajuan Lumbung Padi</h4>
                </div>
                <div class="card-body">
                  <p align="center">Isi data yang dibutuhkan untuk peminjaman lumbung padi</p>    
                  <form method="POST" action="{{ route('user.lumbungpadi.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="no_ktp">Nomor KTP</label>
                          <input type="number" class="form-control @error('no_ktp') is-invalid @enderror" name="no_ktp" id="no_ktp" value="{{ old('no_ktp') }}"  autofocus>
                          @error('no_ktp')
                              <div class="text-danger small mt-1">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="form-group col-md-6">
                          <label for="nama_peminjam">Nama Peminjam</label>
                          <input type="text" class="form-control @error('nama_peminjam') is-invalid @enderror" name="nama_peminjam" id="nama_peminjam" value="{{ old('nama_peminjam') }}"  autofocus>
                          @error('nama_peminjam')
                              <div class="text-danger small mt-1">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="alamat">Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" value="{{ old('alamat') }}"  autofocus>
                              @error('alamat')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                               @enderror
                        </div>
                        <div class="form-group col-md-6">
                          <label for="no_telepon">Nomor Telepon</label>
                          <input type="number" class="form-control @error('no_telepon') is-invalid @enderror" name="no_telepon" id="no_telepon" value="{{ old('no_telepon') }}"  autofocus>
                          @error('no_telepon')
                              <div class="text-danger small mt-1">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="tanggal_pinjam">Tanggal Pinjam</label>
                          <input type="date" class="form-control @error('tanggal_pinjam') is-invalid @enderror" name="tanggal_pinjam" id="tanggal_pinjam" value="{{ old('tanggal_pinjam') }}">
                          @error('tanggal_pinjam')
                              <div class="text-danger small mt-1">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="form-group col-md-6">
                          <label for="tanggal_kembali">Tanggal Kembali</label>
                          <input type="date" class="form-control @error('tanggal_kembali') is-invalid @enderror" name="tanggal_kembali" id="tanggal_kembali" value="{{ old('tanggal_kembali') }}">
                          @error('tanggal_kembali')
                              <div class="text-danger small mt-1">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="total_pinjam">Total Pinjam (kg)</label>
                        <div class="input-group">
                            <input type="text" class="form-control @error('total_pinjam') is-invalid @enderror" name="total_pinjam" id="total_pinjam" value="{{ old('total_pinjam') }}" >
                            <div class="input-group-append">
                                <span class="input-group-text">kg</span>
                            </div>
                        </div>
                        @error('total_pinjam')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group form-check">
                      <input type="checkbox" class="form-check-input" id="persetujuan" name="persetujuan" required>
                      <label class="form-check-label" for="persetujuan">Dengan ini saya menyetujui untuk menggunakan layanan persewaan padi dari BUMDes Bogoharjo, dan saya bertanggung jawab sepenuhnya atas penggunaan padi yang saya pinjam.</label>
                      @error('persetujuan')
                          <div class="text-danger small mt-1">{{ $message }}</div>
                      @enderror
                  </div>
                  <div class="d-grid gap-2 d-md-flex justify-content-md-between">
                    <button type="button" class="btn btn-secondary" onclick="closeModal()">Cancel</button>
                    <button type="submit" class="btn btn-success">Ajukan</button>
                  </div>
              </form>
          </div>
      </div>
  </div>  
        <!--End Modal -->
  </div>
</section>
<!-- End Pengajuan Area -->

<!-- Start Informasi Area -->
<section id="informasi" style="background-color: #F6FAF7;" class="section-gap">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="menu-content pb-10 col-lg-8">
        <div class="title text-center">
          <h1 class="mb-0">Informasi Lumbung Padi</h1>
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
  <div class="container py-3">
    <div class="row d-flex justify-content-center">
      <div class="col-md-10 col-xl-8 text-center">
        <h2 class="fw-bold mb-2">Apa Yang Dirasakan Masyarakat ?</h2>
        <p class="mb-2 ">
          "Menelusuri Pengalaman: Bagaimana Layanan Lumbung Dirasakan oleh Masyarakat"
        </p>
      </div>
    </div>
    <div class="row text-center">
      <div class="col-md-4 mb-2 mb-md-0">
        <div class="card shadow" style="border-radius: .3rem;">
          <div class="card-body py-4 mt-2">
            <div class="d-flex justify-content-center mb-4">
              <img src="img/gambar/alfiyah.jpeg" class="rounded-circle shadow-5-strong" width="100" height="100" />
            </div>
            <h5 class="font-weight-bold">Alfiyah</h5>
             <h6 class="font-weight-bold my-2">Warga Bogoharjo</h6>
             <ul class="list-unstyled d-flex justify-content-center">
              <li><i class="bi bi-star-fill text-info"></i></li>
              <li><i class="bi bi-star-fill text-info"></i></li>
              <li><i class="bi bi-star-fill text-info"></i></li>
              <li><i class="bi bi-star-fill text-info"></i></li>
              <li><i class="bi bi-star-half text-info"></i></li>
            </ul>
            <p class="mb-2">
              <i class="fas fa-quote-left pe-2"></i>Saya sangat bersyukur dengan adanya Lumbung Padi. Ini telah memberikan manfaat besar bagi kami di Desa Bogoharjo. Ketersediaan pangan menjadi lebih terjamin dan stabilitas ekonomi di tingkat lokal meningkat. Terima kasih Lumbung Padi! <i class="fas fa-quote-right pe-2"></i>
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4 mb-md-0">
        <div class="card shadow">
          <div class="card-body py-4 mt-2">
            <div class="d-flex justify-content-center mb-4">
              <img src="img/gambar/mutanakim.jpeg" class="rounded-circle shadow-1-strong" width="100" height="100" />
            </div>
            <h5 class="font-weight-bold">Mutanakim</h5>
            <h6 class="font-weight-bold my-3">Warga Bogoharjo</h6>
            <ul class="list-unstyled d-flex justify-content-center">
              <li><i class="bi bi-star-fill text-info"></i></li>
              <li><i class="bi bi-star-fill text-info"></i></li>
              <li><i class="bi bi-star-fill text-info"></i></li>
              <li><i class="bi bi-star-fill text-info"></i></li>
              <li><i class="bi bi-star-half text-info"></i></li>
            </ul>
            <p class="mb-2">
              <i class="fas fa-quote-left pe-2"></i>Lumbung Padi telah memberikan perubahan positif yang signifikan bagi kami . Ketersediaan pangan menjadi lebih stabil dan kami merasa lebih aman. Terima kasih Lumbung Padi atas kontribusinya yang luar biasa!  <i class="fas fa-quote-right pe-2"></i> </p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-0">
        <div class="card shadow">
          <div class="card-body py-4 mt-2">
            <div class="d-flex justify-content-center mb-4">
              <img src="img/gambar/jasri.jpeg" class="rounded-circle shadow-1-strong" width="100" height="100" />
            </div>
            <h5 class="font-weight-bold">Jasri</h5>
            <h6 class="font-weight-bold my-3">Warga Bogoharjo</h6>
            <ul class="list-unstyled d-flex justify-content-center">
              <li><i class="bi bi-star-fill text-info"></i></li>
              <li><i class="bi bi-star-fill text-info"></i></li>
              <li><i class="bi bi-star-fill text-info"></i></li>
              <li><i class="bi bi-star-fill text-info"></i></li>
              <li><i class="bi bi-star-half text-info"></i></li>
            </ul>
            <p class="mb-2">
              <i class="fas fa-quote-left pe-2"></i>Saya sangat bersyukur dengan adanya Lumbung Padi di Desa Bogoharjo. Ini telah memberikan kepastian dalam ketersediaan pangan dan meningkatkan kesejahteraan kami secara signifikan.Terima kasih Lumbung Padi! <i class="fas fa-quote-right pe-2"></i>
            </p>
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





<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
  function closeModal() {
      // Temukan modal dengan ID atau kelas yang sesuai
      var modal = document.getElementById('myModal'); // Ganti 'myModal' dengan ID modal Anda

      // Tutup modal
      modal.style.display = 'none';
  }
</script>
<script>

  
// Show modal when button is clicked
document.getElementById("openModalBtn").addEventListener("click", function() {
  document.getElementById("myModal").style.display = "block";
});

// Close modal when close button is clicked
document.getElementsByClassName("close")[0].addEventListener("click", function() {
  document.getElementById("myModal").style.display = "none";
});

// Close modal when clicking outside of it
window.addEventListener("click", function(event) {
  if (event.target == document.getElementById("myModal")) {
    document.getElementById("myModal").style.display = "none";
  }
});
</script>


@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif

<script>
  $(document).ready(function() {
      // Fungsi untuk menampilkan pop-up notifikasi
      function showNotification(type, message) {
          Swal.fire({
              icon: type,
              title: message,
              showConfirmButton: false,
              timer: 3000, // Durasi notifikasi (ms)
              onClose: function() {
                  // Setelah notifikasi ditutup, tutup modal
                  $('#myModal').modal('hide');
              }
          });
      }
  
      // Menggunakan AJAX untuk mengirim pengajuan form
      $('form').submit(function(e) {
          e.preventDefault(); // Menghentikan submit form agar bisa diproses secara manual dengan AJAX
  
          var form = $(this);
          var url = form.attr('action');
          var method = form.attr('method');
          var formData = form.serialize(); // Mengambil data form
  
          $.ajax({
              type: method,
              url: url,
              data: formData,
              success: function(response) {
                  // Jika pengajuan berhasil terkirim, tampilkan notifikasi
                  showNotification('success', response.success);
                  // Bersihkan form jika perlu
                  form.trigger('reset');
              },
              error: function(xhr, status, error) {
                  // Tampilkan notifikasi error jika diperlukan
                  showNotification('error', 'Terjadi kesalahan. Silakan coba lagi.');
              }
          });
      });
  });
  </script>
  
  
  

@include('footer')