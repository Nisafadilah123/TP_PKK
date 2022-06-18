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
                <h4>TENTANG PEMBERDAYAAN & KESEJAHTERAAN KELUARGA (PKK) KAB. INDRAMAYU</h4>
          <!-- <h2>We are team of talented designers</h2> -->
            </div>
        </div>
        <div class="text-center">
            <a href="/about" class="btn-get-started scrollto">Baca Selengkapnya</a>
        </div>

        <div class="row icon-boxes"></div>
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

                    <div class="card" style="width: 28rem; margin-right:20px">
                        <div class="card-body">
                            <img src="/gambar/{{$l->gambar}}" width="100%" height="20%" class="img-fluid"><br>
                            <h4 style="font-family: 'Times New Roman', Times, serif">{{$l->nama_berita}}</a></h4>
                            <h4 style="font-family: 'Times New Roman', Times, serif">{{$l->penulis}} - {{ \Carbon\Carbon::parse($l->tgl_publish)->isoFormat('D MMMM Y') }}</h4>
                            <h4 style="font-family: 'Times New Roman', Times, serif;overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">{{$l->desk}}</h4>
                            <a href="{{ url('berita/'.$l->id) }}" class="card-link">Baca Selengkapnya</a>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>
</section><!-- End Testimonials Section -->

</main>
  <!-- End #main -->

@endsection
