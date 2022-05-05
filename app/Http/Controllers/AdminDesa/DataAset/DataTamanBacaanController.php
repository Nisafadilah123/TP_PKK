<?php

namespace App\Http\Controllers\AdminDesa\DataAset;
use App\Http\Controllers\Controller;
use App\Models\DataTamanBacaan;
use App\Models\TamanBacaan;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataTamanBacaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //halaman data jenis buku taman bacaan
        // nama desa yang login
        $desas = DB::table('data_desa')
        ->where('id', auth()->user()->id_desa)
        ->get();

        $kec = DB::table('data_kecamatan')
            ->where('id', auth()->user()->id_desa)
            ->get();
        $data_taman_bacaan = DataTamanBacaan::all();

        return view('admin_desa.data_aset.data_taman', compact('data_taman_bacaan', 'desas', 'kec'));
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
        $data_taman_bacaan = DataTamanBacaan::all();
        $taman_bacaan = TamanBacaan::all();
        // dd($taman_bacaan);
        return view('admin_desa.data_aset.form.create_data_taman', compact('desas', 'kec', 'data_taman_bacaan', 'taman_bacaan'));

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
            'id_taman_bacaan' => 'required',
            'jenis_buku' => 'required',
            'kategori' => 'required',
            'jumlah' => 'required',
            'periode' => 'required',

        ], [
            'id_taman_bacaan.required' => 'Lengkapi Nama Pengelola Data Taman Bacaan/Perpustakaan PKK Desa/Kelurahan',
            'jenis_buku.required' => 'Lengkapi Jenis Buku Taman Bacaan/Perpustakaan PKK Desa/Kelurahan',
            'kategori.required' => 'Lengkapi Kategori Taman Bacaan/Perpustakaan PKK Desa/Kelurahan',
            'jumlah.required' => 'Lengkapi Jumlah Taman Bacaan/Perpustakaan PKK Desa/Kelurahan',
            'periode.required' => 'Pilih Periode Taman Bacaan/Perpustakaan PKK Desa/Kelurahan',

        ]);

        // cara 1
        // $insert=DB::table('war$warung')->where('periode', $request->periode)->first();
        // if ($insert != null) {
        //     Alert::error('Gagal', 'Data Tidak Berhasil Di Tambahkan, Hanya Bisa Menginputkan Satu kali Periode. Periode Sudah Ada ');

        //     return redirect('/war$warung');
        // }
        // else {
            $tamans = new DataTamanBacaan;
            $tamans->id_taman_bacaan = $request->id_taman_bacaan;
            $tamans->jenis_buku = $request->jenis_buku;
            $tamans->kategori = $request->kategori;
            $tamans->jumlah = $request->jumlah;
            $tamans->periode = $request->periode;

            $tamans->save();

            Alert::success('Berhasil', 'Data berhasil di tambahkan');

            return redirect('/data_taman_bacaan');
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
    public function edit(DataTamanBacaan $data_taman_bacaan)
    {
        // halaman edit data jenis buku taman bacaan
        // nama desa yang login
        // dd($data_taman_bacaan);
        $desas = DB::table('data_desa')
        ->where('id', auth()->user()->id_desa)
        ->first();
        $kec = DB::table('data_kecamatan')
        ->where('id', auth()->user()->id_desa)
        ->first();
        $taman = TamanBacaan::all();

        return view('admin_desa.data_aset.form.edit_data_taman', compact('data_taman_bacaan','kec','desas', 'taman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataTamanBacaan $data_taman_bacaan)
    {
        // proses mengubah data jenis buku tanaman bacaan
        $request->validate([
            'id_taman_bacaan' => 'required',
            'jenis_buku' => 'required',
            'kategori' => 'required',
            'jumlah' => 'required',
            'periode' => 'required',

        ], [
            'id_taman_bacaan.required' => 'Lengkapi Nama Pengelola Data Taman Bacaan/Perpustakaan PKK Desa/Kelurahan',
            'jenis_buku.required' => 'Lengkapi Jenis Buku Taman Bacaan/Perpustakaan PKK Desa/Kelurahan',
            'kategori.required' => 'Lengkapi Kategori Taman Bacaan/Perpustakaan PKK Desa/Kelurahan',
            'jumlah.required' => 'Lengkapi Jumlah Taman Bacaan/Perpustakaan PKK Desa/Kelurahan',
            'periode.required' => 'Pilih Periode Taman Bacaan/Perpustakaan PKK Desa/Kelurahan',

        ]);
        // $update=DB::table('warung_pkk')->where('periode', $request->periode)->first();
        // if ($update != null) {
        //     Alert::error('Gagal', 'Data Tidak Berhasil Di Ubah, Hanya Bisa Menggunakan Satu kali Periode. Periode Sudah Ada ');

        //     return redirect('/war$warung');
        // }
        // else {
            $data_taman_bacaan->update($request->all());

            Alert::success('Berhasil', 'Data berhasil di ubah');
            // dd($jml_kader);

            return redirect('/data_taman_bacaan');
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($data_taman_bacaan, DataTamanBacaan $taman)
    {
        //temukan id jenis buku taman bacaan
        $taman::find($data_taman_bacaan)->delete();
        Alert::success('Berhasil', 'Data berhasil di hapus');

        return redirect('/data_taman_bacaan');

    }
}