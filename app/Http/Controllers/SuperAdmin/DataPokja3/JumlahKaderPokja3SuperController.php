<?php

namespace App\Http\Controllers\SuperAdmin\DataPokja3;
use App\Http\Controllers\Controller;
use App\Models\Data_Desa;
use App\Models\JumlahKaderPokja3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class JumlahKaderPokja3SuperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //halaman jumlah kader pokja 3
        // nama desa yang login
        // $desa = Data_Desa::all();
        $kadsup = JumlahKaderPokja3::with('desa')->get();

        return view('admin_desa.sub_file_pokja_3.kader_super', compact('kadsup'));
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

        return view('admin_desa.sub_file_pokja_3.form.create_kader_super', compact('desas'));

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
            'jml_kader_pangan' => 'required',
            'jml_kader_sandang' => 'required',
            'jml_kader_tata_laksana' => 'required',
            'periode' => 'required',
        ], [
            'id_desa.required' => 'Lengkapi Id Desa',
            'jml_kader_pangan.required' => 'Lengkapi Jumlah kader Pangan',
            'jml_kader_sandang.required' => 'Lengkapi Jumlah kader Sandang',
            'jml_kader_tata_laksana.required' => 'Lengkapi Jumlah kader Tata Laksana',
            'periode.required' => 'Lengkapi Periode',
        ]);
        $insert=DB::table('jumlah_kader_pokja3')->where('id_desa', $request->id_desa)->where('periode', $request->periode)->first();
        if ( !empty($insert)) {
            Alert::error('Gagal', 'Data Tidak Berhasil Di Tambahkan, Hanya Bisa Menginputkan Satu kali Data Desa Per Periode. Periode Desa Sudah Ada ');

            return redirect('/kader_super');
        }
        else {
            // cara 1
            $kads = new JumlahKaderPokja3;
            $kads->id_desa = $request->id_desa;
            $kads->jml_kader_pangan = $request->jml_kader_pangan;
            $kads->jml_kader_sandang = $request->jml_kader_sandang;
            $kads->jml_kader_tata_laksana = $request->jml_kader_tata_laksana;
            $kads->periode = $request->periode;

            $kads->save();

            Alert::success('Berhasil', 'Data berhasil di tambahkan');

            return redirect('/kader_super');
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
    public function edit(JumlahKaderPokja3 $kader_super)
    {
        //halaman edit data gotong_royong
        $desa = JumlahKaderPokja3::with('desa')->first();
        $desas = Data_Desa::all();

        return view('admin_desa.sub_file_pokja_3.form.edit_kader_super', compact('kader_super','desa','desas'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JumlahKaderPokja3 $kader_super)
    {
        // proses mengubah untuk tambah data jml kader
        $request->validate([
            'id_desa' => 'required',
            'jml_kader_pangan' => 'required',
            'jml_kader_sandang' => 'required',
            'jml_kader_tata_laksana' => 'required',
            'periode' => 'required',
        ]);
        $update=DB::table('jumlah_kader_pokja3')->where('id_desa', $request->id_desa)->where('periode', $request->periode)->first();
        if ( !empty($update)) {
            Alert::error('Gagal', 'Data Tidak Berhasil Di Ubah, Hanya Bisa Menginputkan Satu kali Data Desa Per Periode. Periode Desa Sudah Ada ');

            return redirect('/kader_super');
        }
        else {
            $kader_super->update($request->all());

            Alert::success('Berhasil', 'Data berhasil di ubah');
            // dd($jml_kader);

            return redirect('/kader_super');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kader_super, JumlahKaderPokja3 $kaders)
    {
        //temukan id kader
        $kaders::find($kader_super)->delete();

        return redirect('/kader_super')->with('status', 'sukses');


    }
}