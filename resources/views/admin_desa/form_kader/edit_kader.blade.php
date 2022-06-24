@extends('admin_desa.layout')

@section('title', 'Edit Data Kader TP PKK | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Edit Data Kader TP PKK')
@section('container')

<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Data Kader TP PKK</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ url ('/data_kader', $data_kader->id) }}" method="POST">
        {{-- @dump($data_desa) --}}
          @method('PUT')
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Masukkan Nama Kader" value="{{ old('name', $data_kader->name) }}" >
              @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Masukkan Email" value="{{ old('email', $data_kader->email) }}">
              @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Masukkan Password" value="{{ old('password', $data_kader->password) }}">
              @error('password')
              <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            </div>
            <div class="form-group">
              <label>User Type</label>
              <select class="form-control @error('user_type') is-invalid @enderror" name="user_type">
                @foreach($user_type as $key => $val)
                    @if($key==old('user_type', $data_kader->user_type))
                    <option value="{{ $key }}" selected>{{ $val }}</option>
                    @else
                    <option value="{{ $key }}">{{ $val }}</option>
                    @endif
                @endforeach
              </select>
              @error('user_type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            </div>
            <div class="form-group">
                <label>Id Desa</label>
                <input type="text" class="form-control" name="id_desa" id="id_desa" placeholder="Masukkan Nama Kader" required value="{{ Auth::user()->desa->nama_desa }}">
            </div>
            <div class="form-group">
                <label>Id Desa</label>
                <input type="text" class="form-control" name="id_kecamatan" id="id_kecamatan" placeholder="Masukkan Nama Kader" required value="{{ Auth::user()->kecamatan->nama_kecamatan }}">
            </div>

          </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/data_kader" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

