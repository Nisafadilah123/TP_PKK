@extends('super_admin.layout')

@section('title', 'Edit Data Jumlah Data Umum | Super Admin PKK Kab. Indramayu')

@section('bread', 'Edit Data Jumlah Data Umum')
@section('container')

<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Data Jumlah Data Umum</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ url ('/jml_data_umum_super', $jml_data_umum_super->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="card-body">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Nama Desa</label>
                  <select class="form-control" id="id_desa" name="id_desa">
                      {{-- nama desa yang login --}}
                      @foreach ($desas as $c)
                      <option value="{{ $c->id }}" {{ $c->id === $jml_data_umum_super->id_desa ? 'selected' : '' }}>
                        {{ $c->kode_desa }}-{{ $c->nama_desa }}
                    </option>
              @endforeach
                  </select>
              </div>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label>Jumlah KRT Data Umum</label>
            <input type="number" class="form-control" name="jml_krt_data_umum" id="jml_krt_data_umum" placeholder="Masukkan Jumlah KRT Data Umum" required value="{{ucfirst(old('jml_krt_data_umum', $jml_data_umum_super->jml_krt_data_umum))}}">
          </div>
          <div class="form-group">
            <label>Jumlah KK Data Umum</label>
            <input type="number" class="form-control" name="jml_kk_data_umum" id="jml_kk_data_umum" placeholder="Masukkan Jumlah KK Data Umum" required value="{{ucfirst(old('jml_kk_data_umum', $jml_data_umum_super->jml_kk_data_umum))}}">
          </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/jml_data_umum_super" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

