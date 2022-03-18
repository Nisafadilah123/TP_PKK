@extends('admin_desa.layout')

@section('title', 'Data POKJA II | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Data POKJA II')
@section('container')

    <!-- Main content -->
    <div class="main-content">
    <section class="section">
        {{-- <h1 class="section-header">
            <div>Kandidat</div>
        </h1> --}}

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="add-row">

                                    <thead>
                                        <tr>
                                        <th>Pendidikan dan Keterampilan</th>
                                        <th>Pengembangan Kehidupan Beroperasi</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr>
                                        <td>
                                            <a href="/pendidikan" type="button" class="btn btn-primary">Detail</a>

                                        </td>
                                        <td>
                                            <a href="/koperasi" type="button" class="btn btn-primary">Detail</a>
                                        </td>
                                        
                                    </tr>
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
