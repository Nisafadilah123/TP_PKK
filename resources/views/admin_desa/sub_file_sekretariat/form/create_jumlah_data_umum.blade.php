@extends('admin_desa.layout')

@section('title', 'Tambah Data Jumlah Data Umum | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Tambah Data Jumlah Data Umum')
@section('container')

<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tambah Data Jumlah Data Umum</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ route('jml_data_umum.store') }}" method="POST">
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
            <label>Jumlah KRT Data Umum</label>
            <input type="number" class="form-control" name="jml_krt_data_umum" id="jml_krt_data_umum" placeholder="Masukkan Jumlah KRT Data Umum" required>
          </div>
          <div class="form-group">
            <label>Jumlah KK Data Umum</label>
            <input type="number" class="form-control" name="jml_kk_data_umum" id="jml_kk_data_umum" placeholder="Masukkan Jumlah KK Data Umum" required>
          </div>
          <div class="form-group">
            <label>Periode</label>
            <input type="number" class="form-control" name="periode" id="periode" placeholder="Masukkan Periode" required>
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/jml_data_umum" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

