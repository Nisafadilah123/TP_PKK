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

            <div class="col-sm-4 mb-3">
                <div class="card-deck">
                    @foreach($beritas as $l)

              <div class="card" style="margin: 15px">

                <div class="card-body">
                  <h5 class="card-title">
                      <img src="/gambar/{{$l->gambar}}" width="300px" class="img-fluid">
                  </h5>
                {{-- mengarah ke halaman berita sesuai id --}}
                  <h1><a href="/berita">{{$l->nama_berita}}</a></h1>
                  <h4>{{$l->penulis}} - {{ \Carbon\Carbon::parse($l->tgl_publish)->isoFormat('D MMMM Y') }}</h4>

                  <p class="card-text">
                    {{$l->desk}}
                  </p>

                  <a href="#" class="card-link">Card link</a>
                  <a href="#" class="card-link">Another link</a>
                </div>
              </div>
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
