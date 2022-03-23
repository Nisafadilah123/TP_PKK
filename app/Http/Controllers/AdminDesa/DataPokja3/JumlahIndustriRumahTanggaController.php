<?php

namespace App\Http\Controllers\AdminDesa\DataPokja3;
use App\Http\Controllers\Controller;
use App\Models\Data_Desa;
use App\Models\JumlahIndustri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class JumlahIndustriRumahTanggaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //halaman industri pokja 3
        // nama desa yang login
        // $desa = Data_Desa::all();
        $ind = JumlahIndustri::with('desa')->get();

        return view('admin_desa.sub_file_pokja_3.industri', compact('ind'));
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

        return view('admin_desa.sub_file_pokja_3.form.create_industri', compact('desas'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // proses penyimpanan untuk tambah data jml industri
        $request->validate([
            'id_desa' => 'required',
            'jml_industri_pangan' => 'required',
            'jml_industri_sandang' => 'required',
            'jml_industri_jasa' => 'required',

        ], [
            'id_desa.required' => 'Lengkapi Id Desa',
            'jml_industri_pangan.required' => 'Lengkapi Jumlah Industri Pangan',
            'jml_industri_sandang.required' => 'Lengkapi Jumlah Industri Sandang',
            'jml_industri_jasa.required' => 'Lengkapi Jumlah Industri Jasa',

        ]);

        // cara 1
        $inds = new JumlahIndustri;
        $inds->id_desa = $request->id_desa;
        $inds->jml_industri_pangan = $request->jml_industri_pangan;
        $inds->jml_industri_sandang = $request->jml_industri_sandang;
        $inds->jml_industri_jasa = $request->jml_industri_jasa;

        $inds->save();


        Alert::success('Berhasil', 'Data berhasil di tambahkan');

        return redirect('/industri');

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
    public function edit(JumlahIndustri $industri)
    {
        //halaman edit data gotong_royong
        $desa = JumlahIndustri::with('desa')->first();
        $desas = Data_Desa::all();

        return view('admin_desa.sub_file_pokja_3.form.edit_industri', compact('industri','desa','desas'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JumlahIndustri $industri)
    {
        // proses mengubah untuk tambah data jml kader
        $request->validate([
            'id_desa' => 'required',
            'jml_industri_pangan' => 'required',
            'jml_industri_sandang' => 'required',
            'jml_industri_jasa' => 'required',


        ]);

        $industri->update($request->all());

        Alert::success('Berhasil', 'Data berhasil di ubah');
        // dd($jml_kader);

        return redirect('/industri');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($industri, JumlahIndustri $indu)
    {
        //temukan id industri
        $indu::find($industri)->delete();

        return redirect('/industri')->with('status', 'sukses');


    }}