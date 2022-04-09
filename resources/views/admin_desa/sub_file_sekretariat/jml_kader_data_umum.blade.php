@extends('admin_desa.layout')

@section('title', 'Jumlah Kader Data Umum | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Jumlah Kader Data Umum')
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
                                    <div class="row">
                                        <div class="col-md-1">
                                           <a href="{{ url('jml_kader_umum/create') }}" type="button" class="btn btn-success">Tambah</a><br><br>
                                        </div>
                                        {{-- <div class="col-md-1">
                                            <!-- Tombol yang memicu modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalSaya">
                                                Klik Info
                                            </button>
                                        </div> --}}
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
                                                    <h6 style="font-colour:red">* Kader PKBN (Pembinaan Kesadaran Bela Negara)</h6>
                                                    <h6 style="font-colour:red">* Kader PKDRT (Pencegahan Kekerasan Dalam Rumah Tangga)</h6>
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
                                            <th>No.</th>
                                            <th>Nama Desa</th>
                                            <th>Jumlah `Kader Anggota TP PKK Laki-laki</th>
                                            <th>Jumlah Kader Anggota TP PKK Perempuan</th>
                                            <th>Jumlah Kader Anggota Umum Laki-laki</th>
                                            <th>Jumlah Kader Anggota Umum Perempuan</th>
                                            <th>Jumlah Kader Anggota Khusus Laki-laki</th>
                                            <th>Jumlah Kader Anggota Khusus Perempuan</th>
                                            <th>Periode</th>
                                            <th>Aksi</th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        <?php $no=1;?>

                                        @foreach ($jumkadum as $c)
                                    <tr>
                                        <td style="vertical-align: middle;">{{ $no }}</td>
                                        {{-- nama desa yang login --}}
                                        <td style="vertical-align: middle;">{{$c->desa->nama_desa}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_kader_anggota_pkk_laki_data_umum}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_kader_anggota_pkk_perempuan_data_umum}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_kader_umum_laki_data_umum}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_kader_umum_perempuan_data_umum}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_kader_khusus_laki_data_umum}}</td>
                                        <td style="vertical-align: middle;">{{$c->jml_kader_khusus_perempuan_data_umum}}</td>
                                        <td style="vertical-align: middle;">{{$c->periode}}</td>

                                        <td class="text-center">
                                            <form action="{{ route('jml_kader_umum.destroy',$c->id) }}" method="POST">

                                            {{-- <a class="btn btn-info btn-sm" href="{{ route('sisw.show',$siswa->id) }}">Show</a> --}}

                                                <a class="btn btn-primary btn-sm" href="{{ url('jml_kader_umum/'.$c->id.'/edit') }}">Edit</a>

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
