@extends('admin_desa.layout')

@section('title', 'Edit Data Jumlah Kader Data Umum | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Edit Data Jumlah Kader Data Umum')
@section('container')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Data Jumlah Kader Data Umum</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ url ('/jml_kader_umum', $jml_kader_umum->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-6">
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
            <div class="col-md-6">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Kader Anggota TP PKK Laki-laki Data Umum</label>
                        <input type="number" class="form-control" name="jml_kader_anggota_pkk_laki_data_umum" id="jml_kader_anggota_pkk_laki_data_umum" placeholder="Masukkan Jumlah Kader Anggota TP PKK Laki-laki Data Umum" required value="{{ucfirst(old('jml_kader_anggota_pkk_laki_data_umum', $jml_kader_umum->jml_kader_anggota_pkk_laki_data_umum))}}">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Kader Anggota TP PKK Perempuan Data Umum</label>
                        <input type="number" class="form-control" name="jml_kader_anggota_pkk_perempuan_data_umum" id="jml_kader_anggota_pkk_perempuan_data_umum" placeholder="Masukkan Jumlah Kader Anggota TP PKK Perempuan Data Umum" required value="{{ucfirst(old('jml_kader_anggota_pkk_perempuan_data_umum', $jml_kader_umum->jml_kader_anggota_pkk_perempuan_data_umum))}}">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-body">
                     <div class="form-group">
                        <label>Jumlah Kader Umum Laki-laki Data Umum</label>
                        <input type="number" class="form-control" name="jml_kader_umum_laki_data_umum" id="jml_kader_umum_laki_data_umum" placeholder="Masukkan Jumlah Kader Umum Laki-laki Data Umum" required value="{{ucfirst(old('jml_kader_umum_laki_data_umum', $jml_kader_umum->jml_kader_umum_laki_data_umum))}}">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Kader Umum Perempuan Data Umum</label>
                        <input type="number" class="form-control" name="jml_kader_umum_perempuan_data_umum" id="jml_kader_umum_perempuan_data_umum" placeholder="Masukkan Jumlah Kader Umum Perempuan Data Umum" required value="{{ucfirst(old('jml_kader_umum_perempuan_data_umum', $jml_kader_umum->jml_kader_umum_perempuan_data_umum))}}">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Kader Khusus Laki-laki Data Umum</label>
                        <input type="number" class="form-control" name="jml_kader_khusus_laki_data_umum" id="jml_kader_khusus_laki_data_umum" placeholder="Masukkan Jumlah Kader Khusus Laki-laki Data Umum" required value="{{ucfirst(old('jml_kader_khusus_laki_data_umum', $jml_kader_umum->jml_kader_khusus_laki_data_umum))}}">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Kader Khusus Perempuan Data Umum</label>
                        <input type="number" class="form-control" name="jml_kader_khusus_perempuan_data_umum" id="jml_kader_khusus_perempuan_data_umum" placeholder="Masukkan Jumlah Kader Khusus Perempuan Data Umum" required value="{{ucfirst(old('jml_kader_khusus_perempuan_data_umum', $jml_kader_umum->jml_kader_khusus_perempuan_data_umum))}}">
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <div class="form-group">
                        <label>Periode</label>
                        <input type="number" class="form-control" name="periode" id="periode" placeholder="Masukkan Periode" required value="{{ucfirst(old('periode', $jml_kader_umum->periode))}}">
                    </div>

                </div>
            </div>
        </div>

        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/jml_kader_umum" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

