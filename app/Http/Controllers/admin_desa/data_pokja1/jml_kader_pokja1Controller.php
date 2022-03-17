<?php

namespace App\Http\Controllers\admin_desa\data_pokja1;
use App\Http\Controllers\Controller;
use App\Models\Data_Desa;
use App\Models\JmlKader;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class jml_kader_pokja1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //halaman jml_kader
        // nama desa yang login
        $desa = Data_Desa::all();
        return view('admin_desa.sub_file_pokja_1.jml_kader', compact('desa'));
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

        return view('admin_desa.form.create_jml_kader', compact('desas'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                // proses penyimpanan untuk tambah data wilayah/desa
                $request->validate([
                    'id_desa' => 'required',
                    'jml_kader_PKBN' => 'required',
                    'jml_kader_PKDRT' => 'required',
                    'jml_kader_pola_asuh' => 'required',

                ], [
                        'id_desa.required' => 'Lengkapi Id Desa',
                        'jml_kader_PKBN.required' => 'Lengkapi Jumlah Kader PKBN',
                        'jml_kader_PKDRT.required' => 'Lengkapi Jumlah Kader PKDRT',
                        'jml_kader_pola_asuh.required' => 'Lengkapi Jumlah Kader Pola Asuh',

                ]);

                // cara 1
                $kader = new JmlKader;
                $kader->id_desa = $request->id_desa;
                $kader->jml_kader_PKBN = $request->jml_kader_PKBN;
                $kader->jml_kader_PKDRT = $request->jml_kader_PKDRT;
                $kader->jml_kader_pola_asuh = $request->jml_kader_pola_asuh;

                $kader->save();


                Alert::success('Berhasil', 'Data berhasil di tambahkan');
                // dd($desa);
                // Data_Desa::create($request->all());
                // return redirect()->route('data_desa.index')
                //                 ->with('success','Student created successfully.');


                return redirect('/jml_kader');

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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}