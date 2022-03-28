@extends('admin_desa.layout')

@section('title', 'Edit Data Jumlah Kesehatan POKJA IV | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Edit Data Jumlah Kesehatan POKJA IV')
@section('container')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Data Jumlah Kesehatan POKJA IV</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ url ('/kesehatan', $kesehatan->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-sm-4">
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
            </div>

            <div class="col-sm-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Posyandu</label>
                        <input type="number" class="form-control" name="jml_posyandu" id="jml_posyandu" placeholder="Masukkan Jumlah Posyandu" required value="{{ucfirst(old('jml_posyandu', $kesehatan->jml_posyandu))}}">
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Posyandu Terintegrasi</label>
                        <input type="number" class="form-control" name="jml_posyandu_terintegrasi" id="jml_posyandu_terintegrasi" placeholder="Masukkan Jumlah Posyandu Terintegrasi" required value="{{ucfirst(old('jml_posyandu_terintegrasi', $kesehatan->jml_posyandu_terintegrasi))}}">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label>Jumlah Posyandu Lansia KLP</label>
                            <input type="number" class="form-control" name="jml_posyandu_lansia_klp" id="jml_posyandu_lansia_klp" placeholder="Masukkan Jumlah Posyandu Lansia KLP" required value="{{ucfirst(old('jml_posyandu_lansia_klp', $kesehatan->jml_posyandu_lansia_klp))}}">
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Posyandu Lansia Anggota</label>
                        <input type="number" class="form-control" name="jml_posyandu_lansia_anggota" id="jml_posyandu_lansia_anggota" placeholder="Masukkan Jumlah Posyandu Lansia Anggota" required value="{{ucfirst(old('jml_posyandu_lansia_anggota', $kesehatan->jml_posyandu_lansia_anggota))}}">
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Posyandu Lansia Memiliki Kartu Berobat Gratis</label>
                        <input type="number" class="form-control" name="jml_posyandu_lansia_memiliki_kartu" id="jml_posyandu_lansia_memiliki_kartu" placeholder="Masukkan Jumlah Posyandu Lansia Memiliki Kartu Berobat Gratis" required value="{{ucfirst(old('jml_posyandu_lansia_memiliki_kartu', $kesehatan->jml_posyandu_lansia_memiliki_kartu))}}">
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Periode</label>
                        <input type="number" class="form-control" name="periode" id="periode" placeholder="Masukkan Periode" required value="{{ucfirst(old('periode', $kesehatan->periode))}}">
                    </div>
                </div>
            </div>
        </div>

       </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/kesehatan" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

