@extends('kader.layout')

@section('title', 'Edit Data Keluarga Warga TP PKK | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Edit Data Keluarga Warga TP PKK')
@section('container')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Data Keluarga Warga TP PKK</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <div class="card-body">
        <form action="{{ url('data_keluarga', $data_keluarga->id) }}" method="POST">
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
            <div class="col-md-2">
                <div class="form-group @error('dasa_wisma') is-invalid @enderror">
                    <label>Dasa Wisma</label>
                    <select class="form-control" id="dasa_wisma" name="dasa_wisma">
                        {{-- nama dasa wisma --}}
                        @foreach ($warga as $c)
                            <option value="{{ $c->id }}" {{ $c->id === $data_keluarga->dasa_wisma ? 'selected' : '' }}>{{ $c->dasa_wisma }}</option>

                        @endforeach

                    </select>
                </div>
                @error('dasa_wisma')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-2">
                <div class="form-group @error('rt') is-invalid @enderror">
                    <label for="exampleFormControlSelect1">RT</label>
                        <select class="form-control" id="rt" name="rt">
                            {{-- nama rt --}}
                            @foreach ($warga as $c)
                                <option value="{{ $c->id }}" {{ $c->id === $data_keluarga->rt ? 'selected' : '' }}>{{ $c->rt }}</option>
                            @endforeach
                        </select>
                </div>
                @error('rt')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-2">
                <div class="form-group @error('rw') is-invalid @enderror">
                    <label for="exampleFormControlSelect1">RW</label>
                        <select class="form-control " id="rw" name="rw">
                            {{-- nama rw --}}
                            @foreach ($warga as $c)
                            <option value="{{ $c->id }}" {{ $c->id === $data_keluarga->rw ? 'selected' : '' }}>{{ $c->rw }}</option>

                        @endforeach
                        </select>
                </div>
                @error('rw')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-2">
                <div class="form-group @error('id_desa') is-invalid @enderror">
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

            </div>

            <div class="col-md-2">
                <div class="form-group @error('id_kecamatan') is-invalid @enderror">
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
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Kabupaten</label>
                        <input type="text" readonly class="form-control @error('kota') is-invalid @enderror" name="kota" id="kota" placeholder="Masukkan Kota" value="Indramayu">
                        @error('kota')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Provinsi</label>
                        <input type="text" readonly class="form-control @error('provinsi') is-invalid @enderror" name="provinsi" id="provinsi" placeholder="Masukkan Provisni" value="Jawa Barat">
                        @error('provinsi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label>Nama Kepala Rumah Tangga</label>
                        <select class="form-control @error('nama_kepala_rumah_tangga') is-invalid @enderror" id="id_warga" name="id_warga">
                            {{-- nama warga --}}
                            @foreach ($warga as $c)
                                <option value="{{ $c->id }}" {{ $c->id === $data_keluarga->id_warga ? 'selected' : '' }}>{{ $c->nama_kepala_rumah_tangga }}</option>
                            @endforeach

                        </select>
                        @error('nama_kepala_rumah_tangga')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>

            <div class="col-md-2">
                    <div class="form-group">
                        <label>Jumlah Anggota Keluarga</label>
                        <input type="number" class="form-control @error('jumlah_anggota_keluarga') is-invalid @enderror" name="jumlah_anggota_keluarga" id="jumlah_anggota_keluarga" placeholder="Diisi Jumlah Anggota Keluarga" value="{{ ucfirst(old('jumlah_anggota_keluarga', $data_keluarga->jumlah_anggota_keluarga )) }}">
                        @error('jumlah_anggota_keluarga')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
            </div>

            <div class="col-md-2">
                <div class="form-group @error('laki_laki') is-invalid @enderror">
                    <label>Laki-laki</label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" min="0" name="laki_laki" id="laki_laki" placeholder="Diisi Jumlah Anggota Keluarga Laki-laki" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{ ucfirst(old('laki_laki', $data_keluarga->laki_laki )) }}">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">Orang</span>
                                </div>
                        </div>
                </div>
                @error('laki_laki')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-2">
                <div class="form-group @error('perempuan') is-invalid @enderror">
                    <label>Perempuan</label>
                        <div class="input-group mb-3">
                            <input type="number" name="perempuan" min="0" class="form-control" placeholder="Diisi Jumlah Anggota Keluarga Perempuan" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{ ucfirst(old('perempuan', $data_keluarga->perempuan )) }}">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">Orang</span>
                                </div>
                        </div>
                </div>
                @error('perempuan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-2">
                <div class="form-group @error('jumlah_KK') is-invalid @enderror">
                    <label>Jumlah KK</label>
                        <div class="input-group mb-3">
                            <input type="number" min="1" class="form-control" name="jumlah_KK" placeholder="Diisi Jumlah Kepala Keluarga" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{ ucfirst(old('jumlah_KK', $data_keluarga->jumlah_KK )) }}">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">KK</span>
                                </div>
                        </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Jumlah</label>
                        <div class="row">
                            <div class="col-md-3 ">
                                <div class="input-group mb-3 @error('jumlah_balita') is-invalid @enderror">
                                    <input type="number" min="0" class="form-control " placeholder="Balita" aria-label="Recipient's username" aria-describedby="basic-addon2" name="jumlah_balita" value="{{ ucfirst(old('jumlah_balita', $data_keluarga->jumlah_balita )) }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">Anak</span>
                                        </div>
                                </div>
                                @error('jumlah_balita')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-3 @error('jumlah_PUS') is-invalid @enderror">
                                    <input type="number" min="0" class="form-control" placeholder="PUS (Pasangan Usia Subur)" aria-label="Recipient's username" aria-describedby="basic-addon2" name="jumlah_PUS" value="{{ ucfirst(old('jumlah_PUS', $data_keluarga->jumlah_PUS )) }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">Orang</span>
                                        </div>
                                </div>
                                @error('jumlah_PUS')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-3 @error('jumlah_WUS') is-invalid @enderror">
                                    <input type="number" min="0" class="form-control" placeholder="WUS (Pasangan Usia Subur)" aria-label="Recipient's username" aria-describedby="basic-addon2" name="jumlah_WUS" value="{{ ucfirst(old('jumlah_WUS', $data_keluarga->jumlah_WUS )) }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">Orang</span>
                                    </div>
                                </div>
                                @error('jumlah_WUS')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-3 @error('jumlah_3_buta') is-invalid @enderror">
                                    <input type="number" min="0" class="form-control" placeholder="3 Buta (Buta Tulis, Buta Baca, Buta Hitung)" aria-label="Recipient's username" aria-describedby="basic-addon2" name="jumlah_3_buta" value="{{ ucfirst(old('jumlah_3_buta', $data_keluarga->jumlah_3_buta )) }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">Orang</span>
                                        </div>
                                </div>
                                @error('jumlah_3_buta')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-3 @error('jumlah_ibu_hamil') is-invalid @enderror">
                                    <input type="number" min="0" class="form-control" placeholder="Ibu Hamil" aria-label="Recipient's username" aria-describedby="basic-addon2" name="jumlah_ibu_hamil" value="{{ ucfirst(old('jumlah_ibu_hamil', $data_keluarga->jumlah_ibu_hamil )) }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">Orang</span>
                                        </div>
                                </div>
                                @error('jumlah_ibu_hamil')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-3 @error('jumlah_ibu_menyusui') is-invalid @enderror">
                                    <input type="number" min="0" class="form-control" placeholder="Ibu Menyusui" aria-label="Recipient's username" aria-describedby="basic-addon2" name="jumlah_ibu_menyusui" value="{{ ucfirst(old('jumlah_ibu_menyusui', $data_keluarga->jumlah_ibu_menyusui )) }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">Orang</span>
                                        </div>
                                </div>
                                @error('jumlah_ibu_menyusui')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-3 @error('jumlah_lansia') is-invalid @enderror">
                                    <input type="number" min="0" class="form-control" placeholder="Lansia" aria-label="Recipient's username" aria-describedby="basic-addon2" name="jumlah_lansia" value="{{ ucfirst(old('jumlah_lansia', $data_keluarga->jumlah_lansia )) }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">Orang</span>
                                        </div>
                                </div>
                                @error('jumlah_lansia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-3 @error('jumlah_kebutuhan') is-invalid @enderror">
                                    <input type="number" min="0" class="form-control" placeholder="Kebutuhan Khusus" aria-label="Recipient's username" aria-describedby="basic-addon2" name="jumlah_kebutuhan" value="{{ ucfirst(old('jumlah_kebutuhan', $data_keluarga->jumlah_kebutuhan )) }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">Orang</span>
                                    </div>
                                </div>
                                @error('jumlah_kebutuhan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                        </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                    <div class="form-group @error('periode') is-invalid @enderror">
                        <label>Periode</label>
                        <select style="cursor:pointer;" class="form-control" id="periode" name="periode">
                            <option value="{{ $data_keluarga->periode }}" {{ $data_keluarga->periode ? 'selected' : '' }}>{{ $data_keluarga->periode }}</option>
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

            <div class="col-md-3">
                <div class="form-group @error('makanan_pokok') is-invalid @enderror">
                    <label class="form-label">Makanan Pokok Sehari-hari </label><br>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" name="makanan_pokok" value="Beras" class="form-check-input" {{$data_keluarga->makanan_pokok == 'Beras'? 'checked' : ''}}>Beras
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" name="makanan_pokok" value="Non Beras" class="form-check-input" {{$data_keluarga->makanan_pokok == 'Non Beras'? 'checked' : ''}}>Non Beras
                            </label>
                        </div>
                </div>
                @error('makanan_pokok')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>

            <div class="col-md-4">
                <div class="form-group @error('punya_jamban') is-invalid @enderror">
                    <label>Mempunyai Jamban Keluarga</label><br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="radio" aria-label="Radio button for following text input" name="punya_jamban" value="Ya" {{$data_keluarga->punya_jamban == 'Ya'? 'checked' : ''}}>Ya

                                        </div>
                                    </div>
                                    <input type="number" min="0" class="form-control" aria-label="Text input with radio button" name="jumlah_jamban" placeholder="Jumlah Jamban" value="{{ ucfirst(old('jumlah_jamban', $data_keluarga->jumlah_jamban)) }}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">

                                        <input type="radio" name="punya_jamban" value="Tidak" class="form-check-input" {{$data_keluarga->punya_jamban == 'Tidak'? 'checked' : ''}}>Tidak
                                    </label>
                                </div>
                            </div>
                    </div>
                </div>
                @error('punya_jamban')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>

            <div class="col-md-3">
                <div class="form-group @error('sumber_air') is-invalid @enderror">
                    <label>Sumber Air Keluarga</label><br>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" name="sumber_air" value="PDAM" class="form-check-input" {{$data_keluarga->sumber_air == 'PDAM'? 'checked' : ''}}>PDAM
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" name="sumber_air" value="Sumur" class="form-check-input" {{$data_keluarga->sumber_air == 'Sumur'? 'checked' : ''}}>Sumur
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" name="sumber_air" value="Sungai" class="form-check-input" {{$data_keluarga->sumber_air == 'Sungai'? 'checked' : ''}}>Sungai
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" name="sumber_air" value="Lainnya" class="form-check-input" {{$data_keluarga->sumber_air == 'Lainnya'? 'checked' : ''}}>Lainnya
                        </label>
                    </div>

                </div>
                @error('sumber_air')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group @error('punya_tempat_sampah') is-invalid @enderror">
                    <label>Memiliki Tempat Pembuangan Sampah</label><br>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" name="punya_tempat_sampah" value="Ya" class="form-check-input" {{$data_keluarga->punya_tempat_sampah == 'Ya'? 'checked' : ''}}>Ya
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" name="punya_tempat_sampah" value="Tidak" class="form-check-input" {{$data_keluarga->punya_tempat_sampah == 'Tidak'? 'checked' : ''}}>Tidak
                        </label>
                    </div>

                </div>
                @error('punya_tempat_sampah')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-3">
                <div class="form-group @error('punya_saluran_air') is-invalid @enderror">
                    <label>Mempunyai Saluran Pembuangan Air Limbah</label><br>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" name="punya_saluran_air" value="Ya" class="form-check-input" {{$data_keluarga->punya_saluran_air == 'Ya'? 'checked' : ''}}>Ya
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" name="punya_saluran_air" value="Tidak" class="form-check-input" {{$data_keluarga->punya_saluran_air == 'Tidak'? 'checked' : ''}}>Tidak
                            </label>
                        </div>
                </div>
                @error('punya_saluran_air')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-2">
                <div class="form-group @error('tempel_stiker') is-invalid @enderror">
                    <label>Menempel Stiker P4K</label><br>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" name="tempel_stiker" value="Ya" class="form-check-input" {{$data_keluarga->tempel_stiker == 'Ya'? 'checked' : ''}}>Ya
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" name="tempel_stiker" value="Tidak" class="form-check-input" {{$data_keluarga->tempel_stiker == 'Tidak'? 'checked' : ''}}>Tidak
                            </label>
                        </div>
                </div>
                @error('tempel_stiker')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-2">
                <div class="form-group @error('kriteria_rumah') is-invalid @enderror">
                    <label>Kriteria Rumah</label><br>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" name="kriteria_rumah" value="Sehat" class="form-check-input" {{$data_keluarga->kriteria_rumah == 'Sehat'? 'checked' : ''}}>Sehat
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" name="kriteria_rumah" value="Tidak Sehat" class="form-check-input" {{$data_keluarga->kriteria_rumah == 'Tidak Sehat '? 'checked' : ''}}>Tidak Sehat
                        </label>
                    </div>


                </div>
                @error('kriteria_rumah')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <div class="form-group @error('aktivitas_UP2K') is-invalid @enderror">
                    <label>Aktivitas UP2K</label><br>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" name="aktivitas_UP2K" value="Ya" class="form-check-input" {{$data_keluarga->aktivitas_UP2K == 'Ya'? 'checked' : ''}}>Ya
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" name="aktivitas_UP2K" value="Tidak" class="form-check-input" {{$data_keluarga->aktivitas_UP2K == 'Tidak'? 'checked' : ''}}>Tidak
                        </label>
                    </div>


                </div>
                @error('aktivitas_UP2K')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-3">
                <div class="form-group @error('aktivitas_kegiatan_usaha') is-invalid @enderror">
                    <label>Aktivitas Kegiatan Usaha Kesehatan Lingkungan</label><br>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" name="aktivitas_kegiatan_usaha" value="Ya" class="form-check-input" {{$data_keluarga->aktivitas_kegiatan_usaha == 'Ya'? 'checked' : ''}}>Ya
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" name="aktivitas_kegiatan_usaha" value="Tidak" class="form-check-input" {{$data_keluarga->aktivitas_kegiatan_usaha == 'Tidak'? 'checked' : ''}}>Tidak
                        </label>
                    </div>
                </div>
                @error('aktivitas_kegiatan_usaha')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/data_keluarga" class="btn btn-outline-primary">
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