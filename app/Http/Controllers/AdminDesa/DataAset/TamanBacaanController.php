<?php

namespace App\Http\Controllers\AdminDesa\DataAset;
use App\Http\Controllers\Controller;
use App\Models\TamanBacaan;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TamanBacaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //halaman pengelola taman bacaan
        // nama desa yang login
        $desas = DB::table('data_desa')
        ->where('id', auth()->user()->id_desa)
        ->get();

        $kec = DB::table('data_kecamatan')
            ->where('id', auth()->user()->id_desa)
            ->get();

        $taman = TamanBacaan::all();

        return view('admin_desa.data_aset.taman_bacaan', compact('taman', 'desas', 'kec'));
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
        return view('admin_desa.data_aset.form.create_taman', compact('desas', 'kec'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // proses penyimpanan untuk tambah data pengelola warung
    //    dd($request->all());
       $request->validate([
            'id_desa' => 'required',
            'id_kecamatan' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'nama_taman_bacaan' => 'required',
            'nama_pengelola' => 'required',
            'jumlah_buku' => 'required',

        ], [
            'id_desa.required' => 'Lengkapi Alamat Desa Taman Bacaan/Perpustakaan PKK Desa/Kelurahan',
            'id_kecamatan' => 'Lengkapi Alamat Kecamatan Taman Bacaan/Perpustakaan PKK Desa/Kelurahan',
            'kota.required' => 'Lengkapi Kota Taman Bacaan/Perpustakaan PKK Desa/Kelurahan',
            'provinsi.required' => 'Lengkapi Provinsi Taman Bacaan/Perpustakaan PKK Desa/Kelurahan',
            'nama_taman_bacaan.required' => 'Lengkapi Nama Taman Bacaan/Perpustakaan PKK Desa/Kelurahan',
            'nama_pengelola.required' => 'Lengkapi Nama Warga Yang Diberi Kepercayaan Mengelola Taman Bacaan/Perpustakaan PKK Desa/Kelurahan',
            'jumlah_buku.required' => 'Lengkapi Jumlah Buku Yang Ada Pada Taman Bacaan/Perpustakaan PKK Desa/Kelurahan',

        ]);

        // cara 1
        $insert=DB::table('taman_bacaan')->where('nama_taman_bacaan', $request->nama_taman_bacaan)->first();
        if ($insert != null) {
            Alert::error('Gagal', 'Data Tidak Berhasil Di Tambahkan, Nama Taman Bacaan Sudah Ada ');

            return redirect('/taman_bacaan');
        }
        else {
            $tamans = new TamanBacaan;
            $tamans->id_desa = $request->id_desa;
            $tamans->id_kecamatan = $request->id_kecamatan;
            $tamans->kota = $request->kota;
            $tamans->provinsi = $request->provinsi;
            $tamans->nama_taman_bacaan = $request->nama_taman_bacaan;
            $tamans->nama_pengelola = $request->nama_pengelola;
            $tamans->jumlah_buku = $request->jumlah_buku;

            $tamans->save();

            Alert::success('Berhasil', 'Data berhasil di tambahkan');

            return redirect('/taman_bacaan');
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
    public function edit(TamanBacaan $taman_bacaan)
    {
        //halaman edit data taman_bacaan
        // nama desa yang login
        $desas = DB::table('data_desa')
            ->where('id', auth()->user()->id_desa)
            ->get();
        $kec = DB::table('data_kecamatan')
            ->where('id', auth()->user()->id_desa)
            ->get();


        return view('admin_desa.data_aset.form.edit_taman', compact('kec','desas', 'taman_bacaan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TamanBacaan $taman_bacaan)
    {
        // proses mengubah untuk tambah data jml kader
        $request->validate([
            'id_desa' => 'required',
            'id_kecamatan' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'nama_taman_bacaan' => 'required',
            'nama_pengelola' => 'required',
            'jumlah_buku' => 'required',

        ], [
            'id_desa.required' => 'Lengkapi Alamat Desa Taman Bacaan/Perpustakaan PKK Desa/Kelurahan',
            'id_kecamatan' => 'Lengkapi Alamat Kecamatan Taman Bacaan/Perpustakaan PKK Desa/Kelurahan',
            'kota.required' => 'Lengkapi Kota Taman Bacaan/Perpustakaan PKK Desa/Kelurahan',
            'provinsi.required' => 'Lengkapi Provinsi Taman Bacaan/Perpustakaan PKK Desa/Kelurahan',
            'nama_taman_bacaan.required' => 'Lengkapi Nama Taman Bacaan/Perpustakaan PKK Desa/Kelurahan',
            'nama_pengelola.required' => 'Lengkapi Nama Warga Yang Diberi Kepercayaan Mengelola Taman Bacaan/Perpustakaan PKK Desa/Kelurahan',
            'jumlah_buku.required' => 'Lengkapi Jumlah Buku Yang Ada Pada Taman Bacaan/Perpustakaan PKK Desa/Kelurahan',

        ]);
        // $update=DB::table('warung_pkk')->where('periode', $request->periode)->first();
        // if ($update != null) {
        //     Alert::error('Gagal', 'Data Tidak Berhasil Di Ubah, Hanya Bisa Menggunakan Satu kali Periode. Periode Sudah Ada ');

        //     return redirect('/war$warung');
        // }
        // else {
            $taman_bacaan->update($request->all());

            Alert::success('Berhasil', 'Data berhasil di ubah');
            // dd($jml_kader);
            return redirect('/taman_bacaan');
            // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($taman_bacaan, TamanBacaan $taman)
    {
        //temukan id war$taman_bacaan
        $taman::find($taman_bacaan)->delete();
        Alert::success('Berhasil', 'Data berhasil di hapus');

        return redirect('/taman_bacaan');


}
}
