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
              <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Nama Kader" value="{{ old('name', $data_kader->name) }}" >
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email" value="{{ old('email', $data_kader->email) }}">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password" value="{{ old('password', $data_kader->password) }}">
            </div>
            <div class="form-group">
              <label>User Type</label>
              <select class="form-control" name="user_type">
                @foreach($user_type as $key => $val)
                    @if($key==old('user_type', $data_kader->user_type))
                    <option value="{{ $key }}" selected>{{ $val }}</option>
                    @else
                    <option value="{{ $key }}">{{ $val }}</option>
                    @endif
                @endforeach
              </select>

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

