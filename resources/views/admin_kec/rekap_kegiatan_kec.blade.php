@extends('admin_kec.layout')

@section('title', 'Catatan Data Dan Kegiatan Warga Kelompok PKK Kecamatan | Admin Kecamatan PKK Kab. Indramayu')

@section('bread', 'Catatan Data Dan Kegiatan Warga Kelompok PKK Kecamatan')
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
                                <strong>
                                    <h6>CATATAN DATA KEGIATAN WARGA</h6>
                                    <h6>TP PKK KECAMATAN</h6>
                                    <h6>TAHUN</h6><br>
                                    <h6>KECAMATAN </h6>
                                    <h6>KAB/KOTA</h6>
                                    <h6>PROVINSI</h6>
                                </strong>
                            </center>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered data" id="add-row" width="6000px">
                                    <thead>
                                        <tr>
                                        <th rowspan="3" style="text-align: center;">No</th>
                                        <th rowspan="3" style="text-align: center;">Nama Desa/Kelurahan</th>
                                        <th rowspan="3" style="text-align: center;">Jml. Dusun/Ling</th>
                                        <th rowspan="3" style="text-align: center;">Jml. RW</th>
                                        <th rowspan="3" style="text-align: center;">Jml. RT</th>
                                        <th rowspan="3" style="text-align: center;">Jml. Dasa Wisma</th>
                                        <th rowspan="3" style="text-align: center;">Jml. KRT</th>
                                        <th rowspan="3" style="text-align: center;">Jml. KK</th>
                                        <th colspan="12" style="text-align:center;">Jumlah Anggota Keluarga</th>
                                        <th colspan="6" style="text-align:center;">Jumlah Rumah</th>
                                        <th colspan="3" style="text-align:center;">Sumber Air Keluarga</th>
                                        <th rowspan="3" style="text-align: center;">Jml. Jamban Keluarga</th>
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

                                        {{-- @foreach ($warga as $c)
                                    <tr>
                                        <td style="vertical-align: middle;">{{ $no }}</td>
                                        <td style="vertical-align: middle;">{{ $c->no_registrasi }}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->nama)}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->status)}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->status_perkawinan)}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->jenis_kelamin == 'laki-laki' ? 'laki-laki' :'')}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->jenis_kelamin == 'perempuan' ? 'perempuan' :'')}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->tgl_lahir)}}/{{ ucfirst($c->umur) }} Tahun</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->pendidikan)}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->pekerjaan)}}</td>


                                    </tr>
                                    <?php $no++ ;?>

                                    @endforeach
                                    </tbody> --}}

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
