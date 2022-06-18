@extends('main.layout')

@section('title', 'Berita PKK | PKK Kab. Indramayu')

@section('container')


<section class="breadcrumbs">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <!-- <h2>Inner Page</h2> -->
        <ol>
          <li><a href="/">Home</a></li>
          <li>Berita PKK</li>
        </ol>
      </div>
      <br><br>
      <div class="content">
        <div class="container">
          <div class="row">

            <div class="col-sm-12 mb-3">
                <div class="swiper-wrapper">
                    @foreach($beritas as $l)

                    <div class="card" style="width: 30rem; margin-right:20px">
                        <div class="card-body">
                            <img src="/gambar/{{$l->gambar}}" width="100%" height="20%" class="img-fluid"><br>
                            <h4 style="font-family: 'Times New Roman', Times, serif">{{$l->nama_berita}}</a></h4>
                            <h4 style="font-family: 'Times New Roman', Times, serif">{{$l->penulis}} - {{ \Carbon\Carbon::parse($l->tgl_publish)->isoFormat('D MMMM Y') }}</h4>
                            <h4 style="font-family: 'Times New Roman', Times, serif;overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">{{$l->desk}}</h4>
                            <a href="{{ url('berita/'.$l->id) }}" class="card-link">Baca Selengkapnya</a>
                        </div>
                      </div>
                  {{-- <div class="swiper-slide">

                    <div class="testimonial-item">

                      <img src="/gambar/{{$l->gambar}}" width="300px" class="img-fluid">
                      <h1><a href="/berita">{{$l->nama_berita}}</a></h1>
                      <h4>{{$l->penulis}} - {{ \Carbon\Carbon::parse($l->tgl_publish)->isoFormat('D MMMM Y') }}</h4>
                    </div>

                  </div> --}}
                  <!-- End testimonial item -->



                  @endforeach

                </div>



            </div>
            <!-- /.col-md-6 -->

            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

    </div>
  </section>

@endsection
