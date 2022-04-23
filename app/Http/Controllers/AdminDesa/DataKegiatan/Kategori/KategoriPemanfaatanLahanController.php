<?php

namespace App\Http\Controllers\AdminDesa\DataKegiatan\Kategori;
use App\Http\Controllers\Controller;
use App\Models\KategoriPemanfaatanLahan;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriPemanfaatanLahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // halaman data kategori pemanfaatan tanah pekarangan
        $kategori = KategoriPemanfaatanLahan::all();
        return view('admin_desa.data_kegiatan.kategori.kategori_pemanfaatan_lahan', compact('kategori'));
   }

   /**
    * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function create()
   {
        // halaman form tambah data kategori pemanfaatan tanah pekarangan

        $kat = KategoriPemanfaatanLahan::all();

        return view('admin_desa.data_kegiatan.kategori.form.create_kategori_pemanfaatan_lahan', compact('kat'));

   }

   /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   public function store(Request $request)
   {
       // proses penyimpanan untuk tambah data kategori pemanfaatan tanah pekarangan
       // dd($request->all());
       // validasi data
       $request->validate([
           'nama_kategori' => 'required',

       ], [
           'nama_kategori.required' => 'Lengkapi Id Desa',

       ]);

        // pengkondisian tabel
       $insert=DB::table('kategori_pemanfaatan_lahan')->where('nama_kategori', $request->nama_kategori)->first();
       if ($insert != null) {
           Alert::error('Gagal', 'Data Tidak Berhasil Di Tambah. Warga TP PKK Sudah Ada ');

           return redirect('/kategori_pemanfaatan');
       }
       else {
           $kategoris = new KategoriPemanfaatanLahan();
           $kategoris->nama_kategori = $request->nama_kategori;

           // simpan data
           $kategoris->save();
           Alert::success('Berhasil', 'Data berhasil di tambahkan');

           return redirect('/kategori_pemanfaatan');
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
   public function edit(KategoriPemanfaatanLahan $kategori_pemanfaatan)
   {
       //halaman form edit data kategori tanah
       $kat = KategoriPemanfaatanLahan::all();

       // dd($keg);

       return view('admin_desa.data_kegiatan.kategori.form.edit_kategori_pemanfaatan_lahan', compact('kategori_pemanfaatan', 'kat'));

   }

   /**
    * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function update(Request $request, KategoriPemanfaatanLahan $kategori_pemanfaatan)
   {
       // proses mengubah untuk tambah data kategori tanah
       // dd($request->all());
       // validasi data
       $request->validate([
           'nama_kategori' => 'required',
       ]);
           // update data
           $kategori_pemanfaatan->update($request->all());
           Alert::success('Berhasil', 'Data berhasil di ubah');
           return redirect('/kategori_pemanfaatan');

   }

   /**
    * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function destroy($kategori_pemanfaatan, KategoriPemanfaatanLahan $inds)
   {
       //temukan id kategori tanah
       $inds::find($kategori_pemanfaatan)->delete();

       return redirect('/kategori_pemanfaatan')->with('status', 'sukses');



   }
}