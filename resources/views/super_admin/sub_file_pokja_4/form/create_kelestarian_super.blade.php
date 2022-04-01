@extends('super_admin.layout')

@section('title', 'Tambah Data Kelestarian Lingkungan Hidup POKJA IV | Super Admin PKK Kab. Indramayu')

@section('bread', 'Tambah Data Kelestarian Lingkungan Hidup POKJA IV')
@section('container')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tambah Data Kelestarian Lingkungan Hidup POKJA IV</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ route('kelestarian_super.store') }}" method="POST">
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
                        <label>Jumlah Rumah Yang Memiliki Jamban</label>
                        <input min="0" type="number" class="form-control" name="jml_rumah_jamban" id="jml_rumah_jamban" placeholder="Masukkan Jumlah Rumah Yang Memiliki Jamban" required>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Rumah Yang Memiliki SPAL</label>
                        <input min="0" type="number" class="form-control" name="jml_rumah_spal" id="jml_rumah_spal" placeholder="Masukkan Jumlah Rumah Yang Memiliki SPAL" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                        <label>Jumlah Rumah Yang Memiliki Tempat Pembuangan Sampah</label>
                            <input min="0" type="number" class="form-control" name="jml_rumah_tempat_sampah" id="jml_rumah_tempat_sampah" placeholder="Masukkan Jumlah Rumah Yang Memiliki Tempat Pembuangan Sampah" required>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Rumah Yang Memiliki MCK</label>
                        <input min="0" type="number" class="form-control" name="jml_mck" id="jml_mck" placeholder="Masukkan Jumlah Rumah Yang Memiliki MCK" required>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah KRT Yang Menggunakan Air PDAM</label>
                        <input min="0" type="number" class="form-control" name="jml_krt_pdam" id="jml_krt_pdam" placeholder="Masukkan Jumlah KRT Yang Menggunakan Air PDAM" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label>Jumlah KRT Yang Menggunakan Air Sumur</label>
                            <input min="0" type="number" class="form-control" name="jml_krt_sumur" id="jml_krt_sumur" placeholder="Masukkan Jumlah Jumlah KRT Yang Menggunakan Air Sumur" required>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label>Jumlah KRT Yang Menggunakan Air Lain-lain</label>
                            <input min="0" type="number" class="form-control" name="jml_krt_lain" id="jml_krt_lain" placeholder="Masukkan Jumlah Jumlah KRT Yang Menggunakan Air Lain-lain" required>
                        </div>

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
          <a href="/kelestarian_super" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

