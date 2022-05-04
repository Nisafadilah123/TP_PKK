@extends('admin_desa.layout')

@section('title', 'Tambah Data Koperasi PKK Data Aset | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Tambah Data Koperasi PKK Data Aset')
@section('container')

<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tambah Data Koperasi PKK Data Aset</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ route('data_aset_koperasi.store') }}" method="POST">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    {{  ($errors)  }}
                </ul>
            </div>
        @endif

            <div class="card-body">
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
                        <label>Nama Koperasi</label>
                            <input type="text" class="form-control @error('nama_koperasi') is-invalid @enderror" name="nama_koperasi" id="nama_koperasi" placeholder="Masukkan Nama Koperasi">
                                @error('nama_koperasi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="form-group @error('jenis_koperasi') is-invalid @enderror">
                        {{-- nama Nama Pengelola --}}
                        <label>Jenis Koperasi</label>
                            {{-- <input type="text" class="form-control @error('jenis_koperasi') is-invalid @enderror" name="jenis_koperasi" id="jenis_koperasi" placeholder="Masukkan jenis koperasi dengan Jenis usaha yang dijalankan koperasi"> --}}
                            <select class="form-control" id="jenis_koperasi" name="jenis_koperasi">
                                {{-- Pilih Kategori --}}
                                <option> Pilih Kategori</option>
                                    @foreach($jenis_koperasi as $key => $val)
                                        @if($key==old('jenis_koperasi'))
                                            <option value="{{ $key }}" selected>{{ $val }}</option>
                                        @else
                                            <option value="{{ $key }}">{{ $val }}</option>
                                        @endif
                                    @endforeach
                            </select>
                    </div>
                            @error('jenis_koperasi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                    <div class="form-group @error('status_hukum') is-invalid @enderror">
                    {{-- nama Nama Pengelola --}}
                        <label>Status Hukum</label>
                            {{-- <input type="text" class="form-control @error('status_hukum') is-invalid @enderror" name="status_hukum" id="status_hukum" placeholder="Masukkan jenis koperasi dengan Jenis usaha yang dijalankan koperasi"> --}}
                            <select class="form-control" id="status_hukum" name="status_hukum">
                            {{-- Pilih Kategori --}}
                                <option> Pilih Status</option>
                                    @foreach($status_hukum as $key => $val)
                                        @if($key==old('status_hukum'))
                                            <option value="{{ $key }}" selected>{{ $val }}</option>
                                        @else
                                            <option value="{{ $key }}">{{ $val }}</option>
                                        @endif
                                    @endforeach
                            </select>
                    </div>
                                @error('status_hukum')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                    <div class="form-group">
                    {{-- Jumlah anggota --}}
                        <label>Jumlah Anggota Laki-laki</label>
                            <input type="number" min="0" class="form-control @error('jumlah_anggota_laki') is-invalid @enderror" name="jumlah_anggota_laki" id="jumlah_anggota_laki" placeholder="Masukkan Jumlah Anggota Koperasi Laki-laki">
                                @error('jumlah_anggota_laki')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="form-group">
                        {{-- Jumlah anggota --}}
                        <label>Jumlah Anggota Perempuan</label>
                            <input type="number" min="0" class="form-control @error('jumlah_anggota_perempuan') is-invalid @enderror" name="jumlah_anggota_perempuan" id="jumlah_anggota_perempuan" placeholder="Masukkan Jumlah Anggota Koperasi Perempuan">
                                @error('jumlah_anggota_perempuan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="form-group @error('periode') is-invalid @enderror">
                        <label>Periode</label>
                        {{-- Pilih periode --}}
                        <select style="cursor:pointer;" class="form-control" id="periode" name="periode">
                          <option hidden> Pilih Tahun</option>
                            <?php
                              $year = date('Y');
                              $min = $year ;
                              $max = $year + 20;
                              for( $i=$min; $i<=$max; $i++ ) {
                                echo '<option value='.$i.'>'.$i.'</option>';
                              }?>
                        </select>
                    </div>
                      @error('periode')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror


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

