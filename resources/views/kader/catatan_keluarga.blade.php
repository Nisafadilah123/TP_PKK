@extends('kader.layout')

@section('title', 'Catatan Keluarga TP PKK | Kader Desa/Kelurahan PKK Kab. Indramayu')

@section('bread', 'Catatan Keluarga TP PKK')
@section('container')

    <!-- Main content -->
<div class="main-content">
    <section class="section">

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <center><h5><strong> Catatan Keluarga </strong></h5></center>

                            <div class="row">
                                <div class="col-sm-10">
                                    <h6>Catatan Keluarga dari : {{ ucfirst($kepala_keluarga->nama) }}</h6>
                                    <h6>Anggota Kelompok Dasawisma : {{ ucfirst($kepala_keluarga->dasa_wisma) }}</h6>
                                    <h6>Tahun : {{ ucfirst($kepala_keluarga->periode) }}</h6>
                                </div>
                                <div class="col-sm-2">
                                    <h6>Kriteria Rumah : {{ ucfirst($keluarga->kriteria_rumah) }}</h6>
                                    <h6>Jamban Keluarga : {{ ucfirst($keluarga->punya_jamban) }}</h6>
                                    <h6>Sumber Air : {{ ucfirst($keluarga->sumber_air) }}</h6>
                                    <h6>Tempat Sampah : {{ ucfirst($keluarga->punya_tempat_sampah) }}</h6>
                                </div>
                            </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered data" id="add-row">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2">No</th>
                                                    <th rowspan="2">Nama Anggota Keluarga</th>
                                                    <th rowspan="2">Status Perkawinan</th>
                                                    <th rowspan="2">Jenis Kelamin</th>
                                                    <th rowspan="2">Tempat Lahir</th>
                                                    <th rowspan="2">Agama</th>
                                                    <th rowspan="2">Pendidikan</th>
                                                    <th rowspan="2">Pekerjaan</th>
                                                    <th rowspan="2">Berkebutuhan Khusus</th>
                                                    <th colspan="8"><center>Kegiatan Yang diikuti</center></th>
                                                    {{-- <th rowspan="2">Ket</th> --}}

                                                </tr>
                                                <tr>
                                                    {{-- <th>Penghayatan Dan Pengamalan Pancasilal</th>
                                                    <th>Gotong Royong</th>
                                                    <th>Pendidikan dan Keterampilan</th>
                                                    <th>Pengembangan Kehidupan Berkoperasi</th>
                                                    <th>Pangan</th>
                                                    <th>Sandang</th>
                                                    <th>Kesehatan</th>
                                                    <th>Perencanaan Sehat</th> --}}
                                                    @foreach ($kategori_kegiatans as $kategori_kegiatan)
                                                        <th>{{ $kategori_kegiatan->nama_kegiatan }}</th>
                                                    @endforeach
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php $no=1;?>

                                                    @foreach ($catatan_keluarga as $data_warga)
                                                        <tr>
                                                            <td style="vertical-align: middle;">{{ $no }}</td>
                                                            <td style="vertical-align: middle;">{{ucfirst($data_warga->nama)}}</td>
                                                            <td style="vertical-align: middle;">{{ucfirst($data_warga->status)}}</td>
                                                            <td style="vertical-align: middle;">{{ucfirst($data_warga->status_perkawinan)}}</td>
                                                            <td style="vertical-align: middle;">{{ucfirst($data_warga->jenis_kelamin)}}</td>
                                                            <td style="vertical-align: middle;">{{ucfirst($data_warga->tgl_lahir)}}/{{ ucfirst($data_warga->umur) }} Tahun</td>
                                                            <td style="vertical-align: middle;">{{ucfirst($data_warga->pendidikan)}}</td>
                                                            <td style="vertical-align: middle;">{{ucfirst($data_warga->pekerjaan)}}</td>
                                                            <td style="vertical-align: middle;">{{ucfirst($data_warga->berkebutuhan_khusus)}}</td>

                                                            @foreach ($kategori_kegiatans as $kategori_kegiatan)
                                                                <td>
                                                                    @if ($data_kegiatan_wargas = $data_warga->kegiatan)
                                                                        <ul>
                                                                            @foreach ($data_kegiatan_wargas as $data_kegiatan_warga)
                                                                                @if ($data_kegiatan_warga->kategori_kegiatan->id === $kategori_kegiatan->id)
                                                                                    <li>{{ $data_kegiatan_warga->keterangan_kegiatan->nama_keterangan }}</li>
                                                                                @endif
                                                                            @endforeach
                                                                        </ul>
                                                                    @endif
                                                                </td>
                                                            @endforeach
                                                        </tr>
                                                    @endforeach
                                                    <?php $no++ ;?>
                                            </tbody>
                                        </table>
                                        <a href="{{ url('print_cakel', $print_cakel->id) }}" target="_blank" class="btn btn-primary" type="button" role="button">
                                            <i class="fas fa-print"></i> Cetak ke Printer </a>

                                        <a href="{{ url('print_pdf_cakel', $print_pdf_cakel->id) }}" target="_blank" class="btn btn-success" type="button" role="button">
                                            <i class="fas fa-print"></i> Cetak ke PDF </a><br>
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
