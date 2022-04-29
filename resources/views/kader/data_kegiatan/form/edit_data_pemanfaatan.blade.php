@extends('kader.layout')

@section('title', 'Edit Data Pemanfataan Tanah Pekarangan TP PKK | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Edit Data Pemanfataan Tanah Pekarangan TP PKK')
@section('container')

<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Data Pemanfataan Tanah Pekarangan TP PKK</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ url('data_pemanfaatan', $data_pemanfaatan->id) }}" method="POST">
        @method('PUT')

        @csrf
        <div class="card-body">
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
                        <label for="exampleFormControlSelect1">Desa</label>
                        {{-- nama desa --}}
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
                        <label for="exampleFormControlSelect1">Kecamatan</label>
                        {{-- nama kecamatan --}}
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
                        <select class="form-control" id="id_warga" name="id_warga">
                          {{-- Pilih nama warga --}}
                          @foreach ($warga as $c)
                            <option value="{{ $c->id }}" {{ $c->id === $data_pemanfaatan->id_warga ? 'selected' : '' }}>{{ $c->nama }}</option>

                          @endforeach
                          </select>
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" id="id_kategori" name="id_kategori">
                            {{-- Pilih nama ketgori --}}
                            @foreach ($kat as $c)
                                <option value="{{ $c->id }}" {{ $c->id === $data_pemanfaatan->id_kegiatan ? 'selected' : '' }}>{{ $c->nama_kategori }}</option>

                            @endforeach
                        </select>
                      </div>
                </div>
            </div>
            <div class="form-group">
                {{-- nama kategori --}}
                <label>Komoditi</label>
                    <input type="text" class="form-control" name="komoditi" id="komoditi" placeholder="Masukkan Komoditi" required value="{{ucfirst(old('komoditi', $data_pemanfaatan->komoditi))}}">
            </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Masukkan Jumlah" required value="{{ucfirst(old('jumlah', $data_pemanfaatan->jumlah))}}">
                  </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{-- Pilih periode --}}
                    <label>Periode</label>
                    <select style="cursor:pointer;" class="form-control" id="periode" name="periode">
                        <option value="{{ $data_pemanfaatan->periode }}" {{ $data_pemanfaatan->periode ? 'selected' : '' }}>{{ $data_pemanfaatan->periode }}</option>
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
          <a href="/data_pemanfaatan" class="btn btn-outline-primary">
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
