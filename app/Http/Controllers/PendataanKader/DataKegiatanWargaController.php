<?php

namespace App\Http\Controllers\PendataanKader;
use App\Http\Controllers\Controller;
use App\Models\Data_Desa;
use App\Models\DataKegiatanWarga;
use App\Models\DataWarga;
use App\Models\KategoriKegiatan;
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
        // halaman data kegiatan
        $kegiatan=DataKegiatanWarga::all();
        return view('kader.data_kegiatan.data_kegiatan', compact('kegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // halaman form tambah data kegiatan
        // nama desa yang login
        $desas = DB::table('data_desa')
        ->where('id', auth()->user()->id_desa)
        ->get();
        // $kec = DB::table('data_kecamatan')->get();
        $kec = DB::table('data_kecamatan')
        ->where('id', auth()->user()->id_desa)
        ->get();


        $warga = DataWarga::all(); // pemanggilan tabel data warga
        $keg = KategoriKegiatan::all(); // pemanggilan tabel data kategori kegiatan

        //  dd($keg);
        return view('kader.data_kegiatan.form.create_data_kegiatan', compact('kec', 'keg', 'warga', 'desas'));

    }

 /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
    public function store(Request $request)
    {
        // proses penyimpanan untuk tambah data data kegiatan warga
        // dd($request->all());
        // validasi data
        $request->validate([
            'id_desa' => 'required',
            'id_kecamatan' => 'required',
            'id_warga' => 'required',
            'id_kegiatan' => 'required',
            'aktivitas' => 'required',
            'keterangan' => 'required',
            'periode' => 'required',

        ], [
            'id_desa.required' => 'Lengkapi Alamat Desa Kegiatan Warga Yang Didata',
            'id_kecamatan.required' => 'Lengkapi Alamat Kecamatan Kegiatan Warga Yang Didata',
            'id_warga.required' => 'Lengkapi Nama Warga Yang Didata',
            'id_kegiatan.required' => 'Lengkapi Kegiatan Yang Diikuti Warga',
            'aktivitas.required' => 'Pilih Aktivitas Kegiatan Yang Diikuti Warga',
            'keterangan.required' => 'Lengkapi Keterangan Kegiatan Yang Diikuti Warga',
            'periode.required' => 'Pilih Periode',

        ]);

        // pengkondisian tabel
        $insert=DB::table('data_kegiatan_warga')->where('id_warga', $request->id_warga)->first();
        if ($insert != null) {
            Alert::error('Gagal', 'Data Tidak Berhasil Di Tambah. Warga TP PKK Sudah Ada ');

            return redirect('/data_kegiatan');
        }
        else {
            $kegiatans = new DataKegiatanWarga;
            $kegiatans->id_desa = $request->id_desa;
            $kegiatans->id_kecamatan = $request->id_kecamatan;

            $kegiatans->id_warga = $request->id_warga;
            $kegiatans->id_kegiatan = $request->id_kegiatan;
            $kegiatans->aktivitas = $request->aktivitas;
            $kegiatans->keterangan = $request->keterangan;
            $kegiatans->periode = $request->periode;

            // simpan data
            $kegiatans->save();

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
        //halaman form edit data kegiatan
        $keg = DataWarga::all();
        $kat = KategoriKegiatan::all();

        $desas = DB::table('data_desa')
        ->where('id', auth()->user()->id_desa)
        ->get();
        // $kec = DB::table('data_kecamatan')->get();
        $kec = DB::table('data_kecamatan')
        ->where('id', auth()->user()->id_desa)
        ->get();

        // dd($keg);

        return view('kader.data_kegiatan.form.edit_data_kegiatan', compact('data_kegiatan','keg', 'kat', 'kec', 'desas'));

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
        // validasi data
        $request->validate([
            'id_desa' => 'required',
            'id_kecamatan' => 'required',

            'id_warga' => 'required',
            'id_kegiatan' => 'required',
            'aktivitas' => 'required',
            'keterangan' => 'required',
            'periode' => 'required',

        ]);
        // update data
            $data_kegiatan->update($request->all());
            Alert::success('Berhasil', 'Data berhasil di ubah');
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
        //temukan id data kegiatan warga
        $warg::find($data_kegiatan)->delete();
        Alert::success('Berhasil', 'Data berhasil di Hapus');

        return redirect('/data_kegiatan');



    }
}