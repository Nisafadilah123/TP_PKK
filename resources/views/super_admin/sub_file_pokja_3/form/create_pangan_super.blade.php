@extends('super_admin.layout')

@section('title', 'Tambah Data Jumlah Pangan POKJA III | Super Admin PKK Kab. Indramayu')

@section('bread', 'Tambah Data Jumlah pangan POKJA III')
@section('container')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tambah Data Jumlah pangan POKJA III</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ route('pangan_super.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-md-4">
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

            <div class="col-md-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Pangan Makanan Beras</label>
                        <input type="number" class="form-control" name="jml_makanan_beras" id="jml_makanan_beras" placeholder="Masukkan Jumlah Pangan Makanan Beras" required>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Pangan Makanan Non Beras</label>
                        <input type="number" class="form-control" name="jml_makanan_nonberas" id="jml_makanan_nonberas" placeholder="Masukkan Jumlah Pangan Makanan Non Beras" required>
                      </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Pangan Pemanfaatan Peternak</label>
                        <input type="number" class="form-control" name="jml_pemanfaatan_peternakan" id="jml_pemanfaatan_peternakan" placeholder="Masukkan Jumlah Pangan Pemanfaatan Peternakan" required>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Pangan Pemanfaatan Perikanan</label>
                        <input type="number" class="form-control" name="jml_pemanfaatan_perikanan" id="jml_pemanfaatan_perikanan" placeholder="Masukkan Jumlah Pangan Pemanfaatan Perikanan" required>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Pangan Pemanfaatan Warung Hidup</label>
                        <input type="number" class="form-control" name="jml_pemanfaatan_warung_hidup" id="jml_pemanfaatan_warung_hidup" placeholder="Masukkan Jumlah Pangan Pemanfaatan Warung Hidup" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Pangan Pemanfaatan Limbung Hidup</label>
                        <input type="number" class="form-control" name="jml_pemanfaatan_limbung_hidup" id="jml_pemanfaatan_limbung_hidup" placeholder="Masukkan Jumlah Pangan Pemanfaatan Limbung Hidup" required>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Pangan Pemanfaatan TOGA</label>
                        <input type="number" class="form-control" name="jml_pemanfaatan_toga" id="jml_pemanfaatan_toga" placeholder="Masukkan Jumlah Pangan Pemanfaatan TOGA" required>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Pangan Pemanfaatan Tanaman Keras</label>
                        <input type="number" class="form-control" name="jml_pemanfaatan_tanaman_keras" id="jml_pemanfaatan_tanaman_keras" placeholder="Masukkan Jumlah Pangan Pemanfaatan Tanaman Keras" required>
                    </div>
                </div>
            </div>
        </div>

        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/pangan" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

