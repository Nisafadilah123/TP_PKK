@extends('admin_desa.layout')

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

      <form action="{{ route('data_warga.store') }}" method="POST">
        @csrf
        <div class="row">

            <div class="col-md-4">
                <div class="card-body">
                    <div class="form-group">
                    <label>Dasa Wisma</label>
                    <input type="text" class="form-control" name="dasa_wisma" id="dasa_wisma" placeholder="Di isi sesuai dengan nama dasawisma yang diikuti warga yang bersangkutan" required>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-body">

                    <div class="form-group">
                        <label>Nama Kepala Rumah Tangga</label>
                        <input type="text" class="form-control" name="nama_kepala_rumah_tangga" id="nama_kepala_rumah_tangga" placeholder="Di isi dengan nama Kepala Rumah Tangga pada rumah yang didata" required>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-body">
                <div class="form-group">
                    <label>No. Registrasi</label>
                    <input type="text" class="form-control" name="no_registrasi" id="no_registrasi" placeholder="Nomor Registrasi diisi dengan nomor urutan sesuai wilayah" required>
                </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>No. KTP</label>
                        <input type="text" class="form-control" name="no_ktp" id="no_ktp" placeholder="Di isi dengan sudah atau belum atas kepemilikan KTP dan atau Kartu Keluarga (KK)" required>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-body">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Di isi dengan nama" required>
                </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-body">
                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Di isi jabatan yang bersangkutan pada di struktural TP PKK" required>
                </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                <div class="form-group">
                    <label>Tempat lahir</label>
                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Di isi Kota/Kabupaten tempat lahir yang bersangkutan" required>
                </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Tanggal lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Di isi tanggal lahir" required class="datepicker" data-date-format="mm/dd/yyyy">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Umur</label>
                        <input type="text" class="form-control" name="umur" id="umur" placeholder="Di isi Umur" required>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Di isi Alamat" required>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Desa</label>
                                {{-- <select class="form-control" id="id_desa" name="id_desa"> --}}
                                {{-- nama desa yang login --}}
                                @foreach ($desas as $c)
                                    {{-- <option value="{{$c->id }}">  {{$c->kode_desa }}-{{ $c->nama_desa }}</option> --}}
                                    <input type="hidden" class="form-control" name="id_desa" id="id_desa" placeholder="Masukkan Nama Desa" required value="{{$c->id}}">

                                    <input type="text" disabled class="form-control" name="id_desa" id="id_desa" placeholder="Masukkan Nama Desa" required value="{{$c->kode_desa }}-{{ $c->nama_desa }}">

                                @endforeach
                            {{-- </select> --}}
                        </div>
                    </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Kecamatan</label>
                                {{-- <select class="form-control" id="id_desa" name="id_desa"> --}}
                                {{-- nama desa yang login --}}
                                @foreach ($kec as $c)
                                    {{-- <option value="{{$c->id }}">  {{$c->kode_desa }}-{{ $c->nama_desa }}</option> --}}
                                    <input type="hidden" class="form-control" name="id_kecamatan" id="id_kecamatan" placeholder="Masukkan Nama Desa" required value="{{$c->id}}">

                                    <input type="text" disabled class="form-control" name="id_kecamatan" id="id_kecamatan" placeholder="Masukkan Nama Desa" required value="{{$c->kode_kecamatan }}-{{ $c->nama_kecamatan }}">

                                @endforeach
                            {{-- </select> --}}
                    </div>
                </div>
            </div>

          <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Kabupaten</label>
                            <input type="text" disabled class="form-control" name="kota" id="kota" placeholder="Masukkan Kota" required value="Indramayu">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Provinsi</label>
                            <input type="text" disabled class="form-control" name="provinsi" id="provinsi" placeholder="Masukkan Provisni" required value="Jawa Barat">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Periode</label>
                        {{-- <input type="text" class="form-control" name="periode" id="periode" placeholder="Masukkan Periode" required> --}}
                        <select style="cursor:pointer;" class="form-control" id="periode" name="periode">
                            <option value="0" selected> Pilih Tahun</option>
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
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Jenis Kelamin </label>
                        <br>
                        <div class="selectgroup">
                            <label class="selectgroup-item">
                                <input type="checkbox" name="jenis_kelamin" value="laki-laki" class="selectgroup-input">
                                <span class="selectgroup-button">Laki-laki</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="checkbox" name="jenis_kelamin" value="perempuan" class="selectgroup-input">
                                <span class="selectgroup-button">Perempuan</span>
                            </label>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Status Perkawinan</label>
                        <br>
                        <div class="selectgroup">
                            <label class="selectgroup-item">
                                <input type="checkbox" name="status_perkawinan" value="menikah" class="selectgroup-input">
                                <span class="selectgroup-button">Menikah</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="checkbox" name="status_perkawinan" value="lajang" class="selectgroup-input">
                                <span class="selectgroup-button">Lajang</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="checkbox" name="status_perkawinan" value="janda" class="selectgroup-input">
                                <span class="selectgroup-button">Janda</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="checkbox" name="status_perkawinan" value="duda" class="selectgroup-input">
                                <span class="selectgroup-button">Duda</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Status Dalam Keluarga</label>
                            <div class="selectgroup">
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="status_keluarga" value="kepala rumah tangga" class="selectgroup-input">
                                    <span class="selectgroup-button">Kepala Rumah Tangga</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="status_keluarga" value="anggota keluarga" class="selectgroup-input">
                                    <span class="selectgroup-button">Anggota Keluarga</span>
                                </label>
                            </div>
                     </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Agama</label>
                            <div class="selectgroup">
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="agama" value="islam" class="selectgroup-input">
                                    <span class="selectgroup-button">Islam</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="agama" value="kristen" class="selectgroup-input">
                                    <span class="selectgroup-button">Kristen</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="agama" value="khatolik" class="selectgroup-input">
                                    <span class="selectgroup-button">Katholik</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="agama" value="hindu" class="selectgroup-input">
                                    <span class="selectgroup-button">Hindu</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="agama" value="budha" class="selectgroup-input">
                                    <span class="selectgroup-button">Budha</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="agama" value="khonghucu" class="selectgroup-input">
                                    <span class="selectgroup-button">Khonghucu</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="agama" value="kepercayaan_lain" class="selectgroup-input">
                                    <span class="selectgroup-button">Kepercayaan Lain</span>
                                </label>
                            </div>
                     </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Pendidikan</label>
                            <div class="selectgroup">
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="pendidikan" value="tidak tamat SD" class="selectgroup-input">
                                    <span class="selectgroup-button">Tidak Tamat SD</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="pendidikan" value="sd/mi" class="selectgroup-input">
                                    <span class="selectgroup-button">SD/MI</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="pendidikan" value="smp/sederajat" class="selectgroup-input">
                                    <span class="selectgroup-button">SMP/Sederajat</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="pendidikan" value="sma/sederajat" class="selectgroup-input">
                                    <span class="selectgroup-button">SMA/Sederajat</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="pendidikan" value="d3" class="selectgroup-input">
                                    <span class="selectgroup-button">D3</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="pendidikan" value="d4/s1" class="selectgroup-input">
                                    <span class="selectgroup-button">D4/S1</span>
                                </label>
                            </div>
                     </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Pekerjaan</label>
                            <div class="selectgroup">
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="pekerjaan" value="petani" class="selectgroup-input">
                                    <span class="selectgroup-button">Petani</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="pekerjaan" value="pedagang" class="selectgroup-input">
                                    <span class="selectgroup-button">Pedagang</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="pekerjaan" value="swasta" class="selectgroup-input">
                                    <span class="selectgroup-button">Swasta</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="pekerjaan" value="wirausaha" class="selectgroup-input">
                                    <span class="selectgroup-button">Wiruasaha</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="pekerjaan" value="PNS" class="selectgroup-input">
                                    <span class="selectgroup-button">PNS</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="pekerjaan" value="tni polri" class="selectgroup-input">
                                    <span class="selectgroup-button">TNI Polri</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="pekerjaan" value="lainnya" class="selectgroup-input">
                                    <span class="selectgroup-button">Lainnya</span>
                                </label>
                            </div>
                     </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Akseptor KB</label>
                            <div class="selectgroup">
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="akseptor_kb" value="ya" class="selectgroup-input">
                                    <span class="selectgroup-button">Ya</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="akseptor_kb" value="tidak jenis akseptor kb" class="selectgroup-input">
                                    <span class="selectgroup-button">Tidak Jenis Akseptor KB</span>
                                </label>
                            </div>
                     </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Aktif dalam kegiatan Posyandu</label>
                            <div class="selectgroup">
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="aktif_posyandu" value="ya" class="selectgroup-input">
                                    <span class="selectgroup-button">Ya</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="aktif_posyandu" value="tidak frekuensi/volume/kali" class="selectgroup-input">
                                    <span class="selectgroup-button">Tidak Frekuensi/Volume/Kali</span>
                                </label>
                            </div>
                     </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Mengikuti Program Bina Keluarga Balita</label>
                            <div class="selectgroup">
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="ikut_bkb" value="ya" class="selectgroup-input">
                                    <span class="selectgroup-button">Ya</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="ikut_bkb" value="tidak" class="selectgroup-input">
                                    <span class="selectgroup-button">Tidak </span>
                                </label>
                            </div>
                     </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Memiliki Tabungan</label>
                            <div class="selectgroup">
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="memiliki_tabungan" value="ya" class="selectgroup-input">
                                    <span class="selectgroup-button">Ya</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="memiliki_tabungan" value="tidak" class="selectgroup-input">
                                    <span class="selectgroup-button">Tidak </span>
                                </label>
                            </div>
                     </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Mengikuti Kelompok Belajar Jenis</label>
                            <div class="selectgroup">
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="ikut_kelompok_belajar" value="ya" class="selectgroup-input">
                                    <span class="selectgroup-button">Ya</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="ikut_kelompok_belajar" value="tidak" class="selectgroup-input">
                                    <span class="selectgroup-button">Tidak </span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="ikut_kelompok_belajar" value="paket A" class="selectgroup-input">
                                    <span class="selectgroup-button">Paket A</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="ikut_kelompok_belajar" value="paket B" class="selectgroup-input">
                                    <span class="selectgroup-button">Paket B </span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="ikut_kelompok_belajar" value="paket c" class="selectgroup-input">
                                    <span class="selectgroup-button">Paket C</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="ikut_kelompok_belajar" value="kf" class="selectgroup-input">
                                    <span class="selectgroup-button">KF</span>
                                </label>
                            </div>
                     </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Mengikuti PAUD/Sejenis</label>
                            <div class="selectgroup">
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="ikut_paud_sejenis" value="ya" class="selectgroup-input">
                                    <span class="selectgroup-button">Ya</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="ikut_paud_sejenis" value="tidak" class="selectgroup-input">
                                    <span class="selectgroup-button">Tidak </span>
                                </label>
                            </div>
                     </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Ikut dalam Kegiatan Koperasi</label>
                            <div class="selectgroup">
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="ikut_koperasi" value="ya" class="selectgroup-input">
                                    <span class="selectgroup-button">Ya</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="ikut_koperasi" value="tidak jenis koperasi" class="selectgroup-input">
                                    <span class="selectgroup-button">Tidak Jenis Koperasi</span>
                                </label>
                            </div>
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
    <!-- /.card -->
  </div>
@endsection

@push('script-addon')
<script>
    $(function() {
        $("#datepicker").datepicker();
            changeMonth: true,
            changeYear: true
    });
</script>
@endpush
