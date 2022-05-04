@extends('kader.layout')

@section('title', 'Edit Data Warga TP PKK | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Edit Data Warga TP PKK')
@section('container')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Data Warga TP PKK</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <div class="card-body">
        <form action="{{ url('data_warga', $data_warga->id) }}" method="POST">
            @method('PUT')
            @csrf
            <h6 style="color: red">* Semua elemen atribut harus diisi</h6>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        {{  ($errors)  }}
                    </ul>
                </div>
            @endif

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        {{-- nama dasa wisma --}}
                        <label>Dasa Wisma</label>
                            <input type="text" class="form-control @error('dasa_wisma') is-invalid @enderror" name="dasa_wisma" id="dasa_wisma" placeholder="Di isi sesuai dengan nama dasawisma yang diikuti warga yang bersangkutan" value="{{ucfirst(old('dasa_wisma', $data_warga->dasa_wisma))}}">
                            @error('dasa_wisma')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        {{-- Nama Kepala Rumah Tangga --}}
                        <label>Nama Kepala Rumah Tangga</label>
                            <input type="text" class="form-control @error('nama_kepala_rumah_tangga') is-invalid @enderror" name="nama_kepala_rumah_tangga" id="nama_kepala_rumah_tangga" placeholder="Di isi dengan nama Kepala Rumah Tangga pada rumah yang didata" value="{{ucfirst(old('nama_kepala_rumah_tangga', $data_warga->nama_kepala_rumah_tangga))}}">
                                @error('nama_kepala_rumah_tangga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        {{-- no.registrasi --}}
                        <label>No. Registrasi</label>
                            <input type="text" class="form-control @error('no_registrasi') is-invalid @enderror" name="no_registrasi" id="no_registrasi" placeholder="Nomor Registrasi diisi dengan nomor urutan sesuai wilayah" value="{{ucfirst(old('no_registrasi', $data_warga->no_registrasi))}}">
                                @error('no_registrasi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        {{-- no.KTP --}}
                        <label>No. KTP</label>
                            <input type="text" class="form-control @error('no_ktp') is-invalid @enderror" name="no_ktp" id="no_ktp" placeholder="Di isi dengan sudah atau belum atas kepemilikan KTP dan atau Kartu Keluarga (KK)" value="{{ucfirst(old('no_ktp', $data_warga->no_ktp))}}">
                                @error('no_ktp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Nama</label>
                        {{-- nama warga --}}
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Di isi dengan nama" value="{{ucfirst(old('nama', $data_warga->nama))}}">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Jabatan</label>
                        {{-- jabatan --}}
                            <input type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" id="jabatan" placeholder="Di isi jabatan yang bersangkutan pada di struktural TP PKK" value="{{ucfirst(old('jabatan', $data_warga->jabatan))}}">
                                @error('jabatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Tempat lahir</label>
                        {{-- tempat lahir --}}
                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" id="tempat_lahir" placeholder="Di isi Kota/Kabupaten tempat lahir yang bersangkutan" value="{{ucfirst(old('tempat_lahir', $data_warga->tempat_lahir))}}">
                            @error('tempat_lahir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Tanggal lahir</label>
                        {{-- Tanggal lahir --}}
                            <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" id="tgl_lahir" placeholder="Di isi tanggal lahir" value="{{ucfirst(old('tgl_lahir', $data_warga->tgl_lahir))}}" data-date-format="mm/dd/yyyy">
                                @error('tgl_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>Umur</label>
                        {{-- umur --}}
                            <input type="number" class="form-control @error('umur') is-invalid @enderror" name="umur" id="umur" placeholder="Di isi Umur" value="{{ucfirst(old('umur', $data_warga->umur))}}">
                                @error('umur')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        {{-- alamat --}}
                        <label>Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" placeholder="Di isi Alamat" value="{{ucfirst(old('alamat', $data_warga->alamat))}}">
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        {{-- rt --}}
                        <label>RT</label>
                            <input type="number" min="1" class="form-control @error('rt') is-invalid @enderror" name="rt" id="rt" placeholder="Di isi RT" value="{{ucfirst(old('rt', $data_warga->rt))}}">
                                @error('rt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        {{-- rw --}}
                        <label>RW</label>
                            <input type="number" min="1" class="form-control @error('rw') is-invalid @enderror" name="rw" id="rw" placeholder="Di isi RW" value="{{ucfirst(old('rw', $data_warga->rw))}}">
                                @error('rw')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <div class="form-group @error('id_desa') is-invalid @enderror">
                        <label for="exampleFormControlSelect1">Desa</label>
                        {{-- pilih nama desa --}}
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
                </div>

                <div class="col-md-2">
                    <div class="form-group @error('id_kecamatan') is-invalid @enderror">
                        <label for="exampleFormControlSelect1">Kecamatan</label>
                        {{-- pilih Kecamatan --}}
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
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Kabupaten</label>
                        {{-- pilih Kabupaten --}}
                            <input type="text" readonly class="form-control @error('kota') is-invalid @enderror" name="kota" id="kota" placeholder="Masukkan Kota" value="Indramayu">
                                @error('kota')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                    </div>
                </div>

                <div class="col-md-2">
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

                <div class="col-md-2">
                    <div class="form-group @error('periode') is-invalid @enderror">
                        <label>Periode</label>
                            {{-- pilih periode --}}
                            <select style="cursor:pointer;" class="form-control" id="periode" name="periode">
                                <option value="{{ $data_warga->periode }}" {{ $data_warga->periode ? 'selected' : '' }}>{{ $data_warga->periode }}</option>
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

                <div class="col-md-2">
                    <div class="form-group @error('jenis_kelamin') is-invalid @enderror">
                        <label class="form-label">Jenis Kelamin </label><br>
                            {{-- pilih Jenis Kelamin --}}
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="jenis_kelamin" value="laki-laki" class="form-check-input" {{$data_warga->jenis_kelamin == 'laki-laki'? 'checked' : ''}}>Laki-laki
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="jenis_kelamin" value="perempuan" class="form-check-input" {{$data_warga->jenis_kelamin == 'perempuan'? 'checked' : ''}}>Perempuan
                                </label>
                            </div>
                    </div>
                        @error('jenis_kelamin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                </div>

                <div class="col-md-3">
                    <div class="form-group @error('status_perkawinan') is-invalid @enderror">
                        <label>Status Perkawinan</label><br>
                            {{-- pilih status Perkawinan --}}
                            <div class="form-check form-check-inline">
                                <label label class="form-check-label">
                                    <input type="radio" name="status_perkawinan" value="menikah" class="form-check-input" {{$data_warga->status_perkawinan == 'menikah'? 'checked' : ''}}>Menikah
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label label class="form-check-label">
                                    <input type="radio" name="status_perkawinan" value="lajang" class="form-check-input" {{$data_warga->status_perkawinan == 'lajang'? 'checked' : ''}}>Lajang
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="status_perkawinan" value="janda" class="form-check-input" {{$data_warga->status_perkawinan == 'janda'? 'checked' : ''}}>Janda
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="status_perkawinan" value="duda" class="form-check-input" {{$data_warga->status_perkawinan == 'duda'? 'checked' : ''}}>Duda
                                </label>
                            </div>
                    </div>
                        @error('status_perkawinan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                </div>

                <div class="col-md-3">
                    <div class="form-group @error('status_keluarga') is-invalid @enderror">
                        {{-- pilih status Dalam Keluarga --}}
                        <label>Status Dalam Keluarga</label><br>
                            @if ($data_warga->status_keluarga == 'kepala keluarga')

                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="status_keluarga" value="kepala keluarga" class="form-check-input" {{$data_warga->status_keluarga == 'kepala keluarga'? 'checked' : ''}}>Kepala Keluarga
                                </label>

                            </div>
                              {{-- <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="status_keluarga" value="anggota Keluarga" class="form-check-input" {{$data_warga->status_keluarga == 'anggota Keluarga'? 'checked' : ''}}>Anggota Keluarga
                                </label>
                            </div> --}}
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" aria-label="Radio button for following text input" name="status_keluarga" value="anggota keluarga" {{$data_warga->status_keluarga == 'anggota keluarga'? 'checked' : ''}}>Anggota Keluarga
                                    </div>
                                </div>
                                <input type="text" class="form-control" aria-label="Text input with radio button" name="status" placeholder="Status">
                            </div>
                            @else
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="status_keluarga" value="Kepala Rumah Tangga" class="form-check-input" {{$data_warga->status_keluarga == 'Kepala Rumah Tangga'? 'checked' : ''}}>Kepala Rumah Tangga
                                </label>
                            </div>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" aria-label="Radio button for following text input" name="status_keluarga" value="anggota keluarga" {{$data_warga->status_keluarga == 'anggota keluarga'? 'checked' : ''}}>Anggota Keluarga
                                    </div>
                                </div>
                                <input type="text" class="form-control" aria-label="Text input with radio button" name="status" value="{{ucfirst(old('status_keluarga', $data_warga->status))}}">
                            </div>
                            @endif
                    </div>
                        @error('status_keluarga')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="col-md-3">
                    <div class="form-group @error('agama') is-invalid @enderror">
                        {{-- pilih agama --}}
                        <label>Agama</label><br>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="agama" value="islam" class="form-check-input" {{$data_warga->agama == 'islam'? 'checked' : ''}}>Islam
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="agama" value="kristen" class="form-check-input" {{$data_warga->agama == 'kristen'? 'checked' : ''}}>Kristen
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="agama" value="khatolik" class="form-check-input" {{$data_warga->agama == 'khatolik'? 'checked' : ''}}>Katholik
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="agama" value="hindu" class="form-check-input" {{$data_warga->agama == 'hindu'? 'checked' : ''}}>Hindu
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="agama" value="budha" class="form-check-input" {{$data_warga->agama == 'budha'? 'checked' : ''}}>Budha
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="agama" value="khonghucu" class="form-check-input" {{$data_warga->agama == 'khonghucu'? 'checked' : ''}}>Khonghucu
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="agama" value="kepercayaan lain" class="form-check-input" {{$data_warga->agama == 'kepercayaan lain'? 'checked' : ''}}>Kepercayaan Lain
                                </label>
                            </div>
                    </div>
                        @error('agama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="col-md-3">
                    <div class="form-group @error('pendidikan') is-invalid @enderror">
                        {{-- pilih Pendidikan --}}
                        <label>Pendidikan</label><br>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="pendidikan" value="Tidak Tamat SD" class="form-check-input" {{$data_warga->pendidikan == ' Tidak Tamat SD'? 'checked' : ''}}>Tidak Tamat SD
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="pendidikan" value="SD/MI" class="form-check-input" {{$data_warga->pendidikan == ' SD/MI'? 'checked' : ''}}>SD/MI
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="pendidikan" value="SMP/Sederajat" class="form-check-input" {{$data_warga->pendidikan == 'SMP/Sederajat'? 'checked' : ''}}>SMP/Sederajat
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="pendidikan" value="SMA/Sederajat" class="form-check-input" {{$data_warga->pendidikan == 'SMA/Sederajat'? 'checked' : ''}}>SMA/Sederajat
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="pendidikan" value="D3" class="form-check-input" {{$data_warga->pendidikan == 'D3'? 'checked' : ''}}>D3
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="pendidikan" value="D4/S1" class="form-check-input" {{$data_warga->pendidikan == 'D4/S1'? 'checked' : ''}}>D4/S1
                                </label>
                            </div>
                    </div>
                        @error('pendidikan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="col-md-3">
                    <div class="form-group @error('pekerjaan') is-invalid @enderror">
                        {{-- pilih Pekerjaan --}}
                        <label>Pekerjaan</label><br>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="pekerjaan" value="petani" class="form-check-input" {{$data_warga->pekerjaan == 'petani'? 'checked' : ''}}>Petani
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="pekerjaan" value="pedagang" class="form-check-input" {{$data_warga->pekerjaan == 'pedagang'? 'checked' : ''}}>Pedagang
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="pekerjaan" value="swasta" class="form-check-input" {{$data_warga->pekerjaan == 'swasta'? 'checked' : ''}}>Swasta
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="pekerjaan" value="wirausaha" class="form-check-input" {{$data_warga->pekerjaan == 'wirausaha'? 'checked' : ''}}>Wiruasaha
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="pekerjaan" value="PNS" class="form-check-input" {{$data_warga->pekerjaan == 'PNS'? 'checked' : ''}}>PNS
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="pekerjaan" value="TNI Polri" class="form-check-input" {{$data_warga->pekerjaan == 'TNI Polri'? 'checked' : ''}}>TNI Polri
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="pekerjaan" value="lainnya" class="form-check-input" {{$data_warga->pekerjaan == 'lainnya'? 'checked' : ''}}>Lainnya
                                </label>
                            </div>
                    </div>
                        @error('pekerjaan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                </div>

                <div class="col-md-2">
                    <div class="form-group @error('akseptor_KB') is-invalid @enderror">
                        {{-- pilih akseptor KB --}}
                        <label>Akseptor KB</label><br>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="akseptor_kb" value="ya" class="form-check-input" {{$data_warga->akseptor_kb == 'ya'? 'checked' : ''}}>Ya
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="akseptor_kb" value="tidak" class="form-check-input" {{$data_warga->akseptor_kb == 'tidak'? 'checked' : ''}}>Tidak
                                </label>
                            </div>
                    </div>
                        @error('akseptor_KB')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="col-md-2">
                    <div class="form-group @error('aktif_posyandu') is-invalid @enderror">
                        {{-- pilih aktif dalam Kegiatan Posyandu --}}
                        <label>Aktif dalam Kegiatan Posyandu</label><br>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="aktif_posyandu" value="ya" class="form-check-input" {{$data_warga->aktif_posyandu == 'ya'? 'checked' : ''}}>Ya
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="aktif_posyandu" value="tidak" class="form-check-input" {{$data_warga->aktif_posyandu == 'tidak'? 'checked' : ''}}>Tidak
                                </label>
                            </div>
                    </div>
                        @error('aktif_posyandu')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="col-md-3">
                    <div class="form-group @error('ikut_bkb') is-invalid @enderror">
                        {{-- pilih mengikuti Program Bina Keluarga Balita --}}
                        <label>Mengikuti Program Bina Keluarga Balita</label><br>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="ikut_bkb" value="ya" class="form-check-input" {{$data_warga->ikut_bkb == 'ya'? 'checked' : ''}}>Ya
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="ikut_bkb" value="tidak" class="form-check-input" {{$data_warga->ikut_bkb == 'tidak'? 'checked' : ''}}>Tidak
                                </label>
                            </div>
                    </div>
                        @error('ikut_bkb')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="col-md-2">
                    <div class="form-group @error('memiliki_tabungan') is-invalid @enderror">
                        {{-- pilih memiliki tabungan --}}
                        <label>Memiliki Tabungan</label><br>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="memiliki_tabungan" value="ya" class="form-check-input" {{$data_warga->memiliki_tabungan == 'ya'? 'checked' : ''}}>Ya
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="memiliki_tabungan" value="tidak" class="form-check-input" {{$data_warga->memiliki_tabungan == 'tidak'? 'checked' : ''}}>Tidak
                                </label>
                            </div>
                    </div>
                        @error('memiliki_tabungan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="col-md-3">
                    <div class="form-group @error('ikut_kelompok_belajar') is-invalid @enderror">
                        {{-- pilih mengikuti Kelompok Belajar Jenis --}}
                        <label>Mengikuti Kelompok Belajar Jenis</label><br>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="ikut_kelompok_belajar" value="ya" class="form-check-input" {{$data_warga->ikut_kelompok_belajar == 'ya'? 'checked' : ''}}>Ya
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="ikut_kelompok_belajar" value="tidak" class="form-check-input" {{$data_warga->ikut_kelompok_belajar == 'tidak'? 'checked' : ''}}>Tidak
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                 <label class="form-check-label">
                                        <input type="radio" name="ikut_kelompok_belajar" value="Paket A" class="form-check-input" {{$data_warga->ikut_kelompok_belajar == 'Paket A'? 'checked' : ''}}>Paket A
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="ikut_kelompok_belajar" value="Paket B" class="form-check-input" {{$data_warga->ikut_kelompok_belajar == ' Paket B'? 'checked' : ''}}>Paket B
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="ikut_kelompok_belajar" value="Paket c" class="form-check-input" {{$data_warga->ikut_kelompok_belajar == 'Paket C'? 'checked' : ''}}>Paket C
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                 <label class="form-check-label">
                                    <input type="radio" name="ikut_kelompok_belajar" value="KF (Keaksaraan Fungsional)" class="form-check-input" {{$data_warga->ikut_kelompok_belajar == 'KF (Keaksaraan Fungsional)'? 'checked' : ''}}>KF (Keaksaraan Fungsional)
                                </label>
                            </div>
                    </div>
                        @error('ikut_kelompok_belajar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="col-md-2">
                    <div class="form-group @error('ikut_paud_sejenis') is-invalid @enderror">
                        {{-- pilih Mengikuti PAUD/Sejenis--}}
                        <label>Mengikuti PAUD/Sejenis</label><br>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="ikut_paud_sejenis" value="ya" class="form-check-input" {{$data_warga->ikut_paud_sejenis == 'ya'? 'checked' : ''}}>Ya
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="ikut_paud_sejenis" value="tidak" class="form-check-input" {{$data_warga->ikut_paud_sejenis == 'tidak'? 'checked' : ''}}>Tidak
                                </label>
                            </div>
                    </div>
                        @error('ikut_paud_sejenis')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="col-md-3">
                    <div class="form-group @error('ikut_koperasi') is-invalid @enderror">
                        {{-- pilih Mengikuti dalam Kegiatan Koperasi --}}
                        <label>Ikut dalam Kegiatan Koperasi</label><br>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="ikut_koperasi" value="ya" class="form-check-input" {{$data_warga->ikut_koperasi == 'ya'? 'checked' : ''}}>Ya
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="ikut_koperasi" value="tidak" class="form-check-input" {{$data_warga->ikut_koperasi == 'tidak'? 'checked' : ''}}>Tidak
                                </label>
                            </div>
                    </div>
                        @error('ikut_koperasi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                </div>
            </div>

            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/data_warga" class="btn btn-outline-primary">
                    <span>Batalkan</span>
                </a>
            </div>
          </form>
      </div>

    </div>
    <!-- /.card -->
</div>
@endsection

@push('script-addon')

<script type="text/javascript">

    $(function() {

      $( "#datepicker" ).datepicker({

             changeMonth: true,

             changeYear: true

         });

    });

       window.onload=function(){

           $('#tgl_lahir').on('change', function() {

               var dob = new Date(this.value);

               var today = new Date();

                var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));

               $('#umur').val(age);

           });

       }

</script>
<script>
    $(document).ready(function() {
    $('#id_kecamatan').on('change', function() {
       var categoryID = $(this).val();
       console.log('cek data kecamatan');
       if(categoryID) {
        console.log('cek get data desa');

           $.ajax({
               url: '/getDesa/'+categoryID,
               type: "GET",
               data : {"_token":"{{ csrf_token() }}"},
               dataType: "json",
               success:function(data)
               {
                console.log('sukses cek data desa');

                 if(data){
                    $('#id_desa').empty();
                    $('#id_desa').append('<option hidden>Pilih Desa</option>');
                    $.each(data, function(key, desas){
                        $('select[name="id_desa"]').append('<option value="'+ key +'">' + desas.nama_desa+ '</option>');
                    });
                }else{
                    $('#id_desa').empty();
                }
             }
           });
       }else{
         $('#id_desa').empty();
       }
    });
    });
</script>

@endpush