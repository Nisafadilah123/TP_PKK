@extends('admin_desa.layout')

@section('title', 'Tambah Data Jenis Buku Taman Bacaan Data Aset | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Tambah Data Jenis Buku Taman Bacaan Data Aset')
@section('container')

<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tambah Data Jenis Buku Taman Bacaan Data Aset</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form action="{{ route('data_taman_bacaan.store') }}" method="POST">
        @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Pengelola Taman Bacaan PKK</label>
                        <select class="form-control @error('nama_pengelola') is-invalid @enderror" id="id_taman_bacaan" name="id_taman_bacaan">
                            {{-- Pilih Nama Kepala Rumah Tangga --}}
                            <option hidden> Pilih Nama Pengelola Taman Bacaan PKK</option>
                                @foreach ($taman_bacaan as $c)
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
                    {{-- nama jenis_buku --}}
                    <label>Jenis Buku</label>
                        <input type="text" class="form-control @error('jenis_buku') is-invalid @enderror" name="jenis_buku" id="jenis_buku" placeholder="Masukkan Jenis Buku">
                            @error('jenis_buku')
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
                            {{-- nama jumlah --}}
                          <label>Jumlah</label>
                            <input type="number" min="0" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" id="jumlah" placeholder="Diisi dengan jumlah buku sesuai dengan jenis dan kategori buku bacaan yang ada">
                                @error('jumlah')
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

