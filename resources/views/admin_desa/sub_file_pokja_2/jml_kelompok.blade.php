@extends('admin_desa.layout')

@section('title', 'Pendidikan dan Keterampilan POKJA II | PKK Kab. Indramayu')

@section('bread', 'Pendidikan dan Keterampilan POKJA II')
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
                                    <button type="button" class="btn btn-success">Tambah</button><br><br>

                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Desa</th>
                                            <th>Jml. warga yang masih 3 buta</th>
                                            <th>Jml. Paket A Kelompok Belajar</th>
                                            <th>Jml. Paket A Warga Belajar</th>
                                            <th>Jml. Paket B Kelompok Belajar</th>
                                            <th>Jml. Paket B Warga Belajar</th>
                                            <th>Jml. Paket C Kelompok Belajar</th>
                                            <th>Jml. Paket C Warga Belajar</th>
                                            <th>Jml. Paud</th>
                                            <th>Jml. Taman Bacaan/Perpustakaan</th>
                                            <th>Jml. BKB Kelompok Belajar</th>
                                            <th>Jml. BKB Ibu Peserta</th>
                                            <th>Jml. BKB APE (SET)</th>
                                            <th>Jml. BKB Kel. Simulasi</th>
                                            <th>Jml. Kader Khusus KF</th>
                                            <th>Jml. Kader Khusus Paud Sejenis</th>
                                            <th>Jml. Kader Khusus BKB</th>
                                            <th>Jml. Kader Khusus Koperasi</th>
                                            <th>Jml. Kader Umum LP3 PKK</th>
                                            <th>Jml. Kader Umum TPK 3 PKK</th>
                                            <th>Jml. Kader Umum Damas PKK</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        {{-- @foreach ($candidate as $c) --}}
                                    <tr>
                                        <td>1</td>
                                        <td>Gabus</td>
                                        <td>2</td>
                                        <td>1</td>
                                        <td>Gabus</td>
                                        <td>2</td>
                                        <td>1</td>
                                        <td>Gabus</td>
                                        <td>2</td>
                                        <td>1</td>
                                        <td>Gabus</td>
                                        <td>2</td>
                                        <td>1</td>
                                        <td>Gabus</td>
                                        <td>2</td>
                                        <td>1</td>
                                        <td>Gabus</td>
                                        <td>2</td>
                                        <td>1</td>
                                        <td>Gabus</td>
                                        <td>2</td>
                                        <td>1</td>

                                        {{-- <td>
                                            <a href="/kelompok_belajar" type="button" class="btn btn-primary">Detail</a>
                                        </td>
                                        <td>3</td>
                                        <td>
                                            <a href="/bkb" type="button" class="btn btn-primary">Detail</a>
                                        </td>
                                        <td>
                                            <a href="/kader_khusus" type="button" class="btn btn-primary">Detail</a>
                                        </td>
                                        <td>
                                            <a href="/kader_umum" type="button" class="btn btn-primary">Detail</a>
                                        </td> --}}
                                        <td>
                                            <button type="button" class="btn btn-warning">Edit</button>
                                            <button type="button" class="btn btn-danger">Hapus</button>
                                        </td>

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
$(document).ready( function () {
    $('.data').DataTable();
} );
</script>

@endpush
