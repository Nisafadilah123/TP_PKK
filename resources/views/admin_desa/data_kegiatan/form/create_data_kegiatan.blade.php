@extends('admin_desa.layout')

@section('title', 'Tambah Data Kegiatan Warga TP PKK | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Tambah Data Kegiatan Warga TP PKK')
@section('container')

<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tambah Data Kegiatan Warga TP PKK</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ route('data_kegiatan.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Nama Warga</label>
              <select class="form-control" id="id_warga" name="id_warga">
                {{-- nama warga --}}
                @foreach ($keg as $c)
                    <option value="{{$c->id_warga }}">  {{$c->id }}-{{ $c->nama }}</option>
                @endforeach
                </select>
            </div>

          <div class="form-group">
            <label>Nama Kegiatan</label>
            <select class="form-control" id="id_kegiatan" name="id_kegiatan">
                {{-- nama warga --}}
                @foreach ($kat as $c)
                    <option value="{{$c->id_kegiatan }}">  {{$c->id }}-{{ $c->nama_kegiatan }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Aktivitas</label><br>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input type="radio" name="aktivitas" value="Ya" class="form-check-input">Ya
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input type="radio" name="aktivitas" value="Tidak" class="form-check-input">Tidak
                </label>
            </div>          </div>
          <div class="form-group">
            <label>Keterangan (Jenis Kegiatan Yang Diikuti)</label>
            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Masukkan Keterangan" required>
          </div>
          <div class="form-group">
            <label>Periode</label>
            {{-- <input min="0" type="number" class="form-control" name="periode" id="periode" placeholder="Masukkan Periode" required> --}}
            <select style="cursor:pointer;" class="form-control" id="periode" name="periode">
              <option value="0" selected> Pilih Tahun</option>
                <?php
                  $year = date('Y');
                  $min = $year ;
                  $max = $year + 20;
                  for( $i=$min; $i<=$max; $i++ ) {
                    echo '<option value='.$i.'>'.$i.'</option>';
                  }?>
            </select>
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/jml_kader" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

