@extends('admin_kab.layout')

@section('title', 'Edit Data Berita PKK | Admin PKK Kab. Indramayu')

@section('bread', 'Edit Data Berita PKK')
@section('container')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Data Berita PKK</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{ url ('/beritaKab', $beritaKab->id) }}" method="POST" enctype="multipart/form-data">
      {{-- @dump($berita) --}}
        @method('PUT')
        @csrf

        <div class="card-body">
          <div class="form-group">
            <label>Nama Berita</label>
            <input type="text" class="form-control" name="nama_berita" id="nama_berita" placeholder="Masukkan Nama Berita" required value="{{ucfirst(old('nama_berita', $beritaKab->nama_berita))}}" >
          </div>
          <div class="form-group">
            <label>Deskripsi Berita</label>
            <input type="text" class="form-control" name="desk" id="desk" placeholder="Masukkan Deskripsi Berita" required value="{{ucfirst(old('desk', $beritaKab->desk))}}">
          </div>
          <div class="form-group">
            <label>Tanggal Publsih Berita</label>
            <input type="date" class="form-control" name="tgl_publish" id="tgl_publish" placeholder="Masukkan Tanggal Publsih Berita" required value="{{ucfirst(old('tgl_publish', $beritaKab->tgl_publish))}}">
          </div>
          <div class="form-group">
            <label>Penulis Berita</label>
            <input type="text" class="form-control" name="penulis" id="penulis" placeholder="Masukkan Penulis Berita" required value="{{ucfirst(old('penulis', $beritaKab->penulis))}}">
          </div>
          <div class="form-group">
            <label>Gambar Berita</label>
            <input name="gambar" type="file" class="form-control-file" id="gambar" accept=".img, .jpg, .jpeg, .png">
            <img src="/gambar/{{($beritaKab->gambar)}}" class="img-thumbnail" width="100px">
            <input name="gambar" type="hidden" name="hidden_image" value="{{asset('gambar/'. $beritaKab->gambar)}}" class="form-control-file" id="hidden_image">
            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/dataKab" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection
