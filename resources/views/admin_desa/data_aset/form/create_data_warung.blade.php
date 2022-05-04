@extends('admin_desa.layout')

@section('title', 'Tambah Data Komoditi/Usaha Warung PKK Data Aset | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Tambah Data Komoditi/Usaha Warung PKK Data Aset')
@section('container')

<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tambah Data Komoditi/Usaha Warung PKK Data Aset</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ route('data_warung.store') }}" method="POST">
        @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Pengelola Warung PKK</label>
                        <select class="form-control @error('nama_pengelola') is-invalid @enderror" id="id_warung" name="id_warung">
                            {{-- Pilih Nama Kepala Rumah Tangga --}}
                                <option hidden> Pilih Nama Pengelola Warung PKK</option>
                                    @foreach ($warung as $c)
                                        <option value="{{$c->id}}">{{ $c->nama_pengelola }}</option>
                                    @endforeach
                        </select>
                            @error('nama_pengelola')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                </div>

                <div class="form-group">
                    {{-- nama Komoditi --}}
                    <label>Komoditi</label>
                        <input type="text" class="form-control @error('komoditi') is-invalid @enderror" name="komoditi" id="komoditi" placeholder="Masukkan Komoditi">
                            @error('komoditi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                </div>

                <div class="form-group">
                    {{-- nama kategori --}}
                    <label>Kategori</label>
                        <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" id="kategori" placeholder="Masukkan Kategori dari komoditi/usaha yang dijalankan">
                            @error('kategori')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                </div>

                <div class="form-group">
                    {{-- nama volume --}}
                    <label>Volume</label>
                        <input type="number" min="0" class="form-control @error('volume') is-invalid @enderror" name="volume" id="volume" placeholder="Diisi dengan volume/jumlah dengan satuan yang Sesuai">
                            @error('volume')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                </div>

                <div class="form-group @error('periode') is-invalid @enderror">
                    {{-- periode --}}
                    <label>Periode</label>
                    <select style="cursor:pointer;" class="form-control" id="periode" name="periode">
                      <option hidden> Pilih Tahun</option>
                        <?php
                          $year = date('Y');
                          $min = $year ;
                          $max = $year + 20;
                          for( $i=$min; $i<=$max; $i++ ) {
                            echo '<option value='.$i.'>'.$i.'</option>';
                          }?>
                    </select>
                  </div>
                  @error('periode')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

            </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/warung" class="btn btn-outline-primary">
            <span>Batalkan</span>
        </a>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection

