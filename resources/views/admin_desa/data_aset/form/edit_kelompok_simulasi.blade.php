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

      <form action="{{ url ('/kelompok_simulasi', $kelompok_simulasi->id) }}" method="POST">
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
                    <div class="col-sm-6">
                        <div class="form-group">
                        {{-- nama Nama Taman Bacaan --}}
                            <label>Nama Kegiatan</label>
                                <input type="text" class="form-control @error('nama_kegiatan') is-invalid @enderror" name="nama_kegiatan" id="nama_kegiatan" placeholder="Masukkan Nama Kegiatan" value="{{ ucfirst(old('nama_kegiatan', $kelompok_simulasi->nama_kegiatan)) }}">
                                    @error('nama_kegiatan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                        {{-- Jumlah anggota --}}
                            <label>Jenis Simulasi/Penyuluhan</label>
                                <input type="text" class="form-control @error('jenis_simulasi') is-invalid @enderror" name="jenis_simulasi" id="jenis_simulasi" placeholder="Masukkan Jenis Simulasi/Penyuluhan Kelompok" value="{{ ucfirst(old('nama_kegiatan', $kelompok_simulasi->nama_kegiatan)) }}">
                                    @error('jenis_simulasi')
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
                        {{-- Jumlah kelompok --}}
                            <label>Jumlah Kelompok</label>
                                <input type="number" min="0" class="form-control @error('jumlah_kelompok') is-invalid @enderror" name="jumlah_kelompok" id="jumlah_kelompok" placeholder="Masukkan Jumlah Kelompok yang Mengikuti Simulasi/penyuluhan" value="{{ ucfirst(old('jumlah_kelompok', $kelompok_simulasi->jumlah_kelompok)) }}">
                                    @error('jumlah_kelompok')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{-- Jumlah Sosialisasi --}}
                            <label>Jumlah Sosialisasi</label>
                                <input type="number" min="0" class="form-control @error('jumlah_sosialisasi') is-invalid @enderror" name="jumlah_sosialisasi" id="jumlah_sosialisasi" placeholder="Masukkan Jumlah Sosialisasi yang Telah dilaksanakan" value="{{ ucfirst(old('jumlah_sosialisasi', $kelompok_simulasi->jumlah_sosialisasi)) }}">
                                    @error('jumlah_sosialisasi')
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
                            {{-- Jumlah kader laki --}}
                                <label>Jumlah Kader Laki-laki</label>
                                    <input type="number" min="0" class="form-control @error('jumlah_kader_laki') is-invalid @enderror" name="jumlah_kader_laki" id="jumlah_kader_laki" placeholder="Masukkan Jumlah Kader Laki-laki" value="{{ ucfirst(old('jumlah_kader_laki', $kelompok_simulasi->jumlah_kader_laki)) }}">
                                        @error('jumlah_kader_laki')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                            </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{-- Jumlah kader perempuan --}}
                                <label>Jumlah Kader Perempuan</label>
                                    <input type="number" min="0" class="form-control @error('jumlah_kader_perempuan') is-invalid @enderror" name="jumlah_kader_perempuan" id="jumlah_kader_perempuan" placeholder="Masukkan Jumlah Kader Perempuan" value="{{ ucfirst(old('jumlah_kader_perempuan', $kelompok_simulasi->jumlah_kader_perempuan)) }}">
                                        @error('jumlah_kader_perempuan')
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
                            <label>Periode</label>
                            {{-- pilih periode --}}
                            <select style="cursor:pointer;" class="form-control" id="periode" name="periode">
                                <option value="{{ $kelompok_simulasi->periode }}" {{ $kelompok_simulasi->periode ? 'selected' : '' }}>{{ $kelompok_simulasi->periode }}</option>
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


            </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/kelompok_simulasi" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

