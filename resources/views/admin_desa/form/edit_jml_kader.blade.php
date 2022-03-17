@extends('admin_desa.layout')

@section('title', 'Edit Data Jumlah Kader | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Edit Data Jumlah Kader')
@section('container')

<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Data Jumlah Kader</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{ url ('/jml_kader', $data_desa->id) }}" method="POST">
      {{-- @dump($data_desa) --}}
        @method('PUT')
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Nama Desa</label>
                <select class="form-control" id="id_kecamatan" name="id_kecamatan">
                    @foreach ($kecamatans as $kecamatan)
                        <option value="{{ $kecamatan->id }}" {{ $kecamatan->id === $data_desa->id_kecamatan ? 'selected' : '' }}>
                            {{ $kecamatan->kode_kecamatan }}-{{ $kecamatan->nama_kecamatan }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="card-body">
          <div class="form-group">
            <label>Jumlah PKBN Simulasi</label>
            <input type="text" class="form-control" name="jml_PKBN_simulasi" id="jml_PKBN_simulasi" placeholder="Masukkan Jumlah PKBN Simulasi" required>
          </div>
          <div class="form-group">
            <label>Nama Desa</label>
            <input type="text" class="form-control" name="nama_desa" id="nama_desa" placeholder="Masukkan Nama Desa" required value="{{ucfirst(old('nama_desa', $data_desa->nama_desa))}}">
          </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/data_desa" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

