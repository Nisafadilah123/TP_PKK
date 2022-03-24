@extends('admin_desa.layout')

@section('title', 'Tambah Data Jumlah Tenaga Data Umum | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Tambah Data Jumlah Tenaga Data Umum')
@section('container')

<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tambah Data Jumlah Tenaga Data Umum</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ route('jml_tenaga_umum.store') }}" method="POST">
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
            <label>Jumlah Tenaga Sekretariat Data Umum Honorer Laki-laki</label>
            <input type="number" class="form-control" name="jml_tenaga_honorer_laki" id="jml_tenaga_honorer_laki" placeholder="Masukkan Jumlah Tenaga Sekretariat Data Umum Honorer Laki-laki" required>
          </div>
          <div class="form-group">
            <label>Jumlah Tenaga Sekretariat Data Umum Honorer Perempuan</label>
            <input type="number" class="form-control" name="jml_tenaga_honorer_perempuan" id="jml_tenaga_honorer_perempuan" placeholder="Masukkan Jumlah Tenaga Sekretariat Data Umum Honorer Perempuan" required>
          </div>
          <div class="form-group">
            <label>Jumlah Tenaga Sekretariat Data Umum Bantuan Laki-laki</label>
            <input type="number" class="form-control" name="jml_tenaga_bantuan_laki" id="jml_tenaga_bantuan_laki" placeholder="Masukkan Jumlah Tenaga Sekretariat Data Umum Bantuan Laki-laki" required>
          </div>
          <div class="form-group">
            <label>Jumlah Tenaga Sekretariat Data Umum Bantuan Perempuan</label>
            <input type="number" class="form-control" name="jml_tenaga_bantuan_perempuan" id="jml_tenaga_bantuan_perempuan" placeholder="Masukkan Jumlah Tenaga Sekretariat Data Umum Bantuan Perempuan" required>
          </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/jml_tenaga_umum" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

