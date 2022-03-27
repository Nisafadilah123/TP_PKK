@extends('admin_desa.layout')

@section('title', 'Edit Data Jumlah Industri Rumah Tangga | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Edit Data Jumlah Industri Rumah Tangga')
@section('container')

<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Data Jumlah Industri Rumah Tangga</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ url ('/industri', $industri->id) }}" method="POST">
      @method('PUT')

        @csrf
        <div class="card-body">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Nama Desa</label>
                  <select class="form-control" id="id_desa" name="id_desa">
                      {{-- nama desa yang login --}}
                      @foreach ($desas as $d)
                      <option value="{{ $d->id }}" {{ $d->id === $industri->id_desa ? 'selected' : '' }}>
                          {{ $d->kode_desa }}-{{ $d->nama_desa }}
                      </option>
                  @endforeach
                  </select>
              </div>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label>Jumlah Industri Sandang</label>
            <input type="number" class="form-control" name="jml_industri_sandang" id="jml_industri_sandang" placeholder="Masukkan Jumlah Industri Sandang" required value="{{ucfirst(old('jml_industri_sandang', $industri->jml_industri_sandang))}}">
          </div>
          <div class="form-group">
            <label>Jumlah Industri Pangan</label>
            <input type="number" class="form-control" name="jml_industri_pangan" id="jml_industri_pangan" placeholder="Masukkan Jumlah Industri Pangan" required value="{{ucfirst(old('jml_industri_pangan', $industri->jml_industri_pangan))}}">
          </div>
          <div class="form-group">
            <label>Jumlah Industri Jasa</label>
            <input type="number" class="form-control" name="jml_industri_jasa" id="jml_industri_jasa" placeholder="Masukkan Jumlah Industri Jasa" required value="{{ucfirst(old('jml_industri_jasa', $industri->jml_industri_jasa))}}">
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/industri" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

