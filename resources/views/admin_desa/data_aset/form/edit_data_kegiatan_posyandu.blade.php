@extends('admin_desa.layout')

@section('title', 'Edit Data Jenis Kegiatan Layanan Posyandu Data Aset | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Edit Data Jenis Kegiatan Layanan Posyandu Data Aset')
@section('container')

<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Data Jenis Kegiatan Layanan Posyandu Data Aset</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ url ('/data_kegiatan_posyandu', $data_kegiatan_posyandu->id) }}" method="POST">
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
        <div class="form-group">
            <label>Nama Pengelola Posyandu PKK</label>
                <select class="form-control @error('pengelola') is-invalid @enderror" id="id_posyandu" name="id_posyandu">
                    {{-- Pilih Nama Kepala Rumah Tangga --}}
                    @foreach ($posyandu as $c)
                        <option value="{{$c->id}}" {{ $c->id === $data_kegiatan_posyandu->id_posyandu ? 'selected' : '' }}>{{ $c->pengelola }}</option>
                    @endforeach
            </select>
                        @error('pengelola')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
        </div>

        <div class="form-group">
            {{-- nama jenis_kegiatan --}}
            <label>Jenis Kegiatan Layanan</label>
                <input type="text" class="form-control @error('jenis_kegiatan') is-invalid @enderror" name="jenis_kegiatan" id="jenis_kegiatan" placeholder="Masukkan Jenis kegiatan yang dilaksanaan pada Posyandu tersebut" value="{{ ucfirst(old('jenis_kegiatan', $data_kegiatan_posyandu->jenis_kegiatan)) }}">
                    @error('jenis_kegiatan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
        </div>

        <div class="form-group @error('frekuensi_layanan') is-invalid @enderror">
            {{-- frekuensi layanan --}}
                  <label>Frekuensi Layanan</label>
                        <select class="form-control" id="frekuensi_layanan" name="frekuensi_layanan">
                        {{-- Pilih Kejar --}}
                            @foreach($frekuensi_layanan as $key => $val)
                                @if($key==old('frekuensi_layanan', $data_kegiatan_posyandu->frekuensi_layanan))
                                    <option value="{{ $key }}" selected>{{ $val }}</option>
                                @else
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endif
                            @endforeach
                        </select>
        </div>
                            @error('frekuensi_layanan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

        <div class="form-group">
                    {{-- jumlah pengunjung --}}
                  <label>Jumlah Pengunjung Laki-laki</label>
                    <input type="number" min="0" class="form-control @error('jumlah_pengunjung_laki') is-invalid @enderror" name="jumlah_pengunjung_laki" id="jumlah_pengunjung_laki" placeholder="Diisi dengan Jumlah Pengunjung Laki pada Posyandu" value="{{ ucfirst(old('jumlah_pengunjung_laki', $data_kegiatan_posyandu->jumlah_pengunjung_laki)) }}">
                        @error('jumlah_pengunjung_laki')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
        </div>

        <div class="form-group">
            {{-- jumlah pengunjung perempuan --}}
          <label>Jumlah Pengunjung Perempuan</label>
            <input type="number" min="0" class="form-control @error('jumlah_pengunjung_perempuan') is-invalid @enderror" name="jumlah_pengunjung_perempuan" id="jumlah_pengunjung_perempuan" placeholder="Diisi dengan Jumlah Pengunjung Perempuan pada Posyandu" value="{{ ucfirst(old('jumlah_pengunjung_perempuan', $data_kegiatan_posyandu->jumlah_pengunjung_perempuan)) }}">
                @error('jumlah_pengunjung_perempuan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group">
        {{-- jumlah petugas laki--}}
            <label>Jumlah Petugas Laki-laki</label>
                <input type="number" min="0" class="form-control @error('jumlah_petugas_laki') is-invalid @enderror" name="jumlah_petugas_laki" id="jumlah_petugas_laki" placeholder="Diisi dengan Jumlah Petugas Laki" value="{{ ucfirst(old('jumlah_petugas_laki', $data_kegiatan_posyandu->jumlah_petugas_laki)) }}">
                    @error('jumlah_petugas_laki')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
        </div>

        <div class="form-group">
            {{-- jumlah petugas perempuan--}}
                <label>Jumlah Petugas Perempuan</label>
                    <input type="number" min="0" class="form-control @error('jumlah_petugas_perempuan') is-invalid @enderror" name="jumlah_petugas_perempuan" id="jumlah_petugas_perempuan" placeholder="Diisi dengan Jumlah Petugas Perempuan" value="{{ ucfirst(old('jumlah_petugas_perempuan', $data_kegiatan_posyandu->jumlah_petugas_perempuan)) }}">
                        @error('jumlah_petugas_perempuan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
        </div>

        <div class="form-group">
            {{-- keterangan lain --}}
                <label>Keterangan Lain</label>
                    <input type="text" min="0" class="form-control @error('keterangan_lain') is-invalid @enderror" name="keterangan_lain" id="keterangan_lain" placeholder="Diisi dengan Keterangan Lain Bila diperlukan" value="{{ ucfirst(old('keterangan_lain', $data_kegiatan_posyandu->keterangan_lain)) }}">
                        @error('keterangan_lain')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
        </div>

        <div class="form-group @error('periode') is-invalid @enderror">
            {{-- periode --}}
            <label>Periode</label>
                <select style="cursor:pointer;" class="form-control" id="periode" name="periode">
                    <option value="{{ $data_kegiatan_posyandu->periode }}" {{ $data_kegiatan_posyandu->periode ? 'selected' : '' }}>{{ $data_kegiatan_posyandu->periode }}</option>
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
          <a href="/kejar_paket" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

