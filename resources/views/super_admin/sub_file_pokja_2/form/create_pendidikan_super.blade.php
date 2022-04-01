@extends('super_admin.layout')

@section('title', 'Tambah Data Jumlah Pendidikan | Super Admin PKK Kab. Indramayu')

@section('bread', 'Tambah Data Jumlah Pendidikan')
@section('container')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tambah Data Jumlah Pendidikan</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ route('pendidikan_super.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-3">
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

            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah warga yang masih 3 buta</label>
                        <input min="0" type="number" class="form-control" name="jml_warga_buta" id="jml_warga_buta" placeholder="Masukkan Jumlah warga yang masih 3 buta" required>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Paket A Kelompok Belajar</label>
                        <input min="0" type="number" class="form-control" name="jml_pktA_kel_belajar" id="jml_pktA_kel_belajar" placeholder="Masukkan Jumlah Paket A Kelompok Belajar" required>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                <div class="form-group">
                    <label>Jumlah Paket A Warga Belajar</label>
                    <input min="0" type="number" class="form-control" name="jml_pktA_warga_belajar" id="jml_pktA_warga_belajar" placeholder="Masukkan Jumlah Paket A Warga Belajar" required>
                </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Paket B Kelompok Belajar</label>
                        <input min="0" type="number" class="form-control" name="jml_pktB_kel_belajar" id="jml_pktB_kel_belajar" placeholder="Masukkan Jumlah Paket B Kelompok Belajar" required>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Paket B Warga Belajar</label>
                        <input min="0" type="number" class="form-control" name="jml_pktB_warga_belajar" id="jml_pktB_warga_belajar" placeholder="Masukkan Jumlah Paket B Warga Belajar" required>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Paket C Kelompok Belajar</label>
                        <input min="0" type="number" class="form-control" name="jml_pktC_kel_belajar" id="jml_pktC_kel_belajar" placeholder="Masukkan Jumlah Paket C Kelompok Belajar" required>
                    </div>
                </div>
            </div>
                <div class="col-md-3">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Jumlah Paket C Warga Belajar</label>
                            <input min="0" type="number" class="form-control" name="jml_pktC_warga_belajar" id="jml_pktC_warga_belajar" placeholder="Masukkan Jumlah Paket C Warga Belajar" required>
                        </div>
                    </div>
                </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah KF Kelompok Belajar</label>
                        <input min="0" type="number" class="form-control" name="jml_KF_kel_belajar" id="jml_KF_kel_belajar" placeholder="Masukkan Jumlah KF Kelompok Belajar" required>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah KF Warga Belajar</label>
                        <input min="0" type="number" class="form-control" name="jml_KF_warga_belajar" id="jml_KF_warga_belajar" placeholder="Masukkan Jumlah KF Warga Belajar" required>
                    </div>
                </div>
            </div>

                <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah PAUD</label>
                        <input min="0" type="number" class="form-control" name="jml_paud" id="jml_paud" placeholder="Masukkan Jumlah PAUD" required>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Taman Bacaan/Perpustakaan</label>
                        <input min="0" type="number" class="form-control" name="jml_taman_bacaan" id="jml_taman_bacaan" placeholder="Masukkan Jumlah Taman Bacaan/Perpustakaan" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah BKB Kelompok Belajar</label>
                        <input min="0" type="number" class="form-control" name="jml_BKB_kel_belajar" id="jml_BKB_kel_belajar" placeholder="Masukkan Jumlah BKB Kelompok Belajar" required>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah BKB Ibu Peserta</label>
                        <input min="0" type="number" class="form-control" name="jml_BKB_ibu_peserta" id="jml_BKB_ibu_peserta" placeholder="Masukkan Jumlah BKB Kelompok Belajar" required>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                            <label>Jumlah BKB APE (SET)</label>
                            <input min="0" type="number" class="form-control" name="jml_BKB_ape" id="jml_BKB_ape" placeholder="Masukkan Jumlah BKB APE (SET)" required>
                        </div>
                    </div>
                </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah BKB Kel. Simulasi</label>
                        <input min="0" type="number" class="form-control" name="jml_BKB_kel_simulasi" id="jml_BKB_kel_simulasi" placeholder="Masukkan Jumlah Gotong Arisan" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Kader Khusus KF</label>
                        <input min="0" type="number" class="form-control" name="jml_kader_khusus_KF" id="jml_kader_khusus_KF" placeholder="Masukkan Jumlah Kader Khusus KF" required>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Kader Khusus Paud Sejenis</label>
                        <input min="0" type="number" class="form-control" name="jml_kader_khusus_paud_sejenis" id="jml_kader_khusus_paud_sejenis" placeholder="Masukkan Jumlah Kader Khusus Paud Sejenis" required>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Kader Khusus BKB</label>
                        <input min="0" type="number" class="form-control" name="jml_kader_khusus_BKB" id="jml_kader_khusus_BKB" placeholder="Masukkan Jumlah Kader Khusus BKB" required>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Kader Khusus Koperasi</label>
                        <input min="0" type="number" class="form-control" name="jml_kader_khusus_koperasi" id="jml_kader_khusus_koperasi" placeholder="Masukkan Jumlah Kader Khusus Koperasi" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Kader Khusus Keterampilan</label>
                        <input min="0" type="number" class="form-control" name="jml_kader_khusus_keterampilan" id="jml_kader_khusus_keterampilan" placeholder="Masukkan Jumlah Kader Khusus Keterampilan" required>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Kader Umum LP3 PKK</label>
                        <input min="0" type="number" class="form-control" name="jml_kader_umum_LP3" id="jml_kader_umum_LP3" placeholder="Masukkan Jumlah Kader Umum LP3 PKK" required>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Kader Umum TPK 3 PKK</label>
                        <input min="0" type="number" class="form-control" name="jml_kader_umum_TPK" id="jml_kader_umum_TPK" placeholder="Masukkan Jumlah Kader Umum TPK" required>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Kader Umum Damas PKK</label>
                        <input min="0" type="number" class="form-control" name="jml_kader_umum_damas" id="jml_kader_umum_damas" placeholder="Masukkan Jumlah Kader Umum Damas PKK" required>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
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

        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/pendidikan_super" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

