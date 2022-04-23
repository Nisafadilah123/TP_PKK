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
                        <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Di isi tanggal lahir" required data-date-format="mm/dd/yyyy">
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="card-body">
                    <div class="form-group">
                        <label>Umur</label>
                        <input type="number" class="form-control" name="umur" id="umur" placeholder="Di isi Umur" required>
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

            <div class="col-md-2">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">RT</label>
                        <input type="number" min="1" class="form-control" name="rt" id="rt" placeholder="RT" required>
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">RW</label>
                            <input type="number" min="1" class="form-control" name="rw" id="rw" placeholder="RW" required>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-md-2">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Kecamatan</label>
                        <select class="form-control" id="id_kecamatan" name="id_kecamatan">
                            {{-- nama desa yang login --}}
                            <option hidden> Pilih Kecamatan</option>
                            @foreach ($kec as $c)
                                <option value="{{$c->id }}">  {{$c->kode_kecamatan }}-{{ $c->nama_kecamatan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Desa</label>
                        <select class="form-control" id="id_desa" name="id_desa">
                            {{-- nama desa yang login --}}
                            {{-- <option hidden> Pilih Desa</option>
                            @foreach ($desas as $c)
                                <option value="{{$c->id }}">  {{$c->kode_desa }}-{{ $c->nama_desa }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                </div>
            </div>

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

        <div class="col-md-3">
            <div class="card-body">
                <div class="form-group">
                    <label>Periode</label>
                    {{-- <input type="text" class="form-control" name="periode" id="periode" placeholder="Masukkan Periode" required> --}}
                    <select style="cursor:pointer;" class="form-control" id="periode" name="periode">
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
            </div>
        </div>

        </div>

        <div class="row">

            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Jenis Kelamin </label><br>
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
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Status Perkawinan</label><br>
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
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Status Dalam Keluarga</label><br>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" name="status_keluarga" value="kepala keluarga" class="form-check-input">Kepala Keluarga
                                {{-- <input type="text" name="status" value="kepala keluarga" class="form-check-input" readonly > --}}
                            </label>
                        </div>
                        {{-- <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                              <input type="radio" aria-label="Radio button for following text input" name="status_keluarga" value="kepala keluarga">Kepala Keluarga
                              </div>
                            </div>
                            <input type="text" readonly class="form-control" aria-label="Text input with radio button" name="status" placeholder="Status" value="kepala keluarga" required>
                          </div> --}}
                    </div>

                        <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                              <input type="radio" aria-label="Radio button for following text input" name="status_keluarga" value="anggota keluarga">Anggota Keluarga
                              </div>
                            </div>
                            <input type="text" class="form-control" aria-label="Text input with radio button" name="status" placeholder="Status">
                          </div>
                        {{-- <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" name="status_keluarga" value="anggota keluarga" class="form-check-input">Anggota Keluarga
                            </label>
                        </div> --}}
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Agama</label><br>
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
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Pendidikan</label><br>
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
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Pekerjaan</label><br>
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
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Akseptor KB</label><br>
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
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Aktif dalam kegiatan Posyandu</label><br>
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
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Mengikuti Program Bina Keluarga Balita</label><br>
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
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Memiliki Tabungan</label><br>
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
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Mengikuti Kelompok Belajar Jenis</label><br>
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
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Mengikuti PAUD/Sejenis</label><br>
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
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Ikut dalam Kegiatan Koperasi</label><br>
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
