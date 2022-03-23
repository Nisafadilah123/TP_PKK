<?php

namespace App\Http\Controllers\admin_desa\data_pokja4;
use App\Http\Controllers\Controller;
use App\Models\Data_Desa;
use App\Models\JumlahKaderPokja4;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class kader_pokja4Controller extends Controller
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
        $jumkad = JumlahKaderPokja4::with('desa')->get();

        return view('admin_desa.sub_file_pokja_4.kader_pokja4', compact('jumkad'));
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

        return view('admin_desa.sub_file_pokja_4.form.create_kader_pokja4', compact('desas'));

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
            'jml_kader_posyandu' => 'required',
            'jml_kader_gizi' => 'required',
            'jml_kader_kesling' => 'required',
            'jml_kader_penyuluhan_narkoba' => 'required',
            'jml_kader_PHBS' => 'required',
            'jml_kader_KB' => 'required',

        ], [
            'id_desa.required' => 'Lengkapi Id Desa',
            'jml_kader_posyandu.required' => 'Lengkapi Jumlah Kader Posyandu',
            'jml_kader_gizi.required' => 'Lengkapi Jumlah Kader Gizi',
            'jml_kader_kesling.required' => 'Lengkapi Jumlah kader Kesling',
            'jml_kader_penyuluhan_narkoba.required' => 'Lengkapi Jumlah Kader Penyuluhan Narkoba',
            'jml_kader_PHBS.required' => 'Lengkapi Jumlah Kader PHBS',
            'jml_kader_KB.required' => 'Lengkapi Jumlah Kader KB',

        ]);

        // cara 1
        $jumkads = new JumlahKaderPokja4;
        $jumkads->id_desa = $request->id_desa;
        $jumkads->jml_kader_posyandu = $request->jml_kader_posyandu;
        $jumkads->jml_kader_gizi = $request->jml_kader_gizi;
        $jumkads->jml_kader_kesling = $request->jml_kader_kesling;
        $jumkads->jml_kader_penyuluhan_narkoba = $request->jml_kader_penyuluhan_narkoba;
        $jumkads->jml_kader_PHBS = $request->jml_kader_PHBS;
        $jumkads->jml_kader_KB = $request->jml_kader_KB;

        $jumkads->save();


        Alert::success('Berhasil', 'Data berhasil di tambahkan');

        return redirect('/kader_pokja4');

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
    public function edit(JumlahKaderPokja4 $kader_pokja4)
    {
        //halaman edit data gotong_royong
        $desa = JumlahKaderPokja4::with('desa')->first();
        $desas = Data_Desa::all();

        return view('admin_desa.sub_file_pokja_4.form.edit_kader_pokja4', compact('kader_pokja4','desa','desas'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JumlahKaderPokja4 $kader_pokja4)
    {
        // proses mengubah untuk tambah data jml kader_pokja4
        $request->validate([
            'id_desa' => 'required',
            'jml_kader_posyandu' => 'required',
            'jml_kader_gizi' => 'required',
            'jml_kader_kesling' => 'required',
            'jml_kader_penyuluhan_narkoba' => 'required',
            'jml_kader_PHBS' => 'required',
            'jml_kader_KB' => 'required',

        ]);

        $kader_pokja4->update($request->all());

        Alert::success('Berhasil', 'Data berhasil di ubah');
        // dd($jml_kader_pokja4);

        return redirect('/kader_pokja4');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kader_pokja4, JumlahKaderPokja4 $jumkads)
    {
        //temukan id kader_pokja4
        $jumkads::find($kader_pokja4)->delete();

        return redirect('/kader_pokja4')->with('status', 'sukses');


    }
}