<?php

namespace App\Http\Controllers\AdminDesa\DataUmum;
use App\Http\Controllers\Controller;
use App\Models\Data_Desa;
use App\Models\JumlahTenagaSekretariatDataUmum;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class JumlahTenagaSekretariatDataUmumController extends Controller
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
        $jumten = JumlahTenagaSekretariatDataUmum::with('desa')
        ->where('id_desa', auth()->user()->id_desa)
        ->get();

        return view('admin_desa.sub_file_sekretariat.jml_tenaga_data_umum', compact('jumten'));
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

        return view('admin_desa.sub_file_sekretariat.form.create_jumlah_tenaga_data_umum', compact('desas'));

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
            'periode.required' => 'Lengkapi Periode',

        ]);

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

        return redirect('/jml_tenaga_umum');

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
    public function edit(JumlahTenagaSekretariatDataUmum $jml_tenaga_umum)
    {
        //halaman edit data gotong_royong
        $desa = JumlahTenagaSekretariatDataUmum::with('desa')->first();
        $desas = Data_Desa::where('id', auth()->user()->id_desa)
            ->get();

        return view('admin_desa.sub_file_sekretariat.form.edit_jumlah_tenaga_data_umum', compact('jml_tenaga_umum','desa','desas'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JumlahTenagaSekretariatDataUmum $jml_tenaga_umum)
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

        $jml_tenaga_umum->update($request->all());

        Alert::success('Berhasil', 'Data berhasil di ubah');
        // dd($jml_kader_pokja4);

        return redirect('/jml_tenaga_umum');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($jml_tenaga_umum, JumlahTenagaSekretariatDataUmum $jumtens)
    {
        //temukan id jml_tenaga_umum
        $jumtens::find($jml_tenaga_umum)->delete();

        return redirect('/jml_tenaga_umum')->with('status', 'sukses');


    }
}