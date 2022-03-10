@extends('admin_kab.layout')

@section('title', 'Tambah Data Berita PKK | Admin PKK Kab. Indramayu')

@section('bread', 'Tambah Data Berita PKK')
@section('container')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tambah Data Berita PKK</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{ route('beritaKab.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card-body">
          <div class="form-group">
            <label>Nama Berita</label>
            <input type="text" class="form-control" name="nama_berita" id="nama_berita" placeholder="Masukkan Nama Berita" required>
          </div>
          
          <div class="form-group">
            <label>Tanggal Publsih Berita</label>
            <input type="date" class="form-control" name="tgl_publish" id="tgl_publish" placeholder="Masukkan Deskripsi Berita" required>
          </div>
          <div class="form-group">
            <label>Penulis Berita</label>
            <input type="text" class="form-control" name="penulis" id="penulis" placeholder="Masukkan Deskripsi Berita" required>
          </div>
          <div class="form-group">
            <label>Gambar Berita</label>
            <input name="gambar" type="file" class="form-control-file" id="gambar" accept=".img, .jpg, .jpeg, .png">
            {{-- <img src="{{asset('gambar/'. $c->logo)}}" class="img-thumbnail" width="100px"> --}}
            {{-- <input name="logo" type="hidden" name="hidden_image" value="{{asset('gambar/'. $c->logo)}}" class="form-control-file" id="hidden_image"> --}}
          </div>
          <div class="form-group">
            <label>Deskripsi Berita</label>
            <textarea type="text" class="form-control" name="desk" id="desk" rows="5" placeholder="Masukkan Deskripsi Berita" required></textarea>
          </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/data_desa" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

