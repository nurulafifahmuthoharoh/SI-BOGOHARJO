@include('header')
<!-- start banner Area -->
<section class="unit-banner relative">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="about-content col-lg-12">
        <h1 class="text-white">
            Kontak Kami
        </h1>
        <p class="text-white link-nav">“Tetap Terhubung dengan Kami! Jangan Ragukan untuk Menghubungi Tim BUMDes Bogoharjo. Kami Siap Mendengarkan dan Membantu Anda dalam Setiap Pertanyaan, Saran, atau Kolaborasi yang Anda Miliki!”</p>
      </div>
    </div>
  </div>
</section>
<!-- End banner Area -->


<section>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12 ">
            <div class="card shadow" >
                <div class="card-body">
                    <h2 class="card-title text-center pb-3" style="color:#20B486;  text-decoration: underline;">Kontak Kami</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Tinggalkan pesan kepada kami</h5>
                            <form action="{{ route('kontak.kirim') }}" method="POST">

                                @csrf
                                <div class="form-group pt-2">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email">
                                </div>
                                <div class="form-group">
                                    <label for="pesan">Pesan / Kesa</label>
                                    <textarea class="form-control" id="pesan" name="pesan" rows="3" placeholder="Tulis Pesan Anda"></textarea>
                                </div>
                                <button type="submit" class="btn btn-success btn-block" >Kirim</button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <p><i class="fas fa-map-marker-alt"></i> BUMDes Bogoharjo<br>Desa Bogoharjo Kaliori - Rembang<br>Jawa Tengah</p>
                            <p><i class="fas fa-envelope"></i> bumdesbogoharjo@gmail.com</p>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.5214465233494!2d111.30463467410345!3d-6.706029265562144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e77259988449895%3A0xaac2e5b689594db9!2sBalai%20Desa%20Bogoharjo!5e0!3m2!1sid!2sid!4v1712420834515!5m2!1sid!2sid" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

@include('footer')