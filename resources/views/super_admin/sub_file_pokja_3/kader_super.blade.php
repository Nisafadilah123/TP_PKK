@extends('super_admin.layout')

@section('title', 'Jumlah Kader POKJA III | Super Admin PKK Kab. Indramayu')

@section('bread', 'Jumlah Kader POKJA III')
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
                                    <a href="{{ url('kader_super/create') }}" type="button" class="btn btn-success">Tambah</a><br><br>

                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Desa</th>
                                            <th>Pangan</th>
                                            <th>Sandang</th>
                                            <th>Tata Laksana</th>
                                            <th>Aksi</th>

                                        </tr>

                                    </thead>

                                    <tbody>
                                        <?php $no=1;?>

                                        @foreach ($kadsup as $c)
                                    <tr>
                                        <td style="vertical-align: middle;">{{ $no }}</td>
                                        {{-- nama desa yang login --}}
                                        <td style="vertical-align: middle;">{{$c->desa->nama_desa}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_kader_pangan}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_kader_sandang}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_kader_tata_laksana}}</td>

                                        <td class="text-center">
                                            <form action="{{ route('kader_super.destroy',$c->id) }}" method="POST">

                                            {{-- <a class="btn btn-info btn-sm" href="{{ route('sisw.show',$siswa->id) }}">Show</a> --}}

                                                <a class="btn btn-primary btn-sm" href="{{ url('kader_super/'.$c->id.'/edit') }}">Edit</a>

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
<script>
$(document).ready(function() {
    $('.data').DataTable();
});
</script>

@endpush
