<?php

namespace App\Http\Controllers\SuperAdmin\DataPokja4;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Data_Desa;
use App\Models\Kelestarian;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class KelestarianLingkunganHidupSuperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //halaman jumlah Kelestarian pokja 4
        // nama desa yang login
        // $desa = Data_Desa::all();
        $kelsup = Kelestarian::with('desa')->get();

        return view('admin_desa.sub_file_pokja_4.kelestarian_super', compact('kelsup'));
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

        return view('admin_desa.sub_file_pokja_4.form.create_kelestarian_super', compact('desas'));

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
            'jml_rumah_jamban' => 'required',
            'jml_rumah_spal' => 'required',
            'jml_rumah_tempat_sampah' => 'required',
            'jml_mck' => 'required',
            'jml_krt_pdam' => 'required',
            'jml_krt_sumur' => 'required',
            'jml_krt_lain' => 'required',

        ], [
            'id_desa.required' => 'Lengkapi Id Desa',
            'jml_rumah_jamban.required' => 'Lengkapi Jumlah Rumah Yang Memiliki Jamban',
            'jml_rumah_spal.required' => 'Lengkapi Jumlah Rumah Yang Memiliki SPAL Terintegrasi',
            'jml_rumah_tempat_sampah.required' => 'Lengkapi Jumlah Rumah Yang Memiliki Tempat Pembuangan Sampah',
            'jml_mck.required' => 'Lengkapi Jumlah Rumah Yang Memiliki MCK',
            'jml_krt_pdam.required' => 'Lengkapi Jumlah KRT Yang Menggunakan Air PDAM',
            'jml_krt_sumur.required' => 'Lengkapi Jumlah KRT Yang Menggunakan Air Sumur',
            'jml_krt_lain.required' => 'Lengkapi Jumlah KRT Yang Menggunakan Air Lain-lain',

        ]);

        // cara 1
        $kels = new Kelestarian;
        $kels->id_desa = $request->id_desa;
        $kels->jml_rumah_jamban = $request->jml_rumah_jamban;
        $kels->jml_rumah_spal = $request->jml_rumah_spal;
        $kels->jml_rumah_tempat_sampah = $request->jml_rumah_tempat_sampah;
        $kels->jml_mck = $request->jml_mck;
        $kels->jml_krt_pdam = $request->jml_krt_pdam;
        $kels->jml_krt_sumur = $request->jml_krt_sumur;
        $kels->jml_krt_lain = $request->jml_krt_lain;

        $kels->save();


        Alert::success('Berhasil', 'Data berhasil di tambahkan');

        return redirect('/kelestarian_super');

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
    public function edit(Kelestarian $kelestarian_super)
    {
        //halaman edit data gotong_royong
        $desa = Kelestarian::with('desa')->first();
        $desas = Data_Desa::all();

        return view('admin_desa.sub_file_pokja_4.form.edit_kelestarian_super', compact('kelestarian_super','desa','desas'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelestarian $kelestarian_super)
    {
        // proses mengubah untuk tambah data jml _pokja4
        $request->validate([
            'id_desa' => 'required',
            'jml_rumah_jamban' => 'required',
            'jml_rumah_spal' => 'required',
            'jml_rumah_tempat_sampah' => 'required',
            'jml_mck' => 'required',
            'jml_krt_pdam' => 'required',
            'jml_krt_sumur' => 'required',
            'jml_krt_lain' => 'required',

        ]);

        $kelestarian_super->update($request->all());

        Alert::success('Berhasil', 'Data berhasil di ubah');
        // dd($jml_kelestarian);

        return redirect('/kelestarian_super');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kelestarian_super, Kelestarian $kels)
    {
        //temukan id kelestarian
        $kels::find($kelestarian_super)->delete();

        return redirect('/kelestarian_super')->with('status', 'sukses');


    }
}
