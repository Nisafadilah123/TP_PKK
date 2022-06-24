@extends('admin_desa.layout')

@section('title', 'Edit Data Anggota TP PKK | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Edit Data Anggota TP PKK')
@section('container')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Data Anggota TP PKK</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ url ('/data_anggota_tp', $data_anggota_tp->id) }}" method="POST">
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
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Anggota TP PKK" required value="{{ old('nama', $data_anggota_tp->nama) }}">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group @error('jenis_kelamin') is-invalid @enderror">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option value="1" {{ ($data_anggota_tp->jenis_kelamin === '1')  ? 'selected' : ''}}>Laki-laki</option>
                            <option value="2" {{ ($data_anggota_tp->jenis_kelamin === '2')  ? 'selected' : ''}}>Perempuan</option>
                          </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group @error('jabatan') is-invalid @enderror">
                        <label>Jabatan</label>
                        <select name="jabatan" id="jabatan" class="form-control">
                            <option value="1" {{ ($data_anggota_tp->jabatan === '1')  ? 'selected' : ''}}>Anggota TP PKK</option>
                            <option value="2" {{ ($data_anggota_tp->jabatan === '2')  ? 'selected' : ''}}>Kader Umum</option>
                            <option value="3" {{ ($data_anggota_tp->jabatan === '3')  ? 'selected' : ''}}>Kader Khusus</option>
                            <option value="4" {{ ($data_anggota_tp->jabatan === '4')  ? 'selected' : ''}}>Tenaga Sekretariat Honorer</option>
                            <option value="5" {{ ($data_anggota_tp->jabatan === '5')  ? 'selected' : ''}}>Tenaga Sekretariat Bantuan</option>
                          </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Masukkan Tempat Lahir" required value="{{ old('tempat_lahir', $data_anggota_tp->tempat_lahir) }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Tanggal lahir</label>
                        {{-- Tanggal lahir --}}
                        <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" id="tgl_lahir" placeholder="Di isi tanggal lahir" data-date-format="mm/dd/yyyy" value="{{ old('tgl_lahir', $data_anggota_tp->tgl_lahir) }}">
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
                        <input type="number" class="form-control @error('umur') is-invalid @enderror" name="umur" id="umur" placeholder="Di isi Umur" value="{{ old('umur', $data_anggota_tp->umur) }}">
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
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" placeholder="Di isi Alamat" value="{{ old('alamat', $data_anggota_tp->alamat) }}">
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
                            <option value="Lajang" {{ ($data_anggota_tp->status === 'Lajang')  ? 'selected' : ''}}>Lajang</option>
                            <option value="Menikah" {{ ($data_anggota_tp->status === 'Menikah')  ? 'selected' : ''}}>Menikah</option>
                            <option value="Cerai Mati" {{ ($data_anggota_tp->status === 'Cerai Mati')  ? 'selected' : ''}}>Cerai Mati</option>
                            <option value="Cerai Hidup" {{ ($data_anggota_tp->status === 'Cerai Hidup')  ? 'selected' : ''}}>Cerai Hdup</option>
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
                            <option value="Tidak Tamat SD/MI" {{ ($data_anggota_tp->pendidikan === 'Tidak Tamat SD/MI')  ? 'selected' : ''}}>Tidak Tamat SD/MI</option>
                            <option value="SD/MI" {{ ($data_anggota_tp->pendidikan === 'SD/MI')  ? 'selected' : ''}}>SD/MI</option>
                            <option value="SMP/Sederajat" {{ ($data_anggota_tp->pendidikan === 'SMP/Sederajat')  ? 'selected' : ''}}>SMP/Sederajat</option>
                            <option value="SMA/Sederajat" {{ ($data_anggota_tp->pendidikan === 'SMA/Sederajat')  ? 'selected' : ''}}>SMA/Sederajat</option>
                            <option value="Diploma" {{ ($data_anggota_tp->pendidikan === 'Diploma')  ? 'selected' : ''}}>Diploma</option>
                            <option value="D4/S1" {{ ($data_anggota_tp->pendidikan === 'D4/S1')  ? 'selected' : ''}}>D4/S1</option>
                            <option value="S2" {{ ($data_anggota_tp->pendidikan === 'S2')  ? 'selected' : ''}}>S2</option>
                            <option value="S3" {{ ($data_anggota_tp->pendidikan === 'S3')  ? 'selected' : ''}}>S3</option>
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
                            <option value="Petani" {{ ($data_anggota_tp->pekerjaan === 'Petani')  ? 'selected' : ''}}>Petani</option>
                            <option value="Pedagang" {{ ($data_anggota_tp->pekerjaan === 'Pedagang')  ? 'selected' : ''}}>Pedagang</option>
                            <option value="Swasta" {{ ($data_anggota_tp->pekerjaan === 'Swasta')  ? 'selected' : ''}}>Swasta</option>
                            <option value="Wirausaha" {{ ($data_anggota_tp->pekerjaan === 'Wirausaha')  ? 'selected' : ''}}>Wirausaha</option>
                            <option value="PNS" {{ ($data_anggota_tp->pekerjaan === 'PNS')  ? 'selected' : ''}}>PNS</option>
                            <option value="TNI/Polri" {{ ($data_anggota_tp->pekerjaan === 'TNI/Polri')  ? 'selected' : ''}}>TNI/Polri</option>
                            <option value="Lainnya" {{ ($data_anggota_tp->pekerjaan === 'Lainnya')  ? 'selected' : ''}}>Lainnya</option>
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
                        <select style="cursor:pointer;" class="form-control" id="periode" name="periode">
                            <option value="{{ $data_anggota_tp->periode }}" {{ $data_anggota_tp->periode ? 'selected' : '' }}>{{ $data_anggota_tp->periode }}</option>
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
