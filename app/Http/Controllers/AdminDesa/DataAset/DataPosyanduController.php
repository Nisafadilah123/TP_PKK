<?php

namespace App\Http\Controllers\AdminDesa\DataAset;
use App\Http\Controllers\Controller;
use App\Models\JenisKegiatanPosyandu;
use App\Models\Posyandu;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataPosyanduController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //halaman data jenis kegiatan posyandu
        // nama desa yang login
        $desas = DB::table('data_desa')
        ->where('id', auth()->user()->id_desa)
        ->get();

        $kec = DB::table('data_kecamatan')
            ->where('id', auth()->user()->id_desa)
            ->get();
        $jenis_kegiatan = JenisKegiatanPosyandu::all();

        return view('admin_desa.data_aset.data_kegiatan_posyandu', compact('jenis_kegiatan', 'desas', 'kec'));
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
        $kegiatan_posyandu = JenisKegiatanPosyandu::all();
        $posyandu = Posyandu::all();
        // frekuensi
        $data['frekuensi_layanan'] = [
            'Seminggu Sekali' => 'Seminggu Sekali',
            'Sebulan Sekali' => 'Sebulan Sekali',
            'Setahun Sekali' => 'Setahun Sekali',
            'dll' => 'dll',
        ];
        return view('admin_desa.data_aset.form.create_data_kegiatan_posyandu',$data, compact('desas', 'kec', 'kegiatan_posyandu', 'posyandu'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // proses penyimpanan untuk tambah data jenis buku taman bacaan
        $request->validate([
            'id_posyandu' => 'required',
            'jenis_kegiatan' => 'required',
            'frekuensi_layanan' => 'required',
            'jumlah_pengunjung_laki' => 'required',
            'jumlah_pengunjung_perempuan' => 'required',
            'jumlah_petugas_laki' => 'required',
            'jumlah_petugas_perempuan' => 'required',
            // 'keterangan_lain' => 'required',
            'periode' => 'required',

        ], [
            'id_posyandu.required' => 'Lengkapi Nama Pengelola Data Taman Bacaan/Perpustakaan PKK Desa/Kelurahan',
            'jenis_kegiatan.required' => 'Lengkapi Jenis Kegiatan Posyandu PKK Desa/Kelurahan',
            'frekuensi_layanan.required' => 'Lengkapi Frekuensi Layanan yang dilaksanaka pada Posyandu PKK Desa/Kelurahan',
            'jumlah_pengunjung_laki.required' => 'Lengkapi Jumlah Pengunjung Posyandu Berjenis Laki PKK Desa/Kelurahan',
            'jumlah_pengunjung_perempuan.required' => 'Lengkapi Jumlah Pengunjung Posyandu Berjenis Perempuan PKK Desa/Kelurahan',
            'jumlah_petugas_laki.required' => 'Lengkapi Jumlah Petugas Posyandu Berjenis Laki PKK Desa/Kelurahan',
            'jumlah_petugas_perempuan.required' => 'Lengkapi Jumlah Petugas Posyandu Berjenis Perempuan PKK Desa/Kelurahan',

            'periode.required' => 'Pilih Periode Taman Bacaan/Perpustakaan PKK Desa/Kelurahan',

        ]);

        // cara 1
        // $insert=DB::table('war$warung')->where('periode', $request->periode)->first();
        // if ($insert != null) {
        //     Alert::error('Gagal', 'Data Tidak Berhasil Di Tambahkan, Hanya Bisa Menginputkan Satu kali Periode. Periode Sudah Ada ');

        //     return redirect('/war$warung');
        // }
        // else {
            $kegiatan = new JenisKegiatanPosyandu;
            $kegiatan->id_posyandu = $request->id_posyandu;
            $kegiatan->jenis_kegiatan = $request->jenis_kegiatan;
            $kegiatan->frekuensi_layanan = $request->frekuensi_layanan;
            $kegiatan->jumlah_pengunjung_laki = $request->jumlah_pengunjung_laki;
            $kegiatan->jumlah_pengunjung_perempuan = $request->jumlah_pengunjung_perempuan;
            $kegiatan->jumlah_petugas_laki = $request->jumlah_petugas_laki;
            $kegiatan->jumlah_petugas_perempuan = $request->jumlah_petugas_perempuan;
            $kegiatan->keterangan_lain = $request->keterangan_lain;

            $kegiatan->periode = $request->periode;

            $kegiatan->save();

            Alert::success('Berhasil', 'Data berhasil di tambahkan');

            return redirect('/data_kegiatan_posyandu');
        // }
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
    public function edit(JenisKegiatanPosyandu $data_kegiatan_posyandu)
    {
        // halaman edit data jenis buku taman bacaan
        // nama desa yang login
        $desas = DB::table('data_desa')
        ->where('id', auth()->user()->id_desa)
        ->first();
        $kec = DB::table('data_kecamatan')
        ->where('id', auth()->user()->id_desa)
        ->first();
        $posyandu = Posyandu::all();
        $data['frekuensi_layanan'] = [
            'Seminggu Sekali' => 'Seminggu Sekali',
            'Sebulan Sekali' => 'Sebulan Sekali',
            'Setahun Sekali' => 'Setahun Sekali',
            'dll' => 'dll',
        ];

        return view('admin_desa.data_aset.form.edit_data_kegiatan_posyandu',$data, compact('data_kegiatan_posyandu','kec','desas', 'posyandu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisKegiatanPosyandu $data_kegiatan_posyandu)
    {
        // proses mengubah data jenis buku tanaman bacaan
        $request->validate([
            'id_posyandu' => 'required',
            'jenis_kegiatan' => 'required',
            'frekuensi_layanan' => 'required',
            'jumlah_pengunjung_laki' => 'required',
            'jumlah_pengunjung_perempuan' => 'required',
            'jumlah_petugas_laki' => 'required',
            'jumlah_petugas_perempuan' => 'required',
            // 'keterangan_lain' => 'required',
            'periode' => 'required',

        ], [
            'id_posyandu.required' => 'Lengkapi Nama Pengelola Data Taman Bacaan/Perpustakaan PKK Desa/Kelurahan',
            'jenis_kegiatan.required' => 'Lengkapi Jenis Kegiatan Posyandu PKK Desa/Kelurahan',
            'frekuensi_layanan.required' => 'Lengkapi Frekuensi Layanan yang dilaksanaka pada Posyandu PKK Desa/Kelurahan',
            'jumlah_pengunjung_laki.required' => 'Lengkapi Jumlah Pengunjung Posyandu Berjenis Laki PKK Desa/Kelurahan',
            'jumlah_pengunjung_perempuan.required' => 'Lengkapi Jumlah Pengunjung Posyandu Berjenis Perempuan PKK Desa/Kelurahan',
            'jumlah_petugas_laki.required' => 'Lengkapi Jumlah Petugas Posyandu Berjenis Laki PKK Desa/Kelurahan',
            'jumlah_petugas_perempuan.required' => 'Lengkapi Jumlah Petugas Posyandu Berjenis Perempuan PKK Desa/Kelurahan',

            'periode.required' => 'Pilih Periode Taman Bacaan/Perpustakaan PKK Desa/Kelurahan',

        ]);
        // $update=DB::table('warung_pkk')->where('periode', $request->periode)->first();
        // if ($update != null) {
        //     Alert::error('Gagal', 'Data Tidak Berhasil Di Ubah, Hanya Bisa Menggunakan Satu kali Periode. Periode Sudah Ada ');

        //     return redirect('/war$warung');
        // }
        // else {
            $data_kegiatan_posyandu->update($request->all());

            Alert::success('Berhasil', 'Data berhasil di ubah');
            // dd($jml_kader);

            return redirect('/data_kegiatan_posyandu');
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($data_kegiatan_posyandu, JenisKegiatanPosyandu $jenis)
    {
        //temukan id jenis buku jenis bacaan
        $jenis::find($data_kegiatan_posyandu)->delete();
        Alert::success('Berhasil', 'Data berhasil di hapus');

        return redirect('/data_kegiatan_posyandu');

    }

}