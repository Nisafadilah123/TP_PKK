@extends('admin_desa.layout')

@section('title', 'Edit Nama Pengelola Warung Data Aset | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Edit Nama Pengelola Warung Data Aset')
@section('container')

<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Nama Pengelola Warung Data Aset</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ url ('/warung', $warung->id) }}" method="POST">
      @method('PUT')
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    {{  ($errors)  }}
                </ul>
            </div>
        @endif

        <div class="card-body">
            <h6 style="color:red">* Nama Warung Diisi bilamana warung tersebut memiliki nama atau diisi sesuai dengan lokasi warung PKK
                (misalnya: warung PKK RW 01, Warung PKK RT 04 RW 01, dll)</h6>
                <div class="form-group @error('id_desa') is-invalid @enderror">
                {{-- nama desa --}}
                    <label for="exampleFormControlSelect1">Desa</label>
                        @foreach ($desas as $c)
                            <input type="hidden" class="form-control" name="id_desa" id="id_desa" placeholder="Masukkan Nama Desa" value="{{$c->id}}">
                            <input type="text" disabled class="form-control" name="id_desa" id="id_desa" placeholder="Masukkan Nama Desa" value="{{ $c->nama_desa }}">
                        @endforeach
                </div>
                        @error('id_desa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                <div class="form-group @error('id_kecamatan') is-invalid @enderror">
                {{-- nama kecamatan --}}
                    <label for="exampleFormControlSelect1">Kecamatan</label>
                        @foreach ($kec as $c)
                            <input type="hidden" class="form-control" name="id_kecamatan" id="id_kecamatan" placeholder="Masukkan Nama Desa" value="{{$c->id}}">
                            <input type="text" disabled class="form-control" name="id_kecamatan" id="id_kecamatan" placeholder="Masukkan Nama Desa" value="{{ $c->nama_kecamatan }}">
                        @endforeach
                </div>
                        @error('id_kecamatan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

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

                <div class="form-group">
                    {{-- nama Nama Warung --}}
                    <label>Nama Warung</label>
                        <input type="text" class="form-control @error('nama_warung') is-invalid @enderror" name="nama_warung" id="nama_warung" placeholder="Masukkan Nama Warung" value="{{ ucfirst(old('nama_warung', $warung->nama_warung)) }}">
                            @error('nama_warung')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                </div>

                <div class="form-group">
                    {{-- nama Nama Pengelola --}}
                    <label>Nama Pengelola</label>
                        <input type="text" class="form-control @error('nama_pengelola') is-invalid @enderror" name="nama_pengelola" id="nama_pengelola" placeholder="Masukkan Nama Pengelola" value="{{ ucfirst(old('nama_pengelola', $warung->nama_pengelola)) }}">
                            @error('nama_pengelola')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                </div>
            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/warung" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

