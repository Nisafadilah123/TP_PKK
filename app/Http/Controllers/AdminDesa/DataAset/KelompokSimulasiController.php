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
            $kelompoks = new KelompokSimulasi;
            $kelompoks->id_warung = $request->id_warung;
            $kelompoks->komoditi = $request->komoditi;
            $kelompoks->kategori = $request->kategori;
            $kelompoks->volume = $request->volume;
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
    public function edit(DataWarung $data_warung)
    {
        // halaman edit data warung
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
        // proses mengubah untuk tambah data jml kader
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
        //temukan id war$warung
        $warung::find($data_warung)->delete();
        Alert::success('Berhasil', 'Data berhasil di hapus');

        return redirect('/data_warung');

    }

}
