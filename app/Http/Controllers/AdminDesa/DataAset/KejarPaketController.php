<?php

namespace App\Http\Controllers\AdminDesa\DataAset;
use App\Http\Controllers\Controller;
use App\Models\KejarPaket;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KejarPaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //halaman data kejar paket
        // nama desa yang login
        $desas = DB::table('data_desa')
        ->where('id', auth()->user()->id_desa)
        ->get();

        $kec = DB::table('data_kecamatan')
            ->where('id', auth()->user()->id_desa)
            ->get();
        $kejar_paket = KejarPaket::all();

        return view('admin_desa.data_aset.kejar_paket', compact('kejar_paket', 'desas', 'kec'));
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
        // jenis paket
        $data['jenis_paket'] = [
            'Paket A' => 'Paket A',
            'Paket B' => 'Paket B',
            'Paket C' => 'Paket C',
            'KF (Keaksaraan Fungsional)' => 'KF (Keaksaraan Fungsional)',
            'PAUD/Sejenis' => 'PAUD/Sejenis',
        ];
        return view('admin_desa.data_aset.form.create_kejar_paket',$data, compact('desas', 'kec'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // proses penyimpanan untuk tambah data kejar paket
        $request->validate([
            'id_desa' => 'required',
            'id_kecamatan' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'nama_kejar_paket' => 'required',
            'jenis_paket' => 'required',
            'jumlah_warga_laki' => 'required',
            'jumlah_warga_perempuan' => 'required',
            'jumlah_pengajar_laki' => 'required',
            'jumlah_pengajar_perempuan' => 'required',
            'periode' => 'required',

        ], [
            'id_desa.required' => 'Lengkapi Alamat Desa Kelompok Simulasi/Penyuluhan PKK Desa/Kelurahan',
            'id_kecamatan' => 'Lengkapi Alamat Kecamatan Kelompok Simulasi/Penyuluhan PKK Desa/Kelurahan',
            'kota.required' => 'Lengkapi Kota Kelompok Simulasi/Penyuluhan PKK Desa/Kelurahan',
            'provinsi.required' => 'Lengkapi Provinsi Kelompok Simulasi/Penyuluhan PKK Desa/Kelurahan',
            'nama_kejar_paket.required' => 'Lengkapi Nama Kejar Paket/KFK/PAUD',
            'jenis_paket.required' => 'Pilih Jenis Kejar Paket/KF/PAUD',
            'jumlah_warga_laki.required' => 'Lengkapi Jumlah Warga/Siswa yang Belajar pada Kejar Paket/KF/PAUD tersebut yang Berjenis Kelamin Laki-laki',
            'jumlah_warga_perempuan.required' => 'Lengkapi Jumlah Warga/Siswa yang Belajar pada Kejar Paket/KF/PAUD tersebut yang Berjenis Kelamin Perempuan',
            'jumlah_pengajar_laki.required' => 'Lengkapi Jumlah Pengajar pada Kejar Paket/KF/PAUD tersebut yang Berjenis Kelamin laki-laki',
            'jumlah_pengajar_perempuan.required' => 'Lengkapi Jumlah Pengajar pada Kejar Paket/KF/PAUD tersebut yang Berjenis Kelamin laki-laki',
            'periode.required' => 'Pilih Periode Kelompok Simulasi/Penyuluhan  Kelompok Simulasi/Penyuluhan PKK Desa/Kelurahan',

        ]);

        // cara 1
        $insert=DB::table('kejar_paket')->where('nama_kejar_paket', $request->nama_kejar_paket)->first();
        if ($insert != null) {
            Alert::error('Gagal', 'Data Tidak Berhasil Di Tambahkan, Nama Kejar Paket/KF/PAUD Sudah Ada ');

            return redirect('/kejar_paket');
        }
        else {
            $paket = new KejarPaket;
            $paket->id_desa = $request->id_desa;
            $paket->id_kecamatan = $request->id_kecamatan;
            $paket->kota = $request->kota;
            $paket->provinsi = $request->provinsi;
            $paket->nama_kejar_paket = $request->nama_kejar_paket;
            $paket->jenis_paket = $request->jenis_paket;
            $paket->jumlah_warga_laki = $request->jumlah_warga_laki;
            $paket->jumlah_warga_perempuan = $request->jumlah_warga_perempuan;
            $paket->jumlah_pengajar_laki = $request->jumlah_pengajar_laki;
            $paket->jumlah_pengajar_perempuan = $request->jumlah_pengajar_perempuan;
            $paket->periode = $request->periode;

            $paket->save();

            Alert::success('Berhasil', 'Data berhasil di tambahkan');

            return redirect('/kejar_paket');
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
    public function edit(KejarPaket $kejar_paket)
    {
        // halaman edit data kejar paket
        // nama desa yang login
        // dd($data_warung);
        $desas = DB::table('data_desa')
        ->where('id', auth()->user()->id_desa)
        ->get();
        $kec = DB::table('data_kecamatan')
        ->where('id', auth()->user()->id_desa)
        ->get();
        // $data_warung = DataWarung::all();
        $paket = KejarPaket::all();
        //data jenis paket
        $data['jenis_paket'] = [
            'Paket A' => 'Paket A',
            'Paket B' => 'Paket B',
            'Paket C' => 'Paket C',
            'KF (Keaksaraan Fungsional)' => 'KF (Keaksaraan Fungsional)',
            'PAUD/Sejenis' => 'PAUD/Sejenis',
        ];

        return view('admin_desa.data_aset.form.edit_kejar_paket',$data, compact('kejar_paket','kec','desas', 'paket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KejarPaket $kejar_paket)
    {
        // proses mengubah data kejar paket
        $request->validate([
            'id_desa' => 'required',
            'id_kecamatan' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'nama_kejar_paket' => 'required',
            'jenis_paket' => 'required',
            'jumlah_warga_laki' => 'required',
            'jumlah_warga_perempuan' => 'required',
            'jumlah_pengajar_laki' => 'required',
            'jumlah_pengajar_perempuan' => 'required',
            'periode' => 'required',

        ], [
            'id_desa.required' => 'Lengkapi Alamat Desa Kelompok Simulasi/Penyuluhan PKK Desa/Kelurahan',
            'id_kecamatan' => 'Lengkapi Alamat Kecamatan Kelompok Simulasi/Penyuluhan PKK Desa/Kelurahan',
            'kota.required' => 'Lengkapi Kota Kelompok Simulasi/Penyuluhan PKK Desa/Kelurahan',
            'provinsi.required' => 'Lengkapi Provinsi Kelompok Simulasi/Penyuluhan PKK Desa/Kelurahan',
            'nama_kejar_paket.required' => 'Lengkapi Nama Kegiatan PKK Desa/Kelurahan',
            'jenis_paket.required' => 'Lengkapi Jenis Simulasi/Penyuluhan Kelompok Simulasi/Penyuluhan PKK Desa/Kelurahan',
            'jumlah_warga_laki.required' => 'Lengkapi Jumlah Kelompok Simulasi/Penyuluhan PKK Desa/Kelurahan yang mengikuti simulasi/penyuluhan',
            'jumlah_warga_perempuan.required' => 'Lengkapi Jumlah Sosialisasi Kelompok Simulasi/Penyuluhan PKK Desa/Kelurahan yang dilaksanakan',
            'jumlah_pengajar_laki.required' => 'Lengkapi Jumlah Kader Kelompok Simulasi/Penyuluhan PKK Desa/Kelurahan Laki',
            'jumlah_pengajar_perempuan.required' => 'Lengkapi Jumlah Kader Kelompok Simulasi/Penyuluhan PKK Desa/Kelurahan Perempuan',
            'periode.required' => 'Pilih Periode Kelompok Simulasi/Penyuluhan  Kelompok Simulasi/Penyuluhan PKK Desa/Kelurahan',

        ]);
        $update=DB::table('kejar_paket')->where('nama_kejar_paket', $request->nama_kejar_paket)->first();
        if ($update != null) {
            Alert::error('Gagal', 'Data Tidak Berhasil Di Ubah, Nama Kejar Paket/KF/PAUD Sudah Ada ');

            return redirect('/kejar_paket');
        }
        else {
            $kejar_paket->update($request->all());

            Alert::success('Berhasil', 'Data berhasil di ubah');
            // dd($jml_kader);

            return redirect('/kejar_paket');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kejar_paket, KejarPaket $kejar)
    {
        //temukan id kejar paket
        $kejar::find($kejar_paket)->delete();
        Alert::success('Berhasil', 'Data berhasil di hapus');

        return redirect('/kejar_paket');

    }

}