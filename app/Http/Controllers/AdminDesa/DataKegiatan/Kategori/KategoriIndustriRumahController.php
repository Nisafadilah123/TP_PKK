<?php

namespace App\Http\Controllers\AdminDesa\DataKegiatan\Kategori;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

use App\Models\KategoriIndustriRumah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriIndustriRumahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     // halaman data kategori industri rumah tangga
     $kategori = KategoriIndustriRumah::all();
     return view('admin_desa.data_kegiatan.kategori.kategori_industri_rumah', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        // halaman form tambah kategori industri rumah tangga

        $kat = KategoriIndustriRumah::all();

        return view('admin_desa.data_kegiatan.kategori.form.create_kategori_industri_rumah', compact('kat'));

    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        // proses penyimpanan untuk tambah data kategori industri rumah tangga
        // dd($request->all());
        // validasi data
        $request->validate([
            'nama_kategori' => 'required',

        ], [
            'nama_kategori.required' => 'Lengkapi Id Desa',

        ]);

        // pengkondisian tabel
        $insert=DB::table('kategori_industri_rumah')->where('nama_kategori', $request->nama_kategori)->first();
        if ($insert != null) {
            Alert::error('Gagal', 'Data Tidak Berhasil Di Tambah. Warga TP PKK Sudah Ada ');

            return redirect('/kategori_industri');
        }
        else {

            $kategoris = new KategoriIndustriRumah;
            $kategoris->nama_kategori = $request->nama_kategori;

            // simpan data
            $kategoris->save();
            Alert::success('Berhasil', 'Data berhasil di tambahkan');

            return redirect('/kategori_industri');
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
    public function edit(KategoriIndustriRumah $kategori_industri)
    {
        //halaman form edit data kategori industri rumah tangga
        $kat = KategoriIndustriRumah::all();

        // dd($keg);

        return view('admin_desa.data_kegiatan.kategori.form.edit_kategori_industri_rumah', compact('kategori_industri', 'kat'));

    }

    /**
     * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, KategoriIndustriRumah $kategori_industri)
    {
        // proses mengubah untuk tambah data kategori industri rumah tangga
        // dd($request->all());
        // validasi data
        $request->validate([
            'nama_kategori' => 'required',
        ]);
            // update data;
            $kategori_industri->update($request->all());
            Alert::success('Berhasil', 'Data berhasil di ubah');
            return redirect('/kategori_industri');

    }

    /**
     * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($kategori_industri, KategoriIndustriRumah $inds)
    {
        // temukan id kategori industri rumah tangga
        $inds::find($kategori_industri)->delete();

        return redirect('/kategori_industri')->with('status', 'sukses');



    }
}
