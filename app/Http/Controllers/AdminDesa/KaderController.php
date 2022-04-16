<?php

namespace App\Http\Controllers\AdminDesa;
use App\Http\Controllers\Controller;
use App\Models\Kader;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class KaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //halaman form data akun kader
        $akun=Kader::all();
        return view('admin_desa.data_kader', compact('akun'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // halaman create kader
        $data['user_type'] = ['kader_desa' => 'Kader Desa', 'kader_keluruhan' => 'Kader Kelurahan', 'kader_kecamatan' => 'Kader Kecamatan'];
        return view('admin_desa.form_kader.create_kader', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:data_kader',
            'password' => 'required',
            'user_type' => 'required',
        ]);

        $kader = new Kader();
        $kader->name = $request->name;
        $kader->email = $request->email;
        $kader->password = Hash::make($request->password);
        $kader->user_type = $request->user_type;

        $kader->save();
        Auth::guard('kader')->login($kader);
        Alert::success('Berhasil', 'Data berhasil di tambahkan');

        return redirect('/data_kader');
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
    public function edit(Kader $data_kader)
    {
        //
        $data['user_type'] = ['kader_desa' => 'Kader Desa', 'kader_keluruhan' => 'Kader Kelurahan', 'kader_kecamatan' => 'Kader Kecamatan'];
        return view('admin_desa.form_kader.edit_kader', $data, compact('data_kader'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kader $data_kader)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'user_type' => 'required',

        ]);

        $data_kader->name = $request->name;
        $data_kader->email = $request->email;
        if ($request->password)
            $data_kader->password = Hash::make($request->password);
        $data_kader->user_type = $request->user_type;
        $data_kader->save();
        Alert::success('Berhasil', 'Data berhasil di Ubah');

        return redirect('/data_kader');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($data_kader, Kader $kader)
    {
        //temukan id gotong_royong
        $kader::find($data_kader)->delete();

        return redirect('/data_kader')->with('status', 'sukses');
    }
}