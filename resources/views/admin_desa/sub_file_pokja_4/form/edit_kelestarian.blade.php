@extends('admin_desa.layout')

@section('title', 'Edit Data Kelestarian Lingkungan Hidup POKJA IV | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Edit Data Kelestarian Lingkungan Hidup POKJA IV')
@section('container')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Data Kelestarian Lingkungan Hidup POKJA IV</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ url ('/kelestarian', $kelestarian->id) }}" method="POST">
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
                        <label>Jumlah Rumah Yang Memiliki Jamban</label>
                        <input min="0" type="number" class="form-control" name="jml_rumah_jamban" id="jml_rumah_jamban" placeholder="Masukkan Jumlah Rumah Yang Memiliki Jamban" required value="{{ucfirst(old('jml_rumah_jamban', $kelestarian->jml_rumah_jamban))}}">
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Rumah Yang Memiliki SPAL</label>
                        <input min="0" type="number" class="form-control" name="jml_rumah_spal" id="jml_rumah_spal" placeholder="Masukkan Jumlah Rumah Yang Memiliki SPAL" required value="{{ucfirst(old('jml_rumah_spal', $kelestarian->jml_rumah_spal))}}">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                        <label>Jumlah Rumah Yang Memiliki Tempat Pembuangan Sampah</label>
                            <input min="0" type="number" class="form-control" name="jml_rumah_tempat_sampah" id="jml_rumah_tempat_sampah" placeholder="Masukkan Jumlah Rumah Yang Memiliki Tempat Pembuangan Sampah" required value="{{ucfirst(old('jml_rumah_tempat_sampah', $kelestarian->jml_rumah_tempat_sampah))}}">
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Rumah Yang Memiliki MCK</label>
                        <input min="0" type="number" class="form-control" name="jml_mck" id="jml_mck" placeholder="Masukkan Jumlah Rumah Yang Memiliki MCK" required value="{{ucfirst(old('jml_mck', $kelestarian->jml_mck))}}">
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah KRT Yang Menggunakan Air PDAM</label>
                        <input min="0" type="number" class="form-control" name="jml_krt_pdam" id="jml_krt_pdam" placeholder="Masukkan Jumlah KRT Yang Menggunakan Air PDAM" required value="{{ucfirst(old('jml_krt_pdam', $kelestarian->jml_krt_pdam))}}">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label>Jumlah KRT Yang Menggunakan Air Sumur</label>
                            <input min="0" type="number" class="form-control" name="jml_krt_sumur" id="jml_krt_sumur" placeholder="Masukkan Jumlah Jumlah KRT Yang Menggunakan Air Sumur" required value="{{ucfirst(old('jml_krt_sumur', $kelestarian->jml_krt_sumur))}}">
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label>Jumlah KRT Yang Menggunakan Air Lain-lain</label>
                            <input min="0" type="number" class="form-control" name="jml_krt_lain" id="jml_krt_lain" placeholder="Masukkan Jumlah Jumlah KRT Yang Menggunakan Air Lain-lain" required value="{{ucfirst(old('jml_krt_lain', $kelestarian->jml_krt_lain))}}">
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Periode</label>
                        <input min="0" type="number" class="form-control" name="periode" id="periode" placeholder="Masukkan Periode" required value="{{ucfirst(old('periode', $kelestarian->periode))}}">
                    </div>
                </div>
            </div>
       </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/kelestarian" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

