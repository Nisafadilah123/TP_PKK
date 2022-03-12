@extends('super_admin.layout')

@section('title', 'Data Wilayah Desa | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Data Wilayah Desa')
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
                                    <a href="{{ url('data_desa/create') }}" type="button" class="btn btn-success">Tambah</a><br><br>

                                    <thead>
                                        <tr>
                                        <th>No</th>
                                        <th>Kode Desa</th>
                                        <th>Nama Desa</th>
                                        <th>Aksi</th>
                                        {{-- <th>Hapus</th> --}}
                                    </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no=1;?>

                                        @foreach ($desa as $c)
                                    <tr>
                                        <td style="vertical-align: middle;">{{ $no }}</td>
                                        <td style="vertical-align: middle;">{{$c->kode_desa}}</td>
                                        <td style="vertical-align: middle;">{{$c->nama_desa}}</td>

                                            {{-- <td>
                                                <form action="{{ url('data_desa/'.$c->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger delete">Hapus</button>
                                                    <a href="{{ url('data_desa/'.$c->id.'/edit') }}" class="btn btn-warning">Edit</a>

                                                </form> --}}
                                                {{-- <a href="{{ url('data_desa/'.$c->id) }}" class="btn btn-danger">Hapus</a> --}}
                                            {{-- </td> --}}
                                            {{-- <td>

                                            </td> --}}
                                        <td class="text-center">
                                            <form action="{{ route('data_desa.destroy',$c->id) }}" method="POST">

                                            {{-- <a class="btn btn-info btn-sm" href="{{ route('sisw.show',$siswa->id) }}">Show</a> --}}

                                                <a class="btn btn-primary btn-sm" href="{{ url('data_desa/'.$c->id.'/edit') }}">Edit</a>

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger btn-sm delete" >Delete</button>
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
  {{-- <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script> --}}

{{-- <script>
    $(document).ready(function () {
        $('.data').dataTable();
    });
</script> --}}
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
