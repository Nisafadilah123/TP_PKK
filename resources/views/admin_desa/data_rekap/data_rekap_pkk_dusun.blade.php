@extends('admin_desa.layout')

@section('title', 'Rekapitulasi Catatan Data Dan Kegiatan Warga Kelompok PKK Dusun| Admin Desa/Kelurahan PKK Kab. Indramayu')

@section('bread', 'Rekapitulasi Catatan Data Dan Kegiatan Warga Kelompok PKK Dusun')
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
                                <h6><strong>KELOMPOK PKK DUSUN/LINGKUNGAN</strong> </h6>

                                @foreach ($rekap as $item)
                                    <h6>Dusun/Lingkungan : {{ucfirst ($item->alamat) }}</h6>
                                    <h6>Desa/Kel : {{ucfirst ($item->nama_desa) }}</h6>
                                    <h6>Tahun : {{ucfirst ($item->periode) }}</h6>
                                @endforeach
                            </center>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered data" id="add-row" width="6000px">
                                    <thead>
                                        <tr>
                                        <th rowspan="3" style="text-align: center;">No</th>
                                        <th rowspan="3" style="text-align: center;">No.RW</th>
                                        <th rowspan="3" style="text-align: center;">Jumlah RT</th>
                                        <th rowspan="3" style="text-align: center;">Jumlah Dasa Wisma</th>
                                        <th rowspan="3" style="text-align: center;">Jumlah KRT</th>
                                        <th rowspan="3" style="text-align: center;">Jumlah KK</th>
                                        <th colspan="12" style="text-align:center;">Jumlah Anggota Keluarga</th>
                                        <th colspan="5" style="text-align:center;">Kriteria Rumah</th>
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
                                        <th>Sehat Layak Huni</th>
                                        <th>Tidak Sehat Layak Huni</th>
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

                                        @foreach ($catatan_keluarga as $data_warga)
                                        <tr>
                                            <td style="vertical-align: middle;">{{ $no }}</td>
                                            @if ($data_keluarga_wargas = $data_warga->keluarga)
                                                @foreach ($data_keluarga_wargas as $data_keluarga_warga)
                                                <td>{{ $data_keluarga_warga->rw }}</td>
                                                    <td>{{ $data_keluarga_warga->count('rw') }}</td>
                                                    <td>{{ $data_keluarga_warga->sum('rt') }}</td>
                                                    <td>{{ $data_keluarga_warga->sum('dasa_wisma') }}</td>
                                                    <td>{{ $data_keluarga_warga->count('id_warga') }}</td>
                                                    <td>{{ $data_keluarga_warga->count('jumlah_KK') }}</td>
                                                    <td>{{ $data_keluarga_warga->sum('laki_laki')  }}</td>
                                                    <td>{{ $data_keluarga_warga->sum('perempuan')  }}</td>
                                                    <td>{{ $data_keluarga_warga->sum('jumlah_balita_laki')  }}</td>
                                                    <td>{{ $data_keluarga_warga->sum('jumlah_balita_perempuan')  }}</td>
                                                    <td>{{ $data_keluarga_warga->sum('jumlah_3_buta')  }}</td>
                                                    <td>{{ $data_keluarga_warga->sum('jumlah_PUS') }}</td>
                                                    <td>{{ $data_keluarga_warga->sum('jumlah_WUS')  }}</td>
                                                    <td>{{ $data_keluarga_warga->sum('jumlah_ibu_hamil')  }}</td>
                                                    <td>{{ $data_keluarga_warga->sum('jumlah_ibu_menyusui') }}</td>
                                                    <td>{{ $data_keluarga_warga->sum('jumlah_lansia') }}</td>
                                                    <td>{{ $data_keluarga_warga->sum('jumlah_kebutuhan') }}</td>
                                                    <td>{{ $data_keluarga_warga->sum('kriteria_rumah') }}</td>

                                                    <td>
                                                        {{-- @if ($sehat = $data_keluarga_warga->kriteria_rumah)
                                                            <td>{{ $data_keluarga_warga->sum('sehat') }}</td>
                                                        @else
                                                                0
                                                        @endif --}}
                                                    </td>
                                                    <td>
                                                        @if ($data_keluarga_warga->kriteria_rumah == 'Kurang Sehat')
                                                            <i class="fas fa-check"></i>
                                                        @else
                                                                0
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($data_keluarga_warga->punya_tempat_sampah == 'Ya')
                                                            <i class="fas fa-check"></i>
                                                        @else
                                                            0
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($data_keluarga_warga->punya_saluran_air == 'Ya')
                                                            <i class="fas fa-check"></i>
                                                        @else
                                                            0
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($data_keluarga_warga->punya_jamban == 'Ya')
                                                            <i class="fas fa-check"></i>
                                                        @else
                                                            0
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($data_keluarga_warga->tempel_stiker == 'Ya')
                                                            <i class="fas fa-check"></i>
                                                        @else
                                                            0
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($data_keluarga_warga->sumber_air == 'PDAM')
                                                            <i class="fas fa-check"></i>
                                                        @else
                                                        0
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($data_keluarga_warga->sumber_air == 'Sumur')
                                                            <i class="fas fa-check"></i>
                                                        @else
                                                            0
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($data_keluarga_warga->sumber_air == 'Lainnya')
                                                            <i class="fas fa-check"></i>
                                                        @else
                                                            0
                                                        @endif
                                                    </td>

                                                    <td>{{ $data_keluarga_warga->sum('jumlah_jamban') }}</td>

                                                    <td>
                                                        @if ($data_keluarga_warga->makanan_pokok == 'Beras')
                                                            <i class="fas fa-check"></i>
                                                        @else
                                                            0
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if ($data_keluarga_warga->makanan_pokok == 'Non Beras')
                                                            <i class="fas fa-check"></i>
                                                        @else
                                                            0
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if ($data_keluarga_warga->aktivitas_UP2K == 'Ya')
                                                            <i class="fas fa-check"></i>
                                                        @else
                                                            0
                                                        @endif
                                                    </td>
                                                @endforeach

                                                @if ($data_kegiatan_wargas = $data_warga->kegiatan)
                                                    @foreach ($data_kegiatan_wargas as $data_kegiatan_warga)
                                                        @if ($data_kegiatan = $data_kegiatan_warga->keterangan_kegiatan->nama_keterangan)
                                                            <td>
                                                                @if ($data_kegiatan == 'Pemanfaatan dan Pekarangan')
                                                                    <i class="fas fa-check"></i>
                                                                @else
                                                                    0
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($data_kegiatan == 'Industri Rumah Tangga')
                                                                    <i class="fas fa-check"></i>
                                                                @else
                                                                    0
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($data_kegiatan == 'Kerja Bakti')
                                                                    <i class="fas fa-check"></i>
                                                                @else
                                                                    0h
                                                                @endif
                                                            </td>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endif


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



@endpush
