@extends('super_admin.layout')

@section('title', 'Tambah Data Jumlah Kader POKJA IV | Super Admin PKK Kab. Indramayu')

@section('bread', 'Tambah Data Jumlah Kader POKJA IV')
@section('container')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tambah Data Jumlah Kader POKJA IV</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ route('kader_pokja4_super.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-sm-4">
                <div class="card-body">
                    <div class="form-group">
                    <label for="exampleFormControlSelect1">Nama Desa</label>
                        <select class="form-control" id="id_desa" name="id_desa">
                            {{-- nama desa yang login --}}
                            @foreach ($desas as $c)
                                <option value="{{$c->id }}">  {{$c->kode_desa }}-{{ $c->nama_desa }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Kader Posyandu</label>
                        <input type="number" class="form-control" name="jml_kader_posyandu" id="jml_kader_posyandu" placeholder="Masukkan Jumlah Kader Posyandu" required>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Kader Gizi</label>
                        <input type="number" class="form-control" name="jml_kader_gizi" id="jml_kader_gizi" placeholder="Masukkan Jumlah Kader Gizi" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label>Jumlah Kader Kesling</label>
                            <input type="number" class="form-control" name="jml_kader_kesling" id="jml_kader_kesling" placeholder="Masukkan Jumlah Kader Kesling" required>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Kader Penyuluhan Narkoba</label>
                        <input type="number" class="form-control" name="jml_kader_penyuluhan_narkoba" id="jml_kader_penyuluhan_narkoba" placeholder="Masukkan Jumlah Kader Penyuluhan Narkoba" required>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Kader PHBS</label>
                        <input type="number" class="form-control" name="jml_kader_PHBS" id="jml_kader_PHBS" placeholder="Masukkan Jumlah Kader PHBS" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label>Jumlah Kader KB</label>
                            <input type="number" class="form-control" name="jml_kader_KB" id="jml_kader_KB" placeholder="Masukkan Jumlah Kader KB" required>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label>Periode</label>
                            <input type="number" class="form-control" name="periode" id="periode" placeholder="Masukkan Periode" required>
                        </div>

                    </div>
                </div>
            </div>
       </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/kader_pokja4_super" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

