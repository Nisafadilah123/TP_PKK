@extends('admin_desa.layout')

@section('title', 'Pendidikan dan Keterampilan POKJA II | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Pendidikan dan Keterampilan POKJA II')
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
                                    <a href="{{ url('pendidikan/create') }}" type="button" class="btn btn-success">Tambah</a><br><br>

                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Desa</th>
                                            <th>Jml. Warga Yang Masih 3 Buta</th>
                                            <th>Jml. Paket A Kelompok Belajar</th>
                                            <th>Jml. Paket A Warga Belajar</th>
                                            <th>Jml. Paket B Kelompok Belajar</th>
                                            <th>Jml. Paket B Warga Belajar</th>
                                            <th>Jml. Paket C Kelompok Belajar</th>
                                            <th>Jml. Paket C Warga Belajar</th>
                                            <th>Jml. Paket KF Kelompok Belajar</th>
                                            <th>Jml. Paket KF Warga Belajar</th>
                                            <th>Jml. Paud</th>
                                            <th>Jml. Taman Bacaan/Perpustakaan</th>
                                            <th>Jml. BKB Kelompok Belajar</th>
                                            <th>Jml. BKB Ibu Peserta</th>
                                            <th>Jml. BKB APE (SET)</th>
                                            <th>Jml. BKB Kel. Simulasi</th>
                                            <th>Jml. Kader Khusus KF</th>
                                            <th>Jml. Kader Khusus Paud Sejenis</th>
                                            <th>Jml. Kader Khusus BKB</th>
                                            <th>Jml. Kader Khusus Koperasi</th>
                                            <th>Jml. Kader Khusus Keterampilan</th>
                                            <th>Jml. Kader Umum LP3 PKK</th>
                                            <th>Jml. Kader Umum TPK 3 PKK</th>
                                            <th>Jml. Kader Umum Damas PKK</th>
                                            <th>Periode</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no=1;?>

                                        @foreach ($pend as $c)
                                    <tr>
                                        <td style="vertical-align: middle;">{{ $no }}</td>
                                        {{-- nama desa yang login --}}
                                        <td style="vertical-align: middle;">{{$c->desa->nama_desa}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_warga_buta}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_pktA_kel_belajar}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_pktA_warga_belajar}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_pktB_kel_belajar}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_pktB_warga_belajar}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_pktC_kel_belajar}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_pktC_warga_belajar}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_KF_kel_belajar}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_KF_warga_belajar}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_paud}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_taman_bacaan}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_BKB_kel_belajar}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_BKB_ibu_peserta}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_BKB_ape}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_BKB_kel_simulasi}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_kader_khusus_KF}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_kader_khusus_paud_sejenis}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_kader_khusus_BKB}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_kader_khusus_koperasi}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_kader_khusus_keterampilan}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_kader_umum_LP3}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_kader_umum_TPK}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_kader_umum_damas}}</td>
                                        <td style="vertical-align: middle;">{{$c->periode}}</td>

                                        <td class="text-center">
                                            <form action="{{ route('pendidikan.destroy',$c->id) }}" method="POST">

                                            {{-- <a class="btn btn-info btn-sm" href="{{ route('sisw.show',$siswa->id) }}">Show</a> --}}

                                                <a class="btn btn-primary btn-sm" href="{{ url('pendidikan/'.$c->id.'/edit') }}">Edit</a>

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger btn-sm delete">Delete</button>
                                            </form>
                                        </td>

                                    </tr>

                                    <?php $no++ ;?>
                                    @endforeach

                                    </tbody>
                                        {{-- <td>
                                            <a href="/kelompok_belajar" type="button" class="btn btn-primary">Detail</a>
                                        </td>
                                        <td>3</td>
                                        <td>
                                            <a href="/bkb" type="button" class="btn btn-primary">Detail</a>
                                        </td>
                                        <td>
                                            <a href="/kader_khusus" type="button" class="btn btn-primary">Detail</a>
                                        </td>
                                        <td>
                                            <a href="/kader_umum" type="button" class="btn btn-primary">Detail</a>
                                        </td> --}}

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
