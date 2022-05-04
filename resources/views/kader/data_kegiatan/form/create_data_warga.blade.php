@extends('kader.layout')

@section('title', 'Tambah Data Warga TP PKK | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Tambah Data Warga TP PKK')
@section('container')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tambah Data Warga TP PKK</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

        <div class="card-body">
            <form action="{{ route('data_warga.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-10">
                        <h6 style="color: red">* Semua elemen atribut harus diisi</h6>
                    </div>
                    <div class="col-md-2">
                    <!-- Tombol yang memicu modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalSaya">
                        Klik Info
                    </button>

                    </div>
                </div>
                <!-- Contoh Modal -->
                <div class="modal fade" id="modalSaya" tabindex="-1" role="dialog" aria-labelledby="modalSayaLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalSayaLabel">Info Keterangan Atribut </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table>
                                    <tr>
                                        <th colspan="1">Point/Isian</th>
                                        <th>Penjelasan</th>
                                    </tr>
                                    <tr>
                                        <td>Dasa Wisma</td>
                                        <td>Di isi sesuai dengan nama dasawisma yang diikuti warga yang bersangkutan</td>

                                    </tr>
                                    <tr>
                                        <td>Nama Kepala Keluarga</td>
                                        <td>Di isi dengan nama Kepala Rumah Tangga pada rumah yang didata.
                                            Kepala Rumah Tangga adalah yang bertanggung jawab atas segala sesuatu yang terkait dengan kegiatan di dalam rumah yang sedang didata.</td>

                                    </tr>
                                    <tr>
                                        <td>No. Registrasi</td>
                                        <td>Nomor Registrasi diisi dengan nomor urutan sesuai wilayah, misalnya:020103042009001,dengan rincian: 02:prov; 01:kab/kota; 03:kec; 04:desa/kelurahan; 2009:th masuk; 001 : nomor pendataan</td>
                                    </tr>
                                    <tr>
                                        <td>No. KTP/NIK</td>
                                        <td>Di isi dengan sudah atau belum atas kepemilikan KTP dan atau Kartu Keluarga (KK)</td>
                                    </tr>
                                    <tr>
                                        <td>Jabatan</td>
                                        <td>Jabatan yang bersangkutan pada di struktural TP PKK</td>
                                    </tr>
                                    <tr>
                                        <td>Status Dalam Keluarga</td>
                                        <td>Diisi sesuai status yang bersangkutan didalam rumah yang sedang di data.</td>
                                    </tr>
                                    <tr>
                                        <td>Akseptor KB</td>
                                        <td>Diisi dengan apakah yang bersangkutan mengikuti program KB dan jenis akseptor KB yang dipilih</td>
                                    </tr>
                                    <tr>
                                        <td>Memiliki Tabungan</td>
                                        <td>Tabungan tidak hanya berupa uang di bank, tetapi bisa juga berupa ternak, tanaman keras, tanah dll
                                            sesuai dengan situasi kondisi masing-masing daerah</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Oke</button>
                            </div>
                        </div>
                    </div>
                </div>

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
                            <label>Dasa Wisma</label>
                            {{-- nama dasa wisma --}}
                            <input type="text" class="form-control @error('dasa_wisma') is-invalid @enderror" name="dasa_wisma" id="dasa_wisma" placeholder="Di isi sesuai dengan nama dasawisma yang diikuti warga yang bersangkutan" >
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
                            {{-- Nama Kepala Rumah Tangga --}}
                            <input type="text" class="form-control @error('nama_kepala_rumah_tangga') is-invalid @enderror" name="nama_kepala_rumah_tangga" id="nama_kepala_rumah_tangga" placeholder="Di isi dengan nama Kepala Rumah Tangga pada rumah yang didata">
                            @error('nama_kepala_rumah_tangga')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>No. Registrasi</label>
                            {{-- no.registrasi --}}
                            <input type="text" class="form-control @error('no_registrasi') is-invalid @enderror" name="no_registrasi" id="no_registrasi" placeholder="Nomor Registrasi diisi dengan nomor urutan sesuai wilayah">
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
                            <label>No. KTP</label>
                            {{-- No. KTP --}}
                            <input type="text" class="form-control @error('no_ktp') is-invalid @enderror" name="no_ktp" id="no_ktp" placeholder="Di isi dengan sudah atau belum atas kepemilikan KTP dan atau Kartu Keluarga (KK)">
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
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Di isi dengan nama">
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
                            <input type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" id="jabatan" placeholder="Di isi jabatan yang bersangkutan pada di struktural TP PKK">
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
                            {{-- Tempat lahir --}}
                            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" id="tempat_lahir" placeholder="Di isi Kota/Kabupaten tempat lahir yang bersangkutan">
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
                            <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" id="tgl_lahir" placeholder="Di isi tanggal lahir" data-date-format="mm/dd/yyyy">
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
                            <input type="number" class="form-control @error('umur') is-invalid @enderror" name="umur" id="umur" placeholder="Di isi Umur">
                            @error('umur')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Alamat</label>
                            {{-- Alamat--}}
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" placeholder="Di isi Alamat">
                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">RT</label>
                            {{-- rt --}}
                            <input type="number" min="1" class="form-control @error('rt') is-invalid @enderror" name="rt" id="rt" placeholder="RT">
                            @error('rt')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">RW</label>
                            {{-- rw --}}
                            <input type="number" min="1" class="form-control @error('rw') is-invalid @enderror" name="rw" id="rw" placeholder="RW">
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
                            {{-- nama desa --}}
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

                    <div class="col-md-2">
                        <div class="form-group @error('id_kecamatan') is-invalid @enderror">
                            <label for="exampleFormControlSelect1">Kecamatan</label>
                            {{-- nama kecamatan --}}
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

                    <div class="col-md-2">
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
                            <select style="cursor:pointer;" class="form-control " id="periode" name="periode">
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
                    <div class="col-md-2">
                        <div class="form-group @error('jenis_kelamin') is-invalid @enderror">
                            <label class="form-label">Jenis Kelamin </label><br>
                            {{-- pilih jenis kelamin --}}
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="jenis_kelamin" value="laki-laki" class="form-check-input">Laki-laki
                                </label>
                            </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="jenis_kelamin" value="perempuan" class="form-check-input">Perempuan
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
                            {{-- pilih status perkawinan --}}
                                <div class="form-check form-check-inline">
                                    <label label class="form-check-label">
                                        <input type="radio" name="status_perkawinan" value="menikah" class="form-check-input">Menikah
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label label class="form-check-label">
                                        <input type="radio" name="status_perkawinan" value="lajang" class="form-check-input">Lajang
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="status_perkawinan" value="janda" class="form-check-input">Janda
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="status_perkawinan" value="duda" class="form-check-input">Duda
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
                            <label>Status Dalam Keluarga</label><br>
                            {{-- pilih status dalam keluarga --}}
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="status_keluarga" value="kepala keluarga" class="form-check-input">Kepala Keluarga
                                    </label>
                                </div>
                        </div>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="radio" aria-label="Radio button for following text input" name="status_keluarga" value="anggota keluarga">Anggota Keluarga
                                        </div>
                                    </div>
                                        <input type="text" class="form-control" aria-label="Text input with radio button" name="status" placeholder="Status">
                                </div>
                            @error('status_keluarga')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="col-md-3">
                        <div class="form-group @error('agama') is-invalid @enderror">
                            <label>Agama</label><br>
                            {{-- pilih agama --}}
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="agama" value="islam" class="form-check-input">Islam
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="agama" value="kristen" class="form-check-input">Kristen
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="agama" value="khatolik" class="form-check-input">Katholik
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="agama" value="hindu" class="form-check-input">Hindu
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="agama" value="budha" class="form-check-input">Budha
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="agama" value="khonghucu" class="form-check-input">Khonghucu
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="agama" value="kepercayaan_lain" class="form-check-input">Kepercayaan Lain
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
                            <label>Pendidikan</label><br>
                            {{-- Pilih Pendidikan --}}
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="pendidikan" value="Tidak Tamat SD" class="form-check-input">Tidak Tamat SD
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="pendidikan" value="SD/MI" class="form-check-input">SD/MI
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="pendidikan" value="SMP/Sederajat" class="form-check-input">SMP/Sederajat
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="pendidikan" value="SMA/Sederajat" class="form-check-input">SMA/Sederajat
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="pendidikan" value="D3" class="form-check-input">D3
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="pendidikan" value="D4/S1" class="form-check-input">D4/S1
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
                            <label>Pekerjaan</label><br>
                                {{-- Pilih Pekejaan --}}
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="pekerjaan" value="petani" class="form-check-input">Petani
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="pekerjaan" value="pedagang" class="form-check-input">Pedagang
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="pekerjaan" value="swasta" class="form-check-input">Swasta
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="pekerjaan" value="wirausaha" class="form-check-input">Wiruasaha
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="pekerjaan" value="PNS" class="form-check-input">PNS
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="pekerjaan" value="TNI Polri" class="form-check-input">TNI Polri
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="pekerjaan" value="lainnya" class="form-check-input">Lainnya
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
                        <div class="form-group @error('akseptor_kb') is-invalid @enderror">
                            <label>Akseptor KB</label><br>
                                {{-- Pilih Akseptor --}}
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="akseptor_kb" value="ya" class="form-check-input">Ya
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="akseptor_kb" value="tidak" class="form-check-input">Tidak
                                    </label>
                                </div>
                        </div>
                        @error('akseptor_kb')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-2">
                        <div class="form-group @error('aktif_posyandu') is-invalid @enderror">
                            <label>Aktif dalam kegiatan Posyandu</label><br>
                                {{-- Pilih aktif dalam kegiatan Posyandu --}}
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="aktif_posyandu" value="ya" class="form-check-input">Ya
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="aktif_posyandu" value="tidak" class="form-check-input">Tidak
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
                            <label>Mengikuti Program Bina Keluarga Balita</label><br>
                                {{-- Pilih mengikuti program bkb --}}
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="ikut_bkb" value="ya" class="form-check-input">Ya
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="ikut_bkb" value="tidak" class="form-check-input">Tidak
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
                            <label>Memiliki Tabungan</label><br>
                                {{-- Pilih memiliki tabungan --}}
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="memiliki_tabungan" value="ya" class="form-check-input">Ya
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="memiliki_tabungan" value="tidak" class="form-check-input">Tidak
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
                            <label>Mengikuti Kelompok Belajar Jenis</label><br>
                                {{-- Pilih mengikuti kelompok Belajar Jenis --}}
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="ikut_kelompok_belajar" value="ya" class="form-check-input">Ya
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="ikut_kelompok_belajar" value="tidak" class="form-check-input">Tidak
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                            <input type="radio" name="ikut_kelompok_belajar" value="Paket A" class="form-check-input">Paket A
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="ikut_kelompok_belajar" value="Paket B" class="form-check-input">Paket B
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="ikut_kelompok_belajar" value="Paket C" class="form-check-input">Paket C
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="ikut_kelompok_belajar" value="KF (Keaksaraan Fungsional)" class="form-check-input">KF (Keaksaraan Fungsional)
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
                                <label>Mengikuti PAUD/Sejenis</label><br>
                                    {{-- Pilih PAUD/Sejenis --}}
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="ikut_paud_sejenis" value="ya" class="form-check-input">Ya
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="ikut_paud_sejenis" value="tidak" class="form-check-input">Tidak
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
                            <label>Ikut dalam Kegiatan Koperasi</label><br>
                                {{-- Pilih mengikuti kegiatan koperasi --}}
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="ikut_koperasi" value="ya" class="form-check-input">Ya
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="ikut_koperasi" value="tidak" class="form-check-input">Tidak
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
                            <span>Batalkan</span></a>
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
