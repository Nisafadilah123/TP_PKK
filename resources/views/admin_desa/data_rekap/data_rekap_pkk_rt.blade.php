@extends('admin_desa.layout')

@section('title', 'Rekapitulasi Catatan Data Dan Kegiatan Warga Kelompok PKK RT | Admin Desa/Kelurahan PKK Kab. Indramayu')

@section('bread', 'Rekapitulasi Catatan Data Dan Kegiatan Warga Kelompok PKK RT')
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
                                <h6><strong>KELOMPOK PKK RT</strong> </h6>
                                @foreach ($rekap as $item)
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
                                        <th rowspan="3" style="text-align: center;">No</th>
                                        <th rowspan="3" style="text-align: center;">Nama Dasa Wisma</th>
                                        <th rowspan="3" style="text-align: center;">Jml. KRT</th>
                                        <th rowspan="3" style="text-align: center;">Jml. KK</th>
                                        <th colspan="11" style="text-align:center;">Jumlah Anggota Keluarga</th>
                                        <th colspan="6" style="text-align:center;">Jumlah Rumah</th>
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
                                        <th>Sehat</th>
                                        <th>Tidak Sehat</th>
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
                                            <td style="vertical-align: middle;">{{ $data_warga->warga_dasa_wisma }}</td>
                                            <td>{{ $data_warga->id }}</td>
                                            <td>{{ $data_warga->jumlah_KK }}</td>
                                            <td>{{ $data_warga->laki_laki}}</td>
                                            <td>{{ $data_warga->perempuan}}</td>
                                            <td>{{ $data_warga->jumlah_balita_laki}}</td>
                                            <td>{{ $data_warga->jumlah_balita_perempuan}}</td>
                                            <td>{{ $data_warga->jumlah_3_buta }}</td>
                                            <td>{{ $data_warga->jumlah_PUS}}</td>
                                            <td>{{ $data_warga->jumlah_WUS }}</td>
                                            <td>{{ $data_warga->jumlah_ibu_hamil }}</td>
                                            <td>{{ $data_warga->jumlah_ibu_menyusui }}</td>
                                            <td>{{ $data_warga->jumlah_lansia }}</td>
                                            <td>{{ $data_warga->jumlah_kebutuhan }}</td>

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
