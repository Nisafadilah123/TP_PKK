<?php

namespace App\Http\Controllers\AdminDesa\DataPokja3;
use App\Http\Controllers\Controller;
use App\Models\Data_Desa;
use App\Models\JumlahRumah;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class JumlahRumahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //halaman industri pokja 3
        // nama desa yang login
        // $desa = Data_Desa::all();
        $rum = JumlahRumah::with('desa')->get();

        return view('admin_desa.sub_file_pokja_3.rumah', compact('rum'));
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

        return view('admin_desa.sub_file_pokja_3.form.create_jml_rumah', compact('desas'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // proses penyimpanan untuk tambah data jml industri
        $request->validate([
            'id_desa' => 'required',
            'jml_rumah_sehat' => 'required',
            'jml_rumah_kurang_sehat' => 'required',

        ], [
            'id_desa.required' => 'Lengkapi Id Desa',
            'jml_rumah_sehat.required' => 'Lengkapi Jumlah Rumah Sehat',
            'jml_rumah_kurang_sehat.required' => 'Lengkapi Jumlah Industri Kurang Sehat',

        ]);

        // cara 1
        $rums = new JumlahRumah;
        $rums->id_desa = $request->id_desa;
        $rums->jml_rumah_sehat = $request->jml_rumah_sehat;
        $rums->jml_rumah_kurang_sehat = $request->jml_rumah_kurang_sehat;

        $rums->save();


        Alert::success('Berhasil', 'Data berhasil di tambahkan');

        return redirect('/rumah');

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
    public function edit(JumlahRumah $rumah)
    {
        //halaman edit data JumlahRumah
        $desa = JumlahRumah::with('desa')->first();
        $desas = Data_Desa::all();

        return view('admin_desa.sub_file_pokja_3.form.edit_jml_rumah', compact('rumah','desa','desas'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JumlahRumah $rumah)
    {
        // proses mengubah untuk tambah data jml kader
        $request->validate([
            'id_desa' => 'required',
            'jml_rumah_sehat' => 'required',
            'jml_rumah_kurang_sehat' => 'required',


        ]);

        $rumah->update($request->all());

        Alert::success('Berhasil', 'Data berhasil di ubah');
        // dd($jml_kader);

        return redirect('/rumah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rumah, JumlahRumah $rum)
    {
        //temukan id rumah
        $rum::find($rumah)->delete();

        return redirect('/rumah')->with('status', 'sukses');


    }
}
