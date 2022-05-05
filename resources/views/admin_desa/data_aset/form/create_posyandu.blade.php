@extends('admin_desa.layout')

@section('title', 'Tambah Nama Pengelola Posyandu Data Aset | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Tambah Nama Pengelola Posyandu Data Aset')
@section('container')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tambah Nama Pengelola Posyandu Data Aset</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ route('posyandu.store') }}" method="POST">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    {{  ($errors)  }}
                </ul>
            </div>
        @endif

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group @error('id_desa') is-invalid @enderror">
                            {{-- nama desa --}}
                                <label for="exampleFormControlSelect1">Desa</label>
                                    @foreach ($desas as $c)
                                        <input type="hidden" class="form-control" name="id_desa" id="id_desa" placeholder="Masukkan Nama Desa" required value="{{$c->id}}">
                                        <input type="text" disabled class="form-control" name="id_desa" id="id_desa" placeholder="Masukkan Nama Desa" required value="{{ $c->nama_desa }}">
                                    @endforeach
                        </div>
                                    @error('id_desa')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group @error('id_kecamatan') is-invalid @enderror">
                            {{-- nama kecamatan --}}
                                <label for="exampleFormControlSelect1">Kecamatan</label>
                                    @foreach ($kec as $c)
                                        <input type="hidden" class="form-control" name="id_kecamatan" id="id_kecamatan" placeholder="Masukkan Nama Desa" required value="{{$c->id}}">
                                        <input type="text" disabled class="form-control" name="id_kecamatan" id="id_kecamatan" placeholder="Masukkan Nama Desa" required value="{{ $c->nama_kecamatan }}">
                                    @endforeach
                        </div>
                                    @error('id_kecamatan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Kabupaten</label>
                                {{-- nama kabupaten --}}
                                <input type="text" readonly class="form-control @error('kota') is-invalid @enderror" name="kota" id="kota" placeholder="Masukkan Kota" value="Indramayu">
                                    @error('kota')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Provinsi</label>
                            {{-- nama provinsi --}}
                                <input type="text" readonly class="form-control @error('provinsi') is-invalid @enderror" name="provinsi" id="provinsi" placeholder="Masukkan Provisni" value="Jawa Barat">
                                    @error('provinsi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            {{-- nama Nama posyandu --}}
                            <label>Nama posyandu</label>
                                <input type="text" class="form-control @error('nama_posyandu') is-invalid @enderror" name="nama_posyandu" id="nama_posyandu" placeholder="Masukkan Nama posyandu">
                                    @error('nama_posyandu')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            {{-- nama Nama Pengelola --}}
                            <label>Nama Pengelola</label>
                                <input type="text" class="form-control @error('pengelola') is-invalid @enderror" name="pengelola" id="pengelola" placeholder="Masukkan Nama Pengelola">
                                    @error('pengelola')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            {{-- nama Sekretaris  --}}
                            <label>Sekretaris </label>
                                <input type="text" class="form-control @error('sekretaris') is-invalid @enderror" name="sekretaris" id="sekretaris" placeholder="Masukkan Sekretaris yang bertanggung jawab pada posyandu yang bersangkutan">
                                    @error('sekretaris')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <div class="form-group @error('jenis_posyandu') is-invalid @enderror">
                            <label class="form-label">Jenis Posyandu </label><br>
                            {{-- pilih jenis kelamin --}}
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="jenis_posyandu" value="Pratama" class="form-check-input">Pratama
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="jenis_posyandu" value="Madya" class="form-check-input">Madya
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="jenis_posyandu" value="Purnama" class="form-check-input">Purnama
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="jenis_posyandu" value="Mandiri" class="form-check-input">Mandiri
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="jenis_posyandu" value="Lansia" class="form-check-input">Lansia
                                </label>
                            </div>

                        </div>
                        @error('jenis_posyandu')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            {{-- nama Sekretaris  --}}
                            <label>Jumlah Kader </label>
                                <input type="number" min="0" class="form-control @error('jumlah_kader') is-invalid @enderror" name="jumlah_kader" id="jumlah_kader" placeholder="Masukkan Jumlah Kader pada posyandu yang bersangkutan">
                                    @error('jumlah_kader')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>
                    </div>


                </div>
            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/posyandu" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

