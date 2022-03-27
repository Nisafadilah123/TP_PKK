@extends('admin_desa.layout')

@section('title', 'Tambah Data Pengembangan Kehidupan Berkoperasi | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Tambah Data Pengembangan Kehidupan Berkoperasi')
@section('container')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tambah Data Pengembangan Kehidupan Berkoperasi</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ route('koperasi_super.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-4">

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

          <div class="col-md-4">
          <div class="card-body">
            <div class="form-group">
              <label>Jumlah Pemula KLP </label>
              <input type="number" class="form-control" name="jml_pemula_klp" id="jml_pemula_klp" placeholder="Masukkan Jumlah Pemula KLP" required>
            </div>
          </div>
        </div>
        <div class="col-md-4">
                <div class="card-body">

                <div class="form-group">
                    <label>Jumlah Pemula Peserta</label>
                    <input type="number" class="form-control" name="jml_pemula_peserta" id="jml_pemula_peserta" placeholder="Masukkan Jumlah Pemula Peserta" required>
                </div>
                </div>
            </div>
        </div>

        <div class="row">

                <div class="col-md-4">
                    <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Madya KLP</label>
                        <input type="number" class="form-control" name="jml_madya_klp" id="jml_madya_klp" placeholder="Masukkan Jumlah Madya KLP" required>
                    </div>
                    </div>
                </div>

            <div class="col-md-4">
                <div class="card-body">

                    <div class="form-group">
                        <label>Jumlah Madya Peserta</label>
                        <input type="number" class="form-control" name="jml_madya_peserta" id="jml_madya_peserta" placeholder="Masukkan Jumlah Madya Peserta" required>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-body">

                <div class="form-group">
                    <label>Jumlah Utama KLP</label>
                    <input type="number" class="form-control" name="jml_utama_klp" id="jml_utama_klp" placeholder="Masukkan Jumlah Utama KLP" required>
                </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card-body">

                <div class="form-group">
                    <label>Jumlah Utama Peserta</label>
                    <input type="number" class="form-control" name="jml_utama_peserta" id="jml_utama_peserta" placeholder="Masukkan Jumlah Utama Peserta" required>
                </div>
                </div>
            </div>
                <div class="col-md-4">
                    <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Mandiri KLP</label>
                        <input type="number" class="form-control" name="jml_mandiri_klp" id="jml_mandiri_klp" placeholder="Masukkan Jumlah Mandiri KLP" required>
                    </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Mandiri Peserta</label>
                        <input type="number" class="form-control" name="jml_mandiri_peserta" id="jml_mandiri_peserta" placeholder="Masukkan Jumlah Mandiri Peserta" required>
                    </div>
                    </div>
                </div>


        </div>


        <div class="row">
            <div class="col-md-4">
                <div class="card-body">

                    <div class="form-group">
                        <label>Jumlah Koperas_superi KLP</label>
                        <input type="number" class="form-control" name="jml_koperas_superi_klp" id="jml_koperas_superi_klp" placeholder="Masukkan Jumlah Koperas_superi KLP" required>
                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <div class="card-body">

                <div class="form-group">
                    <label>Jumlah Koperas_superi Peserta</label>
                    <input type="number" class="form-control" name="jml_koperasi_peserta" id="jml_koperasi_peserta" placeholder="Masukkan Jumlah Koperasi Peserta" required>
                </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-body">

                    <div class="form-group">
                        <label>Jumlah Kader Umum Damas PKK</label>
                        <input type="number" class="form-control" name="jml_kader_umum_damas" id="jml_kader_umum_damas" placeholder="Masukkan Jumlah Kader Umum Damas" required>
                    </div>
                </div>
            </div>


        </div>

        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/pendidikan_super" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

