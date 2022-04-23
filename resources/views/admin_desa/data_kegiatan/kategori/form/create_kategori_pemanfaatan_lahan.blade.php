@extends('admin_desa.layout')

@section('title', 'Tambah Kategori Pemanfaatan Tanah Pekarangan TP PKK | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Tambah Kategori Pemanfaatan Tanah Pekarangan TP PKK')
@section('container')

<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tambah Kategori Pemanfaatan Tanah Pekarangan TP PKK</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ route('kategori_pemanfaatan.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="Masukkan Nama Kategori" required>
              </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/kategori_pemanfaatan" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

