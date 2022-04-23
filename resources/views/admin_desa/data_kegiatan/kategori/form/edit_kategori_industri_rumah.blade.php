@extends('admin_desa.layout')

@section('title', 'Edit Kategori Industri Rumah Tangga | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Edit Kategori Industri Rumah Tangga')
@section('container')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Kategori Industri Rumah Tangga</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ url('kategori_industri', $kategori_industri->id) }}" method="POST">
        @method('PUT')

        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="Masukkan Nama Kategori" required value="{{$kategori_industri->nama_kategori}}">
              </div>
        </div>

        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/kategori_industri" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

