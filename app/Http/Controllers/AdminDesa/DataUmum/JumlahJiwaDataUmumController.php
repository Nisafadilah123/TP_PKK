<?php

namespace App\Http\Controllers\AdminDesa\DataUmum;
use App\Http\Controllers\Controller;
use App\Models\Data_Desa;
use App\Models\JumlahJiwaDataUmum;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class JumlahJiwaDataUmumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
               //halaman jumlah kader pokja 4
        // nama desa yang login
        // $desa = Data_Desa::all();
        $jumji = JumlahJiwaDataUmum::with('desa')->get();

        return view('admin_desa.sub_file_sekretariat.jml_jiwa_data_umum', compact('jumji'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // nama desa yang login
        $desas = DB::table('data_desa')->get();

        return view('admin_desa.sub_file_sekretariat.form.create_jumlah_jiwa_data_umum', compact('desas'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // proses penyimpanan untuk tambah data jml kader
        $request->validate([
            'id_desa' => 'required',
            'jml_jiwa_data_umum_laki' => 'required',
            'jml_jiwa_data_umum_perempuan' => 'required',

        ], [
            'id_desa.required' => 'Lengkapi Id Desa',
            'jml_jiwa_data_umum_laki.required' => 'Lengkapi Jumlah Jiwa Data Umum Laki-laki',
            'jml_jiwa_data_umum_perempuan.required' => 'Lengkapi Jumlah Jiwa Data Umum Perempuan',
        ]);

        // cara 1
        $jumjis = new JumlahJiwaDataUmum;
        $jumjis->id_desa = $request->id_desa;
        $jumjis->jml_jiwa_data_umum_laki = $request->jml_jiwa_data_umum_laki;
        $jumjis->jml_jiwa_data_umum_perempuan = $request->jml_jiwa_data_umum_perempuan;

        $jumjis->save();


        Alert::success('Berhasil', 'Data berhasil di tambahkan');

        return redirect('/jml_jiwa_umum');

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
    public function edit(JumlahJiwaDataUmum $jml_jiwa_umum)
    {
        //halaman edit data gotong_royong
        $desa = JumlahJiwaDataUmum::with('desa')->first();
        $desas = Data_Desa::all();

        return view('admin_desa.sub_file_sekretariat.form.edit_jumlah_jiwa_data_umum', compact('jml_jiwa_umum','desa','desas'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JumlahJiwaDataUmum $jml_jiwa_umum)
    {
        // proses mengubah untuk tambah data jml jml_jiwa_umum
        $request->validate([
            'id_desa' => 'required',
            'jml_jiwa_data_umum_laki' => 'required',
            'jml_jiwa_data_umum_perempuan' => 'required',

        ]);

        $jml_jiwa_umum->update($request->all());

        Alert::success('Berhasil', 'Data berhasil di ubah');
        // dd($jml_jml_jiwa_umum);

        return redirect('/jml_jiwa_umum');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($jml_jiwa_umum, JumlahJiwaDataUmum $jumjis)
    {
        //temukan id jml_jiwa_umum
        $jumjis::find($jml_jiwa_umum)->delete();

        return redirect('/jml_jiwa_umum')->with('status', 'sukses');


    }
}
