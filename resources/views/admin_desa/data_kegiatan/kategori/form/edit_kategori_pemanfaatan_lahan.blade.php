@extends('admin_desa.layout')

@section('title', 'Edit Kategori Pemanfaatan Tanah Pekarangan TP PKK | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Edit Kategori Pemanfaatan Tanah Pekarangan TP PKK')
@section('container')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Kategori Pemanfaatan Tanah Pekarangan TP PKK</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ url('kategori_pemanfaatan', $kategori_pemanfaatan->id) }}" method="POST">
        @method('PUT')

        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="Masukkan Nama Kategori" required value="{{$kategori_pemanfaatan->nama_kategori}}">
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

