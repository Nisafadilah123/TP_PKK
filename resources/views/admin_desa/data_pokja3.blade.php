@extends('admin_desa.layout')

@section('title', 'Data POKJA III | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Data POKJA III')
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
                                        <th>Jumlah Kader</th>
                                        <th>Pangan</th>
                                        <th>Jumlah Industri Rumah Tangga</th>
                                        <th>Jumlah Rumah</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        {{-- @foreach ($candidate as $c) --}}
                                    <tr>
                                        <td>
                                            <a href="/kader" type="button" class="btn btn-primary">Detail</button>

                                        </td>
                                        <td>
                                            <a href="/pangan" type="button" class="btn btn-primary">Detail</a>
                                        </td>
                                        <td>
                                            <a href="/industri" type="button" class="btn btn-primary">Detail</a>

                                        </td>
                                        <td>
                                            <a href="/rumah" type="button" class="btn btn-primary">Detail</a>

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
