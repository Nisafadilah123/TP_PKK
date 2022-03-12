@extends('super_admin.layout')

@section('title', 'Para Koperasi/Usaha Bersama/UP2K POKJA II | PKK Kab. Indramayu')

@section('bread', 'Para Koperasi/Usaha Bersama/UP2K POKJA II')
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
                                    <button type="button" class="btn btn-success">Tambah</button><br><br>

                                    <thead>
                                        <tr>
                                            <th rowspan="2">No.</th>
                                            <th rowspan="2">Nama Desa</th>
                                            <th colspan="4">Para Koperasi/Usaha Bersama/UP2K</th>
                                            <th rowspan="2">Koperasi Berbadan Hukum</th>
                                            <th rowspan="2">Aksi</th>
                                        </tr>
                                        <tr>
                                            <th>Pemula</th>
                                            <th>Madya</th>
                                            <th>Utama</th>
                                            <th>Mandiri</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        {{-- @foreach ($candidate as $c) --}}
                                        <tr>
                                            <td>1</td>
                                            <td>Gabus</td>
                                            <td>
                                                <p>Jml KLP :</p>
                                                <p>Jml Peserta :</p>
                                            </td>
                                            <td>
                                                <p>Jml KLP :</p>
                                                <p>Jml Peserta :</p>
                                            </td>
                                            <td>
                                                <p>Jml KLP :</p>
                                                <p>Jml Peserta :</p>
                                            </td>
                                            <td>
                                                <p>Jml KLP :</p>
                                                <p>Jml Peserta :</p>
                                            </td>
                                            <td>
                                                <p>Jml KLP :</p>
                                                <p>Jml Peserta :</p>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-warning">Edit</button>
                                                <button type="button" class="btn btn-danger">Hapus</button>
                                            </td>

                                            {{-- <td style="vertical-align: middle;">{{$i++}}</td>
                                            <td style="vertical-align: middle;">{{$c->name}}</td>
                                            <td style="vertical-align: middle;">{{$c->address}}</td>
                                            <td style="vertical-align: middle;">{{$c->position}}</td>
                                            <td>
                                                <a href="/opencv/{{$c->id}}" target="_blank" class="btn btn-primary">
                                                    View File <span class="glyphicon glyphicon-eye-open">
                                                </a>
                                            </td>
                                            <td style="vertical-align: middle;">{{$c->status}}</td>
                                            </td>

                                            <td style="width: 120px;text-align: center;vertical-align: middle; ">
                                                <form action="/kandidat/{{$c->id}}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-sm btn-primary btn-circle delete"><span
                                                            class="far fa-trash-alt"></span></button>
                                                    <!-- <input type="submit" class="btn btn-danger btn-sm" value="Delete" onclick="return confirm('anda yakin ingin menghapus data?');"> -->
                                                </form>
                                            </td> --}}
                                        </tr>
                                        {{-- @endforeach --}}
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
