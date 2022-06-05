@extends('admin_desa.layout')

@section('title', 'Rekapitulasi Catatan Data Dan Kegiatan Warga Kelompok Dasa Wisma | Admin Desa/Kelurahan PKK Kab. Indramayu')

@section('bread', 'Rekapitulasi Catatan Data Dan Kegiatan Warga Kelompok Dasa Wisma')
@section('container')

    <!-- Main content -->
    <div class="main-content">
    <section class="section">

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <center>
                                @foreach ($rekap as $item)
                                    <h6>Dasa Wisma : {{ucfirst ($item->dasa_wisma) }}</h6>
                                    <h6>RT : {{ucfirst ($item->rt) }}</h6>
                                    <h6>RW : {{ucfirst ($item->rw) }}</h6>
                                    {{-- <h6>Desa/Kel : {{ucfirst ($item->desa->nama_desa) }}</h6> --}}
                                    <h6>Tahun : {{ucfirst ($item->periode) }}</h6>
                                @endforeach

                            </center>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered data" id="add-row" width="6000px">
                                    <thead>
                                        <tr>
                                        <th rowspan="3" style="text-align: center;">No</th>
                                        <th rowspan="3" style="text-align: center;">Nama Kepala Rumah Tangga</th>
                                        <th rowspan="3" style="text-align: center;">Jml. KK</th>
                                        <th colspan="11" style="text-align:center;">Jumlah Anggota Keluarga</th>
                                        <th colspan="6" style="text-align:center;">Kriteria Rumah</th>
                                        <th colspan="3" style="text-align:center;">Sumber Air Keluarga</th>
                                        <th colspan="2" style="text-align:center;">Makanan Pokok</th>
                                        <th colspan="6" style="text-align:center;">Warga Mengikuti Kegiatan</th>
                                        <th rowspan="3" style="text-align: center;">Ket</th>
                                    </tr>
                                    <tr>
                                        <th>Total L</th>
                                        <th>Total P</th>
                                        <th>Balita L</th>
                                        <th>Balita P</th>
                                        <th>3 Buta</th>
                                        <th>PUS</th>
                                        <th>WUS</th>
                                        <th>Ibu Hamil</th>
                                        <th>Ibu Menyusui</th>
                                        <th>Lansia</th>
                                        <th>Berkebutuhan Khusus</th>
                                        <th>Sehat Layak Huni</th>
                                        <th>Tidak Sehat Layak Huni</th>
                                        <th>Memiliki Tmp. Pemb. Sampah</th>
                                        <th>Memiliki SPAL</th>
                                        <th>Memiliki Jamban Keluarga</th>
                                        <th>Menempel Stiker P4K</th>
                                        <th>PDAM</th>
                                        <th>Sumur</th>
                                        <th>DLL</th>
                                        <th>Beras</th>
                                        <th>Non Beras</th>
                                        <th>UP2K</th>
                                        <th>Pemanfaatan dan Pekarangan</th>
                                        <th>Industri Rumah Tangga</th>
                                        <th>Kerja Bakti</th>
                                    </tr>

                                    {{-- <tr>
                                        <th>L</th>
                                        <th>P</th>
                                        <th>L</th>
                                        <th>P</th>
                                    </tr> --}}
                                    </thead>

                                    <tbody>
                                        <?php $no=1;?>

                                        @foreach ($catatan_keluarga as $c)
                                    <tr>
                                        <td style="vertical-align: middle;">{{ $no }}</td>
                                        <td style="vertical-align: middle;">{{ $c->nama_kepala_rumah_tangga }}</td>
                                        {{-- <td style="vertical-align: middle;">{{ucfirst($c->keluarga->jumlah_KK)}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->status)}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->status_perkawinan)}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->jenis_kelamin == 'laki-laki' ? 'laki-laki' :'')}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->jenis_kelamin == 'perempuan' ? 'perempuan' :'')}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->tgl_lahir)}}/{{ ucfirst($c->umur) }} Tahun</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->pendidikan)}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->pekerjaan)}}</td> --}}


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
