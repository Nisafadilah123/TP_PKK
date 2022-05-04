@extends('admin_desa.layout')

@section('title', 'Kejar Paket Data Aset | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Kejar Paket Data Aset')
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
                                            <a href="{{ url('kejar_paket/create') }}" type="button" class="btn btn-success">Tambah</a><br><br>
                                        </div>
                                    </div>
                                    <thead>
                                        <tr>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">Nama Desa</th>
                                        <th rowspan="2">Nama Kecamatan</th>
                                        <th rowspan="2">Kota</th>
                                        <th rowspan="2">Provinsi</th>
                                        <th rowspan="2">Nama Kejar Paket/KF/PAUD</th>
                                        <th rowspan="2">Jenis Kejar Paket/KF/PAUD</th>
                                        <th colspan="2">Jumlah Warga Belajar/Siswa</th>
                                        <th colspan="2">Jumlah Pengajar</th>
                                        <th rowspan="2">Periode</th>
                                        <th rowspan="2">Aksi</th>
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

                                        @foreach ($kejar_paket as $c)
                                    <tr>
                                        <td style="vertical-align: middle;">{{ $no }}</td>
                                        {{-- nama desa yang login --}}
                                        <td style="vertical-align: middle;">{{$c->desa->nama_desa}}</td>
                                        <td style="vertical-align: middle;">{{$c->kecamatan->nama_kecamatan}}</td>
                                        <td style="vertical-align: middle;">{{$c->kota}}</td>
                                        <td style="vertical-align: middle;">{{$c->provinsi}}</td>
                                        <td style="vertical-align: middle;">{{$c->nama_kejar_paket}}</td>
                                        <td style="vertical-align: middle;">{{$c->jenis_paket}}</td>
                                        <td style="vertical-align: middle;">{{$c->jumlah_warga_laki}}</td>
                                        <td style="vertical-align: middle;">{{$c->jumlah_warga_perempuan}}</td>
                                        <td style="vertical-align: middle;">{{$c->jumlah_pengajar_laki}}</td>
                                        <td style="vertical-align: middle;">{{$c->jumlah_pengajar_perempuan}}</td>
                                        <td style="vertical-align: middle;">{{$c->periode}}</td>

                                        <td class="text-center">
                                            <form action="{{ route('kejar_paket.destroy',$c->id) }}" method="POST">

                                            {{-- <a class="btn btn-info btn-sm" href="{{ route('sisw.show',$siswa->id) }}">Show</a> --}}

                                                <a class="btn btn-primary btn-sm" href="{{ url('kejar_paket/'.$c->id.'/edit') }}">Edit</a>

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
