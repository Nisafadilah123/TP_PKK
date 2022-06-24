@extends('admin_kab.layout')

@section('title', 'Tambah Data Agenda Kegiatan | Admin Kabupaten PKK Kab. Indramayu')

@section('bread', 'Tambah Data Agenda Kegiatan')
@section('container')

<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tambah Data Agenda Kegiatan</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ route('agendaKeg.store') }}" method="POST">
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
                    <label>Judul Agenda</label>
                    <input type="text" class="form-control @error('judul_agenda') is-invalid @enderror" name="judul_agenda" id="judul_agenda" placeholder="Masukkan Judul Agenda" value="{{old('judul_agenda')}}">
                        @error('judul_agenda')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group">
                    {{-- nama tema agenda --}}
                    <label>Tema</label>
                        <input type="text" class="form-control @error('tema') is-invalid @enderror" name="tema" id="tema" placeholder="Masukkan Tema" value="{{old('tema')}}">
                            @error('tema')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                </div>

                <div class="form-group">
                    {{-- nama tempat --}}
                    <label>Tempat</label>
                        <input type="text" class="form-control @error('tempat') is-invalid @enderror" name="tempat" id="tempat" placeholder="Masukkan Tempat" value="{{old('tempat')}}">
                            @error('tempat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                </div>

                <div class="form-group">
                    {{-- nama pukul --}}
                    <label>Pukul</label>
                        <input type="text" class="form-control @error('pukul') is-invalid @enderror" name="pukul" id="pukul" placeholder="Diisi dengan Pukul Agenda" value="{{old('pukul')}}">
                            @error('pukul')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                </div>

                <div class="form-group">
                    <label>Tanggal Publsih Berita</label>
                    <input type="date" class="form-control" name="tgl_publish" id="tgl_publish" placeholder="Masukkan Tanggal Berita" required value="{{old('date')}}">
                </div>
            </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/agendaKeg" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

