<?php

namespace App\Http\Controllers\AdminDesa\DataAset;
use App\Http\Controllers\Controller;
use App\Models\DataWarung;
use App\Models\WarungPKK;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataWarungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //halaman data komoditi warung
        // nama desa yang login
        $desas = DB::table('data_desa')
        ->where('id', auth()->user()->id_desa)
        ->get();

        $kec = DB::table('data_kecamatan')
            ->where('id', auth()->user()->id_desa)
            ->get();
        $data_warung = DataWarung::all();

        return view('admin_desa.data_aset.data_warung', compact('data_warung', 'desas', 'kec'));
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
        $data_warung = DataWarung::all();
        $warung = WarungPKK::all();
        // dd($desas);
        return view('admin_desa.data_aset.form.create_data_warung', compact('desas', 'kec', 'data_warung', 'warung'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // proses penyimpanan untuk tambah data komoditi warung
        $request->validate([
            'id_warung' => 'required',
            'komoditi' => 'required',
            'kategori' => 'required',
            'volume' => 'required',
            'periode' => 'required',

        ], [
            'id_warung.required' => 'Lengkapi Nama Pengelola Data Warung PKK Desa/Kelurahan',
            'komoditi.required' => 'Lengkapi Komoditi Warung PKK Desa/Kelurahan',
            'kategori.required' => 'Lengkapi Kategori Warung PKK Desa/Kelurahan',
            'volume.required' => 'Lengkapi Volume Warung PKK Desa/Kelurahan',
            'periode.required' => 'Pilih Periode Warung PKK Desa/Kelurahan',

        ]);

        // cara 1
        // $insert=DB::table('war$warung')->where('periode', $request->periode)->first();
        // if ($insert != null) {
        //     Alert::error('Gagal', 'Data Tidak Berhasil Di Tambahkan, Hanya Bisa Menginputkan Satu kali Periode. Periode Sudah Ada ');

        //     return redirect('/war$warung');
        // }
        // else {
            $warungs = new DataWarung;
            $warungs->id_warung = $request->id_warung;
            $warungs->komoditi = $request->komoditi;
            $warungs->kategori = $request->kategori;
            $warungs->volume = $request->volume;
            $warungs->periode = $request->periode;

            $warungs->save();

            Alert::success('Berhasil', 'Data berhasil di tambahkan');

            return redirect('/data_warung');
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
    public function edit(DataWarung $data_warung)
    {
        // halaman edit data komoditi warung
        // nama desa yang login
        // dd($data_warung);
        $desas = DB::table('data_desa')
        ->where('id', auth()->user()->id_desa)
        ->first();
        $kec = DB::table('data_kecamatan')
        ->where('id', auth()->user()->id_desa)
        ->first();
        // $data_warung = DataWarung::all();
        $warung = WarungPKK::all();

        return view('admin_desa.data_aset.form.edit_data_warung', compact('data_warung','kec','desas', 'warung'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataWarung $data_warung)
    {
        // proses mengubah data komoditi warung
        $request->validate([
            'id_warung' => 'required',
            'komoditi' => 'required',
            'kategori' => 'required',
            'volume' => 'required',
            'periode' => 'required',

        ], [
            'id_warung.required' => 'Lengkapi Nama Pengelola Data Warung PKK Desa/Kelurahan',
            'komoditi.required' => 'Lengkapi Komoditi Warung PKK Desa/Kelurahan',
            'kategori.required' => 'Lengkapi Kategori Warung PKK Desa/Kelurahan',
            'volume.required' => 'Lengkapi Volume Warung PKK Desa/Kelurahan',
            'periode.required' => 'Pilih Periode Warung PKK Desa/Kelurahan',

        ]);
        // $update=DB::table('warung_pkk')->where('periode', $request->periode)->first();
        // if ($update != null) {
        //     Alert::error('Gagal', 'Data Tidak Berhasil Di Ubah, Hanya Bisa Menggunakan Satu kali Periode. Periode Sudah Ada ');

        //     return redirect('/war$warung');
        // }
        // else {
            $data_warung->update($request->all());

            Alert::success('Berhasil', 'Data berhasil di ubah');
            // dd($jml_kader);

            return redirect('/data_warung');
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($data_warung, DataWarung $warung)
    {
        //temukan id komoditi warung
        $warung::find($data_warung)->delete();
        Alert::success('Berhasil', 'Data berhasil di hapus');

        return redirect('/data_warung');

    }
}