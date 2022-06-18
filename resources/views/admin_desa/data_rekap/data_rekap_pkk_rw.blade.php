@extends('admin_desa.layout')

@section('title', 'Rekapitulasi Catatan Data Dan Kegiatan Warga Kelompok PKK RW | Admin Desa/Kelurahan PKK Kab. Indramayu')

@section('bread', 'Rekapitulasi Catatan Data Dan Kegiatan Warga Kelompok PKK RW')
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
                                <h6><strong>REKAPITULASI</strong></h6>
                                <h6><strong>CATATAN DATA DAN KEGIATAN WARGA</strong> </h6>
                                <h6><strong>KELOMPOK PKK RW</strong> </h6>

                                <h6>RW : {{$rw}}</h6>
                                <h6>Desa/Kel : {{ ucfirst($desa->nama_desa) }}</h6>
                                <h6>Tahun : {{$periode}}</h6>
                            </center>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered data" id="add-row" width="6000px">
                                    <thead>
                                        <tr>
                                        <th rowspan="3" style="text-align: center;">No</th>
                                        <th rowspan="3" style="text-align: center;">No.RT</th>
                                        <th rowspan="3" style="text-align: center;">Jml. Dasa Wisma</th>
                                        <th rowspan="3" style="text-align: center;">Jml. KRT</th>
                                        <th rowspan="3" style="text-align: center;">Jml. KK</th>
                                        <th colspan="12" style="text-align:center;">Jumlah Anggota Keluarga</th>
                                        <th colspan="5" style="text-align:center;">Jumlah Rumah</th>
                                        <th colspan="4" style="text-align:center;">Sumber Air Keluarga</th>
                                        <th rowspan="3" style="text-align:center;">Jumlah Jamban Keluarga</th>
                                        <th colspan="2" style="text-align:center;">Makanan Pokok</th>
                                        <th colspan="6" style="text-align:center;">Warga Mengikuti Kegiatan</th>
                                        <th rowspan="3" style="text-align: center;">Ket</th>
                                    </tr>
                                    <tr>
                                        <th>Total L</th>
                                        <th>Total P</th>
                                        <th>Balita L</th>
                                        <th>Balita P</th>
                                        <th>3 Buta L</th>
                                        <th>3 Buta P</th>
                                        <th>PUS</th>
                                        <th>WUS</th>
                                        <th>Ibu Hamil</th>
                                        <th>Ibu Menyusui</th>
                                        <th>Lansia</th>
                                        <th>Berkebutuhan Khusus</th>
                                        <th>Sehat</th>
                                        <th>Tidak Sehat</th>
                                        <th>Memiliki Tmp. Pemb. Sampah</th>
                                        <th>Memiliki SPAL</th>
                                        <th>Menempel Stiker P4K</th>
                                        <th>PDAM</th>
                                        <th>Sumur</th>
                                        <th>Sungai</th>
                                        <th>DLL</th>
                                        <th>Beras</th>
                                        <th>Non Beras</th>
                                        <th>UP2K</th>
                                        <th>Pemanfaatan dan Pekarangan</th>
                                        <th>Industri Rumah Tangga</th>
                                        <th>Kesehatan Lingkungan</th>
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
                                            @foreach ( $catatan_keluarga as $data_warga)
                                        <tr>
                                            <td style="vertical-align: middle;">{{ $no }}</td>
                                            {{-- <td style="vertical-align: middle;">{{ $dasa_wismas }}</td> --}}
                                            <td style="vertical-align: middle;">{{ $data_warga->dasa_wisma }}</td>

                                            <td style="vertical-align: middle;">{{ $catatan_keluarga->count('id') }}</td>
                                            <td>{{ $catatan_keluarga->sum('jumlah_KK') }}</td>
                                            <td>{{ $catatan_keluarga->sum('laki_laki') }}</td>
                                            <td>{{ $catatan_keluarga->sum('perempuan') }}</td>
                                            <td>{{ $catatan_keluarga->sum('jumlah_balita_laki') }}</td>
                                            <td>{{ $catatan_keluarga->sum('jumlah_balita_perempuan') }}</td>
                                            <td>{{ $catatan_keluarga->sum('jumlah_3_buta') }}</td>
                                            <td>{{ $catatan_keluarga->sum('jumlah_PUS') }}</td>
                                            <td>{{ $catatan_keluarga->sum('jumlah_WUS') }}</td>
                                            <td>{{ $catatan_keluarga->sum('jumlah_ibu_hamil') }}</td>
                                            <td>{{ $catatan_keluarga->sum('jumlah_ibu_menyusui') }}</td>
                                            <td>{{ $catatan_keluarga->sum('jumlah_lansia') }}</td>
                                            <td>{{ $catatan_keluarga->sum('jumlah_kebutuhan') }}</td>
                                            <td>{{ $catatan_keluarga->sum('kriteria_rumah') }}</td>
                                            <td>{{ $catatan_keluarga->count() - $catatan_keluarga->sum('kriteria_rumah') }}</td>
                                            <td>{{ $catatan_keluarga->sum('punya_tempat_sampah') }}</td>
                                            <td>{{ $catatan_keluarga->sum('punya_saluran_air') }}</td>
                                            <td>{{ $catatan_keluarga->sum('punya_jamban') }}</td>
                                            <td>{{ $catatan_keluarga->sum('tempel_stiker') }}</td>
                                            <td>{{ $catatan_keluarga->where('sumber_air', 1)->count() }}</td>
                                            <td>{{ $catatan_keluarga->where('sumber_air', 2)->count() }}</td>
                                            <td>{{ $catatan_keluarga->where('sumber_air', 4)->count() }}</td>
                                            <td>{{ $catatan_keluarga->where('makanan_pokok', 1)->count() }}</td>
                                            <td>{{ $catatan_keluarga->where('makanan_pokok', 0)->count() }}</td>
                                            <td>{{ $catatan_keluarga->sum('aktivitas_UP2K') }}</td>
                                            <td>{{ $catatan_keluarga->sum('have_pemanfaatan') }}</td>
                                            <td>{{ $catatan_keluarga->sum('have_industri') }}</td>
                                            <td>{{ $catatan_keluarga->sum('have_kegiatan') }}</td>

                                        </tr>
                                        <?php $no++;?>
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
