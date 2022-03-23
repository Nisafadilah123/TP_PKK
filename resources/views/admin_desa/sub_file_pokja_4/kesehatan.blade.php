@extends('admin_desa.layout')

@section('title', 'Kesehatan Posyandu POKJA IV | PKK Kab. Indramayu')

@section('bread', 'Kesehatan Posyandu POKJA IV')
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
                                    <a href="{{ url('kesehatan/create') }}" type="button" class="btn btn-success">Tambah</a><br><br>

                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Desa</th>
                                            <th>Jumlah Posyandu</th>
                                            <th>Jumlah Posyandu Terintegrasi</th>
                                            <th>Jumlah Posyandu Lansia KLP</th>
                                            <th>Jumlah Posyandu Lansia Anggota</th>
                                            <th>Jumlah Posyandu Lansia Yang Memiliki Kartu Berobat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no=1;?>

                                        @foreach ($kes as $c)
                                    <tr>
                                        <td style="vertical-align: middle;">{{ $no }}</td>
                                        {{-- nama desa yang login --}}
                                        <td style="vertical-align: middle;">{{$c->desa->nama_desa}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_posyandu}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_posyandu_terintegrasi}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_posyandu_lansia_klp}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_posyandu_lansia_anggota}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_posyandu_lansia_memiliki_kartu}}</td>

                                        <td class="text-center">
                                            <form action="{{ route('kesehatan.destroy',$c->id) }}" method="POST">

                                            {{-- <a class="btn btn-info btn-sm" href="{{ route('sisw.show',$siswa->id) }}">Show</a> --}}

                                                <a class="btn btn-primary btn-sm" href="{{ url('kesehatan/'.$c->id.'/edit') }}">Edit</a>

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
