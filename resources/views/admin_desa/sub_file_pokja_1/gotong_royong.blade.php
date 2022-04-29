@extends('admin_desa.layout')

@section('title', 'Gotong Royong POKJA I | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Gotong Royong POKJA I')
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
                                            <a href="{{ url('gotong_royong/create') }}" type="button" class="btn btn-success">Tambah</a><br><br>
                                        </div>

                                    </div>

                                        <!-- Contoh Modal -->
                                        <div class="modal fade" id="modalSaya" tabindex="-1" role="dialog" aria-labelledby="modalSayaLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalSayaLabel">Info Kategori Kegiatan POKJA I</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h1 style="font-colour:red">*</h1>klik
                                                        <br/>
                                                        Seri Tutorial Bootstrap 4 lengkap dari dasar sampai mahir.
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                        <button type="button" class="btn btn-primary">Oke</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <thead>
                                        <tr>
                                        <th>No</th>
                                        <th>Nama Desa</th>
                                        <th>Jumlah Kerja Bakti</th>
                                        <th>Jumlah Rukun Kematian</th>
                                        <th>Jumlah Keagamaan</th>
                                        <th>Jumlah Jimpitan</th>
                                        <th>Jumlah Arisan</th>
                                        <th>Periode</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no=1;?>

                                        @foreach ($gotong as $c)
                                    <tr>
                                        <td style="vertical-align: middle;">{{ $no }}</td>
                                        {{-- nama desa yang login --}}
                                        <td style="vertical-align: middle;">{{$c->desa->nama_desa}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_gotong_kerja_bakti}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_gotong_rukun_kebaktian}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_gotong_keagamaan}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_gotong_jimpitan}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_gotong_arisan}}</td>
                                        <td style="vertical-align: middle;">{{$c->periode}}</td>

                                        <td class="text-center">
                                            <form action="{{ route('gotong_royong.destroy',$c->id) }}" method="POST">

                                            {{-- <a class="btn btn-info btn-sm" href="{{ route('sisw.show',$siswa->id) }}">Show</a> --}}

                                                <a class="btn btn-primary btn-sm" href="{{ url('gotong_royong/'.$c->id.'/edit') }}">Edit</a>

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
