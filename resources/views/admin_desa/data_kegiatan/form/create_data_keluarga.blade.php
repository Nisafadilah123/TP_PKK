@extends('admin_desa.layout')

@section('title', 'Tambah Data Keluarga | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Tambah Data Keluarga')
@section('container')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tambah Data Keluarga</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ route('keluarga.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                    <label>Dasa Wisma</label>
                    <select class="form-control" id="dasa_wisma" name="dasa_wisma">
                        {{-- nama warga --}}
                        @foreach ($warga as $c)
                            <option value="{{$c->id}}">{{ $c->dasa_wisma }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">RT</label>
                        <input type="number" class="form-control" name="rt" id="rt" placeholder="RT" required>
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">RW</label>
                            <input type="number" class="form-control" name="rw" id="rw" placeholder="RW" required>
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

                                    <input type="text" disabled class="form-control" name="id_desa" id="id_desa" placeholder="Masukkan Nama Desa" required value="{{ $c->nama_desa }}">

                                @endforeach
                            {{-- </select> --}}
                        </div>
                    </div>
            </div>

            <div class="col-md-2">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Kecamatan</label>
                                {{-- <select class="form-control" id="id_desa" name="id_desa"> --}}
                                {{-- nama desa yang login --}}
                                @foreach ($kec as $c)
                                    {{-- <option value="{{$c->id }}">  {{$c->kode_desa }}-{{ $c->nama_desa }}</option> --}}
                                    <input type="hidden" class="form-control" name="id_kecamatan" id="id_kecamatan" placeholder="Masukkan Nama Desa" required value="{{$c->id}}">

                                    <input type="text" disabled class="form-control" name="id_kecamatan" id="id_kecamatan" placeholder="Masukkan Nama Desa" required value="{{ $c->nama_kecamatan }}">

                                @endforeach
                            {{-- </select> --}}
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-2">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Kabupaten</label>
                            <input type="text" readonly class="form-control" name="kota" id="kota" placeholder="Masukkan Kota" required value="Indramayu">
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Provinsi</label>
                            <input type="text" readonly class="form-control" name="provinsi" id="provinsi" placeholder="Masukkan Provisni" required value="Jawa Barat">
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Kepala Rumah Tangga</label>
                        <select class="form-control" id="nama_kepala_rumah_tangga" name="nama_kepala_rumah_tangga">
                            {{-- nama warga --}}
                            @foreach ($warga as $c)
                                <option value="{{$c->id}}">{{ $c->nama_kepala_rumah_tangga }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Anggota Keluarga</label>
                        <input type="number" class="form-control" name="jumlah_anggota_keluarga" id="jumlah_anggota_keluarga" placeholder="Diisi Jumlah Anggota Keluarga" required>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Laki-laki</label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" placeholder="Diisi Jumlah Anggota Keluarga Laki-laki" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">Orang</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Perempuan</label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" placeholder="Diisi Jumlah Anggota Keluarga Perempuan" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">Orang</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah KK</label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" placeholder="Diisi Jumlah Anggota Keluarga Perempuan" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">KK</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah</label>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" aria-label="Checkbox for following text input" name="kategori_anggota">Balita
                                        </div>
                                    </div>
                                    <input type="number" class="form-control" aria-label="Text input with checkbox" name="jumlah_kategori_anggota">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" aria-label="Checkbox for following text input" name="kategori_anggota">PUS (Pasangan Usia Subur)
                                        </div>
                                    </div>
                                    <input type="number" class="form-control" aria-label="Text input with checkbox" name="jumlah_kategori_anggota">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" aria-label="Checkbox for following text input" name="kategori_anggota">WUS (Wanita Usia Subur)
                                        </div>
                                    </div>
                                    <input type="number" class="form-control" aria-label="Text input with checkbox" name="jumlah_kategori_anggota">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" aria-label="Checkbox for following text input" name="kategori_anggota">3 Buta (Buta Tulis, Buta Baca, Buta Hitung)
                                        </div>
                                    </div>
                                    <input type="number" class="form-control" aria-label="Text input with checkbox" name="jumlah_kategori_anggota">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" aria-label="Checkbox for following text input" name="kategori_anggota">Ibu Hamil
                                        </div>
                                    </div>
                                    <input type="number" class="form-control" aria-label="Text input with checkbox" name="jumlah_kategori_anggota">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" aria-label="Checkbox for following text input" name="kategori_anggota">Ibu Menyusui
                                        </div>
                                    </div>
                                    <input type="number" class="form-control" aria-label="Text input with checkbox" name="jumlah_kategori_anggota">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" aria-label="Checkbox for following text input" name="kategori_anggota">Lansia
                                        </div>
                                    </div>
                                    <input type="number" class="form-control" aria-label="Text input with checkbox" name="jumlah_kategori_anggota">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Periode</label>
                        {{-- <input type="text" class="form-control" name="periode" id="periode" placeholder="Masukkan Periode" required> --}}
                        <select style="cursor:pointer;" class="form-control" id="periode" name="periode">
                            <option> Pilih Tahun</option>
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

            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Makanan Pokok Sehari-hari </label><br>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" name="makanan_pokok" value="Beras" class="form-check-input">Beras
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" name="makanan_pokok" value="Non Beras" class="form-check-input">Non Beras
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card-body">
                    <div class="form-group">
                        <label>Mempunyai Jamban Keluarga</label><br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">
                                      <input type="radio" aria-label="Radio button for following text input" name="punya_jamban" value="Ya">Ya
                                      </div>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Text input with radio button" name="jumlah_jamban" placeholder="Jumlah Jamban">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="punya_jamban" value="Tidak" class="form-check-input">Tidak
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Sumber Air Keluarga</label><br>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" name="sumber_air" value="PDAM" class="form-check-input">PDAM
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" name="sumber_air" value="Sumur" class="form-check-input">Sumur
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" name="sumber_air" value="Sungai" class="form-check-input">Sungai
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" name="sumber_air" value="Lainnya" class="form-check-input">Lainnya
                            </label>
                        </div>

                     </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Memiliki Tempat Pembuangan Sampah</label><br>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" name="punya_tempat_sampah" value="Ya" class="form-check-input">Ya
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" name="punya_tempat_sampah" value="Tidak" class="form-check-input">Tidak
                            </label>
                        </div>

                     </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Mempunyai Saluran Pembuangan Air Limbah</label><br>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" name="punya_saluran_air" value="Ya" class="form-check-input">Ya
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" name="punya_saluran_air" value="Tidak" class="form-check-input">Tidak
                            </label>
                        </div>

                     </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Menempel Stiker P4K</label><br>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" name="tempel_stiker" value="Ya" class="form-check-input">Ya
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" name="tempel_stiker" value="Tidak" class="form-check-input">Tidak
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
                        <label>Kriteria Rumah</label><br>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" name="kriteria_rumah" value="Sehat" class="form-check-input">Sehat
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" name="kriteria_rumah" value="Kurang Sehat" class="form-check-input">Kurang Sehat
                            </label>
                        </div>
                     </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Aktivitas UP2K</label><br>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" name="aktivitas_UP2K" value="Ya" class="form-check-input">Ya
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" name="aktivitas_UP2K" value="Tidak" class="form-check-input">Tidak
                            </label>
                        </div>
                     </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Aktivitas Kegiatan Usaha Kesehatan Lingkungan</label><br>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" name="aktivitas_kegiatan_usaha" value="Ya" class="form-check-input">Ya
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" name="aktivitas_kegiatan_usaha" value="Tidak" class="form-check-input">Tidak
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
@endpush
