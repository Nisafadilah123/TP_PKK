@extends('admin_desa.layout')

@section('title', 'Data POKJA I Desa TP PKK | Admin Desa/Kelurahan PKK Kab. Indramayu')

@section('bread', 'Data POKJA I Desa TP PKK')
@section('container')

    <!-- Main content -->
    <div class="main-content">
    <section class="section">

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- nama tp PKK desa --}}
                            <h6>TP PKK</h6>
                            <h6>Tahun</h6>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered data" id="add-row">
                                    <thead>
                                        <tr>
                                        <th rowspan="3">No</th>
                                        <th rowspan="3">Nama Dusun/Ling</th>
                                        <th colspan="3">Jml. Kader</th>
                                        <th colspan="8">Penghayatan dan Pengamalan Pancasila</th>
                                        <th colspan="1">Gotong Royong</th>
                                        <th rowspan="3">Keterangan</th>
                                    </tr>
                                    <tr>
                                        <th rowspan="1">PKBN</th>
                                        <th>PKDRT</th>
                                        <th>Pola Asuh</th>
                                        <th colspan="2">PKBN</th>
                                        <th colspan="2">PKDRT</th>
                                        <th colspan="2">Pola Asuh</th>
                                        <th colspan="2">Lansia</th>
                                        <th colspan="5">Jumlah Kelompok</th>

                                    </tr>
                                    <th>Jml. KLP Simulasi</th>

                                    <tr>
                                    </tr>
                                    </thead>

                                    {{-- <tbody>
                                        <?php $no=1;?>

                                        @foreach ($warga as $c)
                                    <tr>
                                        <td style="vertical-align: middle;">{{ $no }}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->nama_kepala_rumah_tangga)}}</td>
                                        <td class="text-center">
                                                <a class="btn btn-success btn-sm" href="{{ url('rekap_data_warga/'.$c->id.'/rekap_data_warga') }}">Rekap</a>
                                                <a class="btn btn-primary btn-sm" href="{{ url('catatan_keluarga/'.$c->id.'/catatan_keluarga') }}">Catatan Keluarga</a>

                                        </td>

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
