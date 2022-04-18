<?php

namespace App\Http\Controllers\AdminDesa\DataKegiatan;
use App\Http\Controllers\Controller;
use App\Models\DataWarga;
use App\Models\PemanfaatanKarangan;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\KategoriPemanfaatanLahan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataPemanfaatanPekaranganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //halaman form data pemanfaatan
        $pemanfaatan = PemanfaatanKarangan::all();
        return view('admin_desa.data_kegiatan.data_pemanfaatan', compact('pemanfaatan'));
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

     $warga = DataWarga::all();
     $kat = KategoriPemanfaatanLahan::all();
    //  $keg = DataWarga::with('kegiatan')->get();

    //  dd($keg);
     return view('admin_desa.data_kegiatan.form.create_data_pemanfaatan', compact('desas', 'warga', 'kat'));

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
        // dd($request->all());

        $request->validate([
            'id_warga' => 'required',
            'id_kategori' => 'required',
            'komoditi' => 'required',
            'jumlah' => 'required',
            'periode' => 'required',

        ], [
            'id_warga.required' => 'Lengkapi Id Desa',
            'id_kategori.required' => 'Lengkapi Id Desa',
            'komoditi.required' => 'Lengkapi Nama Kepala Rumah Tangga',
            'jumlah.required' => 'Lengkapi No. KTP/NIK',
            'periode.required' => 'Lengkapi Periode',

        ]);
        $insert=DB::table('pemanfaatan_pekarangan')->where('id_warga', $request->id_warga)->first();
        if ($insert != null) {
            Alert::error('Gagal', 'Data Tidak Berhasil Di Tambah. Warga TP PKK Sudah Ada ');

            return redirect('/pemanfaatan');
        }
        else {
        //cara 1

            $kegiatans = new PemanfaatanKarangan;
            $kegiatans->id_warga = $request->id_warga;
            $kegiatans->id_kategori = $request->id_kategori;
            $kegiatans->komoditi = $request->komoditi;
            $kegiatans->jumlah = $request->jumlah;
            $kegiatans->periode = $request->periode;
            $kegiatans->save();
            // $input = $request->all();

            // $post = Datakegiatan::create($input);
            Alert::success('Berhasil', 'Data berhasil di tambahkan');

            return redirect('/pemanfaatan');
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
    public function edit(PemanfaatanKarangan $pemanfaatan)
    {
        //halaman edit data pendidikan
        $warga = DataWarga::all();
        $kat = KategoriPemanfaatanLahan::all();

        return view('admin_desa.data_kegiatan.form.edit_data_pemanfaatan', compact('pemanfaatan','warga', 'kat'));

    }

    /**
     * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, PemanfaatanKarangan $pemanfaatan)
    {
        // proses mengubah untuk tambah data pendidikan
        // dd($request->all());

        $request->validate([
            'id_warga' => 'required',
            'id_kategori' => 'required',
            'komoditi' => 'required',
            'jumlah' => 'required',
            'periode' => 'required',

        ]);

            $pemanfaatan->update($request->all());
            Alert::success('Berhasil', 'Data berhasil di ubah');
            // dd($jml_kader);
            return redirect('/pemanfaatan');

    }

    /**
     * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($pemanfaatan, PemanfaatanKarangan $warg)
    {
        //temukan id gotong_royong
        $warg::find($pemanfaatan)->delete();

        return redirect('/pemanfaatan')->with('status', 'sukses');



    }
}