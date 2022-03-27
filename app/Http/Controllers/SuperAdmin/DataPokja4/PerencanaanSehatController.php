<?php

namespace App\Http\Controllers\AdminDesa\DataPokja4;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Data_Desa;
use App\Models\PerencanaanSehat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerencanaanSehatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //halaman jumlah perencanaan pokja 4
        // nama desa yang login
        // $desa = Data_Desa::all();
        $per = PerencanaanSehat::with('desa')->get();

        return view('admin_desa.sub_file_pokja_4.perencanaan_pokja4', compact('per'));
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

        return view('admin_desa.sub_file_pokja_4.form.create_perencanaan', compact('desas'));

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
            'jml_PUS' => 'required',
            'jml_WUS' => 'required',
            'jml_anggota_akseptor_laki' => 'required',
            'jml_anggota_akseptor_perempuan' => 'required',
            'jml_kk_tabungan' => 'required',

        ], [
            'id_desa.required' => 'Lengkapi Id Desa',
            'jml_PUS.required' => 'Lengkapi Jumlah PUS',
            'jml_WUS.required' => 'Lengkapi Jumlah WUS',
            'jml_anggota_akseptor_laki.required' => 'Lengkapi Jumlah Anggota Akseptor Laki-laki',
            'jml_anggota_akseptor_perempuan.required' => 'Lengkapi Jumlah Anggota Akseptor Perempuan',
            'jml_kk_tabungan.required' => 'Lengkapi Jumlah KK Yang Memiliki Tabungan',

        ]);

        // cara 1
        $pers = new PerencanaanSehat;
        $pers->id_desa = $request->id_desa;
        $pers->jml_PUS = $request->jml_PUS;
        $pers->jml_WUS = $request->jml_WUS;
        $pers->jml_anggota_akseptor_laki = $request->jml_anggota_akseptor_laki;
        $pers->jml_anggota_akseptor_perempuan = $request->jml_anggota_akseptor_perempuan;
        $pers->jml_kk_tabungan = $request->jml_kk_tabungan;

        $pers->save();


        Alert::success('Berhasil', 'Data berhasil di tambahkan');

        return redirect('/perencanaan');

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
    public function edit(PerencanaanSehat $perencanaan)
    {
        //halaman edit data gotong_royong
        $desa = PerencanaanSehat::with('desa')->first();
        $desas = Data_Desa::all();

        return view('admin_desa.sub_file_pokja_4.form.edit_perencanaan', compact('perencanaan','desa','desas'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PerencanaanSehat $perencanaan)
    {
        // proses mengubah untuk tambah data jml _pokja4
        $request->validate([
            'id_desa' => 'required',
            'jml_PUS' => 'required',
            'jml_WUS' => 'required',
            'jml_anggota_akseptor_laki' => 'required',
            'jml_anggota_akseptor_perempuan' => 'required',
            'jml_kk_tabungan' => 'required',

        ]);

        $perencanaan->update($request->all());

        Alert::success('Berhasil', 'Data berhasil di ubah');
        // dd($jml_perencanaan);

        return redirect('/perencanaan');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($perecanaan, PerencanaanSehat $pers)
    {
        //temukan id PerecanaanSehat
        $pers::find($perecanaan)->delete();

        return redirect('/perencanaan')->with('status', 'sukses');


    }

}
