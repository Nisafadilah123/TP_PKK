@extends('admin_desa.layout')

@section('title', 'Tambah Data Jumlah Kader | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Tambah Data Jumlah Kader')
@section('container')

<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tambah Data Jumlah Kader</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ route('jml_kader_super.store') }}" method="POST">
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
            <label>Jumlah Kader PKBN</label>
            <input type="number" class="form-control" name="jml_kader_PKBN" id="jml_kader_PKBN" placeholder="Masukkan Jumlah Kader PKBN" required>
          </div>
          <div class="form-group">
            <label>Jumlah Kader PKDRT</label>
            <input type="number" class="form-control" name="jml_kader_PKDRT" id="jml_kader_PKDRT" placeholder="Masukkan Jumlah Kader PKDRT" required>
          </div>
          <div class="form-group">
            <label>Jumlah Kader Pola Asuh</label>
            <input type="number" class="form-control" name="jml_kader_pola_asuh" id="jml_kader_pola_asuh" placeholder="Masukkan Jumlah Kader Pola Asuh" required>
          </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/jml_kader" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

