@extends('super_admin.layout')

@section('title', 'Tambah Data Jumlah Kesehatan POKJA IV | Super Admin PKK Kab. Indramayu')

@section('bread', 'Tambah Data Jumlah Kesehatan POKJA IV')
@section('container')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tambah Data Jumlah Kesehatan POKJA IV</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ route('kesehatan_super.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-sm-4">
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
            </div>

            <div class="col-sm-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Posyandu</label>
                        <input min="0" type="number" class="form-control" name="jml_posyandu" id="jml_posyandu" placeholder="Masukkan Jumlah Posyandu" required>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Posyandu Terintegrasi</label>
                        <input min="0" type="number" class="form-control" name="jml_posyandu_terintegrasi" id="jml_posyandu_terintegrasi" placeholder="Masukkan Jumlah Posyandu Terintegrasi" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label>Jumlah Posyandu Lansia KLP</label>
                            <input min="0" type="number" class="form-control" name="jml_posyandu_lansia_klp" id="jml_posyandu_lansia_klp" placeholder="Masukkan Jumlah Posyandu Lansia KLP" required>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Posyandu Lansia Anggota</label>
                        <input min="0" type="number" class="form-control" name="jml_posyandu_lansia_anggota" id="jml_posyandu_lansia_anggota" placeholder="Masukkan Jumlah Posyandu Lansia Anggota" required>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Posyandu Lansia Memiliki Kartu Berobat Gratis</label>
                        <input min="0" type="number" class="form-control" name="jml_posyandu_lansia_memiliki_kartu" id="jml_posyandu_lansia_memiliki_kartu" placeholder="Masukkan Jumlah Posyandu Lansia Memiliki Kartu Berobat Gratis" required>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card-body">
                    <div class="form-group">
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
                </div>
            </div>
        </div>

        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/kesehatan_super" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

