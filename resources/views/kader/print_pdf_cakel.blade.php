
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Print PDF Catatan Keluarga TP PKK | Kader Desa/Kelurahan PKK Kab. Indramayu</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('admin/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<style>
    div {
    -webkit-column-width: 200px;
    -moz-column-width: 200px;
    column-width: 200px;
  }
</style>

<body>
<div class="wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    <center><h5><strong> Catatan Keluarga </strong></h5></center>
                        <div class="card-body">
                            <div>
                                <h6>Catatan Keluarga dari: {{ ucfirst($kepala_keluarga->nama) }}</h6>
                                <h6>Anggota Kelompok Dasawisma : {{ ucfirst($kepala_keluarga->dasa_wisma) }}</h6>
                                <h6>Tahun : {{ ucfirst($kepala_keluarga->periode) }}</h6>
                                <h6 style="float: right;top-margin:10px">Kriteria Rumah : {{ ucfirst($keluarga->kriteria_rumah) }}</h6>
                                <h6>Jamban Keluarga : {{ ucfirst($keluarga->punya_jamban) }}</h6>
                                <h6 style="text-align: right"></h6>
                                <h6 style="text-align: right">Sumber Air : {{ ucfirst($keluarga->sumber_air) }}</h6>
                                <h6 style="text-align: right">Tempat Sampah : {{ ucfirst($keluarga->punya_tempat_sampah) }}</h5>
                            </div>
                        </div>

                  </div>
              </div>
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- Table row -->
              <div class="row">

                <div class="table-responsive">
                    <table border="1" cellspacing="0">
                        <thead>
                            <tr>
                                <th rowspan="2" style="font-size: 12px">No</th>
                                <th rowspan="2" style="font-size: 12px">Nama Anggota Keluarga</th>
                                <th rowspan="2" style="font-size: 12px">Status Perkawinan</th>
                                <th rowspan="2" style="font-size: 12px">Jenis Kelamin</th>
                                <th rowspan="2" style="font-size: 12px">Tempat Lahir</th>
                                <th rowspan="2" style="font-size: 12px">Agama</th>
                                <th rowspan="2" style="font-size: 12px">Pendidikan</th>
                                <th rowspan="2" style="font-size: 12px">Pekerjaan</th>
                                <th rowspan="2" style="font-size: 12px">Berkebutuhan Khusus</th>
                                <th colspan="8"><center>Kegiatan Yang diikuti</center></th>
                                {{-- <th rowspan="2" style="font-size: 12px">Ket</th> --}}

                            </tr>
                            <tr>
                                {{-- <th>Penghayatan Dan Pengamalan Pancasilal</th>
                                <th>Gotong Royong</th>
                                <th>Pendidikan dan Keterampilan</th>
                                <th>Pengembangan Kehidupan Berkoperasi</th>
                                <th>Pangan</th>
                                <th>Sandang</th>
                                <th>Kesehatan</th>
                                <th>Perencanaan Sehat</th> --}}
                                @foreach ($kategori_kegiatans as $kategori_kegiatan)
                                    <th style="font-size: 12px">{{ $kategori_kegiatan->nama_kegiatan }}</th>
                                @endforeach
                            </tr>
                        </thead>

                        <tbody>
                            <?php $no=1;?>

                                @foreach ($catatan_keluarga as $data_warga)
                                    <tr>
                                        <td style="vertical-align: middle;">{{ $no }}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($data_warga->nama)}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($data_warga->status)}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($data_warga->status_perkawinan)}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($data_warga->jenis_kelamin)}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($data_warga->tgl_lahir)}}/{{ ucfirst($data_warga->umur) }} Tahun</td>
                                        <td style="vertical-align: middle;">{{ucfirst($data_warga->pendidikan)}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($data_warga->pekerjaan)}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($data_warga->berkebutuhan_khusus)}}</td>

                                        @foreach ($kategori_kegiatans as $kategori_kegiatan)
                                            <td>
                                                @if ($data_kegiatan_wargas = $data_warga->kegiatan)
                                                    <ul>
                                                        @foreach ($data_kegiatan_wargas as $data_kegiatan_warga)
                                                            @if ($data_kegiatan_warga->kategori_kegiatan->id === $kategori_kegiatan->id)
                                                                <li>{{ $data_kegiatan_warga->keterangan_kegiatan->nama_keterangan }}</li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </td>
                                        @endforeach
                                    </tr>
                                    <?php $no++ ;?>

                                @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->


            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>




<!-- jQuery -->
<script src="{{ url('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('admin/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('admin/dist/js/demo.js') }}"></script>
</body>
</html>
