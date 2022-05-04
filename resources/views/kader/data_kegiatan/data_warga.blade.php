@extends('kader.layout')

@section('title', 'Data Warga TP PKK | Kader Desa PKK Kab. Indramayu')

@section('bread', 'Data Warga TP PKK')
@section('container')

    <!-- Main content -->
<div class="main-content">
    <section class="section">

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered data" id="add-row">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <a href="{{ url('data_warga/create') }}" type="button" class="btn btn-success">Tambah</a><br><br>
                                        </div>

                                    </div>

                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Dasa Wisma</th>
                                            <th>Nama Kepala Rumah Tangga</th>
                                            <th>No. Registrasi</th>
                                            <th>No. KTP/NIK</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Periode</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no=1;?>

                                        @foreach ($warga as $c)
                                    <tr>
                                        <td style="vertical-align: middle;">{{ $no }}</td>
                                        {{-- nama desa yang login --}}
                                        <td style="vertical-align: middle;">{{ucfirst($c->dasa_wisma) }}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->nama_kepala_rumah_tangga)}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->no_registrasi)}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->no_ktp)}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->nama)}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->jabatan)}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->jenis_kelamin)}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->periode)}}</td>

                                        <td class="text-center">

                                            {{-- <a class="btn btn-info btn-sm" href="{{ url('data_warga/'.$c->id) }}">Show</a> --}}

                                            {{-- <a class="btn btn-info btn-sm" href="{{ route('data_warga.show',$c->id) }}">Show</a> --}}
                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#details-modal-{{ $c->id }}">
                                                Detail
                                              </button>

                                            <a class="btn btn-primary btn-sm" href="{{ url('data_warga/'.$c->id.'/edit') }}">Edit</a>

                                            <form action="{{ route('data_warga.destroy',$c->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm delete">Delete</button>
                                            </form>
                                        </td>

                                    </tr>

                                    <?php $no++ ;?>
                                    @endforeach

                                    </tbody>
                                </table>

                                @foreach ($warga as $c)
                                    <div id="details-modal-{{ $c->id }}" class="modal fade" tabindex="1" role="dialog" aria-labelledby="details-modal-{{ $c->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Details</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                </div>
                                                        <div class="modal-body">
                                                        <h5>
                                                                Dasa Wisma : <strong> {{ucfirst($c->dasa_wisma) }} </strong><br>
                                                            Nama Kepala Rumah Tangga : <strong>{{ucfirst($c->nama_kepala_rumah_tangga) }}</strong><br>
                                                            No. Registrasi : <strong> {{ucfirst($c->no_registrasi) }} </strong><br>
                                                            No. KTP/NIK : <strong>{{ucfirst($c->no_ktp) }}</strong><br>
                                                            Nama : <strong> {{ucfirst($c->nama) }} </strong><br>
                                                            Jabatan : <strong>{{ucfirst($c->jabatan) }}</strong><br>
                                                            Jenis Kelamin : <strong> {{ucfirst($c->jenis_kelamin) }} </strong><br>
                                                            Tempat Lahir : <strong> {{ucfirst($c->tempat_lahir) }} </strong><br>
                                                            Tanggal Lahir : <strong>{{ \Carbon\Carbon::parse($c->tgl_lahir)->isoFormat('D MMMM Y') }}/{{ucfirst($c->umur) }} Tahun</strong><br>
                                                            Status Perkawinan : <strong> {{ucfirst($c->status_perkawinan) }}</strong><br>
                                                            Status dalam Keluarga : <strong> {{ucfirst($c->status_keluarga) }} ({{ ucfirst($c->status) }})</strong><br>
                                                            Agama : <strong> {{ucfirst($c->agama) }} </strong><br>
                                                            Alamat : <strong> {{ucfirst($c->alamat) }},RT {{ ($c->rt) }}, RW {{ ($c->rt) }},Desa {{ucfirst($c->desa->nama_desa)}}, Kec. {{ucfirst($c->kecamatan->nama_kecamatan)}}
                                                                Kabupaten {{ucfirst($c->kota) }}, Provinsi {{ucfirst($c->provinsi) }}
                                                            </strong><br>
                                                              Pendidikan : <strong> {{ucfirst($c->pendidikan) }} </strong><br>
                                                              Pekerjaan : <strong> {{ucfirst($c->pekerjaan) }} </strong><br>
                                                              Akseptor KB : <strong> {{ucfirst($c->akseptor_kb) }} </strong><br>
                                                              Aktif dalam Kegiatan Posyandu : <strong> {{ucfirst($c->aktif_posyandu) }} </strong><br>
                                                              Mengikuti Program Bina Keluarga Balita : <strong> {{ucfirst($c->ikut_bkb) }} </strong><br>
                                                              Memiliki Tabungan : <strong> {{ucfirst($c->memiliki_tabungan) }} </strong><br>
                                                              Mengikuti Kelompok Belajar Jenis : <strong> {{ucfirst($c->ikut_kelompok_belajar) }} </strong><br>
                                                              Mengikuti PAUD/Sejenis : <strong> {{ucfirst($c->ikut_paud_sejenis) }} </strong><br>
                                                              Ikut dalam Kegiatan Koperasi : <strong> {{ucfirst($c->ikut_koperasi) }} </strong><br>
                                                            </h5>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Oke</button>
                                                            {{-- <button type="button" class="btn btn-primary">Oke</button> --}}
                                                        </div>

                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

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