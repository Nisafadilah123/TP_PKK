@extends('admin_desa.layout')

@section('title', 'Tambah Data Warung Data Aset | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Tambah Data Warung Data Aset')
@section('container')

<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tambah Data Warung Data Aset</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ route('data_warung.store') }}" method="POST">
        @csrf
            <div class="card-body">
                <h6 style="color:red">* Nama Warung Diisi bilamana warung tersebut memiliki nama atau diisi sesuai dengan lokasi warung PKK
                    (misalnya: warung PKK RW 01, Warung PKK RT 04 RW 01, dll)</h6>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Pengelola Warung PKK</label>
                                <select class="form-control @error('nama_pengelola') is-invalid @enderror" id="id_warung" name="id_warung">
                                    {{-- Pilih Nama Kepala Rumah Tangga --}}
                                    <option hidden> Pilih Nama Pengelola Warung PKK</option>
                                    @foreach ($warung as $c)
                                        <option value="{{$c->id}}">{{ $c->nama_pengelola }}</option>
                                    @endforeach
                                </select>
                                @error('nama_pengelola')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            {{-- nama Komoditi --}}
                          <label>Komoditi</label>
                            <input type="text" class="form-control @error('komoditi') is-invalid @enderror" name="komoditi" id="komoditi" placeholder="Masukkan Komoditi">
                                @error('komoditi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            {{-- nama kategori --}}
                          <label>Kategori</label>
                            <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" id="kategori" placeholder="Masukkan Kategori">
                                @error('kategori')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            {{-- nama volume --}}
                          <label>Volume</label>
                            <input type="number" min="0" class="form-control @error('volume') is-invalid @enderror" name="volume" id="volume" placeholder="Masukkan Volume">
                                @error('volume')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
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

