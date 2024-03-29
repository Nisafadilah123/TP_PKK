<?php

namespace App\Http\Controllers\SuperAdmin\DataUmum;
use App\Http\Controllers\Controller;
use App\Models\Data_Desa;
use App\Models\JumlahDataUmum;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class JumlahDataUmumSuperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //halaman jumlah kelompok data umum
        // nama desa yang login
        // $desa = Data_Desa::all();
        $jumumsup = JumlahDataUmum::with('desa')->get();

        return view('super_admin.sub_file_sekretariat.jml_data_umum_super', compact('jumumsup'));
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

        return view('super_admin.sub_file_sekretariat.form.create_jumlah_data_umum_super', compact('desas'));

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
            'jml_krt_data_umum' => 'required',
            'jml_kk_data_umum' => 'required',
            'periode' => 'required',
        ], [
            'id_desa.required' => 'Lengkapi Id Desa',
            'jml_krt_data_umum.required' => 'Lengkapi Jumlah KRT Data Umum',
            'jml_kk_data_umum.required' => 'Lengkapi Jumlah KK Data Umum',
            'periode.required' => 'Lengkapi Periode',
        ]);
        $insert=DB::table('jumlah_data_umum')->where('id_desa', $request->id_desa)->where('periode', $request->periode)->first();
        if ( !empty($insert)) {
            Alert::error('Gagal', 'Data Tidak Berhasil Di Tambahkan, Hanya Bisa Menginputkan Satu kali Data Desa Per Periode. Periode Desa Sudah Ada ');

            return redirect('/jml_data_umum_super');
        }
        else {
        // cara 1
            $jumums = new JumlahDataUmum;
            $jumums->id_desa = $request->id_desa;
            $jumums->jml_krt_data_umum = $request->jml_krt_data_umum;
            $jumums->jml_kk_data_umum = $request->jml_kk_data_umum;
            $jumums->periode = $request->periode;

            $jumums->save();

            Alert::success('Berhasil', 'Data berhasil di tambahkan');

            return redirect('/jml_data_umum_super');
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
    public function edit(JumlahDataUmum $jml_data_umum_super)
    {
        //halaman edit data gotong_royong
        $desa = JumlahDataUmum::with('desa')->first();
        $desas = Data_Desa::all();

        return view('super_admin.sub_file_sekretariat.form.edit_jumlah_data_umum_super', compact('jml_data_umum_super','desa','desas'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JumlahDataUmum $jml_data_umum_super)
    {
        // proses mengubah untuk tambah data jml jml_data_umum
        $request->validate([
            'id_desa' => 'required',
            'jml_krt_data_umum' => 'required',
            'jml_kk_data_umum' => 'required',
            'periode' => 'required',

        ]);
        $update=DB::table('jumlah_data_umum')->where('id_desa', $request->id_desa)->where('periode', $request->periode)->first();
        if ( !empty($update)) {
            Alert::error('Gagal', 'Data Tidak Berhasil Di Ubah, Hanya Bisa Menginputkan Satu kali Data Desa Per Periode. Periode Desa Sudah Ada ');

            return redirect('/jml_data_umum_super');
        }
        else {
            $jml_data_umum_super->update($request->all());

            Alert::success('Berhasil', 'Data berhasil di ubah');
            // dd($jml_jml_data_umum);

            return redirect('/jml_data_umum_super');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($jml_data_umum_super, JumlahDataUmum $jumums)
    {
        //temukan id jml_data_umum
        $jumums::find($jml_data_umum_super)->delete();

        return redirect('/jml_data_umum_super')->with('status', 'sukses');


    }}
