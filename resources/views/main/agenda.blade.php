@extends('main.layout')

@section('title', 'Agenda Kegiatan PKK | PKK Kab. Indramayu')

<style type="text/css">
	[aria-expanded="false"] > .expanded, [aria-expanded="true"] > .collapsed {
		display: none;
	}
</style>
@section('container')


<section class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
        <!-- <h2>Inner Page</h2> -->
            <ol>
                <li><a href="/">Home</a></li>
                <li>Agenda Kegiatan PKK</li>
            </ol>
        </div>

      <br><br>
        <div class="content">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                      Agenda Kegiatan
                    </div>
                    <div class="card-body">
                      <blockquote class="blockquote mb-0">
                        @foreach ($agenda as $i)
                            <footer class="blockquote-footer">{{$i->judul_agenda}}</footer>
                            <h5 style="font-family: 'Times New Roman', Times, serif"> Tema : {{ $i->tema }}</h5>
                            <h5 style="font-family: 'Times New Roman', Times, serif" id="tgl"> Tanggal : {{\Carbon\Carbon::parse($i->tgl_publish)->isoFormat('D MMMM Y')}}</h5>
                            {{-- <script>
                                // Mengatur waktu akhir perhitungan mundur
                                var countDownDate = new Date('{{$i->tgl_publish}}').getTime();

                                // Memperbarui hitungan mundur setiap 1 detik
                                var x = setInterval(function() {

                                  // Untuk mendapatkan tanggal dan waktu hari ini
                                  var now = new Date().getTime();

                                  // Temukan jarak antara sekarang dan tanggal hitung mundur
                                  var distance = countDownDate - now;

                                  // Perhitungan waktu untuk hari, jam, menit dan detik
                                  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                  // Keluarkan hasil dalam elemen dengan id = "tgl"
                                  document.getElementById("tgl").innerHTML = days + "d " + hours + "h "
                                  + minutes + "m " + seconds + "s ";

                                  // Jika hitungan mundur selesai, tulis beberapa teks
                                  if (distance < 0) {
                                    clearInterval(x);
                                    document.getElementById("tgl").innerHTML = '<b><button class="btn btn-danger" disabled>Sudah Terlaksana</button></b>';
                                  }



                                }, 1000);
                                </script> --}}

                                    <script>
                                        CountDownTimer('{{$i->tgl_publish}}', 'countdown');
                                        function CountDownTimer(dt, id)
                                        {
                                            var end = new Date('{{$i->tgl_publish}}');
                                            var _second = 1000;
                                            var _minute = _second * 60;
                                            var _hour = _minute * 60;
                                            var _day = _hour * 24;
                                            var timer;
                                            var x = setInterval;
                                            function showRemaining() {
                                                var now = new Date();
                                                var distance = end - now;
                                                if (distance < 0) {

                                                    clearInterval(timer);
                                                    document.getElementById("tgl").innerHTML = '<b><button class="btn btn-danger" disabled>Sudah Terlaksana</button></b> ';
                                                    return;
                                                }
                                                else{
                                                    clearInterval(timer);
                                                    document.getElementById("tgl").innerHTML = '<b><button class="btn btn-danger" disabled>Be Terlaksana</button></b> ';
                                                    return;

                                                }
                                                var days = Math.floor(distance / _day);
                                                var hours = Math.floor((distance % _day) / _hour);
                                                var minutes = Math.floor((distance % _hour) / _minute);
                                                var seconds = Math.floor((distance % _minute) / _second);

                                                document.getElementById("tgl").innerHTML = days + 'Hari ';
                                                document.getElementById("tgl").innerHTML += hours + 'Jam ';
                                                // document.getElementById(id).innerHTML += minutes + 'mins ';
                                                // document.getElementById(id).innerHTML += seconds + 'secs';
                                                document.getElementById("tgl").innerHTML +='<h2><button class="btn btn-success" disabled>Belum Terlaksana<span></h2>';
                                            }
                                            timer = setInterval(showRemaining, 1000);
                                        }
                                    </script>
                            <div id="countdown">
                            <h5 style="font-family: 'Times New Roman', Times, serif"> Waktu : {{$i->pukul}}</h5><br>
                        @endforeach

                      </blockquote>
                    </div>
                  </div>
            </div>

        </div><!-- /.container-fluid -->
    </div>

</section>

@endsection

@push('script-addon')



    {{-- <script>
        CountDownTimer('{{$agenda->tgl_publish}}', 'countdown');
        function CountDownTimer(dt, id)
        {
            var end = new Date('{{$agenda->tgl_publish}}');
            var _second = 1000;
            var _minute = _second * 60;
            var _hour = _minute * 60;
            var _day = _hour * 24;
            var timer;
            function showRemaining() {
                var now = new Date();
                var distance = end - now;
                if (distance < 0) {

                    clearInterval(timer);
                    document.getElementById(id).innerHTML = '<b><button class="btn btn-danger" disabled>Sudah Terlaksana</button></b> ';
                }
                var days = Math.floor(distance / _day);
                var hours = Math.floor((distance % _day) / _hour);
                var minutes = Math.floor((distance % _hour) / _minute);
                var seconds = Math.floor((distance % _minute) / _second);

                document.getElementById(id).innerHTML = days + 'Hari ';
                document.getElementById(id).innerHTML += hours + 'Jam ';
                // document.getElementById(id).innerHTML += minutes + 'mins ';
                // document.getElementById(id).innerHTML += seconds + 'secs';
                document.getElementById(id).innerHTML +='<h2><button class="btn btn-success" disabled>Belum Terlaksana<span></h2>';
            }
            timer = setInterval(showRemaining, 1000);
        }
    </script> --}}
@endpush
