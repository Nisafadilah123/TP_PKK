@extends('admin_desa.layout')

@section('title', 'Edit Data Jumlah Pengembangan Kehidupan Berkoperasi | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Edit Data Jumlah Pengembangan Kehidupan Berkoperasi')
@section('container')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Data Jumlah Pengembangan Kehidupan Berkoperasi</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ url('koperasi_super', $koperasi_super->id) }}" method="POST">
        @method('PUT')

        @csrf
        <div class="row">
            <div class="col-md-4">

                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Nama Desa</label>
                            <select class="form-control" id="id_desa" name="id_desa">
                                    {{-- nama desa yang login --}}
                                    @foreach ($desas as $d)
                                    <option value="{{ $d->id }}" {{ $d->id === $koperasi_super->id_desa ? 'selected' : '' }}>
                                        {{ $d->kode_desa }}-{{ $d->nama_desa }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
            </div>

          <div class="col-md-4">
          <div class="card-body">
            <div class="form-group">
              <label>Jumlah Pemula KLP </label>
              <input type="number" class="form-control" name="jml_pemula_klp" id="jml_pemula_klp" placeholder="Masukkan Jumlah Pemula KLP" required value="{{ucfirst(old('jml_pemula_klp', $koperasi_super->jml_pemula_klp))}}">
            </div>
          </div>
        </div>
        <div class="col-md-4">
                <div class="card-body">

                <div class="form-group">
                    <label>Jumlah Pemula Peserta</label>
                    <input type="number" class="form-control" name="jml_pemula_peserta" id="jml_pemula_peserta" placeholder="Masukkan Jumlah Pemula Peserta" required value="{{ucfirst(old('jml_pemula_peserta', $koperasi_super->jml_pemula_peserta))}}">
                </div>
                </div>
            </div>
        </div>

        <div class="row">

                <div class="col-md-4">
                    <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Madya KLP</label>
                        <input type="number" class="form-control" name="jml_madya_klp" id="jml_madya_klp" placeholder="Masukkan Jumlah Madya KLP" required value="{{ucfirst(old('jml_madya_klp', $koperasi_super->jml_madya_klp))}}">
                    </div>
                    </div>
                </div>

            <div class="col-md-4">
                <div class="card-body">

                    <div class="form-group">
                        <label>Jumlah Madya Peserta</label>
                        <input type="number" class="form-control" name="jml_madya_peserta" id="jml_madya_klp" placeholder="Masukkan Jumlah Madya Peserta" required value="{{ucfirst(old('jml_madya_klp', $koperasi_super->jml_madya_klp))}}">
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-body">

                <div class="form-group">
                    <label>Jumlah Utama KLP</label>
                    <input type="number" class="form-control" name="jml_utama_klp" id="jml_utama_klp" placeholder="Masukkan Jumlah Utama KLP" required value="{{ucfirst(old('jml_utama_klp', $koperasi_super->jml_utama_klp))}}">
                </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card-body">

                <div class="form-group">
                    <label>Jumlah Utama Peserta</label>
                    <input type="number" class="form-control" name="jml_utama_peserta" id="jml_utama_peserta" placeholder="Masukkan Jumlah Utama Peserta" required value="{{ucfirst(old('jml_utama_peserta', $koperasi_super->jml_utama_peserta))}}">
                </div>
                </div>
            </div>
                <div class="col-md-4">
                    <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Mandiri KLP</label>
                        <input type="number" class="form-control" name="jml_mandiri_klp" id="jml_mandiri_klp" placeholder="Masukkan Jumlah Mandiri KLP" required value="{{ucfirst(old('jml_mandiri_klp', $koperasi_super->jml_mandiri_klp))}}">
                    </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Mandiri Peserta</label>
                        <input type="number" class="form-control" name="jml_mandiri_peserta" id="jml_mandiri_peserta" placeholder="Masukkan Jumlah Mandiri Peserta" required value="{{ucfirst(old('jml_mandiri_peserta', $koperasi_super->jml_mandiri_peserta))}}">
                    </div>
                    </div>
                </div>


        </div>


        <div class="row">
            <div class="col-md-4">
                <div class="card-body">

                    <div class="form-group">
                        <label>Jumlah Koperasi KLP</label>
                        <input type="number" class="form-control" name="jml_koperasi_klp" id="jml_koperasi_klp" placeholder="Masukkan Jumlah Koperasi KLP" required value="{{ucfirst(old('jml_koperasi_klp', $koperasi_super->jml_koperasi_klp))}}">
                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <div class="card-body">

                <div class="form-group">
                    <label>Jumlah Koperasi Peserta</label>
                    <input type="number" class="form-control" name="jml_koperasi_peserta" id="jml_koperasi_peserta" placeholder="Masukkan Jumlah Koperasi Peserta" required value="{{ucfirst(old('jml_koperasi_peserta', $koperasi_super->jml_koperasi_peserta))}}">
                </div>
                </div>
            </div>


        </div>

        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/koperasi_super" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

