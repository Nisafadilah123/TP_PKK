<?php

namespace App\Http\Controllers\AdminDesa\DataUmum;
use App\Http\Controllers\Controller;
use App\Models\Data_Desa;
use App\Models\JumlahKelompok;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class JumlahKelompokUmumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //halaman jumlah kelompok
        // nama desa yang login
        // $desa = Data_Desa::all();
        $jumkel = JumlahKelompok::with('desa')
        ->where('id_desa', auth()->user()->id_desa)
        ->get();

        return view('admin_desa.sub_file_sekretariat.jml_kelompok_umum', compact('jumkel'));
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

        return view('admin_desa.sub_file_sekretariat.form.create_kelompok_umum', compact('desas'));

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
            'jml_pkk_dusun' => 'required',
            'jml_pkk_rw' => 'required',
            'jml_pkk_rt' => 'required',
            'jml_dasawisma' => 'required',
            'periode' => 'required',

        ], [
            'id_desa.required' => 'Lengkapi Id Desa',
            'jml_pkk_dusun.required' => 'Lengkapi Jumlah Kelompok PKK Dusun',
            'jml_pkk_rw.required' => 'Lengkapi Jumlah Kelompok PKK RW',
            'jml_pkk_rt.required' => 'Lengkapi Jumlah Kelompok PKK RT',
            'jml_dasawisma.required' => 'Lengkapi Jumlah Kelompok Dasawisma',
            'periode.required' => 'Lengkapi Periode',

        ]);

        // cara 1
        $jumkel = new JumlahKelompok;
        $jumkel->id_desa = $request->id_desa;
        $jumkel->jml_pkk_dusun = $request->jml_pkk_dusun;
        $jumkel->jml_pkk_rw = $request->jml_pkk_rw;
        $jumkel->jml_pkk_rt = $request->jml_pkk_rt;
        $jumkel->jml_dasawisma = $request->jml_dasawisma;
        $jumkel->periode = $request->periode;

        $jumkel->save();


        Alert::success('Berhasil', 'Data berhasil di tambahkan');

        return redirect('/kelompok');

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
    public function edit(JumlahKelompok $kelompok)
    {
        //halaman edit data gotong_royong
        $desa = JumlahKelompok::with('desa')->first();
        $desas = Data_Desa::where('id', auth()->user()->id_desa)
            ->get();

        return view('admin_desa.sub_file_sekretariat.form.edit_kelompok_umum', compact('kelompok','desa','desas'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JumlahKelompok $kelompok)
    {
        // proses mengubah untuk tambah data jml kelompok
        $request->validate([
            'id_desa' => 'required',
            'jml_pkk_dusun' => 'required',
            'jml_pkk_rw' => 'required',
            'jml_pkk_rt' => 'required',
            'jml_dasawisma' => 'required',
            'periode' => 'required',

        ]);

        $kelompok->update($request->all());

        Alert::success('Berhasil', 'Data berhasil di ubah');
        // dd($jml_kelompok);

        return redirect('/kelompok');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kelompok, JumlahKelompok $jumkel)
    {
        //temukan id kelompok
        $jumkel::find($kelompok)->delete();

        return redirect('/kelompok')->with('status', 'sukses');


    }
}