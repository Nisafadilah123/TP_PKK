@extends('admin_desa.layout')

@section('title', 'Tambah Data Jumlah Gotong Royong | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Tambah Data Jumlah Gotong Royong')
@section('container')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tambah Data Jumlah Gotong Royong</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ route('gotong_royong.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-4">
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

            <div class="col-md-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Gotong Kerja Bakti</label>
                        <input type="number" class="form-control" name="jml_gotong_kerja_bakti" id="jml_gotong_kerja_bakti" placeholder="Masukkan Jumlah Gotong Kerja Bakti" required>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Gotong Rukun Kebaktian</label>
                        <input type="number" class="form-control" name="jml_gotong_rukun_kebaktian" id="jml_gotong_rukun_kebaktian" placeholder="Masukkan Jumlah Gotong Rukun Kebaktian" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Gotong Keagamaan</label>
                        <input type="number" class="form-control" name="jml_gotong_keagamaan" id="jml_gotong_keagamaan" placeholder="Masukkan Jumlah Gotong Keagamaan" required>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Gotong Jimpitan</label>
                        <input type="number" class="form-control" name="jml_gotong_jimpitan" id="jml_gotong_jimpitan" placeholder="Masukkan Jumlah Gotong Jimpitan" required>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Gotong Arisan</label>
                        <input type="number" class="form-control" name="jml_gotong_arisan" id="jml_gotong_arisan" placeholder="Masukkan Jumlah Gotong Arisan" required>
                    </div>

                </div>
            </div>

            <div class="col-md-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Periode</label>
                        <input type="number" class="form-control" name="periode" id="periode" placeholder="Masukkan Periode" required>
                    </div>

                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/gotong_royong" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

