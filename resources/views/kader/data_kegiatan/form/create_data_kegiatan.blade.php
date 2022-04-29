@extends('kader.layout')

@section('title', 'Tambah Data Kegiatan Warga TP PKK | Kader Desa PKK Kab. Indramayu')

@section('bread', 'Tambah Data Kegiatan Warga TP PKK')
@section('container')

<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tambah Data Kegiatan Warga TP PKK</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ route('data_kegiatan.store') }}" method="POST">
        @csrf

        <div class="card-body">
            <h6 style="color: red">* Semua elemen atribut harus diisi</h6>
            <h6 style="color: red">* Keterangan Kegiatan Yang diikuti seperti : Keagamaan, PKBN, Pola Asuh Pencegahan KDRT, Pencegahan Traffocking, Narkoba, Pencegahan
                Kejahatan Seksual, Kerja Bakti, Jimpitan, Arisan, Rukun Kematian, Bakti Sosial, BKB, PAUD Sejenis, Paket A, Paket B, Paket C, KF (Keaksaraan Fungsional),
                UP2K, Koperasi</h6>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            {{-- {{  dump($errors)  }} --}}
                        </ul>
                    </div>
                @endif

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group @error('id_desa') is-invalid @enderror">
                        {{-- nama desa --}}
                        <label for="exampleFormControlSelect1">Desa</label>
                        @foreach ($desas as $c)
                        <input type="hidden" class="form-control" name="id_desa" id="id_desa" placeholder="Masukkan Nama Desa" required value="{{$c->id}}">

                        <input type="text" disabled class="form-control" name="id_desa" id="id_desa" placeholder="Masukkan Nama Desa" required value="{{ $c->nama_desa }}">

                        @endforeach
                    </div>
                    @error('id_desa')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group @error('id_kecamatan') is-invalid @enderror">
                        {{-- nama kecamatan --}}
                        <label for="exampleFormControlSelect1">Kecamatan</label>
                        @foreach ($kec as $c)
                        <input type="hidden" class="form-control" name="id_kecamatan" id="id_kecamatan" placeholder="Masukkan Nama Desa" required value="{{$c->id}}">
                        <input type="text" disabled class="form-control" name="id_kecamatan" id="id_kecamatan" placeholder="Masukkan Nama Desa" required value="{{ $c->nama_kecamatan }}">

                        @endforeach
                    </div>
                    @error('id_kecamatan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Nama Warga</label>
                        <select class="form-control @error('id_warga') is-invalid @enderror" id="id_warga" name="id_warga">
                          {{-- nama warga --}}
                          @foreach ($warga as $c)
                              <option value="{{$c->id}}">  {{$c->id }}-{{ $c->nama }}</option>
                          @endforeach
                          </select>
                          @error('id_warga')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Kegiatan</label>
                        <select class="form-control @error('id_kegiatan') is-invalid @enderror" id="id_kegiatan" name="id_kegiatan">
                            {{-- Pilih Kegiatan --}}
                            <option hidden> Pilih Kegiatan</option>
                            @foreach ($keg as $c)
                                <option value="{{$c->id}}">  {{$c->id }}-{{ $c->nama_kegiatan }}</option>
                            @endforeach
                        </select>
                        @error('id_kegiatan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Aktivitas</label><br>
                        {{-- Pilih aktivitas --}}
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" name="aktivitas" value="Ya" class="form-check-input">Ya
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" name="aktivitas" value="Tidak" class="form-check-input">Tidak
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{-- nama keterangan --}}
                        <label>Keterangan (Jenis Kegiatan Yang Diikuti)</label>
                        <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan" placeholder="Masukkan Keterangan">
                        @error('keterangan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Periode</label>
                        {{-- Pilih periode --}}
                        <select style="cursor:pointer;" class="form-control @error('periode') is-invalid @enderror" id="periode" name="periode" required>
                          <option hidden> Pilih Tahun</option>
                            <?php
                              $year = date('Y');
                              $min = $year ;
                              $max = $year + 20;
                              for( $i=$min; $i<=$max; $i++ ) {
                                echo '<option value='.$i.'>'.$i.'</option>';
                              }?>
                        </select>
                        @error('periode')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/data_kegiatan" class="btn btn-outline-primary">
                    <span>Batalkan</span>
                </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
</div>
@endsection

@push('script-addon')

<script>
    $(document).ready(function() {
    $('#id_kecamatan').on('change', function() {
       var categoryID = $(this).val();
       console.log('cek data kecamatan');
       if(categoryID) {
        console.log('cek get data desa');

           $.ajax({
               url: '/getDesa/'+categoryID,
               type: "GET",
               data : {"_token":"{{ csrf_token() }}"},
               dataType: "json",
               success:function(data)
               {
                console.log('sukses cek data desa');

                 if(data){
                    $('#id_desa').empty();
                    $('#id_desa').append('<option hidden>Pilih Desa</option>');
                    $.each(data, function(key, desas){
                        $('select[name="id_desa"]').append('<option value="'+ key +'">' + desas.nama_desa+ '</option>');
                    });
                }else{
                    $('#id_desa').empty();
                }
             }
           });
       }else{
         $('#id_desa').empty();
       }
    });
    });
</script>

@endpush
