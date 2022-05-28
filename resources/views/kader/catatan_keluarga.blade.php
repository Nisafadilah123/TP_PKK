@extends('kader.layout')

@section('title', 'Catatan Keluarga TP PKK | Kader Desa/Kelurahan PKK Kab. Indramayu')

@section('bread', 'Catatan Keluarga TP PKK')
@section('container')

    <!-- Main content -->
    <div class="main-content">
    <section class="section">

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h5>Catatan Keluarga dari : {{ ucfirst($kepala_keluarga->nama) }}</h5>
                                    <h5>Anggota Kelompok Dasawisma : {{ ucfirst($kepala_keluarga->dasa_wisma) }}</h5>
                                    <h5>Tahun : {{ ucfirst($kepala_keluarga->periode) }}</h5>
                                </div>
                                <div class="col-sm-6">
                                    <h5>Kriteria Rumah : {{ ucfirst($kepala_keluarga->kriteria_rumah) }}</h5>
                                    <h5>Jamban Keluarga : {{ ucfirst($kepala_keluarga->punya_jamban) }}</h5>
                                    <h5>Sumber Air : {{ ucfirst($kepala_keluarga->sumber_air) }}</h5>
                                    <h5>Tempat Sampah : {{ ucfirst($kepala_keluarga->punya_tempat_sampah) }}</h5>
                                </div>

                            </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered data" id="add-row">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2" >No</th>
                                                    <th rowspan="2">Nama Anggota Keluarga</th>
                                                    <th rowspan="2">Status Perkawinan</th>
                                                    <th rowspan="2">Jenis Kelamin</th>
                                                    <th rowspan="2">Tempat Lahir</th>
                                                    <th rowspan="2">Agama</th>
                                                    <th rowspan="2">Pendidikan</th>
                                                    <th rowspan="2">Pekerjaan</th>
                                                    <th rowspan="2">Berkebutuhan Khusus</th>
                                                    <th colspan="8" style="text-align: center">Kegiatan Yang diikuti</th>
                                                    <th rowspan="2">Ket</th>

                                                </tr>
                                                <tr>
                                                    <th>Penghayatan Dan Pengamalan Pancasilal</th>
                                                    <th>Gotong Royong</th>
                                                    <th>Pendidikan dan Keterampilan</th>
                                                    <th>Pengembangan Kehidupan Berkoperasi</th>
                                                    <th>Pangan</th>
                                                    <th>Sandang</th>
                                                    <th>Kesehatan</th>
                                                    <th>Perencanaan Sehat</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php $no=1;?>

                                                    @foreach ($catatan_keluarga as $c)
                                                        <tr>
                                                            <td style="vertical-align: middle;">{{ $no }}</td>
                                                            <td style="vertical-align: middle;">{{ucfirst($c->nama)}}</td>
                                                            <td style="vertical-align: middle;">{{ucfirst($c->status)}}</td>
                                                            <td style="vertical-align: middle;">{{ucfirst($c->status_perkawinan)}}</td>
                                                            <td style="vertical-align: middle;">{{ucfirst($c->jenis_kelamin)}}</td>
                                                            <td style="vertical-align: middle;">{{ucfirst($c->tgl_lahir)}}/{{ ucfirst($c->umur) }} Tahun</td>
                                                            <td style="vertical-align: middle;">{{ucfirst($c->pendidikan)}}</td>
                                                            <td style="vertical-align: middle;">{{ucfirst($c->pekerjaan)}}</td>
                                                            <td style="vertical-align: middle;">{{ucfirst($c->berkebutuhan_khusus)}}</td>
                                                            <td style="vertical-align: middle;">{{ucfirst($c->id_kegiatan)}}</td>
                                                            <td style="vertical-align: middle;">{{ucfirst($c->berkebutuhan_khusus)}}</td>
                                                            <td style="vertical-align: middle;">{{ucfirst($c->berkebutuhan_khusus)}}</td>

                                                            <td style="vertical-align: middle;">
                                                                @if ($c->kegiatan->count() > 0)
                                                                    <ul>
                                                                        @foreach ($c->kegiatan as $kegiatan)
                                                                            <li>{{ucfirst($kegiatan->nama_kegiatan)}}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </td>


                                                        </tr>
                                                        <?php $no++ ;?>

                                                    @endforeach
                                            </tbody>

                                        </table>

                                    </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
    <!-- /.content -->


<!-- page script -->
  @endsection

  @push('script-addon')

<script>
$(document).ready( function () {
    $('.data').DataTable();
} );
</script>

<script>
    $('.delete').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
            title: `Apakah anda yakin ingin menghapus data ini ?`,
              text: "Jika anda menghapusnya maka datanya akan di hapus secara permanen",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });

</script>

@endpush
