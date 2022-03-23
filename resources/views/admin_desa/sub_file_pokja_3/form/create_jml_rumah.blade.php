@extends('admin_desa.layout')

@section('title', 'Tambah Data Jumlah Rumah | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Tambah Data Jumlah Rumah')
@section('container')

<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tambah Data Jumlah Rumah</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ route('rumah.store') }}" method="POST">
        @csrf
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
        <div class="card-body">
          <div class="form-group">
            <label>Jumlah Rumah Sehat</label>
            <input type="number" class="form-control" name="jml_rumah_sehat" id="jml_rumah_sehat" placeholder="Masukkan Jumlah Rumah Sehat" required>
          </div>
          <div class="form-group">
            <label>Jumlah Rumah Kurang Sehat</label>
            <input type="number" class="form-control" name="jml_rumah_kurang_sehat" id="jml_rumah_sehat" placeholder="Masukkan Jumlah Rumah Kurang Sehat" required>
          </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/rumah" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

