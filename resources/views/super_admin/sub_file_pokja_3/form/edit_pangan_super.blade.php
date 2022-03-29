@extends('super_admin.layout')

@section('title', 'Edit Data Jumlah Pangan POKJA III | Super Admin PKK Kab. Indramayu')

@section('bread', 'Edit Data Jumlah pangan POKJA III')
@section('container')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Data Jumlah pangan POKJA III</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ url ('/pangan_super', $pangan_super->id) }}" method="POST">
        @method('PUT')

        @csrf

        <div class="row">
            <div class="col-md-4">
                <div class="card-body">
                    <div class="form-group">
                    <label for="exampleFormControlSelect1">Nama Desa</label>
                        <select class="form-control" id="id_desa" name="id_desa">
                            {{-- nama desa yang login --}}
                            @foreach ($desas as $c)
                            <option value="{{ $c->id }}" {{ $c->id === $pangan_super->id_desa ? 'selected' : '' }}>
                                {{ $c->kode_desa }}-{{ $c->nama_desa }}
                            </option>
                                  @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Pangan Makanan Beras</label>
                        <input type="number" class="form-control" name="jml_makanan_beras" id="jml_makanan_beras" placeholder="Masukkan Jumlah Pangan Makanan Beras" required value="{{ucfirst(old('jml_makanan_beras', $pangan_super->jml_makanan_beras))}}">
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Pangan Makanan Non Beras</label>
                        <input type="number" class="form-control" name="jml_makanan_nonberas" id="jml_makanan_nonberas" placeholder="Masukkan Jumlah Pangan Makanan Non Beras" required value="{{ucfirst(old('jml_makanan_nonberas', $pangan_super->jml_makanan_nonberas))}}">
                      </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Pangan Pemanfaatan Peternak</label>
                        <input type="number" class="form-control" name="jml_pemanfaatan_peternakan" id="jml_pemanfaatan_peternakan" placeholder="Masukkan Jumlah Pangan Pemanfaatan Peternakan" required value="{{ucfirst(old('jml_pemanfaatan_peternakan', $pangan_super->jml_pemanfaatan_peternakan))}}">
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Pangan Pemanfaatan Perikanan</label>
                        <input type="number" class="form-control" name="jml_pemanfaatan_perikanan" id="jml_pemanfaatan_perikanan" placeholder="Masukkan Jumlah Pangan Pemanfaatan Perikanan" required value="{{ucfirst(old('jml_pemanfaatan_perikanan', $pangan_super->jml_pemanfaatan_perikanan))}}">
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Pangan Pemanfaatan Warung Hidup</label>
                        <input type="number" class="form-control" name="jml_pemanfaatan_warung_hidup" id="jml_pemanfaatan_warung_hidup" placeholder="Masukkan Jumlah Pangan Pemanfaatan Warung Hidup" required value="{{ucfirst(old('jml_pemanfaatan_warung_hidup', $pangan_super->jml_pemanfaatan_warung_hidup))}}">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Pangan Pemanfaatan Limbung Hidup</label>
                        <input type="number" class="form-control" name="jml_pemanfaatan_limbung_hidup" id="jml_pemanfaatan_limbung_hidup" placeholder="Masukkan Jumlah Pangan Pemanfaatan Limbung Hidup" required value="{{ucfirst(old('jml_pemanfaatan_limbung_hidup', $pangan_super->jml_pemanfaatan_limbung_hidup))}}">
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Pangan Pemanfaatan TOGA</label>
                        <input type="number" class="form-control" name="jml_pemanfaatan_toga" id="jml_pemanfaatan_toga" placeholder="Masukkan Jumlah Pangan Pemanfaatan TOGA" required value="{{ucfirst(old('jml_pemanfaatan_toga', $pangan_super->jml_pemanfaatan_toga))}}">
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Pangan Pemanfaatan Tanaman Keras</label>
                        <input type="number" class="form-control" name="jml_pemanfaatan_tanaman_keras" id="jml_pemanfaatan_tanaman_keras" placeholder="Masukkan Jumlah Pangan Pemanfaatan Tanaman Keras" required value="{{ucfirst(old('jml_pemanfaatan_tanaman_keras', $pangan_super->jml_pemanfaatan_tanaman_keras))}}">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Periode</label>
                        <input type="number" class="form-control" name="periode" id="periode" placeholder="Masukkan Periode" required value="{{ucfirst(old('periode', $pangan_super->periode))}}">
                    </div>
                </div>
            </div>

        </div>

        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/pangan_super" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

