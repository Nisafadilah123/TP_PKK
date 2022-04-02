@extends('super_admin.layout')

@section('title', 'Edit Data Jumlah Kader POKJA III | Super Admin PKK Kab. Indramayu')

@section('bread', 'Edit Data Jumlah Kader POKJA III')
@section('container')

<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Data Jumlah Kader POKJA III</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ url ('/kader_super', $kader_super->id) }}" method="POST">
      @method('PUT')

        @csrf
        <div class="card-body">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Nama Desa</label>
                  <select class="form-control" id="id_desa" name="id_desa">
                      {{-- nama desa yang login --}}
                      @foreach ($desas as $d)
                      <option value="{{ $d->id }}" {{ $d->id === $kader_super->id_desa ? 'selected' : '' }}>
                          {{ $d->kode_desa }}-{{ $d->nama_desa }}
                      </option>
                  @endforeach
                  </select>
              </div>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label>Jumlah Kader Sandang</label>
            <input min="0" type="number" class="form-control" name="jml_kader_sandang" id="jml_kader_sandang" placeholder="Masukkan Jumlah Kader Sandang" required value="{{ucfirst(old('jml_kader_sandang', $kader_super->jml_kader_sandang))}}">
          </div>
          <div class="form-group">
            <label>Jumlah Kader Pangan</label>
            <input min="0" type="number" class="form-control" name="jml_kader_pangan" id="jml_kader_pangan" placeholder="Masukkan Jumlah Kader Pangan" required value="{{ucfirst(old('jml_kader_pangan', $kader_super->jml_kader_pangan))}}">
          </div>
          <div class="form-group">
            <label>Jumlah Kader Tata Laksana</label>
            <input min="0" type="number" class="form-control" name="jml_kader_tata_laksana" id="jml_kader_tata_laksana" placeholder="Masukkan Jumlah Kader Tata Laksana" required value="{{ucfirst(old('jml_kader_tata_laksana', $kader_super->jml_kader_tata_laksana))}}">
          </div>
          <div class="form-group">
            <label>Periode</label>
            <select style="cursor:pointer;" class="form-control" id="periode" name="periode">
                <option value="0" {{ $kader_super->periode ? 'selected' : '' }}>{{ $jml_kader->periode }}</option>
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
          <a href="/kader_super" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

