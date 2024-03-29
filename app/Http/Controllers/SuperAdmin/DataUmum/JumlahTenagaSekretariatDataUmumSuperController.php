<?php

namespace App\Http\Controllers\SuperAdmin\DataUmum;
use App\Http\Controllers\Controller;
use App\Models\Data_Desa;
use App\Models\JumlahTenagaSekretariatDataUmum;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class JumlahTenagaSekretariatDataUmumSuperController extends Controller
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
        $jumtensup = JumlahTenagaSekretariatDataUmum::with('desa')->get();

        return view('super_admin.sub_file_sekretariat.jml_tenaga_data_umum_super', compact('jumtensup'));
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

        return view('super_admin.sub_file_sekretariat.form.create_jumlah_tenaga_data_umum_super', compact('desas'));

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
            'jml_tenaga_honorer_laki' => 'required',
            'jml_tenaga_honorer_perempuan' => 'required',
            'jml_tenaga_bantuan_laki' => 'required',
            'jml_tenaga_bantuan_perempuan' => 'required',
            'periode' => 'required',

        ], [
            'id_desa.required' => 'Lengkapi Id Desa',
            'jml_tenaga_honorer_laki.required' => 'Lengkapi Jumlah Tenaga Sekretariat Honorer Laki-laki',
            'jml_tenaga_honorer_perempuan.required' => 'Lengkapi Jumlah Tenaga Sekretariat Honorer Perempuan',
            'jml_tenaga_bantuan_laki.required' => 'Lengkapi Jumlah Tenaga Sekretariat Bantuan Laki-laki',
            'jml_tenaga_bantuan_perempuan.required' => 'Lengkapi Jumlah Tenaga Sekretariat Bantuan Perempuan',
            'periode' => 'Lengkapi Periode',

        ]);
        $insert=DB::table('jumlah_tenaga_sekretariat_data_umum')->where('id_desa', $request->id_desa)->where('periode', $request->periode)->first();
        if ( !empty($insert)) {
            Alert::error('Gagal', 'Data Tidak Berhasil Di Tambahkan, Hanya Bisa Menginputkan Satu kali Data Desa Per Periode. Periode Desa Sudah Ada ');

            return redirect('/jml_tenaga_umum_super');
        }
        else {
            // cara 1
            $jumtens = new JumlahTenagaSekretariatDataUmum;
            $jumtens->id_desa = $request->id_desa;
            $jumtens->jml_tenaga_honorer_laki = $request->jml_tenaga_honorer_laki;
            $jumtens->jml_tenaga_honorer_perempuan = $request->jml_tenaga_honorer_perempuan;
            $jumtens->jml_tenaga_bantuan_laki = $request->jml_tenaga_bantuan_laki;
            $jumtens->jml_tenaga_bantuan_perempuan = $request->jml_tenaga_bantuan_perempuan;
            $jumtens->periode = $request->periode;

            $jumtens->save();

            Alert::success('Berhasil', 'Data berhasil di tambahkan');

            return redirect('/jml_tenaga_umum_super');
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
    public function edit(JumlahTenagaSekretariatDataUmum $jml_tenaga_umum_super)
    {
        //halaman edit data gotong_royong
        $desa = JumlahTenagaSekretariatDataUmum::with('desa')->first();
        $desas = Data_Desa::all();

        return view('super_admin.sub_file_sekretariat.form.edit_jumlah_tenaga_data_umum_super', compact('jml_tenaga_umum','desa','desas'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JumlahTenagaSekretariatDataUmum $jml_tenaga_umum_super)
    {
        // proses mengubah untuk tambah data jml jml_tenaga_umum
        $request->validate([
            'id_desa' => 'required',
            'jml_tenaga_honorer_laki' => 'required',
            'jml_tenaga_honorer_perempuan' => 'required',
            'jml_tenaga_bantuan_laki' => 'required',
            'jml_tenaga_bantuan_perempuan' => 'required',
            'periode' => 'required',
        ]);
        $update=DB::table('jumlah_tenaga_sekretariat_data_umum')->where('id_desa', $request->id_desa)->where('periode', $request->periode)->first();
        if ( !empty($update)) {
            Alert::error('Gagal', 'Data Tidak Berhasil Di Ubah, Hanya Bisa Menginputkan Satu kali Data Desa Per Periode. Periode Desa Sudah Ada ');

            return redirect('/jml_tenaga_umum_super');
        }
        else {
            $jml_tenaga_umum_super->update($request->all());

            Alert::success('Berhasil', 'Data berhasil di ubah');
            // dd($jml_kader_pokja4);

            return redirect('/jml_tenaga_umum_super');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($jml_tenaga_umum_super, JumlahTenagaSekretariatDataUmum $jumtens)
    {
        //temukan id jml_tenaga_umum
        $jumtens::find($jml_tenaga_umum_super)->delete();

        return redirect('/jml_tenaga_umum_super')->with('status', 'sukses');


    }
}