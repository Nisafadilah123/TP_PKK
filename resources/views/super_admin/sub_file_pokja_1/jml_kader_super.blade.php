@extends('super_admin.layout')

@section('title', 'Jumlah Kader POKJA I | Super Admin PKK Kab. Indramayu')

@section('bread', 'Jumlah Kader POKJA I')
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
                                    <a href="{{ url('jml_kader_super/create') }}" type="button" class="btn btn-success">Tambah</a><br><br>

                                    <thead>
                                        <tr>
                                        <th>No</th>
                                        <th>Nama Desa</th>
                                        <th>Jumlah Kader PKBN</th>
                                        <th>Jumlah Kader PKDRT
                                        <th>Jumlah Kader Pola Asuh</th>
                                        <th>Periode</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no=1;?>

                                        @foreach ($kadersup as $c)
                                    <tr>
                                        <td style="vertical-align: middle;">{{ $no }}</td>
                                        {{-- nama desa yang login --}}
                                        <td style="vertical-align: middle;">{{$c->desa->nama_desa}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_kader_PKBN}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_kader_PKDRT}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_kader_pola_asuh}}</td>
                                        <td style="vertical-align: middle;">{{$c->periode}}</td>

                                        <td class="text-center">
                                            <form action="{{ route('jml_kader_super.destroy',$c->id) }}" method="POST">

                                            {{-- <a class="btn btn-info btn-sm" href="{{ route('sisw.show',$siswa->id) }}">Show</a> --}}

                                                <a class="btn btn-primary btn-sm" href="{{ url('jml_kader_super/'.$c->id.'/edit') }}">Edit</a>

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
