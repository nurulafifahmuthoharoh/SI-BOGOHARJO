@include('header')
<!-- start banner Area -->
<section class="unit-banner relative">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="about-content col-lg-12">
        <h1 class="text-white">
            Berita
        </h1>
        <p class="text-white link-nav">"Temukan Berita Terkini yang Menyenangkan dan Bermanfaat untuk Anda: Telusuri Semua Hal Menarik seputar BUMDes Bogoharjo yang Akan Membuat Hari Anda Lebih Seru dan Berwarna!"</p>
      </div>
    </div>
  </div>
</section>
<!-- End banner Area -->

<!-- Start Informasi Area -->
<section id="informasi" style="background-color: #F6FAF7;" class="section-gap">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="menu-content pb-10 col-lg-8">
        <div class="title text-center">
          <h1 class="mb-0">Berita</h1>
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

<style>

  .news-article .card-title a {
    color: black; /* Ubah warna teks menjadi hitam */
  }
  .news-article {
    background-color: #fff; /* Warna putih */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Bayangan kartu */
    border: 1px solid #ddd; /* Garis pinggiran */
}
  .news-article:hover {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  }

  .news-article .card-img-top {
    height: 200px;
    object-fit: cover;
  }

  @media (max-width: 767.98px) {
    .news-article .card-img-top {
      height: 150px;
    }
  }
</style>

<!-- Modal -->
<div class="modal fade" id="search-results-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Search Results</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="search-results-modal-body">
        <!-- Search results will be displayed here -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->


<script>
  document.addEventListener("DOMContentLoaded", function() {
      var searchButton = document.getElementById("search-button");
  
      searchButton.addEventListener("click", function() {
          var searchQuery = document.getElementById("search-input").value.trim();
          var searchResults = [];
          var paragraphs = document.getElementsByTagName("p");
          for (var i = 0; i < paragraphs.length; i++) {
              if (paragraphs[i].textContent.includes(searchQuery)) {
                  searchResults.push(paragraphs[i].textContent);
              }
          }
          var modalBody = document.getElementById("search-results-modal-body");
          modalBody.innerHTML = ""; 
          if (searchResults.length > 0) {
              searchResults.forEach(function(result) {
                  var resultItem = document.createElement("p");
                  resultItem.textContent = result;
                  modalBody.appendChild(resultItem);
              });
          } else {
              var noResultItem = document.createElement("p");
              noResultItem.textContent = "No results found for '" + searchQuery + "'";
              modalBody.appendChild(noResultItem);
          }
          var searchModal = new bootstrap.Modal(document.getElementById('search-results-modal'));
          searchModal.show();
      });
  });
</script>

<script>
  $(document).ready(function() {
    $('.full-description').hide();

    $('.read-more').click(function() {
      $(this).hide();
      $(this).siblings('.full-description').slideDown();
    });
  });
</script>


@include('footer')