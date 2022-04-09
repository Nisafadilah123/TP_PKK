@extends('admin_desa.layout')

@section('title', 'Penghayatan dan Pengamalan Pancasila POKJA I | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Penghayatan dan Pengamalan Pancasila POKJA I')
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
                                            <a href="{{ url('penghayatan/create') }}" type="button" class="btn btn-success">Tambah</a><br><br>
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
                                                    <h6 style="font-colour:red">* PKBN (Pembinaan Kesadaran Bela Negara)</h6>
                                                    <h6 style="font-colour:red">* PKDRT (Pencegahan Kekerasan Dalam Rumah Tangga)</h6>
                                                    <h6 style="font-colour:red">* LKP (PencegahanKDRT Kekerasan Dalam RKader umahKader Tangga)</h6>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Oke</button>
                                                    {{-- <button type="button" class="btn btn-primary">Oke</button> --}}
                                                </div>
                                            </div>
                                            </div>
                                        </div>

                                    <thead>
                                        <tr>
                                        <th>No</th>
                                        <th>Nama Desa</th>
                                        <th>Jumlah PKBN Kelompok Simulasi</th>
                                        <th>Jumlah PKBN Kelompok Anggota</th>
                                        <th>Jumlah PKDRT Kelompok Simulasi</th>
                                        <th>Jumlah PKDRT Kelompok Anggota</th>
                                        <th>Jumlah Pola Asuh Kelompok Simulasi</th>
                                        <th>Jumlah Pola Asuh Kelompok Anggota</th>
                                        <th>Jumlah Lansia Klp</th>
                                        <th>Jumlah Lansia Anggota</th>
                                        <th>Periode</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no=1;?>

                                        @foreach ($peng as $c)
                                    <tr>
                                        <td style="vertical-align: middle;">{{ $no }}</td>
                                        {{-- nama desa yang login --}}
                                        <td style="vertical-align: middle;">{{$c->desa->nama_desa}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_PKBN_simulasi}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_PKBN_anggota}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_PKDRT_simulasi}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_PKDRT_anggota}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_pola_asuh_klp}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_pola_asuh_anggota}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_lansia_klp}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_lansia_anggota}}</td>
                                        <td style="vertical-align: middle;">{{$c->periode}}</td>

                                        <td class="text-center">
                                            <form action="{{ route('penghayatan.destroy',$c->id) }}" method="POST">

                                            {{-- <a class="btn btn-info btn-sm" href="{{ route('sisw.show',$siswa->id) }}">Show</a> --}}

                                                <a class="btn btn-primary btn-sm" href="{{ url('penghayatan/'.$c->id.'/edit') }}">Edit</a>

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
