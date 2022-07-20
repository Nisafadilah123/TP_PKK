@extends('admin_desa.layout')

@section('title', 'Tambah Data Kader | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Tambah Data Kader')
@section('container')

<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tambah Data Kader</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ route('data_kader.store') }}" method="POST">
        @csrf
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{  ($error)  }}</li>

                @endforeach
            </ul>
        </div>
    @endif

        <div class="card-body">

          <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Masukkan Nama Kader" required value="{{ old('name') }}">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Masukkan Email" required value="{{ old('emaiil') }}">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Masukkan Password" required value="{{ old('password') }}">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

          </div>
          <div class="form-group">
            <label>User Type</label>
            <select class="form-control @error('user_type') is-invalid @enderror" name="user_type">
                <option>Pilih User Type</option>

                @foreach($user_type as $key => $val)
                    @if($key==old('user_type'))
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

            {{-- <select class="form-control" id="user_type" name="user_type">
                <option value="0" selected> Pilih User Type</option>
                @foreach ($user_type as $c)
                    <option value="{{$c->user_type }}">  {{$c->user_type }}</option>
                @endforeach
            </select> --}}
          </div>
            <div class="form-group">
                <label>Id Desa</label>
                <input type="hidden" class="form-control" name="id_desa" id="id_desa" placeholder="Masukkan Nama Kader" required value="{{ Auth::user()->desa->nama_desa }}">
            </div>
            <div class="form-group">
                <label>Id Desa</label>
                <input type="hidden" class="form-control" name="id_kecamatan" id="id_kecamatan" placeholder="Masukkan Nama Kader" required value="{{ Auth::user()->kecamatan->nama_kecamatan }}">
            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Tambah</button>
          <a href="/data_kader" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

