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
        <div class="card-body">
          <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Nama Kader" required>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email" required>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password" required>
          </div>
          <div class="form-group">
            <label>User Type</label>
            <select class="form-control" name="user_type">
                <option value="" selected>Pilih User Type</option>

                @foreach($user_type as $key => $val)
                @if($key==old('user_type'))
                <option value="{{ $key }}" selected>{{ $val }}</option>
                @else
                <option value="{{ $key }}">{{ $val }}</option>
                @endif
                @endforeach
            </select>
            {{-- <select class="form-control" id="user_type" name="user_type">
                <option value="0" selected> Pilih User Type</option>
                @foreach ($user_type as $c)
                    <option value="{{$c->user_type }}">  {{$c->user_type }}</option>
                @endforeach
            </select> --}}
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

