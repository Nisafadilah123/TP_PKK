@extends('kader.layout')

@section('title', 'Data Rekap Data Warga TP PKK | Kader Desa/Kelurahan PKK Kab. Indramayu')

@section('bread', 'Data Rekap Data Warga TP PKK')
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

                                <br>

                                <table class="table table-striped table-bordered data" id="add-row">
                                    <thead>
                                        <tr>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">No.Registrasi</th>
                                        <th rowspan="2">Nama Anggota Keluarga</th>
                                        <th rowspan="2">Status Dalam Keluarga</th>
                                        <th rowspan="2">Status Dalam Perkawinan</th>
                                        <th colspan="2">Jenis Kelamin</th>
                                        <th rowspan="2">Tgl Lahir/Umur</th>
                                        <th rowspan="2">Pendidikan</th>
                                        <th rowspan="2">Pekerjaan</th>
                                    </tr>
                                    <tr>
                                        <th>L</th>
                                        <th>P</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                        <?php $no=1;?>

                                        @foreach ($warga as $c)
                                        {{-- <div class="row">
                                            <a href="{{ url('print', $c->id) }}" target="_blank" class="btn btn-primary" type="button" role="button"> Print</a><br>
                                        </div> --}}

                                    <tr>
                                        <td style="vertical-align: middle;">{{ $no }}</td>
                                        <td style="vertical-align: middle;">{{ $c->no_registrasi }}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->nama)}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->status)}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->status_perkawinan)}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->jenis_kelamin == 'laki-laki' ? 'laki-laki' :'')}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->jenis_kelamin == 'perempuan' ? 'perempuan' :'')}}</td>
                                        <td style="vertical-align: middle;">{{ \Carbon\Carbon::parse($c->tgl_lahir)->isoFormat('D MMMM Y') }}/{{ ucfirst($c->umur) }} Tahun</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->pendidikan)}}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->pekerjaan)}}</td>
                                    </tr>
                                    <?php $no++ ;?>
                                    @endforeach

                                    </tbody>
                                </table>
                                <a href="{{ url('print', $print->id_keluarga) }}" target="_blank" class="btn btn-primary" type="button" role="button">
                                    <i class="fas fa-print"></i> Cetak ke Printer </a>

                                <a href="{{ url('print_pdf', $print_pdf->id_keluarga) }}" target="_blank" class="btn btn-success" type="button" role="button">
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
