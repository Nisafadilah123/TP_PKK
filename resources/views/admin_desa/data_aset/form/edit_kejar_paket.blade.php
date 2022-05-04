@extends('admin_desa.layout')

@section('title', 'Edit Kelompok Simulasi dan Penyuluhan Data Aset | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Edit Kelompok Simulasi dan Penyuluhan Data Aset')
@section('container')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Kelompok Simulasi dan Penyuluhan Data Aset</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ url ('/kejar_paket', $kejar_paket->id) }}" method="POST">
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
                    {{-- nama Nama Paket/KF/PAUD --}}
                        <label>Nama Kejar Paket/KF/PAUD</label>
                            <input type="text" class="form-control @error('nama_kejar_paket') is-invalid @enderror" name="nama_kejar_paket" id="nama_kejar_paket" placeholder="Masukkan Nama Kejar Paket/KF/PAUD" value="{{ucfirst(old('nama_kejar_paket', $kejar_paket->nama_kejar_paket))}}">
                                @error('nama_kejar_paket')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group @error('jenis_paket') is-invalid @enderror">
                        {{-- nama Nama Pengelola --}}
                        <label>Jenis Koperasi</label>
                            <select class="form-control" id="jenis_paket" name="jenis_paket">
                                {{-- Pilih Kategori --}}
                                <option> Pilih Jenis</option>
                                @foreach($jenis_paket as $key => $val)
                                    @if($key==old('jenis_paket', $kejar_paket->jenis_paket))
                                        <option value="{{ $key }}" selected>{{ $val }}</option>
                                    @else
                                        <option value="{{ $key }}">{{ $val }}</option>
                                    @endif
                                @endforeach
                            </select>
                    </div>
                            @error('jenis_paket')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Periode</label>
                            {{-- pilih periode --}}
                            <select style="cursor:pointer;" class="form-control" id="periode" name="periode">
                                <option value="{{ $kejar_paket->periode }}" {{ $kejar_paket->periode ? 'selected' : '' }}>{{ $kejar_paket->periode }}</option>
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
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        {{-- Jumlah kader laki --}}
                            <label>Jumlah Warga Belajar/Siswa Laki-laki</label>
                                <input type="number" min="0" class="form-control @error('jumlah_warga_laki') is-invalid @enderror" name="jumlah_warga_laki" id="jumlah_warga_laki" placeholder="Masukkan Jumlah Warga/Siswa yang Belajar pada Kejar Paket KF/PAUD Laki-laki" value="{{ucfirst(old('jumlah_warga_laki', $kejar_paket->jumlah_warga_laki))}}">
                                    @error('jumlah_warga_laki')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>

                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {{-- Jumlah warga perempuan --}}
                            <label>Jumlah Warga Perempuan</label>
                                <input type="number" min="0" class="form-control @error('jumlah_warga_perempuan') is-invalid @enderror" name="jumlah_warga_perempuan" id="jumlah_warga_perempuan" placeholder="Masukkan Jumlah Warga/Siswa yang Belajar pada Kejar Paket KF/PAUD Perempuan" value="{{ucfirst(old('jumlah_warga_perempuan', $kejar_paket->jumlah_warga_perempuan))}}">
                                    @error('jumlah_warga_perempuan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>

                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        {{-- Jumlah Pengajar laki --}}
                            <label>Jumlah Pengajar Laki-laki</label>
                                <input type="number" min="0" class="form-control @error('jumlah_pengajar_laki') is-invalid @enderror" name="jumlah_pengajar_laki" id="jumlah_pengajar_laki" placeholder="Masukkan Jumlah Pengajar Laki-laki" value="{{ucfirst(old('jumlah_pengajar_laki', $kejar_paket->jumlah_pengajar_laki))}}">
                                    @error('jumlah_pengajar_laki')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>

                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {{-- Jumlah Pengajar perempuan --}}
                            <label>Jumlah Pengajar Perempuan</label>
                                <input type="number" min="0" class="form-control @error('jumlah_pengajar_perempuan') is-invalid @enderror" name="jumlah_pengajar_perempuan" id="jumlah_pengajar_perempuan" placeholder="Masukkan Jumlah Pengajar Perempuan" value="{{ucfirst(old('jumlah_pengajar_perempuan', $kejar_paket->jumlah_pengajar_perempuan))}}">
                                    @error('jumlah_pengajar_perempuan')
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
          <a href="/kejar_paket" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

