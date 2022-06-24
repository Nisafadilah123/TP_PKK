@extends('admin_desa.layout')

@section('title', 'Tambah Data Anggota TP PKK | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Tambah Data Anggota TP PKK')
@section('container')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tambah Data Anggota TP PKK</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ route('data_anggota_tp.store') }}" method="POST">
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
                        {{-- nama kecamatan --}}
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

                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Masukkan Nama Anggota TP PKK" required value="{{ old('nama') }}">
                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group @error('jenis_kelamin') is-invalid @enderror">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option value="1">Laki-laki</option>
                            <option value="2">Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group @error('jabatan') is-invalid @enderror">
                        <label>Jabatan</label>
                        <select name="jabatan" id="jabatan" class="form-control">
                            <option value="1">Anggota TP PKK</option>
                            <option value="2">Kader Umum</option>
                            <option value="3">Kader Khusus</option>
                            <option value="4">Tenaga Sekretariat Honorer</option>
                            <option value="5">Tenaga Sekretariat Bantuan</option>
                        </select>
                        @error('jabatan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" id="tempat_lahir" placeholder="Masukkan Tempat Lahir" required value="{{ old('ttempat_lahir') }}">
                        @error('tempat_lahir')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Tanggal lahir</label>
                        {{-- Tanggal lahir --}}
                        <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" id="tgl_lahir" placeholder="Di isi tanggal lahir" data-date-format="mm/dd/yyyy" value="{{ old('tgl_lahir') }}">
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
                        <input type="number" class="form-control @error('umur') is-invalid @enderror" name="umur" id="umur" placeholder="Di isi Umur" value="{{ old('umur') }}">
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
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" placeholder="Di isi Alamat" value="{{ old('alamat') }}">
                        @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group @error('status') is-invalid @enderror">
                        <label>Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="Lajang">Lajang</option>
                            <option value="Menikah">Menikah</option>
                            <option value="Cerai Mati">Cerai Mati</option>
                            <option value="Cerai Hidup">Cerai Hdup</option>
                        </select>
                        @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group @error('pendidikan') is-invalid @enderror">
                        <label>Pendidikan</label>
                        <select name="pendidikan" id="pendidikan" class="form-control">
                            <option value="Tidak Tamat SD/MI">Tidak Tamat SD/MI</option>
                            <option value="SD/MI">SD/MI</option>
                            <option value="SMP/Sederajat">SMP/Sederajat</option>
                            <option value="SMA/Sederajat">SMA/Sederajat</option>
                            <option value="Diploma">Diploma</option>
                            <option value="D4/S1">D4/S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>
                        @error('pendidikan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group @error('pekerjaan') is-invalid @enderror">
                        <label>Pekerjaan</label>
                        <select name="pekerjaan" id="pekerjaan" class="form-control">
                            <option value="Petani">Petani</option>
                            <option value="Pedagang">Pedagang</option>
                            <option value="Swasta">Swasta</option>
                            <option value="Wirausaha">Wirausaha</option>
                            <option value="PNS">PNS</option>
                            <option value="TNI/Polri">TNI/Polri</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                        @error('pekerjaan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" class="form-control" name="ket" id="ket" placeholder="Masukkan Keterangan" value="{{ old('keterangan') }}">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group @error('periode') is-invalid @enderror">
                        <label>Periode</label>
                        {{-- pilih periode --}}
                        <select style="cursor:pointer;" class="form-control " id="periode" name="periode" value="{{ old('periode') }}">
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
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/data_anggota_tp" class="btn btn-outline-primary">
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
