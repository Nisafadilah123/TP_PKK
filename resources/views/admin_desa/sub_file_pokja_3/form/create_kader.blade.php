@extends('admin_desa.layout')

@section('title', 'Tambah Data Jumlah Kader POKJA III | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Tambah Data Jumlah Kader POKJA III')
@section('container')

<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tambah Data Jumlah Kader POKJA III</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ route('kader.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Nama Desa</label>
                 {{-- <select class="form-control" id="id_desa" name="id_desa"> --}}
                {{-- nama desa yang login --}}
                @foreach ($desas as $c)
                {{-- <option value="{{$c->id }}">  {{$c->kode_desa }}-{{ $c->nama_desa }}</option> --}}
                    <input type="hidden" class="form-control" name="id_desa" id="id_desa" placeholder="Masukkan Nama Desa" required value="{{$c->id}}">
                    <input type="text" disabled class="form-control" name="id_desa" id="id_desa" placeholder="Masukkan Nama Desa" required value="{{$c->kode_desa }}-{{ $c->nama_desa }}">
                 @endforeach
                {{-- </select> --}}
              </div>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label>Jumlah kader Pangan</label>
            <input type="number" class="form-control" name="jml_kader_pangan" id="jml_kader_pangan" placeholder="Masukkan Jumlah kader Pangan" required>
          </div>
          <div class="form-group">
            <label>Jumlah kader Sandang</label>
            <input type="number" class="form-control" name="jml_kader_sandang" id="jml_kader_sandang" placeholder="Masukkan Jumlah kader Sandang" required>
          </div>
          <div class="form-group">
            <label>Jumlah kader Tata Laksana</label>
            <input type="number" class="form-control" name="jml_kader_tata_laksana" id="jml_kader_tata_laksana" placeholder="Masukkan Jumlah kader Tata Laksana" required>
          </div>
          <div class="form-group">
            <label>Periode</label>
            <input type="number" class="form-control" name="periode" id="periode" placeholder="Masukkan Periode" required>
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/kader" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

