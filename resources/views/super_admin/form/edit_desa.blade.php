@extends('super_admin.layout')

@section('title', 'Edit Data Wilayah Desa | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Edit Data Wilayah Desa')
@section('container')

<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Data Desa</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{ url ('/data_desa', $data_desa->id) }}" method="POST">
      {{-- @dump($data_desa) --}}
        @method('PUT')
        @csrf
        <div class="card-body">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Kecamatan</label>
              <input type="text" class="form-control" name="id_kecamatan" id="id_kecamatan" placeholder="Masukkan Kode Desa" required value="{{ucfirst(old('id_kecamatan', $data_desa->kecamatan->id_kecamatan))}}" >
                  <select class="form-control" id="id_kecamatan" name="id_kecamatan">
                      @foreach ($kec as $c)
                          <option value="{{$c->id }}">  {{$c->kecamatan->kode_kecamatan }}-{{ $c->kecamatan->nama_kecamatan }}</option>
                      @endforeach
                  </select>
              </div>
        </div>

        <div class="card-body">
          <div class="form-group">
            <label>Kode Desa</label>
            <input type="text" class="form-control" name="kode_desa" id="kode_desa" placeholder="Masukkan Kode Desa" required value="{{ucfirst(old('kode_desa', $data_desa->kode_desa))}}" >
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

