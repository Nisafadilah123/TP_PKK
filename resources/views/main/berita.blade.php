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
                    @foreach($berita as $l)

                        <div class="card" style="margin: 15px; width: 1200px">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <img src="/gambar/{{$l->gambar}}" width="1200px" class="img-fluid">
                                </h5>
                                {{-- mengarah ke halaman berita sesuai id --}}
                                <h4 style="font-family: 'Times New Roman', Times, serif">{{$l->nama_berita}}</a></h1>
                                <h4 style="font-family: 'Times New Roman', Times, serif">Oleh: {{$l->penulis}} - {{ \Carbon\Carbon::parse($l->tgl_publish)->isoFormat('D MMMM Y') }}</h4>

                                <p class="card-text" style="font-family: 'Times New Roman', Times, serif">
                                    {{$l->desk}}
                                </p>
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
