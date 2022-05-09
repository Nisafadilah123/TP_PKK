@extends('kader.layout')

@section('title', 'Data Keluarga TP PKK | Kader Desa/Kelurahan PKK Kab. Indramayu')

@section('bread', 'Data Keluarga TP PKK')
@section('container')

    <!-- Main content -->
<div class="main-content">
    <section class="section">

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered data" id="add-row">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <a href="{{ url('data_keluarga/create') }}" type="button" class="btn btn-success">Tambah</a><br><br>
                                        </div>

                                    </div>

                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kepala Keluarga</th>
                                            <th>Jumlah Anggota Keluarga</th>
                                            <th>Jumlah Anggota Keluarga Laki-laki</th>
                                            <th>Jumlah Anggota Keluarga Perempuan</th>
                                            <th>Jumlah Kepala Keluarga (KK)</th>
                                            <th>Periode</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no=1;?>

                                        @foreach ($keluarga as $c)
                                    <tr>
                                        <td style="vertical-align: middle;">{{ $no }}</td>
                                        {{-- nama desa yang login --}}
                                        <td style="vertical-align: middle;">{{ucfirst($c->warga->nama_kepala_rumah_tangga) }}</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->jumlah_anggota_keluarga)}} Orang</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->laki_laki)}} Orang</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->perempuan)}} Orang</td>
                                        <td style="vertical-align: middle;">{{ucfirst($c->jumlah_KK)}} KK</td>

                                        <td style="vertical-align: middle;">{{ucfirst($c->periode)}}</td>
                                        <td class="text-center">
                                            <form action="{{ route('data_keluarga.destroy',$c->id) }}" method="POST">

                                            {{-- <a class="btn btn-info btn-sm" href="{{ url('data_keluarga.show',$c->id) }}">Show</a> --}}
                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#details-modal-{{ $c->id }}">
                                                Detail
                                              </button>

                                                <a class="btn btn-primary btn-sm" href="{{ url('data_keluarga/'.$c->id.'/edit') }}">Edit</a>

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger btn-sm delete">Delete</button>
                                            </form>
                                        </td>

                                    </tr>

                                    <?php $no++ ;?>
                                    @endforeach

                                    </tbody>
                                </table>

                                @foreach ($keluarga as $c)
                                <div id="details-modal-{{ $c->id }}" class="modal fade" tabindex="1" role="dialog" aria-labelledby="details-modal-{{ $c->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Details</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                                    <div class="modal-body">
                                                    <h5>
                                                        Dasa Wisma : <strong> {{ucfirst($c->warga->dasa_wisma) }} </strong><br>
                                                        RT <strong>{{ ($c->warga->rt) }}</strong>, RW <strong>{{ ($c->warga->rt) }}</strong> <br>
                                                        Dusun/Lingkungan : <br>
                                                        Desa/Kel : <strong>{{ucfirst($c->desa->nama_desa)}}</strong><br>
                                                        Kec. <strong>{{ucfirst($c->kecamatan->nama_kecamatan)}}</strong>,
                                                            Kabupaten <strong>{{ucfirst($c->kota) }}</strong>, Provinsi <strong>{{ucfirst($c->provinsi) }}</strong><br>
                                                        Nama Kepala Rumah Tangga : <strong>{{ucfirst($c->warga->nama_kepala_rumah_tangga) }}</strong><br>
                                                        Jumlah Anggota Keluarga : <strong> {{ucfirst($c->jumlah_anggota_keluarga) }} </strong>Orang<br>
                                                        Jumlah Anggota Keluarga Laki-laki : <strong> {{ucfirst($c->laki_laki) }} </strong>Orang<br>
                                                        Jumlah Anggota Keluarga Perempuan: <strong> {{ucfirst($c->perempuan) }} </strong>Orang<br>
                                                        Jumlah Kepala Keluarga: <strong> {{ucfirst($c->jumlah_KK) }} </strong>KK<br>
                                                        Jumlah Balita :  @if ($warga = $c->jumlah_balita)
                                                                        {{ $warga }} Anak
                                                                        @else
                                                                            - Orang
                                                                        @endif <br>
                                                        Jumlah PUS (Pasangan Usia Subur) :  @if ($warga = $c->jumlah_PUS)
                                                                        {{ $warga }} Orang
                                                                        @else
                                                                            - Orang
                                                                        @endif <br>
                                                        Jumlah WUS (Wanita Usia Subur) :  @if ($warga = $c->jumlah_WUS)
                                                                        {{ $warga }} Orang
                                                                        @else
                                                                            - Orang
                                                                        @endif <br>
                                                        Jumlah 3 Buta (Buta Warna, Buta Baca, Buta Hitung):  @if ($warga = $c->jumlah_3_buta)
                                                                        {{ $warga }} Orang
                                                                        @else
                                                                            - Orang
                                                                        @endif <br>
                                                        Jumlah Ibu Hamil :  @if ($warga = $c->jumlah_ibu_hamil)
                                                                        {{ $warga }} Orang
                                                                        @else
                                                                            - Orang
                                                                        @endif <br>
                                                        Jumlah Ibu Menyusui :  @if ($warga = $c->jumlah_ibu_menyusui)
                                                                        {{ $warga }} Orang
                                                                        @else
                                                                            - Orang
                                                                        @endif <br>
                                                        Jumlah  Lansia :  @if ($warga = $c->jumlah_lansia)
                                                                        {{ $warga }} Orang
                                                                        @else
                                                                            - Orang
                                                                        @endif <br>
                                                        Jumlah Kebutuhan Khusus : @if ($warga = $c->jumlah_kebutuhan)
                                                                                    {{ $warga }} Orang
                                                                                    @else
                                                                                    - Orang
                                                                                    @endif <br>
                                                        Makanan Pokok Sehari-hari: <strong> {{ucfirst($c->makanan_pokok) }} </strong><br>
                                                        Mempunyai Jamban Keluarga  : <strong>{{ ucfirst($c->punya_jamban) }}/ {{ $c->jumlah_jamban }}</strong> Buah<br>
                                                        Sumber Air Keluarga : <strong> {{ucfirst($c->sumber_air) }}</strong><br>
                                                        Memiliki Tempat Pembuangan Sampah : <strong> {{ucfirst($c->punya_tempat_sampah) }}</strong><br>
                                                        Mempunyai Saluran Pembuangan Air Limbah : <strong> {{ucfirst($c->punya_saluran_air) }} </strong><br>
                                                        Menempel Stiker P4K : <strong> {{ucfirst($c->tempel_stiker) }} </strong><br>
                                                        Kriteria Rumah : <strong> {{ucfirst($c->kriteria_rumah) }} </strong><br>
                                                        Aktivitas UP2K : <strong> {{ucfirst($c->aktivitas_UP2K) }} </strong><br>
                                                        Aktivitas Kegiatan Usaha Kesehatan Lingkungan  : <strong> {{ucfirst($c->aktivitas_kegiatan_usaha) }} </strong><br>
                                                        </h5>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Oke</button>
                                                        {{-- <button type="button" class="btn btn-primary">Oke</button> --}}
                                                    </div>

                                        </div>
                                    </div>
                                </div>
                                @endforeach


                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
    <!-- /.content -->


<!-- page script -->
  @endsection

  @push('script-addon')

<script>
$(document).ready( function () {
    $('.data').DataTable();
} );
</script>
<script>
    $('.delete').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
            title: `Apakah anda yakin ingin menghapus data ini ?`,
              text: "Jika anda menghapusnya maka datanya akan di hapus secara permanen",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
</script>

@endpush
