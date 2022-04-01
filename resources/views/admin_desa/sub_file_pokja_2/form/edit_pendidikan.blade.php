@extends('admin_desa.layout')

@section('title', 'Edit Data Jumlah Pendidikan | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Edit Data Jumlah Pendidikan')
@section('container')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tambah Data Jumlah Pendidikan</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ url('pendidikan', $pendidikan->id) }}" method="POST">
        @method('PUT')

        @csrf
        <div class="row">
            <div class="col-md-3">

                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Nama Desa</label>
                            {{-- <select class="form-control" id="id_desa" name="id_desa"> --}}
                                {{-- nama desa yang login --}}
                                @foreach ($desas as $c)
                                    {{-- <option value="{{$c->id }}">  {{$c->kode_desa }}-{{ $c->nama_desa }}</option> --}}
                                    <input type="hidden" class="form-control" name="id_desa" id="id_desa" placeholder="Masukkan Nama Desa" required value="{{$c->id}}">

                                    <input type="text" disabled class="form-control" name="id_desa" id="id_desa" placeholder="Masukkan Nama Desa" required value="{{$c->kode_desa }}-{{ $c->nama_desa }}">

                                @endforeach
                            {{-- </select> --}}
                        </div>
                    </div>
            </div>

            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah warga yang masih 3 buta</label>
                        <input min="0" type="number" class="form-control" name="jml_warga_buta" id="jml_warga_buta" placeholder="Masukkan Jumlah warga yang masih 3 buta" required  value="{{ucfirst(old('jml_warga_buta', $pendidikan->jml_warga_buta))}}">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Paket A Kelompok Belajar</label>
                        <input min="0" type="number" class="form-control" name="jml_pktA_kel_belajar" id="jml_pktA_kel_belajar" placeholder="Masukkan Jumlah Paket A Kelompok Belajar" required value="{{ucfirst(old('jml_pktA_kel_belajar', $pendidikan->jml_pktA_kel_belajar))}}">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                <div class="form-group">
                    <label>Jumlah Paket A Warga Belajar</label>
                    <input min="0" type="number" class="form-control" name="jml_pktA_warga_belajar" id="jml_pktA_warga_belajar" placeholder="Masukkan Jumlah Paket A Warga Belajar" required value="{{ucfirst(old('jml_pktA_warga_belajar', $pendidikan->jml_pktA_warga_belajar))}}">
                </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Paket B Kelompok Belajar</label>
                        <input min="0" type="number" class="form-control" name="jml_pktB_kel_belajar" id="jml_pktB_kel_belajar" placeholder="Masukkan Jumlah Paket B Kelompok Belajar" required value="{{ucfirst(old('jml_pktB_kel_belajar', $pendidikan->jml_pktB_kel_belajar))}}">
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-body">

                <div class="form-group">
                    <label>Jumlah Paket B Warga Belajar</label>
                    <input min="0" type="number" class="form-control" name="jml_pktB_warga_belajar" id="jml_pktB_warga_belajar" placeholder="Masukkan Jumlah Paket B Warga Belajar" required value="{{ucfirst(old('jml_pktB_warga_belajar', $pendidikan->jml_pktB_warga_belajar))}}">
                </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">

                <div class="form-group">
                    <label>Jumlah Paket C Kelompok Belajar</label>
                    <input min="0" type="number" class="form-control" name="jml_pktC_kel_belajar" id="jml_pktC_kel_belajar" placeholder="Masukkan Jumlah Paket C Kelompok Belajar" required value="{{ucfirst(old('jml_pktC_kel_belajar', $pendidikan->jml_pktC_kel_belajar))}}">
                </div>
                </div>
            </div>
                <div class="col-md-3">
                    <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Paket C Warga Belajar</label>
                        <input min="0" type="number" class="form-control" name="jml_pktC_warga_belajar" id="jml_pktC_warga_belajar" placeholder="Masukkan Jumlah Paket C Warga Belajar" required value="{{ucfirst(old('jml_pktC_warga_belajar', $pendidikan->jml_pktC_warga_belajar))}}">
                    </div>
                    </div>
                </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="card-body">
                <div class="form-group">
                    <label>Jumlah KF Kelompok Belajar</label>
                    <input min="0" type="number" class="form-control" name="jml_KF_kel_belajar" id="jml_KF_kel_belajar" placeholder="Masukkan Jumlah KF Kelompok Belajar" required value="{{ucfirst(old('jml_KF_kel_belajar', $pendidikan->jml_KF_kel_belajar))}}">
                </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                <div class="form-group">
                    <label>Jumlah KF Warga Belajar</label>
                    <input min="0" type="number" class="form-control" name="jml_KF_warga_belajar" id="jml_KF_warga_belajar" placeholder="Masukkan Jumlah KF Warga Belajar" required value="{{ucfirst(old('jml_KF_warga_belajar', $pendidikan->jml_KF_warga_belajar))}}">
                </div>
                </div>
            </div>

                <div class="col-md-3">
                <div class="card-body">

                    <div class="form-group">
                        <label>Jumlah PAUD</label>
                        <input min="0" type="number" class="form-control" name="jml_paud" id="jml_paud" placeholder="Masukkan Jumlah PAUD" required value="{{ucfirst(old('jml_paud', $pendidikan->jml_paud))}}">
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-body">

                <div class="form-group">
                    <label>Jumlah Taman Bacaan/Perpustakaan</label>
                    <input min="0" type="number" class="form-control" name="jml_taman_bacaan" id="jml_taman_bacaan" placeholder="Masukkan Jumlah Taman Bacaan/Perpustakaan" required value="{{ucfirst(old('jml_taman_bacaan', $pendidikan->jml_taman_bacaan))}}">
                </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="card-body">
                <div class="form-group">
                    <label>Jumlah BKB Kelompok Belajar</label>
                    <input min="0" type="number" class="form-control" name="jml_BKB_kel_belajar" id="jml_BKB_kel_belajar" placeholder="Masukkan Jumlah BKB Kelompok Belajar" required value="{{ucfirst(old('jml_BKB_kel_belajar', $pendidikan->jml_BKB_kel_belajar))}}">
                </div>
                </div>
            </div>
                <div class="col-md-3">
                    <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah BKB Ibu Peserta</label>
                        <input min="0" type="number" class="form-control" name="jml_BKB_ibu_peserta" id="jml_BKB_ibu_peserta" placeholder="Masukkan Jumlah BKB Kelompok Belajar" required value="{{ucfirst(old('jml_BKB_ibu_peserta', $pendidikan->jml_BKB_ibu_peserta))}}">
                    </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Jumlah BKB APE (SET)</label>
                            <input min="0" type="number" class="form-control" name="jml_BKB_ape" id="jml_BKB_ape" placeholder="Masukkan Jumlah BKB APE (SET)" required value="{{ucfirst(old('jml_BKB_ape', $pendidikan->jml_BKB_ape))}}">
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-body">

                    <div class="form-group">
                        <label>Jumlah BKB Kel. Simulasi</label>
                        <input min="0" type="number" class="form-control" name="jml_BKB_kel_simulasi" id="jml_BKB_kel_simulasi" placeholder="Masukkan Jumlah Gotong Arisan" required value="{{ucfirst(old('jml_BKB_kel_simulasi', $pendidikan->jml_BKB_kel_simulasi))}}">
                    </div>
                    </div>
                </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="card-body">

                <div class="form-group">
                    <label>Jumlah Kader Khusus KF</label>
                    <input min="0" type="number" class="form-control" name="jml_kader_khusus_KF" id="jml_kader_khusus_KF" placeholder="Masukkan Jumlah Kader Khusus KF" required value="{{ucfirst(old('jml_kader_khusus_KF', $pendidikan->jml_kader_khusus_KF))}}">
                </div>
                </div>
            </div>
                <div class="col-md-3">
                    <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Kader Khusus Paud Sejenis</label>
                        <input min="0" type="number" class="form-control" name="jml_kader_khusus_paud_sejenis" id="jml_kader_khusus_paud_sejenis" placeholder="Masukkan Jumlah Kader Khusus Paud Sejenis" required value="{{ucfirst(old('jml_kader_khusus_paud_sejenis', $pendidikan->jml_kader_khusus_paud_sejenis))}}">
                    </div>
                    </div>
                </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah Kader Khusus BKB</label>
                        <input min="0" type="number" class="form-control" name="jml_kader_khusus_BKB" id="jml_kader_khusus_BKB" placeholder="Masukkan Jumlah Kader Khusus BKB" required value="{{ucfirst(old('jml_warga_buta', $pendidikan->jml_kader_khusus_BKB))}}">
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-body">

                <div class="form-group">
                    <label>Jumlah Kader Khusus Koperasi</label>
                    <input min="0" type="number" class="form-control" name="jml_kader_khusus_koperasi" id="jml_kader_khusus_koperasi" placeholder="Masukkan Jumlah Kader Khusus Koperasi" required value="{{ucfirst(old('jml_kader_khusus_koperasi', $pendidikan->jml_kader_khusus_koperasi))}}">
                </div>
                </div>
            </div>


        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="card-body">

                    <div class="form-group">
                        <label>Jumlah Kader Khusus Keterampilan</label>
                        <input min="0" type="number" class="form-control" name="jml_kader_khusus_keterampilan" id="jml_kader_khusus_keterampilan" placeholder="Masukkan Jumlah Kader Khusus Keterampilan" required value="{{ucfirst(old('jml_kader_khusus_keterampilan', $pendidikan->jml_kader_khusus_keterampilan))}}">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">

                    <div class="form-group">
                        <label>Jumlah Kader Umum LP3 PKK</label>
                        <input min="0" type="number" class="form-control" name="jml_kader_umum_LP3" id="jml_kader_umum_LP3" placeholder="Masukkan Jumlah Kader Umum LP3 PKK" required value="{{ucfirst(old('jml_kader_umum_LP3', $pendidikan->jml_kader_umum_LP3))}}">
                    </div>
                </div>
            </div>


            <div class="col-md-3">
                <div class="card-body">

                <div class="form-group">
                    <label>Jumlah Kader Umum TPK 3 PKK</label>
                    <input min="0" type="number" class="form-control" name="jml_kader_umum_TPK" id="jml_kader_umum_TPK" placeholder="Masukkan Jumlah Kader Umum TPK" required value="{{ucfirst(old('jml_kader_umum_TPK', $pendidikan->jml_kader_umum_TPK))}}">
                </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">

                    <div class="form-group">
                        <label>Jumlah Kader Umum Damas PKK</label>
                        <input min="0" type="number" class="form-control" name="jml_kader_umum_damas" id="jml_kader_umum_damas" placeholder="Masukkan Jumlah Kader Umum Damas" required value="{{ucfirst(old('jml_kader_umum_damas', $pendidikan->jml_kader_umum_damas))}}">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">

                    <div class="form-group">
                        <label>Periode</label>
                        <input min="0" type="number" class="form-control" name="periode" id="periode" placeholder="Masukkan Periode" required value="{{ucfirst(old('periode', $pendidikan->periode))}}">
                    </div>
                </div>
            </div>
        </div>

        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/pendidikan" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

