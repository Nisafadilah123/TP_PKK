@extends('main.layout')

@section('title', 'Beranda | PKK Kab. Indramayu')

@section('container')

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div
      class="container position-relative"
      data-aos="fade-up"
      data-aos-delay="100"
    >
      <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-9 text-center">
          <h4>
            TENTANG PEMBERDAYAAN & KESEJAHTERAAN KELUARGA (PKK) KAB. INDRAMAYU
          </h4>
          <!-- <h2>We are team of talented designers</h2> -->
        </div>
      </div>
      <div class="text-center">
        <a href="/about" class="btn-get-started scrollto"
          >Baca Selengkapnya</a
        >
      </div>

      <div class="row icon-boxes">
        <!-- <div
          class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0"
          data-aos="zoom-in"
          data-aos-delay="200"
        >
          <div class="icon-box">
            <div class="icon"><i class="ri-stack-line"></i></div>
            <h4 class="title"><a href="">Lorem Ipsum</a></h4>
            <p class="description">
              Voluptatum deleniti atque corrupti quos dolores et quas
              molestias excepturi
            </p>
          </div>
        </div>
        <div
          class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0"
          data-aos="zoom-in"
          data-aos-delay="300"
        >
          <div class="icon-box">
            <div class="icon"><i class="ri-palette-line"></i></div>
            <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
            <p class="description">
              Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore
            </p>
          </div>
        </div>
        <div
          class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0"
          data-aos="zoom-in"
          data-aos-delay="400"
        >
          <div class="icon-box">
            <div class="icon"><i class="ri-command-line"></i></div>
            <h4 class="title"><a href="">Magni Dolores</a></h4>
            <p class="description">
              Excepteur sint occaecat cupidatat non proident, sunt in culpa
              qui officia
            </p>
          </div>
        </div>
        <div
          class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0"
          data-aos="zoom-in"
          data-aos-delay="500"
        >
          <div class="icon-box">
            <div class="icon"><i class="ri-fingerprint-line"></i></div>
            <h4 class="title"><a href="">Nemo Enim</a></h4>
            <p class="description">
              At vero eos et accusamus et iusto odio dignissimos ducimus qui
              blanditiis
            </p>
          </div>
        </div> -->
      </div>
    </div>
  </section>
  <!-- End Hero -->

  <main id="main">

    <!-- ======= About Video Section ======= -->
    <section id="about-video" class="about-video">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div
            class="col-lg-6 video-box align-self-baseline"
            data-aos="fade-right"
            data-aos-delay="100"
          >
            <img src="/image/6.jpg" class="img-fluid" alt="" />
            {{-- <a
              href="https://www.youtube.com/watch?v=jDDaplaOz7Q"
              class="glightbox play-btn mb-4"
              data-vbtype="video"
              data-autoplay="true"
            ></a> --}}
          </div>

          <div
            class="col-lg-6 pt-3 pt-lg-0 content"
            data-aos="fade-left"
            data-aos-delay="100"
          >
            <h3>Tim Penggerak PKK Kabupaten Indramayu</h3>

            <p>
              Keluarga sebagai unit terkecil dalam masyarakat  mempunyai  peranan yang besar dalam proses pembangunan, karena kondisi suatu keluarga dapat dijadikan sebagai tolok ukur terhadap kesejahteraan masyarakat pada umumnya. Untuk dapat membina keluarga secara langsung dan menjangkau sasaran sebanyak mungkin, dibentuk Gerakan Pemberdayaan dan Kesejahteraan Keluarga (PKK), yang mekanisme gerakannya dikelola dan dilaksanakan oleh Tim Penggerak PKK di setiap jenjang.
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- End About Video Section -->

<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
          {{-- berita terbaru --}}
        <h2>Berita PKK</h2>
      </div>

      <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">
            @foreach($berita as $l)

          <div class="swiper-slide">

            <div class="testimonial-item">

              <img src="/gambar/{{$l->gambar}}" width="300px" class="img-fluid">
              {{-- mengarah ke halaman berita sesuai id --}}
              <h1><a href="/berita">{{$l->nama_berita}}</a></h1>
              <h4>{{$l->penulis}} - {{ \Carbon\Carbon::parse($l->tgl_publish)->isoFormat('D MMMM Y') }}</h4>
            </div>

          </div><!-- End testimonial item -->



          @endforeach

        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section><!-- End Testimonials Section -->


    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
            {{-- galeri terbaru --}}
          <h2>Galeri</h2>
        </div>

        <div class="row">
          @foreach($berita as $l)
          <div
            class="col-lg-3 col-md-6 d-flex align-items-stretch"
            data-aos="fade-up"
            data-aos-delay="100"
          >
            <div class="member">
              <div class="member-img">
                <img
                  src="/gambar/{{$l->gambar}}"
                  class="img-fluid"
                  alt=""
                />
                {{-- <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div> --}}
              </div>
              {{-- <div class="member-info">
                <h4>Walter White</h4>
                <span>Chief Executive Officer</span>
              </div> --}}
            </div>
          </div>

          {{-- <div
            class="col-lg-3 col-md-6 d-flex align-items-stretch"
            data-aos="fade-up"
            data-aos-delay="200"
          >
            <div class="member">
              <div class="member-img">
                <img
                  src="assets/img/team/team-2.jpg"
                  class="img-fluid"
                  alt=""
                />
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Sarah Jhonson</h4>
                <span>Product Manager</span>
              </div>
            </div>
          </div>
          <div
            class="col-lg-3 col-md-6 d-flex align-items-stretch"
            data-aos="fade-up"
            data-aos-delay="300"
          >
            <div class="member">
              <div class="member-img">
                <img
                  src="assets/img/team/team-3.jpg"
                  class="img-fluid"
                  alt=""
                />
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>CTO</span>
              </div>
            </div>
          </div>
          <div
            class="col-lg-3 col-md-6 d-flex align-items-stretch"
            data-aos="fade-up"
            data-aos-delay="400"
          >
            <div class="member">
              <div class="member-img">
                <img
                  src="assets/img/team/team-4.jpg"
                  class="img-fluid"
                  alt=""
                />
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Amanda Jepson</h4>
                <span>Accountant</span>
              </div>
            </div>
          </div> --}}

            @endforeach

        </div>
        <br />
        {{-- <h4>Informasi:</h4>
        <br />
        <button type="button" class="btn btn-outline-primary">Berita</button>
        <button type="button" class="btn btn-outline-primary">
          Agenda PKK
        </button> --}}
      </div>
    </section>
      </main>
  <!-- End #main -->

  @endsection
