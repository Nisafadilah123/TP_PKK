@extends('admin_desa.layout')

@section('title', 'Edit Nama Pengelola Taman Bacaan/Perpustakaan Data Aset | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Edit Nama Pengelola Taman Bacaan/Perpustakaan Data Aset')
@section('container')

<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Nama Pengelola Taman Bacaan/Perpustakaan Data Aset</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ url ('/taman_bacaan', $taman_bacaan->id) }}" method="POST">
      @method('PUT')
        @csrf
        @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{  ($error)  }}</li>

                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card-body">
            <h6 style="color:red">* Nama Taman Bacaan/Perpustakaan Diisi bilamana taman bacaan/perpustakaan tersebut memiliki nama.
                (misalnya: Taman Bacaan PKK RW 01, Taman Bacaan PKK RT 04 RW 01, dll)</h6>
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
                    {{-- nama Nama Taman Bacaan --}}
                    <label>Nama Taman Bacaan Perpustakaan</label>
                        <input type="text" class="form-control @error('nama_taman_bacaan') is-invalid @enderror" name="nama_taman_bacaan" id="nama_taman_bacaan" placeholder="Masukkan Nama Taman Bacaan" value="{{ ucfirst(old('nama_taman_bacaan', $taman_bacaan->nama_taman_bacaan)) }}">
                            @error('nama_taman_bacaan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                </div>

                <div class="form-group">
                    {{-- nama Nama Pengelola --}}
                    <label>Nama Pengelola</label>
                        <input type="text" class="form-control @error('nama_pengelola') is-invalid @enderror" name="nama_pengelola" id="nama_pengelola" placeholder="Masukkan Nama Pengelola dengan nama warga yang diberi kepercayaan mengelola Taman Bacaan tersebut" value="{{ ucfirst(old('nama_pengelola', $taman_bacaan->nama_pengelola)) }}">
                            @error('nama_pengelola')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                </div>

                <div class="form-group">
                {{-- Jumlah Buku --}}
                    <label>Jumlah Buku</label>
                        <input type="number" min="0" class="form-control @error('jumlah_buku') is-invalid @enderror" name="jumlah_buku" id="jumlah_buku" placeholder="Masukkan Jumlah Buku dengan Jumlah seluruh buku yang ada pada taman bacaan tersebut" value="{{ ucfirst(old('jumlah_buku', $taman_bacaan->jumlah_buku)) }}">
                            @error('jumlah_buku')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/taman_bacaan" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

