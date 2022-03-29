@extends('super_admin.layout')

@section('title', 'Edit Data Perencanaan Sehat POKJA IV | Super Admin PKK Kab. Indramayu')

@section('bread', 'Edit Data Perencanaan Sehat POKJA IV')
@section('container')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Data Perencanaan Sehat POKJA IV</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ url ('/perencanaan_super', $perencanaan_super->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-sm-4">
                <div class="card-body">
                    <div class="form-group">
                    <label for="exampleFormControlSelect1">Nama Desa</label>
                        <select class="form-control" id="id_desa" name="id_desa">
                            {{-- nama desa yang login --}}
                            @foreach ($desas as $c)
                            <option value="{{ $c->id }}" {{ $c->id === $perencanaan_super->id_desa ? 'selected' : '' }}>
                                {{ $c->kode_desa }}-{{ $c->nama_desa }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah PUS</label>
                        <input type="number" class="form-control" name="jml_PUS" id="jml_PUS" placeholder="Masukkan Jumlah PUS" required value="{{ucfirst(old('jml_PUS', $perencanaan_super->jml_PUS))}}">
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah WUS</label>
                        <input type="number" class="form-control" name="jml_WUS" id="jml_WUS" placeholder="Masukkan Jumlah WUS" required value="{{ucfirst(old('jml_WUS', $perencanaan_super->jml_WUS))}}">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label>Jumlah Anggota Akseptor Laki-laki</label>
                            <input type="number" class="form-control" name="jml_anggota_akseptor_laki" id="jml_anggota_akseptor_laki" placeholder="Masukkan Jumlah Anggota Akseptor Laki-laki" required value="{{ucfirst(old('jml_anggota_akseptor_laki', $perencanaan_super->jml_anggota_akseptor_laki))}}">
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Anggota Akseptor Perempuan</label>
                        <input type="number" class="form-control" name="jml_anggota_akseptor_perempuan" id="jml_anggota_akseptor_perempuan" placeholder="Masukkan Jumlah Anggota Akseptor Perempuan" required value="{{ucfirst(old('jml_anggota_akseptor_perempuan', $perencanaan_super->jml_anggota_akseptor_perempuan))}}">
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah KK Memiliki Tabungan</label>
                        <input type="number" class="form-control" name="jml_kk_tabungan" id="jml_kk_tabungan" placeholder="Masukkan Jumlah KK Memiliki Tabungan" required value="{{ucfirst(old('jml_kk_tabungan', $perencanaan_super->jml_kk_tabungan))}}">
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Periode</label>
                        <input type="number" class="form-control" name="periode" id="periode" placeholder="Masukkan Periode" required value="{{ucfirst(old('periode', $perencanaan_super->periode))}}">
                    </div>
                </div>
            </div>
        </div>

        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/perencanaan_super" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

