@extends('kader.layout')

@section('title', 'Edit Data Pelatihan Kader TP PKK | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Edit Data Pelatihan Kader TP PKK')
@section('container')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Data Pelatihan Kader TP PKK</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ url('data_pelatihan', $data_pelatihan->id) }}" method="POST">
        @method('PUT')

        @csrf
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        {{  ($errors)  }}
                    </ul>
                </div>
            @endif

            <div class="row">
                <div class="col-md-2">
                    <div class="form-group @error('id_desa') is-invalid @enderror">
                        <label for="exampleFormControlSelect1">Desa</label>
                        {{-- nama desa --}}
                        @foreach ($desas as $c)
                        <input type="hidden" class="form-control" name="id_desa" id="id_desa" placeholder="Masukkan Nama Desa" value="{{$c->id}}">

                        <input type="text" readonly class="form-control" placeholder="Masukkan Nama Desa" value="{{$c->nama_desa}}">

                        @endforeach
                    </div>
                    @error('id_desa')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-2">
                    <div class="form-group @error('id_kecamatan') is-invalid @enderror">
                        <label for="exampleFormControlSelect1">Kecamatan</label>
                        {{-- nama kecamatan --}}
                        @foreach ($kec as $c)
                        <input type="hidden" class="form-control" name="id_kecamatan" id="id_kecamatan" placeholder="Masukkan Nama Desa" value="{{$c->id}}">
                        <input type="text" readonly class="form-control" placeholder="Masukkan Nama Desa" value="{{ $c->nama_kecamatan }}">

                        @endforeach
                    </div>
                    @error('id_kecamatan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        {{-- nama kabupaten --}}
                        <label for="exampleFormControlSelect1">Kabupaten</label>
                            <input type="text" readonly class="form-control" name="kota" id="kota" placeholder="Masukkan Kota" required value="Indramayu">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        {{-- nama provinsi --}}
                        <label for="exampleFormControlSelect1">Provinsi</label>
                            <input type="text" readonly class="form-control" name="provinsi" id="provinsi" placeholder="Masukkan Provisni" required value="Jawa Barat">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        {{-- no.registrasi --}}
                        <label>No. Registrasi</label>
                        <input type="text" class="form-control @error('no_registrasi') is-invalid @enderror" name="no_registrasi" id="no_registrasi" placeholder="Masukkan No. Registrasi" value="{{ ucfirst(old('no_registrasi', $data_pelatihan->no_registrasi)) }}">
                        @error('no_registrasi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>Nama</label>
                        {{-- nama warga --}}
                        @foreach ($kader as $c)
                            <input type="hidden" class="form-control" name="id_user" id="id_user" placeholder="Masukkan Nama Desa" required value="{{$c->id}}">
                            <input type="text" readonly class="form-control" placeholder="Masukkan Nama Desa" required value="{{ $c->name }}">
                        @endforeach
                        @error('id_user')
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
                        <label>Tanggal Masuk</label>
                        <input type="date" class="form-control @error('tgl_masuk') is-invalid @enderror" name="tgl_masuk" id="tgl_masuk" placeholder="Di isi tanggal lahir" data-date-format="dd/mm/yyyy" value="{{ ucfirst(old('tgl_masuk', $data_pelatihan->tgl_masuk)) }}">
                        @error('tgl_masuk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        {{-- beri Kedudukan --}}
                        <label>Kedudukan</label>
                        <input type="text" class="form-control @error('kedudukan') is-invalid @enderror" name="kedudukan" id="kedudukan" placeholder="Masukkan Kedudukan" value="{{ ucfirst(old('kedudukan', $data_pelatihan->kedudukan)) }}">
                        @error('kedudukan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Pelatihan Yang Diikuti</label>
                        {{-- nama Pelatihan Yang Diikuti --}}
                        <input type="text" class="form-control @error('pelatihan_yang_diikuti') is-invalid @enderror" name="pelatihan_yang_diikuti" id="pelatihan_yang_diikuti" placeholder="Masukkan Pelatihan Yang Diikuti" value="{{ ucfirst(old('pelatihan_yang_diikuti', $data_pelatihan->pelatihan_yang_diikuti)) }}">
                        @error('pelatihan_yang_diikuti')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Nama Pelatihan</label>
                        {{-- nama Pelatihan --}}
                        <input type="text" class="form-control @error('nama_pelatihan') is-invalid @enderror" name="nama_pelatihan" id="nama_pelatihan" placeholder="Masukkan Nama Pelatihan" value="{{ ucfirst(old('nama_pelatihan', $data_pelatihan->nama_pelatihan)) }}">
                        @error('nama_pelatihan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Kriteria Kader</label>
                        {{-- kriteria kader --}}
                        <div class="form-group @error('kriteria_kader') is-invalid @enderror">
                            <textarea class="form-control" name="kriteria_kader" id="kriteria_kader" placeholder="Masukkan Kriteria Kader" rows="3" cols="70">{{ $data_pelatihan->kriteria_kader }}</textarea>
                          </div>

                        @error('kriteria_kader')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group @error('tahun') is-invalid @enderror">
                        {{-- Pilih tahun --}}
                        <label>Tahun</label>
                        <select style="cursor:pointer;" class="form-control" id="tahun" name="tahun">
                            <option value="{{ $data_pelatihan->tahun }}" {{ $data_pelatihan->tahun ? 'selected' : '' }}>{{ $data_pelatihan->tahun }}</option>
                            <?php
                              $year = date('Y');
                              $min = $year ;
                              $max = $year + 20;
                              for( $i=$min; $i<=$max; $i++ ) {
                                echo '<option value='.$i.'>'.$i.'</option>';
                              }?>
                        </select>
                      </div>
                      @error('tahun')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Penyelenggara</label>
                        {{-- nama Penyelenggara --}}
                        <input type="text" class="form-control @error('penyelenggara') is-invalid @enderror" name="penyelenggara" id="penyelenggara" placeholder="Masukkan Nama Penyelenggara" value="{{ ucfirst(old('penyelenggara', $data_pelatihan->penyelenggara)) }}">
                        @error('penyelenggara')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        {{-- beri keterangan --}}
                        <label>Keterangan</label><br>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" name="keterangan" value="Bersertifikat" class="form-check-input"{{$data_pelatihan->keterangan == 'Bersertifikat'? 'checked' : ''}}>Bersertifikat
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" name="keterangan" value="Tidak Bersertifikat" class="form-check-input"{{$data_pelatihan->keterangan == 'Tidak Bersertifikat'? 'checked' : ''}}>Tidak Bersertifikat
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/data_pelatihan" class="btn btn-outline-primary">
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
