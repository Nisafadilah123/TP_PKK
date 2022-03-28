<?php

namespace App\Http\Controllers\AdminDesa\DataPokja4;
use App\Http\Controllers\Controller;
use App\Models\Data_Desa;
use App\Models\Kesehatan;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KesehatanPosyanduController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //halaman jumlah kesehatan posyandu pokja 4
        // nama desa yang login
        // $desa = Data_Desa::all();
        $kes = Kesehatan::with('desa')
        ->where('id_desa', auth()->user()->id_desa)
        ->get();

        return view('admin_desa.sub_file_pokja_4.kesehatan', compact('kes'));
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

        return view('admin_desa.sub_file_pokja_4.form.create_kesehatan', compact('desas'));

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
            'jml_posyandu' => 'required',
            'jml_posyandu_terintegrasi' => 'required',
            'jml_posyandu_lansia_klp' => 'required',
            'jml_posyandu_lansia_anggota' => 'required',
            'jml_posyandu_lansia_memiliki_kartu' => 'required',
            'periode' => 'required',

        ], [
            'id_desa.required' => 'Lengkapi Id Desa',
            'jml_posyandu.required' => 'Lengkapi Jumlah Posyandu',
            'jml_posyandu_terintegrasi.required' => 'Lengkapi Jumlah Posyandu Terintegrasi',
            'jml_posyandu_lansia_klp.required' => 'Lengkapi Jumlah Posyandu Lansia KLP',
            'jml_posyandu_lansia_anggota.required' => 'Lengkapi Jumlah Posyandu Lansia Anggota',
            'jml_posyandu_lansia_memiliki_kartu.required' => 'Lengkapi Jumlah Posyandu Lansia Memiliki Kartu Berobat Gratis',
            'periode.required' => 'Lengkapi Periode',

        ]);

        // cara 1
        $kes = new Kesehatan;
        $kes->id_desa = $request->id_desa;
        $kes->jml_posyandu = $request->jml_posyandu;
        $kes->jml_posyandu_terintegrasi = $request->jml_posyandu_terintegrasi;
        $kes->jml_posyandu_lansia_klp = $request->jml_posyandu_lansia_klp;
        $kes->jml_posyandu_lansia_anggota = $request->jml_posyandu_lansia_anggota;
        $kes->jml_posyandu_lansia_memiliki_kartu = $request->jml_posyandu_lansia_memiliki_kartu;
        $kes->periode = $request->periode;

        $kes->save();


        Alert::success('Berhasil', 'Data berhasil di tambahkan');

        return redirect('/kesehatan');

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
    public function edit(Kesehatan $kesehatan)
    {
        //halaman edit data gotong_royong
        $desa = Kesehatan::with('desa')->first();
        $desas = Data_Desa::where('id', auth()->user()->id_desa)
        ->get();
        return view('admin_desa.sub_file_pokja_4.form.edit_kesehatan', compact('kesehatan','desa','desas'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kesehatan $kesehatan)
    {
        // proses mengubah untuk tambah data jml _pokja4
        $request->validate([
            'id_desa' => 'required',
            'jml_posyandu' => 'required',
            'jml_posyandu_terintegrasi' => 'required',
            'jml_posyandu_lansia_klp' => 'required',
            'jml_posyandu_lansia_anggota' => 'required',
            'jml_posyandu_lansia_memiliki_kartu' => 'required',
            'periode' => 'required',

        ]);

        $kesehatan->update($request->all());

        Alert::success('Berhasil', 'Data berhasil di ubah');
        // dd($jml_kesehatan);

        return redirect('/kesehatan');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kesehatan, Kesehatan $kes)
    {
        //temukan id kesehatan
        $kes::find($kesehatan)->delete();

        return redirect('/kesehatan')->with('status', 'sukses');


    }

}