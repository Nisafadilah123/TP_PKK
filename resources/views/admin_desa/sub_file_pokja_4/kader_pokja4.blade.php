@extends('admin_desa.layout')

@section('title', 'Jumlah Kader POKJA IV | PKK Kab. Indramayu')

@section('bread', 'Jumlah Kader POKJA IV')
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
                                    <a href="{{ url('kader_pokja4/create') }}" type="button" class="btn btn-success">Tambah</a><br><br>

                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Desa</th>
                                            <th>Posyandu</th>
                                            <th>Gizi</th>
                                            <th>Kesling</th>
                                            <th>Penyuluhan Narkoba</th>
                                            <th>PHBS</th>
                                            <th>KB</th>
                                            <th>Aksi</th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        <?php $no=1;?>

                                        @foreach ($jumkad as $c)
                                    <tr>
                                        <td style="vertical-align: middle;">{{ $no }}</td>
                                        {{-- nama desa yang login --}}
                                        <td style="vertical-align: middle;">{{$c->desa->nama_desa}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_kader_posyandu}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_kader_gizi}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_kader_kesling}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_kader_penyuluhan_narkoba}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_kader_PHBS}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_kader_KB}}</td>

                                        <td class="text-center">
                                            <form action="{{ route('kader_pokja4.destroy',$c->id) }}" method="POST">

                                            {{-- <a class="btn btn-info btn-sm" href="{{ route('sisw.show',$siswa->id) }}">Show</a> --}}

                                                <a class="btn btn-primary btn-sm" href="{{ url('kader_pokja4/'.$c->id.'/edit') }}">Edit</a>

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger btn-sm delete">Delete</button>
                                            </form>
                                        </td>

                                    </tr>
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
$(document).ready(function() {
    $('.data').DataTable();
});
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
