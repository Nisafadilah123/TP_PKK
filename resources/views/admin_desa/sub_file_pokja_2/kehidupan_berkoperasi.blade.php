@extends('admin_desa.layout')

@section('title', 'Pengembangan Kehidupan Berkoperasi POKJA II | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Pengembangan Kehidupan Berkoperasi Balita POKJA II')
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
                                            <a href="{{ url('koperasi/create') }}" type="button" class="btn btn-success">Tambah</a><br><br>
                                        </div>
                                        <div class="col-md-1">
                                            <!-- Tombol yang memicu modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalSaya">
                                                Klik Info
                                            </button><br><br>
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
                                                    <h6 style="font-colour:red">* KLP (KLP)</h6>
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
                                            <th>Jml. Pemula KLP</th>
                                            <th>Jml. Pemula Peserta</th>
                                            <th>Jml. Madya KLP</th>
                                            <th>Jml. Madya Peserta</th>
                                            <th>Jml. Utama KLP</th>
                                            <th>Jml. Utama Peserta</th>
                                            <th>Jml. Mandiri KLP</th>
                                            <th>Jml. Mandiri Peserta</th>
                                            <th>Jml. Koperasi KLP</th>
                                            <th>Jml. Koperasi Peserta</th>
                                            <th>Periode</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no=1;?>

                                        @foreach ($kop as $c)
                                    <tr>
                                        <td style="vertical-align: middle;">{{ $no }}</td>
                                        {{-- nama desa yang login --}}
                                        <td style="vertical-align: middle;">{{$c->desa->nama_desa}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_pemula_klp}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_pemula_peserta}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_madya_klp}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_madya_peserta}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_utama_klp}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_utama_peserta}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_mandiri_klp}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_mandiri_peserta}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_koperasi_klp}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_koperasi_peserta}}</td>
                                        <td style="vertical-align: middle;">{{$c->periode}}</td>

                                        <td class="text-center">
                                            <form action="{{ route('koperasi.destroy',$c->id) }}" method="POST">

                                            {{-- <a class="btn btn-info btn-sm" href="{{ route('sisw.show',$siswa->id) }}">Show</a> --}}

                                                <a class="btn btn-primary btn-sm" href="{{ url('koperasi/'.$c->id.'/edit') }}">Edit</a>

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
