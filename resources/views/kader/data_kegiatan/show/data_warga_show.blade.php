@extends('kader.layout')

@section('title', 'Detail Data Warga TP PKK | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Detail Data Warga TP PKK')
@section('container')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Main content -->
          <div class="invoice p-3 mb-3">
            {{-- @foreach ($data_warga as $c) --}}
              <!-- title row -->
              <div class="row">
                <div class="col-6">
                  Dasa Wisma : <strong> {{ucfirst($data_warga->dasa_wisma) }} </strong><br>
                  Nama Kepala Rumah Tangga : <strong>{{ucfirst($data_warga->nama_kepala_rumah_tangga) }}</strong><br>
                  No. Registrasi : <strong> {{ucfirst($data_warga->no_registrasi) }} </strong><br>
                  No. KTP/NIK : <strong>{{ucfirst($data_warga->no_ktp) }}</strong><br>
                  Nama : <strong> {{ucfirst($data_warga->nama) }} </strong><br>
                  Jabatan : <strong>{{ucfirst($data_warga->jabatan) }}</strong><br>
                  Jenis Kelamin : <strong> {{ucfirst($data_warga->jenis_kelamin) }} </strong><br>
                  Tempat Lahir : <strong> {{ucfirst($data_warga->tempat_lahir) }} </strong><br>
                  Tanggal Lahir : <strong>{{ \Carbon\Carbon::parse($data_warga->tgl_lahir)->isoFormat('D MMMM Y') }}/{{ucfirst($data_warga->umur) }} Tahun</strong><br>
                  Status Perkawinan : <strong> {{ucfirst($data_warga->status_perkawinan) }}</strong><br>
                  Status dalam Keluarga : <strong> {{ucfirst($data_warga->status_keluarga) }} ({{ ucfirst($data_warga->status) }})</strong><br>
                  Agama : <strong> {{ucfirst($data_warga->agama) }} </strong><br>
                  Alamat : <strong> {{ucfirst($data_warga->alamat) }},RT {{ ($data_warga->rt) }}, RW {{ ($data_warga->rt) }},Desa {{ucfirst($data_warga->desa->nama_desa)}}, Kec. {{ucfirst($data_warga->kecamatan->nama_kecamatan)}}
                    Kabupaten {{ucfirst($data_warga->kota) }}, Provinsi {{ucfirst($data_warga->provinsi) }}
                </strong><br>
                  Pendidikan : <strong> {{ucfirst($data_warga->pendidikan) }} </strong><br>
                  Pekerjaan : <strong> {{ucfirst($data_warga->pekerjaan) }} </strong><br>
                  Akseptor KB : <strong> {{ucfirst($data_warga->akseptor_kb) }} </strong><br>
                  Aktif dalam Kegiatan Posyandu : <strong> {{ucfirst($data_warga->aktif_posyandu) }} </strong><br>
                  Mengikuti Program Bina Keluarga Balita : <strong> {{ucfirst($data_warga->ikut_bkb) }} </strong><br>
                  Memiliki Tabungan : <strong> {{ucfirst($data_warga->memiliki_tabungan) }} </strong><br>
                  Mengikuti Kelompok Belajar Jenis : <strong> {{ucfirst($data_warga->ikut_kelompok_belajar) }} </strong><br>
                  Mengikuti PAUD/Sejenis : <strong> {{ucfirst($data_warga->ikut_paud_sejenis) }} </strong><br>
                  Ikut dalam Kegiatan Koperasi : <strong> {{ucfirst($data_warga->ikut_koperasi) }} </strong><br>

                </div>

                <!-- /.col -->
              </div>

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="/data_warga" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-angle-left"></i> Kembali
                  </a>
                </div>
              </div>
            {{-- @endforeach --}}
          </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

@endsection
