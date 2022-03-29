@extends('super_admin.layout')

@section('title', 'Edit Data Jumlah Kelompok Data Umum | Super Admin PKK Kab. Indramayu')

@section('bread', 'Edit Data Jumlah Kelompok Data Umum')
@section('container')

<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Data Jumlah Kelompok Data Umum</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ url ('/kelompok_super', $kelompok_super->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="card-body">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Nama Desa</label>
                  <select class="form-control" id="id_desa" name="id_desa">
                      {{-- nama desa yang login --}}
                      @foreach ($desas as $c)
                            <option value="{{ $c->id }}" {{ $c->id === $kelompok_super->id_desa ? 'selected' : '' }}>
                                {{ $c->kode_desa }}-{{ $c->nama_desa }}
                            </option>
                      @endforeach
                  </select>
              </div>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label>Jumlah Kelompok PKK Dusun</label>
            <input type="number" class="form-control" name="jml_pkk_dusun" id="jml_pkk_dusun" placeholder="Masukkan Jumlah Kelompok PKK Dusun" required value="{{ucfirst(old('jml_pkk_dusun', $kelompok_super->jml_pkk_dusun))}}">
          </div>
          <div class="form-group">
            <label>Jumlah Kelompok PKK RW</label>
            <input type="number" class="form-control" name="jml_pkk_rw" id="jml_pkk_rw" placeholder="Masukkan Jumlah Kelompok PKK RW" required value="{{ucfirst(old('jml_pkk_rw', $kelompok_super->jml_pkk_rw))}}">
          </div>
          <div class="form-group">
            <label>Jumlah Kelompok PKK RT</label>
            <input type="number" class="form-control" name="jml_pkk_rt" id="jml_pkk_rt" placeholder="Masukkan Jumlah Kelompok PKK RT" required value="{{ucfirst(old('jml_pkk_rt', $kelompok_super->jml_pkk_rt))}}">
          </div>
          <div class="form-group">
            <label>Jumlah Kelompok Dasawisma</label>
            <input type="number" class="form-control" name="jml_dasawisma" id="jml_dasawisma" placeholder="Masukkan Jumlah Kelompok Dasawisma" required value="{{ucfirst(old('jml_dasawisma', $kelompok_super->jml_dasawisma))}}">
          </div>
          <div class="form-group">
            <label>Periode</label>
            <input type="number" class="form-control" name="periode" id="periode" placeholder="Masukkan Periode" required value="{{ucfirst(old('periode', $kelompok_super->periode))}}">
          </div>
            
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/kelompok_super" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

