<?php

namespace App\Http\Controllers\admin_desa;
use App\Http\Controllers\Controller;
use App\Models\Data_Desa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class dataDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // halaman data wilayah
        $desa = Data_Desa::all();

        return view('admin_desa.data_wilayah', compact('desa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // halaman tambah data desa
        return view('admin_desa.form.create_desa');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // proses penyimpanan untuk tambah data wilayah/desa
        $request->validate([
            'kode_desa' => 'required',
            'nama_desa' => 'required',

        ], [
                'kode_desa.required' => 'Lengkapi Nama Institusi/Universitas Anda',
                'nama_desa.required' => 'Lengkapi Tanggal Wisuda Anda',

        ]);

        // cara 1
        $desa = new Data_Desa;
        $desa->kode_desa = $request->kode_desa;
        $desa->nama_desa = $request->nama_desa;
        // $education->user_id = Auth::user()->id;
        $desa->save();


        Alert::success('Berhasil', 'Data berhasil di tambahkan');
        // dd($desa);
        // Data_Desa::create($request->all());
        // return redirect()->route('data_desa.index')
        //                 ->with('success','Student created successfully.');


        return redirect('/data_desa');


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
    public function edit(Data_Desa $data_desa)
    {
        // halaman tambah data desa
        // dd($desa);
        return view('admin_desa.form.edit_desa', compact('data_desa'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Data_Desa $data_desa)
    {
        //
        $request->validate([
            'kode_desa' => 'required',
            'nama_desa' => 'required',
        ]);

        $data_desa->update($request->all());
        Alert::success('Berhasil', 'Data berhasil di ubah');

        return redirect('/data_desa');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($data_desa, Data_Desa $desa)
    {
        //
        $desa::find($data_desa)->delete();
        // $data_desa->delete();

        return redirect('/data_desa')->with('status', 'sukses');

    }
}