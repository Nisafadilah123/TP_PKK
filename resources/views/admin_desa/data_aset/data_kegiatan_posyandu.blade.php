@extends('admin_desa.layout')

@section('title', 'Data Jenis Kegiatan Layanan Posyandu Data Aset | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Data Jenis Kegiatan Layanan Posyandu Data Aset')
@section('container')

    <!-- Main content -->
<div class="main-content">
    <section class="section">
        {{-- <h1 class="section-header">
            <div>Kandidat</div>
        </h1> --}}

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered data" id="add-row">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <a href="{{ url('data_kegiatan_posyandu/create') }}" type="button" class="btn btn-success">Tambah</a><br><br>
                                        </div>
                                    </div>
                                    <thead>
                                        <tr>
                                        <th rowspan="3">No</th>
                                        <th rowspan="3">Nama Pengelola</th>
                                        <th rowspan="3">Frekuensi Layanan</th>
                                        <th rowspan="3">Jenis Kegiatan</th>
                                        <th colspan="4">Jumlah</th>
                                        <th rowspan="3">Keterangan Lain</th>
                                        <th rowspan="3">Periode</th>
                                        <th rowspan="3">Aksi</th>
                                    </tr>

                                    <tr>
                                        <th colspan="2">Pengunjung</th>
                                        <th colspan="2">Petugas/Paramedis</th>
                                    </tr>

                                    <tr>
                                        <th>L</th>
                                        <th>P</th>
                                        <th>L</th>
                                        <th>P</th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no=1;?>

                                        @foreach ($jenis_kegiatan as $c)
                                    <tr>
                                        <td style="vertical-align: middle;">{{ $no }}</td>
                                        {{-- nama desa yang login --}}
                                        <td style="vertical-align: middle;">{{$c->posyandu->pengelola}}</td>
                                        <td style="vertical-align: middle;">{{$c->jenis_kegiatan}}</td>
                                        <td style="vertical-align: middle;">{{$c->frekuensi_layanan}}</td>
                                        <td style="vertical-align: middle;">{{$c->jumlah_pengunjung_laki}}</td>
                                        <td style="vertical-align: middle;">{{$c->jumlah_pengunjung_perempuan}}</td>
                                        <td style="vertical-align: middle;">{{$c->jumlah_petugas_laki}}</td>
                                        <td style="vertical-align: middle;">{{$c->jumlah_petugas_perempuan}}</td>
                                        <td style="vertical-align: middle;">{{$c->keterangan_lain}}</td>
                                        <td style="vertical-align: middle;">{{$c->periode}}</td>

                                        <td class="text-center">
                                            <form action="{{ route('data_kegiatan_posyandu.destroy',$c->id) }}" method="POST">

                                            {{-- <a class="btn btn-info btn-sm" href="{{ route('sisw.show',$siswa->id) }}">Show</a> --}}

                                                <a class="btn btn-primary btn-sm" href="{{ url('data_kegiatan_posyandu/'.$c->id.'/edit') }}">Edit</a>

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
