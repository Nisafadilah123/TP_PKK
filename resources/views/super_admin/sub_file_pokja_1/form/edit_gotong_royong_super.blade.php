@extends('super_admin.layout')

@section('title', 'Edit Data Jumlah Gotong Royong | Super Admin PKK Kab. Indramayu')

@section('bread', 'Edit Data Jumlah Gotong Royong')
@section('container')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Data Jumlah Gotong Royong</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ url ('/gotong_royong_super', $gotong_royong_super->id) }}" method="POST">
      @method('PUT')

        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Nama Desa</label>
                            <select class="form-control" id="id_desa" name="id_desa">
                                {{-- nama desa yang login --}}
                                @foreach ($desas as $d)
                                <option value="{{ $d->id }}" {{ $d->id === $gotong_royong_super->id_desa ? 'selected' : '' }}>
                                    {{ $d->kode_desa }}-{{ $d->nama_desa }}
                                </option>
                            @endforeach
                            </select>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Gotong Kerja Bakti</label>
                        <input min="0" type="number" class="form-control" name="jml_gotong_kerja_bakti" id="jml_gotong_kerja_bakti" placeholder="Masukkan Jumlah Gotong Kerja Bakti" required value="{{ucfirst(old('jml_gotong_kerja_bakti', $gotong_royong_super->jml_gotong_kerja_bakti))}}">
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Gotong Rukun Kebaktian</label>
                        <input min="0" type="number" class="form-control" name="jml_gotong_rukun_kebaktian" id="jml_gotong_rukun_kebaktian" placeholder="Masukkan Jumlah Gotong Rukun Kebaktian" required value="{{ucfirst(old('jml_gotong_rukun_kebaktian', $gotong_royong_super->jml_gotong_rukun_kebaktian))}}">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Gotong Keagamaan</label>
                        <input min="0" type="number" class="form-control" name="jml_gotong_keagamaan" id="jml_gotong_keagamaan" placeholder="Masukkan Jumlah Gotong Keagamaan" required value="{{ucfirst(old('jml_gotong_keagamaan', $gotong_royong_super->jml_gotong_keagamaan))}}">
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Gotong Jimpitan</label>
                        <input min="0" type="number" class="form-control" name="jml_gotong_jimpitan" id="jml_gotong_jimpitan" placeholder="Masukkan Jumlah Gotong Jimpitan" required value="{{ucfirst(old('jml_gotong_jimpitan', $gotong_royong_super->jml_gotong_jimpitan))}}">
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Gotong Arisan</label>
                        <input min="0" type="number" class="form-control" name="jml_gotong_arisan" id="jml_gotong_arisan" placeholder="Masukkan Jumlah Gotong Arisan" required value="{{ucfirst(old('jml_gotong_arisan', $gotong_royong_super->jml_gotong_arisan))}}">
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Periode</label>
                        <select style="cursor:pointer;" class="form-control" id="periode" name="periode">
                            <option value="0" {{ $gotong_royong_super->periode ? 'selected' : '' }}>{{ $gotong_royong_super->periode }}</option>
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
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/gotong_royong_super" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

