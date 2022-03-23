<?php

namespace App\Http\Controllers\admin_desa\data_pokja1;
use App\Http\Controllers\Controller;
use App\Models\GotongRoyong;
use App\Models\Data_Desa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class GotongRoyongPokja1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //halaman penghayatan pokja 1
        // nama desa yang login
        // $desa = Data_Desa::all();
        $gotong = GotongRoyong::with('desa')->get();

        return view('admin_desa.sub_file_pokja_1.gotong_royong', compact('gotong'));
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

        return view('admin_desa.sub_file_pokja_1.form.create_gotong_royong', compact('desas'));

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
            'jml_gotong_kerja_bakti' => 'required',
            'jml_gotong_rukun_kebaktian' => 'required',
            'jml_gotong_keagamaan' => 'required',
            'jml_gotong_jimpitan' => 'required',
            'jml_gotong_arisan' => 'required',

        ], [
            'id_desa.required' => 'Lengkapi Id Desa',
            'jml_gotong_kerja_bakti.required' => 'Lengkapi Jumlah Kerja Bakti',
            'jml_gotong_rukun_kebaktian.required' => 'Lengkapi Jumlah Rukun Kebaktian',
            'jml_gotong_keagamaan.required' => 'Lengkapi Jumlah Keagamaan',
            'jml_gotong_jimpitan.required' => 'Lengkapi Jumlah Jimpitan',
            'jml_gotong_arisan.required' => 'Lengkapi Jumlah Arisan',

        ]);

        // cara 1
        $gotongs = new GotongRoyong;
        $gotongs->id_desa = $request->id_desa;
        $gotongs->jml_gotong_kerja_bakti = $request->jml_gotong_kerja_bakti;
        $gotongs->jml_gotong_rukun_kebaktian = $request->jml_gotong_rukun_kebaktian;
        $gotongs->jml_gotong_keagamaan = $request->jml_gotong_keagamaan;
        $gotongs->jml_gotong_jimpitan = $request->jml_gotong_jimpitan;
        $gotongs->jml_gotong_arisan = $request->jml_gotong_arisan;

        $gotongs->save();


        Alert::success('Berhasil', 'Data berhasil di tambahkan');

        return redirect('/gotong_royong');

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
    public function edit(GotongRoyong $gotong_royong)
    {
        //halaman edit data gotong_royong
        $desa = GotongRoyong::with('desa')->first();
        $desas = Data_Desa::all();

        return view('admin_desa.sub_file_pokja_1.form.edit_gotong_royong', compact('gotong_royong','desa','desas'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GotongRoyong $gotong_royong)
    {
        // proses mengubah untuk tambah data jml kader
        $request->validate([
            'id_desa' => 'required',
            'jml_gotong_kerja_bakti' => 'required',
            'jml_gotong_rukun_kebaktian' => 'required',
            'jml_gotong_keagamaan' => 'required',
            'jml_gotong_jimpitan' => 'required',
            'jml_gotong_arisan' => 'required',


        ]);

        $gotong_royong->update($request->all());

        Alert::success('Berhasil', 'Data berhasil di ubah');
        // dd($jml_kader);

        return redirect('/gotong_royong');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($gotong_royong, GotongRoyong $gotong)
    {
        //temukan id gotong_royong
        $gotong::find($gotong_royong)->delete();

        return redirect('/gotong_royong')->with('status', 'sukses');

    }
}