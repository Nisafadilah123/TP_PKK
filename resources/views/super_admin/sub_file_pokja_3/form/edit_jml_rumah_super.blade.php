@extends('super_admin.layout')

@section('title', 'Edit Data Jumlah Penghayatan dan Pengamalan Pancasila | Super Admin PKK Kab. Indramayu')

@section('bread', 'Edit Data Jumlah Penghayatan dan Pengamalan Pancasila')
@section('container')

<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Data Jumlah Penghayatan dan Pengamalan Pancasila</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ url ('/rumah_super', $rumah_super->id) }}" method="POST">
        {{-- @dump($data_desa) --}}
          @method('PUT')
          @csrf
        <div class="card-body">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Nama Desa</label>
                  <select class="form-control" id="id_desa" name="id_desa">
                      {{-- nama desa yang login --}}
                      @foreach ($desas as $d)
                      <option value="{{ $d->id }}" {{ $d->id === $rumah_super->id_desa ? 'selected' : '' }}>
                          {{ $d->kode_desa }}-{{ $d->nama_desa }}
                      </option>
                  @endforeach
                </select>
              </div>

          <div class="form-group">
            <label>Jumlah Rumah Sehat</label>
            <input min="0" type="number" class="form-control" name="jml_rumah_sehat" id="jml_rumah_sehat" placeholder="Masukkan Jumlah rumah PKBN" required value="{{ucfirst(old('jml_rumah_sehat', $rumah_super->jml_rumah_sehat))}}">
          </div>
          <div class="form-group">
            <label>Jumlah Rumah Kurang Sehat</label>
            <input min="0" type="number" class="form-control" name="jml_rumah_kurang_sehat" id="jml_rumah_kurang_sehat" placeholder="Masukkan Jumlah rumah PKDRT" required value="{{ucfirst(old('jml_rumah_kurang_sehat', $rumah_super->jml_rumah_kurang_sehat))}}">
          </div>
          <div class="form-group">
            <label>Periode</label>
            <select style="cursor:pointer;" class="form-control" id="periode" name="periode">
                <option value="0" {{ $rumah_super->periode ? 'selected' : '' }}>{{ $rumah_super->periode }}</option>
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
          <a href="/rumah" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

