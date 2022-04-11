@extends('admin_desa.layout')

@section('title', 'Edit Data Jumlah Kader POKJA I | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Edit Data Jumlah Kader POKJA I')
@section('container')

<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Data Jumlah Kader POKJA I</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ url ('/jml_kader', $jml_kader->id) }}" method="POST">
        {{-- @dump($data_desa) --}}
          @method('PUT')
          @csrf
        <div class="card-body">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Nama Desa</label>
                  {{-- <select class="form-control" id="id_desa" name="id_desa"> --}}
                      {{-- nama desa yang login --}}
                      {{-- @foreach ($desas as $d)
                      <option value="{{ $d->id }}" {{ $d->id === $jml_kader->id_desa ? 'selected' : '' }}>
                          {{ $d->kode_desa }}-{{ $d->nama_desa }}
                      </option>
                  @endforeach --}}
                  @foreach ($desas as $c)
                    {{-- <option value="{{$c->id }}">  {{$c->kode_desa }}-{{ $c->nama_desa }}</option> --}}
                    <input type="hidden" class="form-control" name="id_desa" id="id_desa" placeholder="Masukkan Nama Desa" required value="{{$c->id}}">
                    <input type="text" disabled class="form-control" name="id_desa" id="id_desa" placeholder="Masukkan Nama Desa" required value="{{$c->kode_desa }}-{{ $c->nama_desa }}">

                  @endforeach
                {{-- </select> --}}
              </div>

          <div class="form-group">
            <label>Jumlah Kader PKBN</label>
            <input min="0" type="number" class="form-control" name="jml_kader_PKBN" id="jml_kader_PKBN" placeholder="Masukkan Jumlah Kader PKBN" required value="{{ucfirst(old('jml_kader_PKBN', $jml_kader->jml_kader_PKBN))}}">
          </div>
          <div class="form-group">
            <label>Jumlah Kader PKDRT</label>
            <input min="0" type="number" class="form-control" name="jml_kader_PKDRT" id="jml_kader_PKDRT" placeholder="Masukkan Jumlah Kader PKDRT" required value="{{ucfirst(old('jml_kader_PKDRT', $jml_kader->jml_kader_PKDRT))}}">
          </div>
          <div class="form-group">
            <label>Jumlah Kader Pola Asuh</label>
            <input min="0" type="number" class="form-control" name="jml_kader_pola_asuh" id="jml_kader_pola_asuh" placeholder="Masukkan Jumlah Kader Pola Asuh" required value="{{ucfirst(old('jml_kader_pola_asuh', $jml_kader->jml_kader_pola_asuh))}}">
          </div>
          <div class="form-group">
            <label>Periode</label>
                <select style="cursor:pointer;" class="form-control" id="periode" name="periode">
                    <option value="0" {{ $jml_kader->periode ? 'selected' : '' }}>{{ $jml_kader->periode }}</option>
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
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/jml_kader" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

