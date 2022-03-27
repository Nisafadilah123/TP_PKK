<?php

namespace App\Http\Controllers\AdminDesa\DataPokja3;
use App\Http\Controllers\Controller;
use App\Models\Data_Desa;
use App\Models\Pangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //halaman jumlah pangan pokja 3
        // nama desa yang login
        // $desa = Data_Desa::all();
        $pang = Pangan::with('desa')->get();
        // dd($pang);
        return view('admin_desa.sub_file_pokja_3.pangan', compact('pang'));
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

        return view('admin_desa.sub_file_pokja_3.form.create_pangan', compact('desas'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // proses penyimpanan untuk tambah data jml pangan
        $request->validate([
            'id_desa' => 'required',
            'jml_makanan_beras' => 'required',
            'jml_makanan_nonberas' => 'required',
            'jml_pemanfaatan_peternakan' => 'required',
            'jml_pemanfaatan_perikanan' => 'required',
            'jml_pemanfaatan_warung_hidup' => 'required',
            'jml_pemanfaatan_limbung_hidup' => 'required',
            'jml_pemanfaatan_toga' => 'required',
            'jml_pemanfaatan_tanaman_keras' => 'required',
            'periode' => 'required',

        ], [
            'id_desa.required' => 'Lengkapi Id Desa',
            'jml_makanan_beras.required' => 'Lengkapi Jumlah Pangan Makanan Beras',
            'jml_makanan_nonberas.required' => 'Lengkapi Jumlah Pangan Makanan Non Beras',
            'jml_pemanfaatan_peternakan.required' => 'Lengkapi Jumlah Pangan Pemanfaatan Peternakan',
            'jml_pemanfaatan_perikanan.required' => 'Lengkapi Jumlah Pangan Pemanfaatan Perikanan',
            'jml_pemanfaatan_warung_hidup.required' => 'Lengkapi Jumlah Pangan Pemanfaatan Warung Hidup',
            'jml_pemanfaatan_limbung_hidup.required' => 'Lengkapi Jumlah Pangan Pemanfaatan Limbung Hidup',
            'jml_pemanfaatan_toga.required' => 'Lengkapi Jumlah Pangan Pemanfaatan TOGA',
            'jml_pemanfaatan_tanaman_keras.required' => 'Lengkapi Jumlah Pangan Pemanfaatan Tanaman Keras',
            'periode.required' => 'Lengkapi Periode',

        ]);

        // cara 1
        $kads = new Pangan;
        $kads->id_desa = $request->id_desa;
        $kads->jml_makanan_beras = $request->jml_makanan_beras;
        $kads->jml_makanan_nonberas = $request->jml_makanan_nonberas;
        $kads->jml_pemanfaatan_peternakan = $request->jml_pemanfaatan_peternakan;
        $kads->jml_pemanfaatan_perikanan = $request->jml_pemanfaatan_perikanan;
        $kads->jml_pemanfaatan_warung_hidup = $request->jml_pemanfaatan_warung_hidup;
        $kads->jml_pemanfaatan_limbung_hidup = $request->jml_pemanfaatan_limbung_hidup;
        $kads->jml_pemanfaatan_toga = $request->jml_pemanfaatan_toga;
        $kads->jml_pemanfaatan_tanaman_keras = $request->jml_pemanfaatan_tanaman_keras;
        $kads->periode = $request->periode;

        $kads->save();


        Alert::success('Berhasil', 'Data berhasil di tambahkan');

        return redirect('/pangan');

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
    public function edit(Pangan $pangan)
    {
        //halaman edit data gotong_royong
        $desa = Pangan::with('desa')->first();
        $desas = Data_Desa::all();

        return view('admin_desa.sub_file_pokja_3.form.edit_pangan', compact('pangan','desa','desas'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pangan $pangan)
    {
        // proses mengubah untuk tambah data jml pangan
        $request->validate([
            'id_desa' => 'required',
            'jml_makanan_beras' => 'required',
            'jml_makanan_nonberas' => 'required',
            'jml_pemanfaatan_peternakan' => 'required',
            'jml_pemanfaatan_perikanan' => 'required',
            'jml_pemanfaatan_warung_hidup' => 'required',
            'jml_pemanfaatan_limbung_hidup' => 'required',
            'jml_pemanfaatan_toga' => 'required',
            'jml_pemanfaatan_tanaman_keras' => 'required',
            'periode' => 'required',


        ]);

        $pangan->update($request->all());

        Alert::success('Berhasil', 'Data berhasil di ubah');
        // dd($jml_pangan);

        return redirect('/pangan');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($pangan, Pangan $pangans)
    {
        //temukan id pangan
        $pangans::find($pangan)->delete();

        return redirect('/pangan')->with('status', 'sukses');


    }
}