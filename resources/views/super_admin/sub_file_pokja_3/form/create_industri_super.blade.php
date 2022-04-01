@extends('super_admin.layout')

@section('title', 'Tambah Data Jumlah Industri Rumah Tangga | Super Admin PKK Kab. Indramayu')

@section('bread', 'Tambah Data Jumlah Industri Rumah Tangga')
@section('container')

<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tambah Data Jumlah Industri Rumah Tangga</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ route('industri_super.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Nama Desa</label>
                  <select class="form-control" id="id_desa" name="id_desa">
                      {{-- nama desa yang login --}}
                      @foreach ($desas as $c)
                          <option value="{{$c->id }}">  {{$c->kode_desa }}-{{ $c->nama_desa }}</option>
                      @endforeach
                  </select>
              </div>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label>Jumlah Industri Pangan</label>
            <input min="0" type="number" class="form-control" name="jml_industri_pangan" id="jml_industri_pangan" placeholder="Masukkan Jumlah industri Pangan" required>
          </div>
          <div class="form-group">
            <label>Jumlah Industri Sandang</label>
            <input min="0" type="number" class="form-control" name="jml_industri_sandang" id="jml_industri_sandang" placeholder="Masukkan Jumlah industri Sandang" required>
          </div>
          <div class="form-group">
            <label>Jumlah Industri Jasa</label>
            <input min="0" type="number" class="form-control" name="jml_industri_jasa" id="jml_industri_jasa" placeholder="Masukkan Jumlah industri Jasa" required>
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
          <a href="/industri_super" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

