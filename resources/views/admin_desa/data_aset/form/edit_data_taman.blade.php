@extends('admin_desa.layout')

@section('title', 'Edit Data Jenis Buku Taman Bacaan Data Aset | Admin Desa PKK Kab. Indramayu')

@section('bread', 'Edit Data Jenis Buku Taman Bacaan Data Aset')
@section('container')

<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Data Jenis Buku Taman Bacaan Data Aset</h3>
        </div>
      <!-- /.card-header -->
      <!-- form start -->

    <form action="{{ url ('/data_taman_bacaan', $data_taman_bacaan->id) }}" method="POST">
        @method('PUT')
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    {{  ($errors)  }}
                </ul>
            </div>
        @endif

            <div class="card-body">
                <div class="form-group">
                    <label>Nama Pengelola Taman Bacaan PKK</label>
                        <select class="form-control @error('nama_pengelola') is-invalid @enderror" id="id_taman_bacaan" name="id_taman_bacaan">
                            {{-- Pilih Nama Kepala Rumah Tangga --}}
                                @foreach ($taman as $c)
                                    <option value="{{$c->id}}" {{ $c->id === $data_taman_bacaan->id_taman_bacaan ? 'selected' : '' }}>{{ $c->nama_pengelola }}</option>
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
                        <input type="text" class="form-control @error('jenis_buku') is-invalid @enderror" name="jenis_buku" id="jenis_buku" placeholder="Masukkan Jenis Buku" value="{{ (old('jenis_buku', $data_taman_bacaan->jenis_buku)) }}">
                            @error('jenis_buku')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                </div>

                <div class="form-group">
                    {{-- nama kategori --}}
                        <label>Kategori</label>
                            <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" id="kategori" placeholder="Masukkan Kategori dari komoditi/usaha yang dijalankan" value="{{ (old('kategori', $data_taman_bacaan->kategori)) }}">
                                @error('kategori')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>

                <div class="form-group">
                            {{-- nama jumlah --}}
                        <label>Jumlah</label>
                            <input type="number" min="0" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" id="jumlah" placeholder="Diisi dengan jumlah buku sesuai dengan jenis dan kategori buku bacaan yang ada" value="{{ (old('jumlah', $data_taman_bacaan->jumlah)) }}">
                                @error('jumlah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>

                <div class="form-group">
                    <label>Periode</label>
                    {{-- pilih periode --}}
                    <select style="cursor:pointer;" class="form-control" id="periode" name="periode">
                        <option value="{{ $data_taman_bacaan->periode }}" {{ $data_taman_bacaan->periode ? 'selected' : '' }}>{{ $data_taman_bacaan->periode }}</option>
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
                <a href="/data_taman_bacaan" class="btn btn-outline-primary">
                <span>Batalkan</span>
                </a>
        </div>
    </form>
    </div>
    <!-- /.card -->
</div>
@endsection

