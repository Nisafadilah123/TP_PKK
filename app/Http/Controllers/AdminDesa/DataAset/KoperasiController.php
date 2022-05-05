<?php

namespace App\Http\Controllers\AdminDesa\DataAset;
use App\Http\Controllers\Controller;
use App\Models\DataAsetKoperasi;
use App\Models\Koperasi;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KoperasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //halaman data koperasi
        // nama desa yang login
        $desas = DB::table('data_desa')
        ->where('id', auth()->user()->id_desa)
        ->get();

        $kec = DB::table('data_kecamatan')
            ->where('id', auth()->user()->id_desa)
            ->get();
        $koperasi = DataAsetKoperasi::all();

        return view('admin_desa.data_aset.koperasi', compact('koperasi', 'desas', 'kec'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // nama desa yang login
        $desas = DB::table('data_desa')
        ->where('id', auth()->user()->id_desa)
        ->get();
        $kec = DB::table('data_kecamatan')
        ->where('id', auth()->user()->id_desa)
        ->get();
        // jenis koperasi
        $data['jenis_koperasi'] = [
            'Produksi' => 'Produksi',
            'Serba Usaha' => 'Serba Usaha',
            'Simpan Pinjam' => 'Simpan Pinjam',
            'Konsumsi' => 'Konsumsi',
            'Lainnya' => 'Lainnya',
        ];
        // status hukum
        $data['status_hukum'] = [
            'Berbadan Hukum' => 'Berbadan Hukum',
            'Belum Berbadan Hukum' => 'Belum Berbadan Hukum',
        ];

        return view('admin_desa.data_aset.form.create_koperasi',$data, compact('desas', 'kec'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // proses penyimpanan untuk tambah data koperasi
        $request->validate([
            'id_desa' => 'required',
            'id_kecamatan' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'nama_koperasi' => 'required',
            'jenis_koperasi' => 'required',
            'status_hukum' => 'required',
            'jumlah_anggota_laki' => 'required',
            'jumlah_anggota_perempuan' => 'required',
            'periode' => 'required',

        ], [
            'id_desa.required' => 'Lengkapi Alamat Desa Koperasi PKK Desa/Kelurahan',
            'id_kecamatan' => 'Lengkapi Alamat Kecamatan Koperasi PKK Desa/Kelurahan',
            'kota.required' => 'Lengkapi Kota Koperasi PKK Desa/Kelurahan',
            'provinsi.required' => 'Lengkapi Provinsi Koperasi PKK Desa/Kelurahan',
            'nama_koperasi.required' => 'Lengkapi Nama Koperasi PKK Desa/Kelurahan',
            'jenis_koperasi.required' => 'Lengkapi Jenis Usaha yang dijalankan Koperasi PKK Desa/Kelurahan',
            'status_hukum.required' => 'Pilih Status Hukum Koperasi  Koperasi PKK Desa/Kelurahan',
            'jumlah_anggota_laki.required' => 'Lengkapi Jumlah Anggota Koperasi Laki-laki PKK Desa/Kelurahan',
            'jumlah_anggota_perempuan.required' => 'Lengkapi Jumlah Anggota Koperasi Perempuan PKK Desa/Kelurahan',
            'periode.required' => 'Pilih Periode Koperasi  Koperasi PKK Desa/Kelurahan',

        ]);

        // cara 1
        $insert=DB::table('data_aset_koperasi')->where('nama_koperasi', $request->nama_koperasi)->first();
        if ($insert != null) {
            Alert::error('Gagal', 'Data Tidak Berhasil Di Tambahkan, Hanya Bisa Menginputkan Satu kali Periode. Periode Sudah Ada ');

            return redirect('/war$warung');
        }
        else {
            $koperasis = new DataAsetKoperasi;
            $koperasis->id_desa = $request->id_desa;
            $koperasis->id_kecamatan = $request->id_kecamatan;
            $koperasis->kota = $request->kota;
            $koperasis->provinsi = $request->provinsi;
            $koperasis->nama_koperasi = $request->nama_koperasi;
            $koperasis->jenis_koperasi = $request->jenis_koperasi;
            $koperasis->status_hukum = $request->status_hukum;
            $koperasis->jumlah_anggota_laki = $request->jumlah_anggota_laki;
            $koperasis->jumlah_anggota_perempuan = $request->jumlah_anggota_perempuan;
            $koperasis->periode = $request->periode;

            $koperasis->save();

            Alert::success('Berhasil', 'Data berhasil di tambahkan');

            return redirect('/data_aset_koperasi');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(DataAsetKoperasi $data_aset_koperasi)
    {
        // halaman edit data koperasi
        // nama desa yang login
        // dd($data_warung);
        $desas = DB::table('data_desa')
        ->where('id', auth()->user()->id_desa)
        ->get();
        $kec = DB::table('data_kecamatan')
        ->where('id', auth()->user()->id_desa)
        ->get();
        // jenis koperasi
        $data['jenis_koperasi'] = [
            'Produksi' => 'Produksi',
            'Serba Usaha' => 'Serba Usaha',
            'Simpan Pinjam' => 'Simpan Pinjam',
            'Konsumsi' => 'Konsumsi',
            'Lainnya' => 'Lainnya',
        ];
        // status hukum
        $data['status_hukum'] = [
            'Berbadan Hukum' => 'Berbadan Hukum',
            'Belum Berbadan Hukum' => 'Belum Berbadan Hukum',

        ];

        return view('admin_desa.data_aset.form.edit_koperasi',$data, compact('data_aset_koperasi','kec','desas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataAsetKoperasi $data_aset_koperasi)
    {
        // proses mengubah data koperasi
        $request->validate([
            'id_desa' => 'required',
            'id_kecamatan' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'nama_koperasi' => 'required',
            'jenis_koperasi' => 'required',
            'status_hukum' => 'required',
            'jumlah_anggota_laki' => 'required',
            'jumlah_anggota_perempuan' => 'required',
            'periode' => 'required',

        ], [
            'id_desa.required' => 'Lengkapi Alamat Desa Koperasi PKK Desa/Kelurahan',
            'id_kecamatan' => 'Lengkapi Alamat Kecamatan Koperasi PKK Desa/Kelurahan',
            'kota.required' => 'Lengkapi Kota Koperasi PKK Desa/Kelurahan',
            'provinsi.required' => 'Lengkapi Provinsi Koperasi PKK Desa/Kelurahan',
            'nama_koperasi.required' => 'Lengkapi Nama Koperasi PKK Desa/Kelurahan',
            'jenis_koperasi.required' => 'Lengkapi Jenis Usaha yang dijalankan Koperasi PKK Desa/Kelurahan',
            'status_hukum.required' => 'Pilih Status Hukum Koperasi  Koperasi PKK Desa/Kelurahan',
            'jumlah_anggota_laki.required' => 'Lengkapi Jumlah Anggota Koperasi Laki-laki PKK Desa/Kelurahan',
            'jumlah_anggota_perempuan.required' => 'Lengkapi Jumlah Anggota Koperasi Perempuan PKK Desa/Kelurahan',
            'periode.required' => 'Pilih Periode Koperasi  Koperasi PKK Desa/Kelurahan',

        ]);

        $update=DB::table('data_aset_koperasi')->where('nama_koperasi', $request->nama_koperasi)->first();
        if ($update != null) {
            Alert::error('Gagal', 'Data Tidak Berhasil Di Ubah, Hanya Bisa Menggunakan Satu kali Periode. Periode Sudah Ada ');

            return redirect('/data_aset_koperasi');
        }
        else {
            $data_aset_koperasi->update($request->all());

            Alert::success('Berhasil', 'Data berhasil di ubah');
            // dd($jml_kader);

            return redirect('/data_aset_koperasi');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($data_aset_koperasi, DataAsetKoperasi $koperasi)
    {
        //temukan id koperasi
        $koperasi::find($data_aset_koperasi)->delete();
        Alert::success('Berhasil', 'Data berhasil di hapus');

        return redirect('/data_aset_koperasi');

    }
}