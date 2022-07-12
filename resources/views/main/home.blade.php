@extends('main.layout')

@section('title', 'Beranda | PKK Kab. Indramayu')

@section('container')



<main id="main">
    <section id="hero-animated" class="hero-animated d-flex align-items-center">
        <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
          <img src="/image/remove.png" class="img-fluid animated">
          <h4>TENTANG PEMBERDAYAAN & KESEJAHTERAAN KELUARGA (PKK) KAB. INDRAMAYU</h4>
          <p>Et voluptate esse accusantium accusamus natus reiciendis quidem voluptates similique aut.</p>
          <div class="d-flex">
            <a href="/about" class="btn-get-started scrollto">Baca Selengkapnya</a>
          </div>
        </div>
      </section>



    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>About Us</h2>
          <p>Architecto nobis eos vel nam quidem vitae temporibus voluptates qui hic deserunt iusto omnis nam voluptas asperiores sequi tenetur dolores incidunt enim voluptatem magnam cumque fuga.</p>
        </div>

        <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-5">
            <div class="about-img">
              <img src="/image/6.jpg" class="img-fluid" alt="">
            </div>
          </div>

          <div
                    class="col-lg-6 pt-3 pt-lg-0 content"
                    data-aos="fade-left"
                    data-aos-delay="100"
                >
                    <h3>Tim Penggerak PKK Kabupaten Indramayu</h3>

                    <p>Keluarga sebagai unit terkecil dalam masyarakat  mempunyai  peranan yang besar dalam proses pembangunan, karena kondisi suatu keluarga dapat dijadikan sebagai tolok ukur terhadap kesejahteraan masyarakat pada umumnya. Untuk dapat membina keluarga secara langsung dan menjangkau sasaran sebanyak mungkin, dibentuk Gerakan Pemberdayaan dan Kesejahteraan Keluarga (PKK), yang mekanisme gerakannya dikelola dan dilaksanakan oleh Tim Penggerak PKK di setiap jenjang.</p>
                </div>

        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio" data-aos="fade-up">

      <div class="container">

        <div class="section-header">
          <h2>Galeri Kegiatan</h2>
          <p>Non hic nulla eum consequatur maxime ut vero memo vero totam officiis pariatur eos dolorum sed fug dolorem est possimus esse quae repudiandae. Dolorem id enim officiis sunt deserunt esse soluta consequatur quaerat</p>
        </div>

      </div>

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="200">

        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">

          <ul class="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-app">App</li>
            <li data-filter=".filter-product">Product</li>
            <li data-filter=".filter-branding">Branding</li>
            <li data-filter=".filter-books">Books</li>
          </ul><!-- End Portfolio Filters -->

          <div class="row g-0 portfolio-container">
            @foreach ($galeris as $i)

                <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-app">
                <img src="/galeri/{{$i->gambar}}" class="img-fluid" alt="">
                <div class="portfolio-info">
                    <h4>{{$i->nama_gambar}}</h4>
                    <p>{{$i->nama_kegiatan}}</p>
                    <a href="/galeri/{{$i->gambar}}" title="{{$i->nama_kegiatan}}" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                    <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
                </div><!-- End Portfolio Item -->
            @endforeach


          </div><!-- End Portfolio Container -->

        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    {{-- <section id="team" class="team">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Our Team</h2>
          <p>Architecto nobis eos vel nam quidem vitae temporibus voluptates qui hic deserunt iusto omnis nam voluptas asperiores sequi tenetur dolores incidunt enim voluptatem magnam cumque fuga.</p>
        </div>

        <div class="row gy-5">

          <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="200">
            <div class="team-member">
              <div class="member-img">
                <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
              </div>
              <div class="member-info">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
                <h4>Walter White</h4>
                <span>Chief Executive Officer</span>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="400">
            <div class="team-member">
              <div class="member-img">
                <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
              </div>
              <div class="member-info">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
                <h4>Sarah Jhonson</h4>
                <span>Product Manager</span>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="600">
            <div class="team-member">
              <div class="member-img">
                <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
              </div>
              <div class="member-info">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
                <h4>William Anderson</h4>
                <span>CTO</span>
              </div>
            </div>
          </div><!-- End Team Member -->

        </div>

      </div>
    </section><!-- End Team Section --> --}}

    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-blog-posts" class="recent-blog-posts">

      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Berita PKK</h2>
          <p>Recent posts form our Blog</p>
        </div>

        <div class="row">
            @foreach($berita as $l)
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="post-box">
                    <div class="post-img"><img src="/gambar/{{$l->gambar}}" class="img-fluid" alt=""></div>
                    <div class="meta">
                        <span class="post-date">{{ \Carbon\Carbon::parse($l->tgl_publish)->isoFormat('D MMMM Y') }} </span>
                        <span class="post-author"> / {{$l->penulis}}</span>
                    </div>
                    <h3 class="post-title">{{ $l->nama_berita }}</h3>
                    <p style="font-family: 'Times New Roman', Times, serif;overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">{{ $l->desk }}</p>
                    <a href="{{ url('berita/'.$l->id) }}" class="readmore stretched-link"><span>Baca Selengkapnya</span><i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            @endforeach

        </div>

      </div>

    </section><!-- End Recent Blog Posts Section -->



  </main><!-- End #main -->

@endsection
