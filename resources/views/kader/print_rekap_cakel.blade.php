
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Print Catatan Keluarga TP PKK | Kader Desa/Kelurahan PKK Kab. Indramayu</title>
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
<body onload="window.print();">
<div class="wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- Table row -->
              <div class="row">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered data" id="add-row">
                        <thead>
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2">Nama Anggota Keluarga</th>
                                <th rowspan="2">Status Perkawinan</th>
                                <th rowspan="2">Jenis Kelamin</th>
                                <th rowspan="2">Tempat Lahir</th>
                                <th rowspan="2">Agama</th>
                                <th rowspan="2">Pendidikan</th>
                                <th rowspan="2">Pekerjaan</th>
                                <th rowspan="2">Berkebutuhan Khusus</th>
                                <th colspan="8"><center>Kegiatan Yang diikuti</center></th>
                                {{-- <th rowspan="2">Ket</th> --}}

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
                                    <th>{{ $kategori_kegiatan->nama_kegiatan }}</th>
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
                                @endforeach
                                <?php $no++ ;?>
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
