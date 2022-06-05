@extends('admin_desa.layout')

@section('title', 'Edit Data Komoditi/Usaha Warung PKK Data Aset | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Edit Data Komoditi/Usaha Warung PKK Data Aset')
@section('container')

<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Data Komoditi/Usaha Warung PKK Data Aset</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ url ('/data_warung', $data_warung->id) }}" method="POST">
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
            <h6 style="color:red">* Nama Warung Diisi bilamana warung tersebut memiliki nama atau diisi sesuai dengan lokasi warung PKK
                (misalnya: warung PKK RW 01, Warung PKK RT 04 RW 01, dll)</h6>
                <div class="form-group">
                    <label>Nama Pengelola Warung PKK</label>
                        <select class="form-control @error('nama_pengelola') is-invalid @enderror" id="id_warung" name="id_warung">
                        {{-- Pilih Nama Kepala Rumah Tangga --}}
                            @foreach ($warung as $c)
                                <option value="{{ $c->id }}" {{ $c->id === $data_warung->id_warung ? 'selected' : '' }}>{{ $c->nama_pengelola }}</option>
                                @endforeach
                                </select>
                                @error('nama_pengelola')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                    <div class="form-group">
                    {{-- nama Komoditi --}}
                        <label>Komoditi</label>
                            <input type="text" class="form-control @error('komoditi') is-invalid @enderror" name="komoditi" id="komoditi" placeholder="Masukkan Komoditi" value="{{ ucfirst(old('komoditi', $data_warung->komoditi)) }}">
                                @error('komoditi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="form-group">
                    {{-- nama kategori --}}
                        <label>Kategori</label>
                            <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" id="kategori" placeholder="Masukkan Kategori" value="{{ ucfirst(old('kategori', $data_warung->kategori)) }}">
                                @error('kategori')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="form-group">
                    {{-- nama volume --}}
                        <label>Volume</label>
                            <input type="number" min="0" class="form-control @error('volume') is-invalid @enderror" name="volume" id="volume" placeholder="Masukkan Volume" value="{{ (old('volume', $data_warung->volume)) }}">
                                @error('volume')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="form-group">
                        <label>Periode</label>
                        {{-- pilih periode --}}
                        <select style="cursor:pointer;" class="form-control" id="periode" name="periode">
                            <option value="{{ $data_warung->periode }}" {{ $data_warung->periode ? 'selected' : '' }}>{{ $data_warung->periode }}</option>
                                <?php
                                $year = date('Y');
                                $min = $year ;
                                    $max = $year + 20;
                                for( $i=$min; $i<=$max; $i++ ) {
                                echo '<option value='.$i.'>'.$i.'</option>';
                            }?>
                        </select>
                      </div>

                </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/data_warung" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

