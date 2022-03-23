@extends('admin_desa.layout')

@section('title', 'Perencanaan Sehat POKJA IV | PKK Kab. Indramayu')

@section('bread', 'Perencanaan Sehat POKJA IV')
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
                                    <a href="{{ url('perencanaan/create') }}" type="button" class="btn btn-success">Tambah</a><br><br>

                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Desa</th>
                                            <th>Jumlah PUS</th>
                                            <th>Jumlah WUS</th>
                                            <th>Jumlah Akseptor Laki-laki</th>
                                            <th>Jumlah Akseptor Perempuan</th>
                                            <th>Jumlah KK yang memiliki Tabungan</th>
                                            <th>Aksi</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no=1;?>

                                        @foreach ($per as $c)
                                    <tr>
                                        <td style="vertical-align: middle;">{{ $no }}</td>
                                        {{-- nama desa yang login --}}
                                        <td style="vertical-align: middle;">{{$c->desa->nama_desa}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_PUS}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_WUS}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_anggota_akseptor_laki}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_anggota_akseptor_perempuan}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_kk_tabungan}}</td>

                                        <td class="text-center">
                                            <form action="{{ route('perencanaan.destroy',$c->id) }}" method="POST">

                                            {{-- <a class="btn btn-info btn-sm" href="{{ route('sisw.show',$siswa->id) }}">Show</a> --}}

                                                <a class="btn btn-primary btn-sm" href="{{ url('perencanaan/'.$c->id.'/edit') }}">Edit</a>

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
$(document).ready(function() {
    $('.data').DataTable();
});
</script>

@endpush
