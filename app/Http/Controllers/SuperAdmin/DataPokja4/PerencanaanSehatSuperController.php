<?php

namespace App\Http\Controllers\SuperAdmin\DataPokja4;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Data_Desa;
use App\Models\PerencanaanSehat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerencanaanSehatSuperController extends Controller
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
        $persup = PerencanaanSehat::with('desa')->get();

        return view('super_admin.sub_file_pokja_4.perencanaan_pokja4_super', compact('persup'));
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

        return view('super_admin.sub_file_pokja_4.form.create_perencanaan_super', compact('desas'));

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
            'periode' => 'required',

        ], [
            'id_desa.required' => 'Lengkapi Id Desa',
            'jml_PUS.required' => 'Lengkapi Jumlah PUS',
            'jml_WUS.required' => 'Lengkapi Jumlah WUS',
            'jml_anggota_akseptor_laki.required' => 'Lengkapi Jumlah Anggota Akseptor Laki-laki',
            'jml_anggota_akseptor_perempuan.required' => 'Lengkapi Jumlah Anggota Akseptor Perempuan',
            'jml_kk_tabungan.required' => 'Lengkapi Jumlah KK Yang Memiliki Tabungan',
            'periode.required' => 'Lengkapi Periode',

        ]);
        $insert=DB::table('perencanaan')->where('id_desa', $request->id_desa)->where('periode', $request->periode)->first();
        if ( !empty($insert)) {
            Alert::error('Gagal', 'Data Tidak Berhasil Di Tambahkan, Hanya Bisa Menginputkan Satu kali Data Desa Per Periode. Periode Desa Sudah Ada ');

            return redirect('/perencanaan_super');
        }
        else {
            // cara 1
            $pers = new PerencanaanSehat;
            $pers->id_desa = $request->id_desa;
            $pers->jml_PUS = $request->jml_PUS;
            $pers->jml_WUS = $request->jml_WUS;
            $pers->jml_anggota_akseptor_laki = $request->jml_anggota_akseptor_laki;
            $pers->jml_anggota_akseptor_perempuan = $request->jml_anggota_akseptor_perempuan;
            $pers->jml_kk_tabungan = $request->jml_kk_tabungan;
            $pers->periode = $request->periode;

            $pers->save();

            Alert::success('Berhasil', 'Data berhasil di tambahkan');

            return redirect('/perencanaan_super');
        }
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
    public function edit(PerencanaanSehat $perencanaan_super)
    {
        //halaman edit data gotong_royong
        $desa = PerencanaanSehat::with('desa')->first();
        $desas = Data_Desa::all();

        return view('super_admin.sub_file_pokja_4.form.edit_perencanaan_super', compact('perencanaan_super','desa','desas'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PerencanaanSehat $perencanaan_super)
    {
        // proses mengubah untuk tambah data jml _pokja4
        $request->validate([
            'id_desa' => 'required',
            'jml_PUS' => 'required',
            'jml_WUS' => 'required',
            'jml_anggota_akseptor_laki' => 'required',
            'jml_anggota_akseptor_perempuan' => 'required',
            'jml_kk_tabungan' => 'required',
            'periode' => 'required',
        ]);
        $update=DB::table('perencanaan')->where('id_desa', $request->id_desa)->where('periode', $request->periode)->first();
        if ( !empty($update)) {
            Alert::error('Gagal', 'Data Tidak Berhasil Di Ubah, Hanya Bisa Menginputkan Satu kali Data Desa Per Periode. Periode Desa Sudah Ada ');

            return redirect('/perencanaan_super');
        }
        else {
            $perencanaan_super->update($request->all());

            Alert::success('Berhasil', 'Data berhasil di ubah');
            // dd($jml_perencanaan);

            return redirect('/perencanaan_super');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($perencanaan_super, PerencanaanSehat $pers)
    {
        //temukan id PerecanaanSehat
        $pers::find($perencanaan_super)->delete();

        return redirect('/perencanaan_super')->with('status', 'sukses');


    }

}
