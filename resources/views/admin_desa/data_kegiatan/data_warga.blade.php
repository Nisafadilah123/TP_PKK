@extends('admin_desa.layout')

@section('title', 'Data Warga TP PKK | Admin Desa PKK Kab. Indramayu')

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
                                        {{-- <div class="col-md-1">
                                            <!-- Tombol yang memicu modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalSaya">
                                                Klik Info
                                            </button><br><br>
                                        </div> --}}
                                    </div>

                                        <!-- Contoh Modal -->
                                        <div class="modal fade" id="modalSaya" tabindex="-1" role="dialog" aria-labelledby="modalSayaLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalSayaLabel">Info Kategori Kegiatan POKJA II</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h6 style="font-colour:red">* KF (KF Bela)</h6>
                                                        <h6 style="font-colour:red">* BKB (BKB ekerasan Dalam)</h6>
                                                        <h6 style="font-colour:red">* APE (SET) (BKB ekerasan Dalam)</h6>
                                                        <h6 style="font-colour:red">* LP3PKK (LP3PKK kerasan Dalam)</h6>
                                                        <h6 style="font-colour:red">* TP3PKK (TP3PKK ekerasan Dalam)</h6>
                                                        <h6 style="font-colour:red">* Damas PKK (PKK ekerasan Dalam)</h6>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Oke</button>
                                                        {{-- <button type="button" class="btn btn-primary">Oke</button> --}}
                                                    </div>
                                                </div>
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
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Umur</th>
                                            <th>Status Keluarga</th>
                                            <th>Status Perkawinan</th>
                                            <th>Agama</th>
                                            <th>Alamat</th>
                                            <th>Pendidikan</th>
                                            <th>Pekerjaan</th>
                                            <th>Akseptor KB</th>
                                            <th>Aktif Kegiatan Posyandu</th>
                                            <th>Mengikuti Program Bina Keluarga Balita</th>
                                            <th>Memiliki Tabungan</th>
                                            <th>Mengikuti Kelompok Belajar</th>
                                            <th>Mengikuti PAUD/Sejenis</th>
                                            <th>Ikut dalam Kegiatan Koperasi</th>
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
                                        <td style="vertical-align: middle;">{{ucfirst($c->tempat_lahir)}}</td>
                                        <td style="vertical-align: middle;">{{ \Carbon\Carbon::parse($c->tgl_lahir)->isoFormat('D MMMM Y') }}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->umur)}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->status_perkawinan)}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->status_keluarga)}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->agama)}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->alamat)}},Desa {{ucfirst($c->desa->nama_desa)}}, Kecamatan {{ucfirst($c->kecamatan->nama_kecamatan)}}, Provinsi {{ucfirst($c->provinsi)}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->pendidikan)}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->pekerjaan)}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->akseptor_kb)}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->aktif_posyandu)}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->ikut_bkb)}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->memiliki_tabungan)}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->ikut_kelompok_belajar)}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->ikut_paud_sejenis)}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->ikut_koperasi)}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->periode)}}</td>

                                        <td class="text-center">
                                            <form action="{{ route('data_warga.destroy',$c->id) }}" method="POST">

                                            {{-- <a class="btn btn-info btn-sm" href="{{ route('sisw.show',$siswa->id) }}">Show</a> --}}

                                                <a class="btn btn-primary btn-sm" href="{{ url('data_warga/'.$c->id.'/edit') }}">Edit</a>

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
