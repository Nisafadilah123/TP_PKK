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
                                <h6><strong>REKAPITULASI</strong></h6>
                                <h6><strong>CATATAN DATA DAN KEGIATAN WARGA</strong> </h6>
                                <h6><strong>KELOMPOK DASA WISMA</strong> </h6>
                                @foreach ($rekap as $item)
                                    <h6>Dasa Wisma : {{ucfirst ($item->dasa_wisma) }}</h6>
                                    <h6>RT : {{ucfirst ($item->rt) }}</h6>
                                    <h6>RW : {{ucfirst ($item->rw) }}</h6>
                                    <h6>Desa/Kel : {{ucfirst ($item->nama_desa) }}</h6>
                                    <h6>Tahun : {{ucfirst ($item->periode) }}</h6>
                                @endforeach

                            </center>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered data" id="add-row" width="6000px">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" style="text-align: center;">No</th>
                                            <th rowspan="2" style="text-align: center;">NIK Kepala Rumah Tangga</th>
                                            <th rowspan="2" style="text-align: center;">Nama Kepala Rumah Tangga</th>
                                            <th rowspan="2" style="text-align: center;">Jml. KK</th>
                                            <th colspan="11" style="text-align:center;">Jumlah Anggota Keluarga</th>
                                            <th colspan="6" style="text-align:center;">Kriteria Rumah</th>
                                            <th colspan="3" style="text-align:center;">Sumber Air Keluarga</th>
                                            <th colspan="2" style="text-align:center;">Makanan Pokok</th>
                                            <th colspan="4" style="text-align:center;">Warga Mengikuti Kegiatan</th>
                                            {{-- <th rowspan="2" style="text-align: center;">Ket</th> --}}
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
                                    </thead>
                                    <tbody>
                                        <?php $no=1;?>
                                        @foreach ($catatan_keluarga as $data_warga)

                                        <tr>
                                            <td style="vertical-align: middle;">{{ $no }}</td>
                                        {{-- @foreach ($warga as $kk) --}}
                                            <td style="vertical-align: middle;">{{ $data_warga->status_keluarga }}</td>
                                            <td style="vertical-align: middle;">{{ $data_warga->nama_kepala_rumah_tangga }}</td>
                                        {{-- @endforeach --}}
                                            <td>{{ $data_warga->jumlah_KK }}</td>
                                            <td>{{ $data_warga->laki_laki }}</td>
                                            <td>{{ $data_warga->perempuan }}</td>
                                            <td>{{ $data_warga->jumlah_balita_laki }}</td>
                                            <td>{{ $data_warga->jumlah_balita_perempuan }}</td>
                                            <td>{{ $data_warga->jumlah_3_buta }}</td>
                                            <td>{{ $data_warga->jumlah_PUS }}</td>
                                            <td>{{ $data_warga->jumlah_WUS }}</td>
                                            <td>{{ $data_warga->jumlah_ibu_hamil }}</td>
                                            <td>{{ $data_warga->jumlah_ibu_menyusui }}</td>
                                            <td>{{ $data_warga->jumlah_lansia }}</td>
                                            <td>{{ $data_warga->jumlah_kebutuhan }}</td>
                                                    <td>
                                                        @if ($data_warga->kriteria_rumah == '1')
                                                            <i class="fas fa-check"></i>
                                                        @else
                                                                0
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($data_warga->kriteria_rumah == '0')
                                                            <i class="fas fa-check"></i>
                                                        @else
                                                                0
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($data_warga->punya_tempat_sampah == '1')
                                                            <i class="fas fa-check"></i>
                                                        @else
                                                            0
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($data_warga->punya_saluran_air == '1')
                                                            <i class="fas fa-check"></i>
                                                        @else
                                                            0
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($data_warga->punya_jamban == '1')
                                                            <i class="fas fa-check"></i>
                                                        @else
                                                            0
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($data_warga->tempel_stiker == '1')
                                                            <i class="fas fa-check"></i>
                                                        @else
                                                            0
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($data_warga->sumber_air == '1')
                                                            <i class="fas fa-check"></i>
                                                        @else
                                                        0
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($data_warga->sumber_air == '2')
                                                            <i class="fas fa-check"></i>
                                                        @else
                                                            0
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($data_warga->sumber_air == '4')
                                                            <i class="fas fa-check"></i>
                                                        @else
                                                            0
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if ($data_warga->makanan_pokok == '1')
                                                            <i class="fas fa-check"></i>
                                                        @else
                                                            0
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if ($data_warga->makanan_pokok == '0')
                                                            <i class="fas fa-check"></i>
                                                        @else
                                                            0
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if ($data_warga->aktivitas_UP2K == '1')
                                                            <i class="fas fa-check"></i>
                                                        @else
                                                            0
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if ($data_warga->nama_kategori =! NULL)
                                                            <i class="fas fa-check"></i>
                                                        @else
                                                            0
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($data_warga->nama_kategori =! NULL)
                                                            <i class="fas fa-check"></i>
                                                        @else
                                                            0
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @foreach ($kegiatan as $a)
                                                            @if ($a->id_kategori =! NULL)
                                                                <i class="fas fa-check"></i>
                                                            @else
                                                                0h
                                                            @endif
                                                        @endforeach

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
