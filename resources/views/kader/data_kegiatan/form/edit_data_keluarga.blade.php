@extends('kader.layout')

@section('title', 'Edit Data Keluarga | Kader Dasawisma PKK Kab. Indramayu')

@section('bread', 'Edit Data Keluarga')
@section('container')

<div class="container">
    <ul class="nav nav-tabs" id="dataKeluargaTabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="dasawisma-tab" data-toggle="tab" href="#dasawisma" role="tab" aria-controls="dasawisma" aria-selected="true">Data Dasa Wisma</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="keluarga-tab" data-toggle="tab" href="#keluarga" role="tab" aria-controls="keluarga" aria-selected="false">Data Keluarga</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="jumlah-anggota-tab" data-toggle="tab" href="#jumlah-anggota" role="tab" aria-controls="jumlah-anggota" aria-selected="false">Data Jumlah Anggota</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="kondisi-keluarga-tab" data-toggle="tab" href="#kondisi-keluarga" role="tab" aria-controls="kondisi-keluarga" aria-selected="false">Data Kondisi Keluarga</a>
        </li>
    </ul>

    <form action="{{ url('data_keluarga', $data_keluarga->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="dasawisma" role="tabpanel" aria-labelledby="dasawisma-tab">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-end mb-4">
                            <div class="col-md-2 d-flex justify-content-end">
                                <!-- Tombol yang memicu modal -->
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalSaya">
                                    Klik Info
                                </button>
                            </div>
                        </div>

                        @if (count($errors)>0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{  ($error)  }}</li>

                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label>Dasa Wisma</label>
                                            {{-- <input type="text" class="form-control @error('dasa_wisma') is-invalid @enderror" name="dasa_wisma" id="dasa_wisma" placeholder="Masukkan Nama Dasa Wisma" value="{{ old('dasa_wisma') }}"> --}}
                                            <select class="form-control" id="id_dasawisma" name="id_dasawisma">
                                                {{-- nama dasa wisma --}}
                                                @foreach ($dasawisma as $c)
                                                    <option value="{{$c->id}}" {{ $c->id === $c->id_dasawisma ? 'selected' : '' }}>{{ $c->nama_dasawisma }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('dasa_wisma')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        {{-- <div class="form-group">
                                            <label>Nama Kepala Rumah Tangga</label>
                                            <input type="text" class="form-control @error('nama_kepala_rumah_tangga') is-invalid @enderror" name="nama_kepala_rumah_tangga" id="nama_kepala_rumah_tangga" placeholder="Masukkan Nama Kepala Rumah Tangga" value="{{ old('nama_kepala_rumah_tangga', $data_keluarga->nama_kepala_rumah_tangga) }}">
                                            @error('nama_kepala_rumah_tangga')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> --}}

                                        <div class="form-group">
                                            <label>Kepala Rumah Tangga</label>
                                                {{-- Nama Kepala Rumah Tangga --}}
                                                <select class="form-control selectpicker" id="id_keluarga" name="id_kepala_keluarga" data-live-search="true" data-none-selected-text="Pilih Kepala Rumah Tangga">
                                                    {{-- nama dasa wisma --}}
                                                    <option hidden> Pilih Kepala Rumah Tangga</option>
                                                    @foreach ($kepalaKeluargas as $c)
                                                    <option value="{{$c->id}}" {{ $kepala_keluarga->id == $c->id ? 'selected' : '' }} data-tokens="{{ $c->nama }}" data-rt="{{ $c->rt }}" data-rw="{{ $c->rw }}" data-desa="{{ $c->desa->nama_desa ?? '' }}" data-kecamatan="{{ $c->desa->kecamatan->nama_kecamatan ?? '' }}" data-kabupaten="{{ $c->desa->kecamatan->kabupaten ?? '' }}" data-provinsi="{{ $c->desa->kecamatan->provinsi ?? '' }}" data-jumlah_anggota_keluarga="{{ $c->warga_count + 1 }}" data-nik_kepala_keluarga="{{ $c->no_ktp }}">{{ $c->nama }}</option>
                                                    @endforeach
                                                </select>
                                            @error('nama_kepala_rumah_tangga')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">RT</label>
                                            <input type="number" min="1" class="form-control @error('rt') is-invalid @enderror" name="rt" id="rt" placeholder="Masukkan No. RT" value="{{ old('rt', $data_keluarga->rt ) }}">

                                                {{-- <select class="form-control" id="rt" name="rt"> --}}
                                                    {{-- nomor rt --}}
                                                    {{-- <option value="" hidden> Pilih RT</option>
                                                    @foreach ($warga as $c)
                                                        <option value="{{$c->id}}">{{ $c->rt }}</option>
                                                    @endforeach
                                                </select> --}}
                                        </div>
                                        @error('rt')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group @error('rw') is-invalid @enderror">
                                            <label for="exampleFormControlSelect1">RW</label>
                                            <input type="number" min="1" class="form-control @error('rw') is-invalid @enderror" name="rw" id="rw" placeholder="Masukkan No. RW" value="{{ old('rw', $data_keluarga->rw ) }}">

                                            {{-- <select class="form-control " id="rw" name="rw"> --}}
                                                {{-- nama rw --}}
                                                {{-- <option value="" hidden> Pilih RW</option>
                                                @foreach ($warga as $c)
                                                    <option value="{{$c->id}}">{{ $c->rw }}</option>
                                                @endforeach
                                            </select> --}}
                                        </div>
                                        @error('rw')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group @error('rw') is-invalid @enderror">
                                            <label for="exampleFormControlSelect1">Dusun</label>
                                            <input type="text" class="form-control @error('dusun') is-invalid @enderror" name="dusun" id="dusun" placeholder="Masukkan Nama Dusun" value="{{ old('dusun', $data_keluarga->dusun) }}">
                                        </div>
                                        @error('dusun')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group @error('id_desa') is-invalid @enderror">
                                            <label for="exampleFormControlSelect1">Desa</label>
                                            {{-- <input type="hidden" class="form-control" name="id_desa" id="id_desa" placeholder="Masukkan Nama Desa" value="{{$c->id}}"> --}}
                                            <input type="text" disabled class="form-control" name="id_desa" id="id_desa" placeholder="Masukkan Nama Desa" value="{{ old('id_desa', $desa->nama_desa ?? '') }}">

                                        </div>
                                        @error('id_desa')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group @error('id_kecamatan') is-invalid @enderror">
                                            <label for="exampleFormControlSelect1">Kecamatan</label>
                                            {{-- nama kecamatan --}}
                                            <input type="text" disabled class="form-control" name="id_kecamatan" id="id_kecamatan" placeholder="Masukkan Nama Kecamatan" value="{{ old('id_kecamatan', $desa->kecamatan->nama_kecamatan ?? '') }}" disabled>
                                        </div>
                                        @error('id_kecamatan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Kabupaten</label>
                                            {{-- nama kabupaten --}}
                                                <input type="text" readonly class="form-control @error('kabupaten') is-invalid @enderror" name="kabupaten" id="kabupaten" placeholder="Masukkan kabupaten" value="{{ $desa->kecamatan->kabupaten ?? '' }}">
                                                @error('kabupaten')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Provinsi</label>
                                            {{-- nama provinsi --}}
                                                <input type="text" readonly class="form-control @error('provinsi') is-invalid @enderror" name="provinsi" id="provinsi" placeholder="Masukkan Provisni" value="{{ $desa->kecamatan->provinsi ?? '' }}">
                                                @error('provinsi')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Edit</button>
                        <a href="/data_keluarga" class="btn btn-outline-primary">
                            <span>Batalkan</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="keluarga" role="tabpanel" aria-labelledby="keluarga-tab">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-end mb-4">
                            <div class="col-md-2 d-flex justify-content-end">
                                <!-- Tombol yang memicu modal -->
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalSaya">
                                    Klik Info
                                </button>
                            </div>
                        </div>

                        @if (count($errors)>0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{  ($error)  }}</li>

                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Jumlah Anggota Keluarga</label>
                                            {{-- Jumlah Anggota Keluarga --}}
                                            <input type="number" min="0" class="form-control @error('jumlah_anggota_keluarga') is-invalid @enderror" name="jumlah_anggota_keluarga" id="jumlah_anggota_keluarga" placeholder="Diisi Jumlah Anggota Keluarga" value="{{ old('jumlah_anggota_keluarga', $data_keluarga->jumlah_anggota_keluarga) }}">
                                            @error('jumlah_anggota_keluarga')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group @error('jumlah_laki') is-invalid @enderror">
                                            <label>Laki-laki</label>
                                            {{-- Jumlah Anggota Keluarga Laki-laki--}}
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" class="form-control" name="jumlah_laki" id="jumlah_laki" placeholder="Diisi Jumlah Anggota Keluarga Laki-laki" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{ old('jumlah_laki', $data_keluarga->jumlah_laki) }}">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" id="basic-addon2">Orang</span>
                                                        </div>
                                                </div>
                                        </div>
                                        @error('jumlah_laki')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group @error('jumlah_perempuan') is-invalid @enderror">
                                            <label>Perempuan</label>
                                            {{-- Jumlah Anggota Keluarga perempuan--}}
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" name="jumlah_perempuan" class="form-control" placeholder="Diisi Jumlah Anggota Keluarga Perempuan" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{ old('jumlah_perempuan', $data_keluarga->jumlah_perempuan) }}">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" id="basic-addon2">Orang</span>
                                                        </div>
                                                </div>
                                        </div>
                                        @error('jumlah_perempuan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label>NIK Kepala Rumah Tangga</label>
                                            <input type="text" class="form-control @error('nik_kepala_keluarga') is-invalid @enderror" name="nik_kepala_keluarga" id="nik_kepala_keluarga" placeholder="Masukkan NIK Kepala Rumah Tangga" value="{{ old('nik_kepala_keluarga', $data_keluarga->nik_kepala_keluarga) }}">

                                            @error('nik_kepala_keluarga')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div> --}}

                                    <div class="col-md-6">
                                        <div class="form-group @error('jumlah_KK') is-invalid @enderror">
                                            <label>Jumlah KK</label>
                                            {{-- Jumlah KK--}}
                                                <div class="input-group mb-3">
                                                    <input type="number" min="1" class="form-control" name="jumlah_KK" placeholder="Diisi Jumlah Kepala Keluarga" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{ old('jumlah_KK', $data_keluarga->jumlah_KK) }}">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" id="basic-addon2">KK</span>
                                                        </div>
                                                </div>
                                        </div>
                                        @error('jumlah_KK')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group @error('periode') is-invalid @enderror">
                                            {{-- pilih periode --}}
                                            <label>Periode</label>
                                            <select style="cursor:pointer;" class="form-control" id="periode" name="periode">
                                                <option value="{{ $data_keluarga->periode }}"
                                                    {{ $data_keluarga->periode ? 'selected' : '' }}>{{ $data_keluarga->periode }}
                                                </option>
                                                    <?php
                                                    $year = date('Y');
                                                    $min = $year ;
                                                        $max = $year + 20;
                                                    for( $i=$min; $i<=$max; $i++ ) {
                                                    echo '<option value="'.$i.'" >'.$i.'</option>';
                                                }?>
                                            </select>
                                        </div>
                                        @error('periode')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group @error('id_user') is-invalid @enderror">
                                            {{-- nama kader --}}
                                            @foreach ($kad as $c)
                                            <input type="hidden" class="form-control" name="id_user" id="id_user"
                                                placeholder="Masukkan Nama Desa" value="{{$c->id}}">
                                            @endforeach
                                        </div>
                                        @error('id_user')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Edit</button>
                        <a href="/data_keluarga" class="btn btn-outline-primary">
                            <span>Batalkan</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="jumlah-anggota" role="tabpanel" aria-labelledby="jumlah-anggota-tab">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-end mb-4">
                            <div class="col-md-2 d-flex justify-content-end">
                                <!-- Tombol yang memicu modal -->
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalSaya">
                                    Klik Info
                                </button>
                            </div>
                        </div>

                        @if (count($errors)>0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{  ($error)  }}</li>

                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        <div class="row">
                            <div class="col-md-3">
                                <label for="exampleFormControlSelect1">Balita</label>
                                <div class="input-group mb-3 @error('jumlah_balita') is-invalid @enderror">
                                    {{-- jumlah 3 buta --}}
                                    <input type="number" min="0" class="form-control" placeholder="Balita" aria-label="Recipient's username" aria-describedby="basic-addon2" name="jumlah_balita" value="{{ old('jumlah_balita', $data_keluarga->jumlah_balita) }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">Orang</span>
                                        </div>
                                </div>
                                @error('jumlah_balita')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="col-md-3 ">
                                <div class="input-group mb-3">
                                    <label for="exampleFormControlSelect1">Balita Laki-laki</label>
                                        <div class="input-group mb-3 @error('jumlah_balita_laki') is-invalid @enderror">
                                        {{-- Jumlah Balita laki--}}
                                            <input type="number" min="0" class="form-control @error('jumlah_balita_laki') is-invalid @enderror" placeholder="Balita Laki-laki" aria-label="Recipient's username" aria-describedby="basic-addon2" name="jumlah_balita_laki" value="{{ old('jumlah_balita_laki', $data_keluarga->jumlah_balita_laki) }}">
                                                @error('jumlah_balita_laki')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2">Anak</span>
                                            </div>
                                        </div>
                                </div>
                            </div>

                            <div class="col-md-3 ">
                                <div class="input-group mb-3">
                                    <label for="exampleFormControlSelect1">Balita Perempuan</label>
                                    <div class="input-group mb-3 @error('jumlah_balita_perempuan') is-invalid @enderror">

                                    {{-- Jumlah Balita laki--}}
                                        <input type="number" min="0" class="form-control @error('jumlah_balita_perempuan') is-invalid @enderror" placeholder="Balita Perempuan" aria-label="Recipient's username" aria-describedby="basic-addon2" name="jumlah_balita_perempuan" value="{{ old('jumlah_balita_perempuan', $data_keluarga->jumlah_balita_laki) }}">
                                            @error('jumlah_balita_perempuan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">Anak</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <label for="exampleFormControlSelect1">Jumlah PUS</label>

                                        <div class="input-group mb-3 @error('jumlah_PUS') is-invalid @enderror">
                                            {{-- Jumlah PUS--}}
                                            <input type="number" min="0" class="form-control" placeholder="PUS (Pasangan Usia Subur)" aria-label="Recipient's username" aria-describedby="basic-addon2" name="jumlah_PUS" value="{{ old('jumlah_PUS', $data_keluarga->jumlah_PUS) }}">
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
                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <label for="exampleFormControlSelect1">Jumlah WUS</label>

                                        <div class="input-group mb-3 @error('jumlah_WUS') is-invalid @enderror">
                                            {{-- Jumlah WUS--}}
                                            <input type="number" min="0" class="form-control" placeholder="WUS (Pasangan Usia Subur)" aria-label="Recipient's username" aria-describedby="basic-addon2" name="jumlah_WUS" value="{{ old('jumlah_WUS', $data_keluarga->jumlah_WUS) }}">
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
                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <label for="exampleFormControlSelect1">Jumlah 3 Buta</label>

                                    <div class="input-group mb-3 @error('jumlah_3_buta') is-invalid @enderror">
                                        {{-- jumlah 3 buta --}}
                                        <input type="number" min="0" class="form-control" placeholder="3 Buta (Buta Tulis, Buta Baca, Buta Hitung)" aria-label="Recipient's username" aria-describedby="basic-addon2" name="jumlah_3_buta" value="{{ old('jumlah_3_buta', $data_keluarga->jumlah_3_buta) }}">
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
                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <label for="exampleFormControlSelect1">Jumlah 3 Buta Laki</label>

                                    <div class="input-group mb-3 @error('jumlah_3_buta_laki') is-invalid @enderror">
                                        {{-- jumlah 3 buta --}}
                                        <input type="number" min="0" class="form-control" placeholder="3 Buta (Buta Tulis, Buta Baca, Buta Hitung) Laki-laki" aria-label="Recipient's username" aria-describedby="basic-addon2" name="jumlah_3_buta_laki" value="{{ old('jumlah_3_buta_laki', $data_keluarga->jumlah_3_buta_laki) }}">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">Orang</span>
                                            </div>
                                    </div>
                                    @error('jumlah_3_buta_laki')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <label for="exampleFormControlSelect1">Jumlah 3 Buta Perempuan</label>
                                        <div class="input-group mb-3 @error('jumlah_3_buta_perempuan') is-invalid @enderror">
                                            {{-- jumlah 3 buta --}}
                                            <input type="number" min="0" class="form-control" placeholder="3 Buta (Buta Tulis, Buta Baca, Buta Hitung) Perempuan" aria-label="Recipient's username" aria-describedby="basic-addon2" name="jumlah_3_buta_perempuan" value="{{ old('jumlah_3_buta_perempuan', $data_keluarga->jumlah_3_buta_perempuan) }}">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2">Orang</span>
                                                </div>
                                        </div>
                                        @error('jumlah_3_buta_perempuan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <label for="exampleFormControlSelect1">Jumlah Ibu Hamil</label>
                                        <div class="input-group mb-3 @error('jumlah_ibu_hamil') is-invalid @enderror">
                                            {{-- jumlah ibu hamil --}}
                                            <input type="number" min="0" class="form-control" placeholder="Ibu Hamil" aria-label="Recipient's username" aria-describedby="basic-addon2" name="jumlah_ibu_hamil" value="{{ old('jumlah_ibu_hamil', $data_keluarga->jumlah_ibu_hamil) }}">
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
                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <label for="exampleFormControlSelect1">Jumlah Ibu Menyusui</label>
                                        <div class="input-group mb-3 @error('jumlah_ibu_menyusui') is-invalid @enderror">
                                            {{-- jumlah ibu menyusui --}}
                                            <input type="number" min="0" class="form-control" placeholder="Ibu Menyusui" aria-label="Recipient's username" aria-describedby="basic-addon2" name="jumlah_ibu_menyusui" value="{{ old('jumlah_ibu_menyusui', $data_keluarga->jumlah_ibu_menyusui) }}">
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
                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <label for="exampleFormControlSelect1">Jumlah 3 Buta</label>

                                        <div class="input-group mb-3 @error('jumlah_lansia') is-invalid @enderror">
                                            {{-- jumlah lansia --}}
                                            <input type="number" min="0" class="form-control" placeholder="Lansia" aria-label="Recipient's username" aria-describedby="basic-addon2" name="jumlah_lansia" value="{{ old('jumlah_lansia', $data_keluarga->jumlah_lansia) }}">
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
                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <label for="exampleFormControlSelect1">Jumlah 3 Buta</label>

                                    <div class="input-group mb-3 @error('jumlah_kebutuhan_khusus') is-invalid @enderror">
                                        {{-- jumlah kebutuhan --}}
                                        <input type="number" min="0" class="form-control" placeholder="Kebutuhan Khusus" aria-label="Recipient's username" aria-describedby="basic-addon2" name="jumlah_kebutuhan_khusus" value="{{ old('jumlah_kebutuhan_khusus', $data_keluarga->jumlah_kebutuhan_khusus) }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">Orang</span>
                                        </div>
                                    </div>
                                    @error('jumlah_kebutuhan_khusus')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Edit</button>
                        <a href="/data_keluarga" class="btn btn-outline-primary">
                            <span>Batalkan</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="kondisi-keluarga" role="tabpanel" aria-labelledby="kondisi-keluarga-tab">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-end mb-4">
                            <div class="col-md-2 d-flex justify-content-end">
                                <!-- Tombol yang memicu modal -->
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalSaya">
                                    Klik Info
                                </button>
                            </div>
                        </div>

                        @if (count($errors)>0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{  ($error)  }}</li>

                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group @error('makanan_pokok') is-invalid @enderror">
                                            {{-- pilih Makanan Pokok Sehari-hari--}}
                                            <label class="form-label">Makanan Pokok Sehari-hari </label><br>
                                            <select class="form-control @error('makanan_pokok') is-invalid @enderror" id="makanan_pokok" name="makanan_pokok">
                                                <option value="" hidden>Pilih Makanan Pokok</option>
                                                <option value="1" {{ $data_keluarga->makanan_pokok == '1' ? 'selected' : '' }}>Beras</option>
                                                <option value="0" {{ $data_keluarga->makanan_pokok == '2' ? 'selected' : '' }}>Non Beras</option>
                                            </select>
                                        </div>
                                        @error('makanan_pokok')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group @error('sumber_air') is-invalid @enderror">
                                            {{-- pilih sumber air --}}
                                            <label>Sumber Air Keluarga</label><br>
                                            <select class="form-control @error('sumber_air') is-invalid @enderror" id="sumber_air" name="sumber_air">
                                                <option value="" hidden>Pilih Sumber Air Keluarga</option>
                                                <option value="1" {{ $data_keluarga->sumber_air == '1' ? 'selected' : '' }}>PDAM</option>
                                                <option value="2" {{ $data_keluarga->sumber_air == '2' ? 'selected' : '' }}>Sumur</option>
                                                <option value="3" {{ $data_keluarga->sumber_air == '3' ? 'selected' : '' }}>Sungai</option>
                                                <option value="4" {{ $data_keluarga->sumber_air == '4' ? 'selected' : '' }}>Lainnya</option>
                                            </select>
                                        </div>
                                        @error('sumber_air')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group @error('kriteria_rumah') is-invalid @enderror">
                                            {{-- pilih kriteria rumah --}}
                                            <label>Kriteria Rumah</label><br>
                                            <select class="form-control @error('kriteria_rumah') is-invalid @enderror" id="kriteria_rumah" name="kriteria_rumah">
                                                <option value="" hidden>Pilih Kriteria Rumah</option>
                                                <option value="1" {{ $data_keluarga->kriteria_rumah == '1' ? 'selected' : '' }}>Sehat</option>
                                                <option value="2" {{ $data_keluarga->kriteria_rumah == '2' ? 'selected' : '' }}>Kurang Sehat</option>
                                            </select>
                                        </div>
                                        @error('kriteria_rumah')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group @error('punya_jamban') is-invalid @enderror">
                                            {{-- pilih mempunyai jamban --}}
                                            <label>Mempunyai Jamban Keluarga</label><br>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <input type="radio" aria-label="Radio button for following text input" name="punya_jamban" value="1" {{$data_keluarga->punya_jamban == '1'? 'checked' : ''}}>Ya
                                                                </div>
                                                            </div>
                                                            <input type="number" min="0" class="form-control" aria-label="Text input with radio button" name="jumlah_jamban" placeholder="Jumlah Jamban" value="{{ old('jumlah_jamban', $data_keluarga->jumlah_jamban) }}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" name="punya_jamban" value="0" class="form-check-input" {{ $data_keluarga->punya_jamban == '0' ? 'checked': '' }}>Tidak
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

                                </div>
                            </div>
                            <div class="col-md-12">

                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group @error('punya_tempat_sampah') is-invalid @enderror">
                                            {{-- pilih punya tempat pembuangan sampah --}}
                                            <label>Memiliki Tempat Pembuangan Sampah</label><br>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" name="punya_tempat_sampah" value="1" class="form-check-input" {{ $data_keluarga->punya_tempat_sampah == '1' ? 'checked': '' }}>Ya
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" name="punya_tempat_sampah" value="0" class="form-check-input" {{ $data_keluarga->punya_tempat_sampah == '0' ? 'checked': '' }}>Tidak
                                                    </label>
                                                </div>
                                        </div>
                                        @error('punya_tempat_sampah')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group @error('punya_saluran_air') is-invalid @enderror">
                                            {{-- pilih punya saluran pembuangan air limbah --}}
                                            <label>Mempunyai Saluran Pembuangan Air Limbah</label><br>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" name="punya_saluran_air" value="1" class="form-check-input"  {{ $data_keluarga->punya_saluran_air == '1' ? 'checked': '' }}>Ya
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" name="punya_saluran_air" value="0" class="form-check-input" {{ $data_keluarga->punya_saluran_air == '0' ? 'checked': '' }}>Tidak
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
                                            {{-- pilih stiker --}}
                                            <label>Menempel Stiker P4K</label><br>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" name="tempel_stiker" value="1" class="form-check-input" {{ $data_keluarga->tempel_stiker == '1' ? 'checked': '' }}>Ya
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" name="tempel_stiker" value="0" class="form-check-input" {{ $data_keluarga->tempel_stiker == '0' ? 'checked': '' }}>Tidak
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
                                        <div class="form-group @error('aktivitas_UP2K') is-invalid @enderror">
                                            {{-- pilih aktivitas UP2K--}}
                                            <label>Aktivitas UP2K</label><br>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" name="aktivitas_UP2K" value="1" class="form-check-input" {{ $data_keluarga->aktivitas_UP2K == '1' ? 'checked': '' }}>Ya
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" name="aktivitas_UP2K" value="0" class="form-check-input" {{ $data_keluarga->aktivitas_UP2K == '0' ? 'checked': '' }}>Tidak
                                                    </label>
                                                </div>
                                        </div>
                                        @error('aktivitas_UP2K')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group @error('aktivitas_kegiatan_usaha') is-invalid @enderror">
                                            {{-- pilih aktivitas kegiatan usaha --}}
                                            <label>Aktivitas Kegiatan Usaha Kesehatan Lingkungan</label><br>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" name="aktivitas_kegiatan_usaha" value="1" class="form-check-input" {{ $data_keluarga->aktivitas_kegiatan_usaha == '1' ? 'checked': '' }}>Ya
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" name="aktivitas_kegiatan_usaha" value="0" class="form-check-input" {{ $data_keluarga->aktivitas_kegiatan_usaha == '0' ? 'checked': '' }}>Tidak
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
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Edit</button>
                        <a href="/data_keluarga" class="btn btn-outline-primary">
                            <span>Batalkan</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>
@endsection


@push('script-addon')
<script type="text/javascript">

    $(function() {


    $(document).on('changed.bs.select', '[name="id_kepala_keluarga"]', function () {
        var data = $(this).find('option:selected').data();
        $('[name="rt"]').val(data.rt);
        $('[name="rw"]').val(data.rw);
        $('[name="id_desa"]').val(data.desa);
        $('[name="id_kecamatan"]').val(data.kecamatan);
        $('[name="kabupaten"]').val(data.kabupaten);
        $('[name="provinsi"]').val(data.provinsi);
        $('[name="nik_kepala_keluarga"]').val(data.nik_kepala_keluarga);
    });
    $('[name="id_kepala_keluarga"]').trigger('changed.bs.select');

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
