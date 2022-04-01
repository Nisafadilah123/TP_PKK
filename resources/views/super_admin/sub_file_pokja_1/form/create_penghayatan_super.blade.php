@extends('super_admin.layout')

@section('title', 'Tambah Data Jumlah Penghayatan dan Pengamalan Pancasila | Super Admin PKK Kab. Indramayu')

@section('bread', 'Tambah Data Jumlah Penghayatan dan Pengamalan Pancasila')
@section('container')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tambah Data Jumlah Penghayatan dan Pengamalan Pancasila</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ route('penghayatan_super.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                    <label for="exampleFormControlSelect1">Nama Desa</label>
                        <select class="form-control" id="id_desa" name="id_desa">
                            {{-- nama desa yang login --}}
                            @foreach ($desas as $c)
                                <option value="{{$c->id }}">  {{$c->kode_desa }}-{{ $c->nama_desa }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah PKBN Simulasi</label>
                        <input min="0" type="number" class="form-control" name="jml_PKBN_simulasi" id="jml_PKBN_simulasi" placeholder="Masukkan Jumlah PKBN Simulasi" required>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah PKBN Anggota</label>
                        <input min="0" type="number" class="form-control" name="jml_PKBN_anggota" id="jml_PKBN_anggota" placeholder="Masukkan Jumlah PKBN Anggota" required>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah PKDRT Simulasi</label>
                        <input min="0" type="number" class="form-control" name="jml_PKDRT_simulasi" id="jml_PKDRT_simulasi" placeholder="Masukkan Jumlah PKDRT Simulasi" required>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah PKDRT Anggota</label>
                        <input min="0" type="number" class="form-control" name="jml_PKDRT_anggota" id="jml_PKDRT_anggota" placeholder="Masukkan Jumlah PKDRT Anggota" required>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Pola Asuh Simulasi</label>
                        <input min="0" type="number" class="form-control" name="jml_pola_asuh_simulasi" id="jml_pola_asuh_simulasi" placeholder="Masukkan Jumlah Pola Asuh Simulasi" required>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Pola Asuh Anggota</label>
                        <input min="0" type="number" class="form-control" name="jml_pola_asuh_anggota" id="jml_pola_asuh_anggota" placeholder="Masukkan Jumlah Pola Asuh Anggota" required>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Lansia KLP</label>
                        <input min="0" type="number" class="form-control" name="jml_lansia_klp" id="jml_lansia_klp" placeholder="Masukkan Jumlah Lansia KLP" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">


            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Lansia Anggota</label>
                        <input min="0" type="number" class="form-control" name="jml_lansia_anggota" id="jml_lansia_anggota" placeholder="Masukkan Jumlah Lansia Anggota" required>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Periode</label>
                        {{-- <input min="0" type="number" class="form-control" name="periode" id="periode" placeholder="Masukkan Periode" required> --}}
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

        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/jml_kader" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

