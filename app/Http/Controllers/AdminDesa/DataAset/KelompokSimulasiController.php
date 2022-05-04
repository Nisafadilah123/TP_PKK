<?php

namespace App\Http\Controllers\AdminDesa\DataAset;
use App\Http\Controllers\Controller;
use App\Models\KelompokSimulasi;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelompokSimulasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //halaman data warung
        // nama desa yang login
        $desas = DB::table('data_desa')
        ->where('id', auth()->user()->id_desa)
        ->get();

        $kec = DB::table('data_kecamatan')
            ->where('id', auth()->user()->id_desa)
            ->get();
        $kelompok = KelompokSimulasi::all();

        return view('admin_desa.data_aset.kelompok_simulasi', compact('kelompok', 'desas', 'kec'));
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
        // dd($desas);
        return view('admin_desa.data_aset.form.create_kelompok_simulasi', compact('desas', 'kec'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // proses penyimpanan untuk tambah data warung
        $request->validate([
            'id_desa' => 'required',
            'id_kecamatan' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'nama_kegiatan' => 'required',
            'jenis_simulasi' => 'required',
            'jumlah_kelompok' => 'required',
            'jumlah_sosialisasi' => 'required',
            'jumlah_kader_laki' => 'required',
            'jumlah_kader_perempuan' => 'required',
            'periode' => 'required',

        ], [
            'id_desa.required' => 'Lengkapi Alamat Desa Kelompok Simulasi/Penyuluhan PKK Desa/Kelurahan',
            'id_kecamatan' => 'Lengkapi Alamat Kecamatan Kelompok Simulasi/Penyuluhan PKK Desa/Kelurahan',
            'kota.required' => 'Lengkapi Kota Kelompok Simulasi/Penyuluhan PKK Desa/Kelurahan',
            'provinsi.required' => 'Lengkapi Provinsi Kelompok Simulasi/Penyuluhan PKK Desa/Kelurahan',
            'nama_kegiatan.required' => 'Lengkapi Nama Kegiatan PKK Desa/Kelurahan',
            'jenis_simulasi.required' => 'Lengkapi Jenis Simulasi/Penyuluhan Kelompok Simulasi/Penyuluhan PKK Desa/Kelurahan',
            'jumlah_kelompok.required' => 'Lengkapi Jumlah Kelompok Simulasi/Penyuluhan PKK Desa/Kelurahan yang mengikuti simulasi/penyuluhan',
            'jumlah_sosialisasi.required' => 'Lengkapi Jumlah Sosialisasi Kelompok Simulasi/Penyuluhan PKK Desa/Kelurahan yang dilaksanakan',
            'jumlah_kader_laki.required' => 'Lengkapi Jumlah Kader Kelompok Simulasi/Penyuluhan PKK Desa/Kelurahan Laki',
            'jumlah_kader_perempuan.required' => 'Lengkapi Jumlah Kader Kelompok Simulasi/Penyuluhan PKK Desa/Kelurahan Perempuan',
            'periode.required' => 'Pilih Periode Kelompok Simulasi/Penyuluhan  Kelompok Simulasi/Penyuluhan PKK Desa/Kelurahan',

        ]);

        // cara 1
        // $insert=DB::table('war$warung')->where('periode', $request->periode)->first();
        // if ($insert != null) {
        //     Alert::error('Gagal', 'Data Tidak Berhasil Di Tambahkan, Hanya Bisa Menginputkan Satu kali Periode. Periode Sudah Ada ');

        //     return redirect('/war$warung');
        // }
        // else {
            $kelompoks = new KelompokSimulasi;
            $kelompoks->id_desa = $request->id_desa;
            $kelompoks->id_kecamatan = $request->id_kecamatan;
            $kelompoks->kota = $request->kota;
            $kelompoks->provinsi = $request->provinsi;
            $kelompoks->nama_kegiatan = $request->nama_kegiatan;
            $kelompoks->jenis_simulasi = $request->jenis_simulasi;
            $kelompoks->jumlah_kelompok = $request->jumlah_kelompok;
            $kelompoks->jumlah_sosialisasi = $request->jumlah_sosialisasi;
            $kelompoks->jumlah_kader_laki = $request->jumlah_kader_laki;
            $kelompoks->jumlah_kader_perempuan = $request->jumlah_kader_perempuan;
            $kelompoks->periode = $request->periode;

            $kelompoks->save();

            Alert::success('Berhasil', 'Data berhasil di tambahkan');

            return redirect('/kelompok_simulasi');
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
    public function edit(KelompokSimulasi $kelompok_simulasi)
    {
        // halaman edit data warung
        // nama desa yang login
        // dd($data_warung);
        $desas = DB::table('data_desa')
        ->where('id', auth()->user()->id_desa)
        ->get();
        $kec = DB::table('data_kecamatan')
        ->where('id', auth()->user()->id_desa)
        ->get();
        // $data_warung = DataWarung::all();
        $kelompoks = KelompokSimulasi::all();

        return view('admin_desa.data_aset.form.edit_kelompok_simulasi', compact('kelompok_simulasi','kec','desas', 'kelompoks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KelompokSimulasi $kelompok_simulasi)
    {
        // proses mengubah untuk tambah data jml kader
        $request->validate([
            'id_desa' => 'required',
            'id_kecamatan' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'nama_kegiatan' => 'required',
            'jenis_simulasi' => 'required',
            'jumlah_kelompok' => 'required',
            'jumlah_sosialisasi' => 'required',
            'jumlah_kader_laki' => 'required',
            'jumlah_kader_perempuan' => 'required',
            'periode' => 'required',

        ], [
            'id_desa.required' => 'Lengkapi Alamat Desa Kelompok Simulasi/Penyuluhan PKK Desa/Kelurahan',
            'id_kecamatan' => 'Lengkapi Alamat Kecamatan Kelompok Simulasi/Penyuluhan PKK Desa/Kelurahan',
            'kota.required' => 'Lengkapi Kota Kelompok Simulasi/Penyuluhan PKK Desa/Kelurahan',
            'provinsi.required' => 'Lengkapi Provinsi Kelompok Simulasi/Penyuluhan PKK Desa/Kelurahan',
            'nama_kegiatan.required' => 'Lengkapi Nama Kegiatan PKK Desa/Kelurahan',
            'jenis_simulasi.required' => 'Lengkapi Jenis Simulasi/Penyuluhan Kelompok Simulasi/Penyuluhan PKK Desa/Kelurahan',
            'jumlah_kelompok.required' => 'Lengkapi Jumlah Kelompok Simulasi/Penyuluhan PKK Desa/Kelurahan yang mengikuti simulasi/penyuluhan',
            'jumlah_sosialisasi.required' => 'Lengkapi Jumlah Sosialisasi Kelompok Simulasi/Penyuluhan PKK Desa/Kelurahan yang dilaksanakan',
            'jumlah_kader_laki.required' => 'Lengkapi Jumlah Kader Kelompok Simulasi/Penyuluhan PKK Desa/Kelurahan Laki',
            'jumlah_kader_perempuan.required' => 'Lengkapi Jumlah Kader Kelompok Simulasi/Penyuluhan PKK Desa/Kelurahan Perempuan',
            'periode.required' => 'Pilih Periode Kelompok Simulasi/Penyuluhan  Kelompok Simulasi/Penyuluhan PKK Desa/Kelurahan',

        ]);
        // $update=DB::table('warung_pkk')->where('periode', $request->periode)->first();
        // if ($update != null) {
        //     Alert::error('Gagal', 'Data Tidak Berhasil Di Ubah, Hanya Bisa Menggunakan Satu kali Periode. Periode Sudah Ada ');

        //     return redirect('/war$warung');
        // }
        // else {
            $kelompok_simulasi->update($request->all());

            Alert::success('Berhasil', 'Data berhasil di ubah');
            // dd($jml_kader);

            return redirect('/kelompok_simulasi');
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kelompok_simulasi, KelompokSimulasi $kelompok)
    {
        //temukan id kelompok
        $kelompok::find($kelompok_simulasi)->delete();
        Alert::success('Berhasil', 'Data berhasil di hapus');

        return redirect('/kelompok_simulasi');

    }

}