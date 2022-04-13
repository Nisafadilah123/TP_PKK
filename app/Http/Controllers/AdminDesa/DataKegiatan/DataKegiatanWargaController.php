<?php

namespace App\Http\Controllers\AdminDesa\DataKegiatan;
use App\Http\Controllers\Controller;
use App\Models\Data_Desa;
use App\Models\DataKegiatanWarga;
use App\Models\DataWarga;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class DataKegiatanWargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //halaman form data kegiatan
        $kegiatan=DataKegiatanWarga::all();
        return view('admin_desa.data_kegiatan.data_kegiatan', compact('kegiatan'));
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

     $keg = DataWarga::all();
     $kat = Kegiatan::all();
    //  $keg = DataWarga::with('kegiatan')->get();

    //  dd($keg);
     return view('admin_desa.data_kegiatan.form.create_data_kegiatan', compact('desas', 'keg', 'kat'));

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
            'id_kegiatan' => 'required',
            'aktivitas' => 'required',
            'keterangan' => 'required',
            'periode' => 'required',

        ], [
            'id_warga.required' => 'Lengkapi Id Desa',
            'id_kegiatan.required' => 'Lengkapi Id Desa',
            'aktivitas.required' => 'Lengkapi Nama Kepala Rumah Tangga',
            'keterangan.required' => 'Lengkapi No. KTP/NIK',
            'periode.required' => 'Lengkapi Periode',

        ]);
        $insert=DB::table('data_kegiatan_warga')->where('id_warga', $request->id_warga)->first();
        if ($insert != null) {
            Alert::error('Gagal', 'Data Tidak Berhasil Di Tambah. Warga TP PKK Sudah Ada ');

            return redirect('/data_kegiatan');
        }
        else {
        //cara 1

            $kegiatans = new DataKegiatanWarga;
            $kegiatans->id_warga = $request->id_warga;
            $kegiatans->id_kegiatan = $request->id_kegiatan;
            $kegiatans->aktivitas = $request->aktivitas;
            $kegiatans->keterangan = $request->keterangan;
            $kegiatans->periode = $request->periode;
            $kegiatans->save();
            // $input = $request->all();

            // $post = Datakegiatan::create($input);
            Alert::success('Berhasil', 'Data berhasil di tambahkan');

            return redirect('/data_kegiatan');
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
    public function edit(DataKegiatanWarga $data_kegiatan)
    {
        //halaman edit data pendidikan
        $keg = DataWarga::all();
        $kat = Kegiatan::all();

        // dd($keg);

        return view('admin_desa.data_kegiatan.form.edit_data_kegiatan', compact('data_kegiatan','keg', 'kat'));

    }

    /**
     * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, DataKegiatanWarga $data_kegiatan)
    {
        // proses mengubah untuk tambah data pendidikan
        // dd($request->all());

        $request->validate([
            'id_warga' => 'required',
            'id_kegiatan' => 'required',
            'aktivitas' => 'required',
            'keterangan' => 'required',
            'periode' => 'required',

        ]);

            $data_kegiatan->update($request->all());
            Alert::success('Berhasil', 'Data berhasil di ubah');
            // dd($jml_kader);
            return redirect('/data_kegiatan');

    }

    /**
     * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($data_kegiatan, DataKegiatanWarga $warg)
    {
        //temukan id gotong_royong
        $warg::find($data_kegiatan)->delete();

        return redirect('/data_kegiatan')->with('status', 'sukses');



    }
}