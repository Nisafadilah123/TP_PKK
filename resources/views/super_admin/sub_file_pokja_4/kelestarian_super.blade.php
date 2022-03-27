@extends('admin_desa.layout')

@section('title', 'Kelestarian Lingkungan Hidup POKJA IV | PKK Kab. Indramayu')

@section('bread', 'Kelestarian Lingkungan Hidup POKJA IV')
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
                                    <a href="{{ url('kelestarian/create') }}" type="button" class="btn btn-success">Tambah</a><br><br>

                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Desa</th>
                                            <th>Jumlah Rumah Yang Memiliki Jamban</th>
                                            <th>Jumlah Rumah Yang Memiliki SPAL</th>
                                            <th>Jumlah Rumah Yang Memiliki Tempat Pembuangan Sampah</th>
                                            <th>Jumlah MCK</th>
                                            <th>Jumlah KRT yang Menggunakan Air PDAM</th>
                                            <th>Jumlah KRT yang Menggunakan Air Sumur</th>
                                            <th>Jumlah KRT yang Menggunakan Air Lain-lain</th>

                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no=1;?>

                                        @foreach ($kel as $c)
                                    <tr>
                                        <td style="vertical-align: middle;">{{ $no }}</td>
                                        {{-- nama desa yang login --}}
                                        <td style="vertical-align: middle;">{{$c->desa->nama_desa}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_rumah_jamban}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_rumah_spal}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_rumah_tempat_sampah}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_mck}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_krt_pdam}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_krt_sumur}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_krt_lain}}</td>

                                        <td class="text-center">
                                            <form action="{{ route('kelestarian.destroy',$c->id) }}" method="POST">

                                            {{-- <a class="btn btn-info btn-sm" href="{{ route('sisw.show',$siswa->id) }}">Show</a> --}}

                                                <a class="btn btn-primary btn-sm" href="{{ url('kelestarian/'.$c->id.'/edit') }}">Edit</a>

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
