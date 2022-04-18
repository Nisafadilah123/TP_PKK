@extends('admin_desa.layout')

@section('title', 'Tambah Data Pemanfaatan Tanah Pekaranangan TP PKK | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Tambah Data Pemanfaatan Tanah Pekaranangan TP PKK')
@section('container')

<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tambah Data Pemanfaatan Tanah Pekaranangan TP PKK</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ route('pemanfaatan.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Nama Warga</label>
              <select class="form-control" id="id_warga" name="id_warga">
                {{-- nama warga --}}
                @foreach ($warga as $c)
                    <option value="{{$c->id}}">  {{$c->id }}-{{ $c->nama }}</option>
                @endforeach
                </select>
            </div>

          <div class="form-group">
            <label>Kategori</label>
            <select class="form-control" id="id_kategori" name="id_kategori">
                {{-- nama warga --}}
                <option> Pilih Kategori</option>
                @foreach ($kat as $c)
                    <option value="{{$c->id}}">  {{$c->id }}-{{ $c->nama_kategori }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Komoditi</label>
            <input type="text" class="form-control" name="komoditi" id="komoditi" placeholder="Masukkan Komoditi" required>
          </div>
          <div class="form-group">
            <label>Jumlah</label>
            <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Masukkan Jumlah" required>
          </div>
          <div class="form-group">
            <label>Periode</label>
            <select style="cursor:pointer;" class="form-control" id="periode" name="periode">
              <option> Pilih Tahun</option>
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
          <a href="/pemanfaatan" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

