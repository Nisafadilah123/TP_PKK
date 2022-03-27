<?php

namespace App\Http\Controllers\SuperAdmin\DataPokja1;
use App\Http\Controllers\Controller;
use App\Models\Data_Desa;
use App\Models\JmlKader;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class JumlahKaderPokja1SuperController extends Controller
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
        // $desa = Data_Desa::all();
        $kadersup = JmlKader::with('desa')
            ->get();

        // dd($kader);
        return view('admin_desa.sub_file_pokja_1.jml_kader_super', compact('kadersup'));
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
            ->get();

        return view('admin_desa.sub_file_pokja_1.form.create_jml_kader_super', compact('desas'));

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

        return redirect('/jml_kader_super');

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
    public function edit(JmlKader $jml_kader)
    {
        //halaman edit data jml_kader
        $desa = JmlKader::with('desa')->first();
        $desas = Data_Desa::where('id', auth()->user()->id_desa)
            ->get();

        return view('admin_desa.sub_file_pokja_1.form.edit_jml_kader_super', compact('jml_kader','desa','desas'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JmlKader $jml_kader)
    {
        // proses mengubah untuk tambah data jml kader
        $request->validate([
            'id_desa' => 'required',
            'jml_kader_PKBN' => 'required',
            'jml_kader_PKDRT' => 'required',
            'jml_kader_pola_asuh' => 'required',


        ]);

        $jml_kader->update($request->all());

        Alert::success('Berhasil', 'Data berhasil di ubah');
        // dd($jml_kader);

        return redirect('/jml_kader_super');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($jml_kader, JmlKader $kaders)
    {
        //temukan id jml_kader
        $kaders::find($jml_kader)->delete();

        return redirect('/jml_kader_super')->with('status', 'sukses');

    }
}