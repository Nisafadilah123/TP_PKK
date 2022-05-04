<?php

namespace App\Http\Controllers\AdminDesa\DataAset;
use App\Http\Controllers\Controller;
use App\Models\Data_Desa;
use App\Models\WarungPKK;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WarungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //halaman pengelola warung
        // nama desa yang login
        $desas = DB::table('data_desa')
        ->where('id', auth()->user()->id_desa)
        ->get();

        $kec = DB::table('data_kecamatan')
            ->where('id', auth()->user()->id_desa)
            ->get();

        $warung = WarungPKK::all();

        return view('admin_desa.data_aset.warung', compact('warung', 'desas', 'kec'));
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
        return view('admin_desa.data_aset.form.create_warung', compact('desas', 'kec'));

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
        $request->validate([
            'id_desa' => 'required',
            'id_kecamatan' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'nama_warung' => 'required',
            'nama_pengelola' => 'required',

        ], [
            'id_desa.required' => 'Lengkapi Alamat Desa Warung PKK Desa/Kelurahan',
            'id_kecamatan' => 'Lengkapi Alamat Kecamatan Warung PKK Desa/Kelurahan',
            'kota.required' => 'Lengkapi Kota Warung PKK Desa/Kelurahan',
            'provinsi.required' => 'Lengkapi Provinsi Warung PKK Desa/Kelurahan',
            'nama_warung.required' => 'Lengkapi Nama Warung PKK Desa/Kelurahan',
            'nama_pengelola.required' => 'Lengkapi Nama Pengelola Warung PKK Desa/Kelurahan',

        ]);

        // cara 1
        $insert=DB::table('warung_pkk')->where('nama_warung', $request->nama_warung)->first();
        if ($insert != null) {
            Alert::error('Gagal', 'Data Tidak Berhasil Di Tambahkan, Nama Warung Sudah Ada ');

            return redirect('/warung');
        }
        else {
            $warungs = new WarungPKK;
            $warungs->id_desa = $request->id_desa;
            $warungs->id_kecamatan = $request->id_kecamatan;
            $warungs->kota = $request->kota;
            $warungs->provinsi = $request->provinsi;
            $warungs->nama_warung = $request->nama_warung;
            $warungs->nama_pengelola = $request->nama_pengelola;

            $warungs->save();

            Alert::success('Berhasil', 'Data berhasil di tambahkan');

            return redirect('/warung');
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
    public function edit(WarungPKK $warung)
    {
        //halaman edit data war$warung
        // nama desa yang login
        $desas = DB::table('data_desa')
            ->where('id', auth()->user()->id_desa)
            ->get();
        $kec = DB::table('data_kecamatan')
            ->where('id', auth()->user()->id_desa)
            ->get();


        return view('admin_desa.data_aset.form.edit_warung', compact('warung','kec','desas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WarungPKK $warung)
    {
        // proses mengubah untuk tambah data jml kader
        $request->validate([
            'id_desa' => 'required',
            'id_kecamatan' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'nama_warung' => 'required',
            'nama_pengelola' => 'required',

        ], [
            'id_desa.required' => 'Lengkapi Alamat Desa Warung PKK Desa/Kelurahan',
            'id_kecamatan' => 'Lengkapi Alamat Kecamatan Warung PKK Desa/Kelurahan',
            'kota.required' => 'Lengkapi Kota Warung PKK Desa/Kelurahan',
            'provinsi.required' => 'Lengkapi Provinsi Warung PKK Desa/Kelurahan',
            'nama_warung.required' => 'Lengkapi Nama Warung PKK Desa/Kelurahan',
            'nama_pengelola.required' => 'Lengkapi Nama Pengelola Warung PKK Desa/Kelurahan',

        ]);
        // $update=DB::table('warung_pkk')->where('periode', $request->periode)->first();
        // if ($update != null) {
        //     Alert::error('Gagal', 'Data Tidak Berhasil Di Ubah, Hanya Bisa Menggunakan Satu kali Periode. Periode Sudah Ada ');

        //     return redirect('/war$warung');
        // }
        // else {
            $warung->update($request->all());

            Alert::success('Berhasil', 'Data berhasil di ubah');
            // dd($jml_kader);

            return redirect('/warung');
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($warung, WarungPKK $gotong)
    {
        //temukan id war$warung
        $gotong::find($warung)->delete();
        Alert::success('Berhasil', 'Data berhasil di hapus');

        return redirect('/warung');

    }
}
