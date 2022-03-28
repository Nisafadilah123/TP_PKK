@extends('admin_desa.layout')

@section('title', 'Edit Data Jumlah Penghayatan dan Pengamalan Pancasila | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Edit Data Jumlah Penghayatan dan Pengamalan Pancasila')
@section('container')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Data Jumlah Penghayatan dan Pengamalan Pancasila</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ url ('/penghayatan', $penghayatan->id) }}" method="POST">
        {{-- @dump($data_desa) --}}
          @method('PUT')
          @csrf
          <div class="row">
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Nama Desa</label>
                    {{-- <select class="form-control" id="id_desa" name="id_desa"> --}}
                      {{-- nama desa yang login --}}
                      {{-- @foreach ($desas as $d)
                      <option value="{{ $d->id }}" {{ $d->id === $jml_kader->id_desa ? 'selected' : '' }}>
                          {{ $d->kode_desa }}-{{ $d->nama_desa }}
                      </option>
                  @endforeach --}}
                            @foreach ($desas as $c)
                                {{-- <option value="{{$c->id }}">  {{$c->kode_desa }}-{{ $c->nama_desa }}</option> --}}
                                <input type="hidden" class="form-control" name="id_desa" id="id_desa" placeholder="Masukkan Nama Desa" required value="{{$c->id}}">
                                <input type="text" disabled class="form-control" name="id_desa" id="id_desa" placeholder="Masukkan Nama Desa" required value="{{$c->kode_desa }}-{{ $c->nama_desa }}">

                            @endforeach
                {{-- </select> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah PKBN Simulasi</label>
                        <input type="number" class="form-control" name="jml_PKBN_simulasi" id="jml_PKBN_simulasi" placeholder="Masukkan Jumlah PKBN Simulasi" required value="{{ucfirst(old('jml_PKBN_simulasi', $penghayatan->jml_PKBN_simulasi))}}">
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah PKBN Anggota</label>
                        <input type="number" class="form-control" name="jml_PKBN_anggota" id="jml_PKBN_anggota" placeholder="Masukkan Jumlah PKBN Anggota" required value="{{ucfirst(old('jml_PKBN_simulasi', $penghayatan->jml_PKBN_anggota))}}">
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah PKDRT Simulasi</label>
                        <input type="number" class="form-control" name="jml_PKDRT_simulasi" id="jml_PKDRT_simulasi" placeholder="Masukkan Jumlah PKDRT Simulasi" required value="{{ucfirst(old('jml_PKDRT_simulasi', $penghayatan->jml_PKDRT_simulasi))}}">
                    </div>

                </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah PKDRT Anggota</label>
                        <input type="number" class="form-control" name="jml_PKDRT_anggota" id="jml_PKDRT_anggota" placeholder="Masukkan Jumlah PKDRT Anggota" required value="{{ucfirst(old('jml_PKDRT_anggota', $penghayatan->jml_PKDRT_anggota))}}">
                    </div>
                </div>
            </div>

                <div class="col-md-3">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Jumlah Pola Asuh Simulasi</label>
                            <input type="number" class="form-control" name="jml_pola_asuh_simulasi" id="jml_pola_asuh_simulasi" placeholder="Masukkan Jumlah Pola Asuh KLP" required value="{{ucfirst(old('jml_pola_asuh_simulasi', $penghayatan->jml_pola_asuh_simulasi))}}">
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Jumlah Pola Asuh Anggota</label>
                            <input type="number" class="form-control" name="jml_pola_asuh_anggota" id="jml_pola_asuh_anggota" placeholder="Masukkan Jumlah Pola Asuh Anggota" required value="{{ucfirst(old('jml_pola_asuh_anggota', $penghayatan->jml_pola_asuh_anggota))}}">
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Jumlah Lansia KLP</label>
                            <input type="number" class="form-control" name="jml_lansia_klp" id="jml_lansia_klp" placeholder="Masukkan Jumlah Lansia KLP" required value="{{ucfirst(old('jml_lansia_klp', $penghayatan->jml_lansia_klp))}}">
                        </div>
                    </div>
                </div>
          </div>

          <div class="row">
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Lansia Anggota</label>
                        <input type="number" class="form-control" name="jml_lansia_anggota" id="jml_lansia_anggota" placeholder="Masukkan Jumlah Lansia Anggota" required value="{{ucfirst(old('jml_lansia_anggota', $penghayatan->jml_lansia_anggota))}}">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Periode</label>
                        <input type="number" class="form-control" name="periode" id="periode" placeholder="Masukkan Jumlah Lansia Anggota" required value="{{ucfirst(old('periode', $penghayatan->periode))}}">
                    </div>
                </div>
            </div>
          </div>

        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/penghayatan" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

