@extends('kader.layout')

@section('title', 'Edit Data Industri Rumah Tangga TP PKK | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Edit Data Industri Rumah Tangga TP PKK')
@section('container')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Data Industri Rumah Tangga TP PKK</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ url('data_industri', $data_industri->id) }}" method="POST">
        @method('PUT')

        @csrf
        <div class="card-body">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Nama Warga</label>
              <select class="form-control" id="id_warga" name="id_warga">
                {{-- nama warga --}}
                @foreach ($warga as $c)
                <option value="{{ $c->id }}" {{ $c->id === $data_industri->id_warga ? 'selected' : '' }}>{{ $c->nama }}</option>

                    {{-- <option value="{{$c->id }}">  {{$c->id }}-{{ $c->nama }}</option> --}}
                @endforeach
                </select>
            </div>

          <div class="form-group">
            <label>Kategori</label>
            <select class="form-control" id="id_kategori" name="id_kategori">
                {{-- nama warga --}}
                @foreach ($katins as $c)
                <option value="{{ $c->id }}" {{ $c->id === $data_industri->id_kategori ? 'selected' : '' }}>{{ $c->nama_kategori }}</option>

                @endforeach
            </select>
          </div>

          <div class="form-group">
            <label>Komoditi</label>
            <input type="text" class="form-control" name="komoditi" id="komoditi" placeholder="Masukkan Komoditi" required value="{{$data_industri->komoditi}}">
          </div>
          <div class="form-group">
            <label>Volume</label>
            <input type="number" class="form-control" name="volume" id="volume" placeholder="Masukkan Volume" required value="{{$data_industri->volume}}">
          </div>

          <div class="form-group">
            <label>Periode</label>
            <select style="cursor:pointer;" class="form-control" id="periode" name="periode">
                <option value="{{ $data_industri->periode }}" {{ $data_industri->periode ? 'selected' : '' }}>{{ $data_industri->periode }}</option>
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
          <a href="/data_industri" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

