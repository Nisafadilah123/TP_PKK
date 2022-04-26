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

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Dasa Wisma</label>
                        <input type="text" class="form-control @error('dasa_wisma') is-invalid @enderror" name="dasa_wisma" id="dasa_wisma" placeholder="Di isi sesuai dengan nama dasawisma yang diikuti warga yang bersangkutan" required value="{{ucfirst(old('dasa_wisma', $data_warga->dasa_wisma))}}">
                        @error('dasa_wisma')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nama Kepala Rumah Tangga</label>
                            <input type="text" class="form-control" name="nama_kepala_rumah_tangga" id="nama_kepala_rumah_tangga" placeholder="Di isi dengan nama Kepala Rumah Tangga pada rumah yang didata" required value="{{ucfirst(old('nama_kepala_rumah_tangga', $data_warga->nama_kepala_rumah_tangga))}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>No. Registrasi</label>
                        <input type="text" class="form-control" name="no_registrasi" id="no_registrasi" placeholder="Nomor Registrasi diisi dengan nomor urutan sesuai wilayah" required value="{{ucfirst(old('no_registrasi', $data_warga->no_registrasi))}}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>No. KTP</label>
                            <input type="text" class="form-control" name="no_ktp" id="no_ktp" placeholder="Di isi dengan sudah atau belum atas kepemilikan KTP dan atau Kartu Keluarga (KK)" required value="{{ucfirst(old('no_ktp', $data_warga->no_ktp))}}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Di isi dengan nama" required value="{{ucfirst(old('nama', $data_warga->nama))}}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Jabatan</label>
                        <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Di isi jabatan yang bersangkutan pada di struktural TP PKK" required value="{{ucfirst(old('jabatan', $data_warga->jabatan))}}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Tempat lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Di isi Kota/Kabupaten tempat lahir yang bersangkutan" required value="{{ucfirst(old('tempat_lahir', $data_warga->tempat_lahir))}}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Tanggal lahir</label>
                            <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Di isi tanggal lahir" required value="{{ucfirst(old('tgl_lahir', $data_warga->tgl_lahir))}}" data-date-format="mm/dd/yyyy">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>Umur</label>
                            <input type="number" class="form-control" name="umur" id="umur" placeholder="Di isi Umur" required value="{{ucfirst(old('umur', $data_warga->umur))}}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Di isi Alamat" required value="{{ucfirst(old('alamat', $data_warga->alamat))}}">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>RT</label>
                            <input type="number" min="1" class="form-control" name="rt" id="rt" placeholder="Di isi RT" required value="{{ucfirst(old('rt', $data_warga->rt))}}">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>RW</label>
                            <input type="number" min="1" class="form-control" name="rw" id="rw" placeholder="Di isi RW" required value="{{ucfirst(old('rw', $data_warga->rw))}}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <div class="form-group @error('id_desa') is-invalid @enderror">
                        <label for="exampleFormControlSelect1">Desa</label>
                        @foreach ($desas as $c)
                        {{-- <option value="{{$c->id }}">  {{$c->kode_desa }}-{{ $c->nama_desa }}</option> --}}
                        <input type="hidden" class="form-control" name="id_desa" id="id_desa" placeholder="Masukkan Nama Desa" required value="{{$c->id}}">

                        <input type="text" disabled class="form-control" name="id_desa" id="id_desa" placeholder="Masukkan Nama Desa" required value="{{$c->kode_desa }}-{{ $c->nama_desa }}">

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
                        @foreach ($kec as $c)
                        <input type="hidden" class="form-control" name="id_kecamatan" id="id_kecamatan" placeholder="Masukkan Nama Desa" required value="{{$c->id}}">
                        <input type="text" disabled class="form-control" name="id_kecamatan" id="id_kecamatan" placeholder="Masukkan Nama Desa" required value="{{$c->kode_kecamatan }}-{{ $c->nama_kecamatan }}">

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
                            <input type="text" readonly class="form-control" name="kota" id="kota" placeholder="Masukkan Kota" required value="Indramayu">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Provinsi</label>
                            <input type="text" readonly class="form-control" name="provinsi" id="provinsi" placeholder="Masukkan Provisni" required value="Jawa Barat">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Periode</label>
                            {{-- <input type="text" class="form-control" name="periode" id="periode" placeholder="Masukkan Periode" required> --}}
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
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Jenis Kelamin </label><br>
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
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Status Perkawinan</label><br>
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
                </div>

                <div class="col-md-4">
                    <div class="form-group">
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
                                <input type="text" class="form-control" aria-label="Text input with radio button" name="status" required value="{{ucfirst(old('status_keluarga', $data_warga->status))}}">
                            </div>
                            @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
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
                </div>

                <div class="col-md-3">
                    <div class="form-group">
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
                </div>

                <div class="col-md-3">
                    <div class="form-group">
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
                </div>

                <div class="col-md-3">
                    <div class="form-group">
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
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Aktif dalam kegiatan Posyandu</label><br>
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
                </div>

                <div class="col-md-3">
                    <div class="form-group">
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
                </div>

                <div class="col-md-3">
                    <div class="form-group">
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
                </div>

                <div class="col-md-3">
                    <div class="form-group">
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
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
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
                </div>

                <div class="col-md-3">
                    <div class="form-group">
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
