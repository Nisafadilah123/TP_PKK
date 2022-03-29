<?php

namespace App\Http\Controllers\SuperAdmin\DataPokja3;
use App\Http\Controllers\Controller;
use App\Models\Data_Desa;
use App\Models\JumlahRumah;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class JumlahRumahSuperController extends Controller
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
        $rumsup = JumlahRumah::with('desa')->get();

        return view('super_admin.sub_file_pokja_3.rumah_super', compact('rumsup'));
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

        return view('super_admin.sub_file_pokja_3.form.create_jml_rumah_super', compact('desas'));

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
            'periode' => 'required',

        ], [
            'id_desa.required' => 'Lengkapi Id Desa',
            'jml_rumah_sehat.required' => 'Lengkapi Jumlah Rumah Sehat',
            'jml_rumah_kurang_sehat.required' => 'Lengkapi Jumlah Industri Kurang Sehat',
            'periode.required' => 'Lengkapi Periode',

        ]);

        // cara 1
        $rums = new JumlahRumah;
        $rums->id_desa = $request->id_desa;
        $rums->jml_rumah_sehat = $request->jml_rumah_sehat;
        $rums->jml_rumah_kurang_sehat = $request->jml_rumah_kurang_sehat;
        $rums->periode = $request->periode;

        $rums->save();


        Alert::success('Berhasil', 'Data berhasil di tambahkan');

        return redirect('/rumah_super');

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
    public function edit(JumlahRumah $rumah_super)
    {
        //halaman edit data JumlahRumah
        $desa = JumlahRumah::with('desa')->first();
        $desas = Data_Desa::all();

        return view('super_admin.sub_file_pokja_3.form.edit_jml_rumah_super', compact('rumah_super','desa','desas'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JumlahRumah $rumah_super)
    {
        // proses mengubah untuk tambah data jml kader
        $request->validate([
            'id_desa' => 'required',
            'jml_rumah_sehat' => 'required',
            'jml_rumah_kurang_sehat' => 'required',
            'periode' => 'required',


        ]);

        $rumah_super->update($request->all());

        Alert::success('Berhasil', 'Data berhasil di ubah');
        // dd($jml_kader);

        return redirect('/rumah_super');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rumah_super, JumlahRumah $rum)
    {
        //temukan id rumah
        $rum::find($rumah_super)->delete();

        return redirect('/rumah_super')->with('status', 'sukses');


    }
}