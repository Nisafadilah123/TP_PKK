@extends('super_admin.layout')

@section('title', 'Tambah Data Jumlah Kader Data Umum | Super Admin PKK Kab. Indramayu')

@section('bread', 'Tambah Data Jumlah Kader Data Umum')
@section('container')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tambah Data Jumlah Kader Data Umum</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ route('jml_kader_umum_super.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
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
            <div class="col-md-6">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Kader Anggota TP PKK Laki-laki Data Umum</label>
                        <input type="number" class="form-control" name="jml_kader_anggota_pkk_laki_data_umum" id="jml_kader_anggota_pkk_laki_data_umum" placeholder="Masukkan Jumlah Kader Anggota TP PKK Laki-laki Data Umum" required>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="row">
            <div class="col-md-6">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Kader Anggota TP PKK Perempuan Data Umum</label>
                        <input type="number" class="form-control" name="jml_kader_anggota_pkk_perempuan_data_umum" id="jml_kader_anggota_pkk_perempuan_data_umum" placeholder="Masukkan Jumlah Kader Anggota TP PKK Perempuan Data Umum" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-body">
                     <div class="form-group">
                        <label>Jumlah Kader Umum Laki-laki Data Umum</label>
                        <input type="number" class="form-control" name="jml_kader_umum_laki_data_umum" id="jml_kader_umum_laki_data_umum" placeholder="Masukkan Jumlah Kader Umum Laki-laki Data Umum" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Kader Umum Perempuan Data Umum</label>
                        <input type="number" class="form-control" name="jml_kader_umum_perempuan_data_umum" id="jml_kader_umum_perempuan_data_umum" placeholder="Masukkan Jumlah Kader Umum Perempuan Data Umum" required>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Kader Khusus Laki-laki Data Umum</label>
                        <input type="number" class="form-control" name="jml_kader_khusus_laki_data_umum" id="jml_kader_khusus_laki_data_umum" placeholder="Masukkan Jumlah Kader Khusus Laki-laki Data Umum" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Kader Khusus Perempuan Data Umum</label>
                        <input type="number" class="form-control" name="jml_kader_khusus_perempuan_data_umum" id="jml_kader_khusus_perempuan_data_umum" placeholder="Masukkan Jumlah Kader Khusus Perempuan Data Umum" required>
                    </div>

                </div>
            </div>
        </div>

        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/jml_kader_umum_super" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

