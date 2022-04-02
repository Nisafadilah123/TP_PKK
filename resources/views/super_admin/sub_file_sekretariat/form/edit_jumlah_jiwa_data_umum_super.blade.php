@extends('super_admin.layout')

@section('title', 'Edit Data Jumlah Jiwa Data Umum | Super Admin PKK Kab. Indramayu')

@section('bread', 'Edit Data Jumlah Jiwa Data Umum')
@section('container')

<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Data Jumlah Jiwa Data Umum</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ url ('/jml_jiwa_umum_super', $jml_jiwa_umum_super->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="card-body">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Nama Desa</label>
                  <select class="form-control" id="id_desa" name="id_desa">
                      {{-- nama desa yang login --}}
                      @foreach ($desas as $c)
                      <option value="{{ $c->id }}" {{ $c->id === $jml_jiwa_umum_super->id_desa ? 'selected' : '' }}>
                        {{ $c->kode_desa }}-{{ $c->nama_desa }}
                    </option>
                      @endforeach
                  </select>
              </div>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label>Jumlah Jiwa Data Umum Laki-laki</label>
            <input min="0" type="number" class="form-control" name="jml_jiwa_data_umum_laki" id="jml_jiwa_data_umum_laki" placeholder="Masukkan Jumlah Jiwa Data Umum Laki-laki" required value="{{ucfirst(old('jml_jiwa_data_umum_laki', $jml_jiwa_umum_super->jml_jiwa_data_umum_laki))}}">
          </div>
          <div class="form-group">
            <label>Jumlah Jiwa Data Umum Perempuan</label>
            <input min="0" type="number" class="form-control" name="jml_jiwa_data_umum_perempuan" id="jml_jiwa_data_umum_perempuan" placeholder="Masukkan Jumlah Jiwa Data Umum Perempuan" required value="{{ucfirst(old('jml_jiwa_data_umum_perempuan', $jml_jiwa_umum_super->jml_jiwa_data_umum_perempuan))}}">
          </div>
          <div class="form-group">
            <label>Periode</label>
            <select style="cursor:pointer;" class="form-control" id="periode" name="periode">
                <option value="0" {{ $jml_jiwa_umum_super->periode ? 'selected' : '' }}>{{ $jml_jiwa_umum_super->periode }}</option>
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
          <a href="/jml_jiwa_umum_super" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

