<?php

namespace App\Http\Controllers\PendataanKader;
use App\Http\Controllers\Controller;
use App\Models\DataKeluarga;
use App\Models\DataWarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class DataKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //halaman form data kegiatan
        $keluarga = DataKeluarga::all();
        return view('kader.data_kegiatan.data_keluarga', compact('keluarga'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     // nama desa yang login
    //  $desas = DB::table('data_desa')
    //  ->where('id', auth()->user()->id_desa)
    //  ->get();

    //  $kec = DB::table('data_kecamatan')
    //  ->where('id', auth()->user()->id_kecamatan)
    //  ->get();
    $kec = DB::table('data_kecamatan')->get();

     $keg = DataKeluarga::all();
     $warga = DataWarga::all();

    //  dd($keg);
     return view('kader.data_kegiatan.form.create_data_keluarga', compact( 'warga', 'kec'));

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
        dd($request->all());

        $request->validate([
            'id_desa' => 'required',
            'id_kecamatan' => 'required',
            'id_data_warga' => 'required',
            'dasa_wisma' => 'required',
            'nama_kepala_rumah_tangga' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'laki_laki' => 'required',
            'perempuan' => 'required',
            'jumla_KK' => 'required',
            // 'jumlah_balita' => 'required',
            // 'jumlah_PUS' => 'required',
            // 'jumlah_WUS' => 'required',
            // 'jumlah_3_buta' => 'required',
            // 'jumlah_ibu_hamil' => 'required',
            // 'jumlah_ibu_menyusui' => 'required',
            // 'jumlah_lansia' => 'required',
            // 'jumlah_kebutuhan' => 'required',
            'makanan_pokok' => 'required',
            'punya_jamban' => 'required',
            // 'jumlah_jamban' => 'required',
            'sumber_air' => 'required',
            'punya_tempat_sampah' => 'required',
            'punya_saluran_air' => 'required',
            'tempel_stiker' => 'required',
            'kriteria_rumah' => 'required',
            'aktivitas_UP2K' => 'required',
            'aktivitas_kegiatan_usaha' => 'required',
            'periode' => 'required',

        ], [
            'id_desa.required' => 'Lengkapi Id Desa',
            'id_kecamatan' => 'Lengkapi Id Desa',
            'id_data_warga.required' => 'Lengkapi Nama Warga',
            'dasa_wisma.required' => 'Pilih Nama Dasawisma',
            'nama_kepala_rumah_tangga.required' => 'Pilih Nama Kepala Rumah Tangga',
            'jumlah_anggota_keluarga.required' => 'Lengkapi Jumlah Anggota Keluarga',
            'rt.required' => 'Pilih RT',
            'rw.required' => 'Pilih RW',
            'laki_laki.required' => 'Lengkapi Jumlah Laki-laki',
            'perempuan.required' => 'Lengkapi Jumlah Perempuan',
            'jumlah_KK.required' => 'Lengkapi Jumlah KK',
            // 'kategori_anggota.required' => 'Lengkapi Kategori Keluarga',
            'makanan_pokok.required' => 'Lengkapi Makanan Pokok',
            // 'jumlah_kategori_anggota.required' => 'Lengkapi Jumlah Kategori Anggota',
            'punya_jamban.required' => 'Lengkapi Jumlah Yang Mempunyai Jamban',
            // 'jumlah_jamban.required' => 'Lengkapi Jumlah Jamban',
            'sumber_air.required' => 'Pilih Sumber Air Kader Khusus KF',
            'punya_tempat_sampah.required' => 'Pilih Yang Mempunyai Tempat Sampah',
            'punya_saluran_air.required' => 'Pilih Yang Mempunyai Saluran Air',
            'tempel_stiker.required' => 'Pilih Rumah Yang Mempunyai Stiker P4K',
            'kriteria_rumah.required' => 'Pilih Kriteria Rumah',
            'aktivitas_UP2K.required' => 'Pilih Aktivitas UP2K',
            'aktivitas_kegiatan_usaha.required' => 'Pilih Aktivitas Kegiatan Usaha',
            'periode.required' => 'Lengkapi Periode',

        ]);
        $insert=DB::table('data_keluarga')->where('id_warga', $request->id_warga)->first();
        if ($insert != null) {
            Alert::error('Gagal', 'Data Tidak Berhasil Di Tambah. No.KTP Sudah Ada ');

            return redirect('/data_keluarga');
        }
        else {
        //cara 1

            $wargas = new DataKeluarga;
            $wargas->id_desa = $request->id_desa;
            $wargas->id_kecamatan = $request->id_kecamatan;
            $wargas->id_data_warga = $request->id_data_warga;
            $wargas->dasa_wisma = $request->dasa_wisma;
            $wargas->nama_kepala_rumah_tangga = $request->nama_kepala_rumah_tangga;
            $wargas->jumlah_anggota_keluarga = $request->jumlah_anggota_keluarga;
            $wargas->rt = $request->rt;
            $wargas->rw = $request->rw;
            $wargas->laki_laki = $request->laki_laki;
            $wargas->perempuan = $request->perempuan;
            $wargas->jumlah_KK = $request->jumlah_KK;
            $wargas->jumlah_balita = $request->jumlah_balita;
            $wargas->jumlah_PUS = $request->jumlah_PUS;
            $wargas->jumlah_WUS = $request->jumlah_WUS;
            $wargas->jumlah_3_buta = $request->jumlah_3_buta;
            $wargas->jumlah_ibu_hamil = $request->jumlah_ibu_hamil;
            $wargas->jumlah_ibu_menyusui = $request->jumlah_ibu_menyusui;
            $wargas->jumlah_lansia = $request->jumlah_lansia;
            $wargas->jumlah_kebutuhan = $request->jumlah_kebutuhan;
            $wargas->makanan_pokok = $request->makanan_pokok;
            $wargas->punya_jamban = $request->punya_jamban;
            $wargas->jumlah_jamban = $request->jumlah_jamban;
            $wargas->sumber_air = $request->sumber_air;
            $wargas->punya_tempat_sampah = $request->punya_tempat_sampah;
            $wargas->punya_saluran_air = $request->punya_saluran_air;
            $wargas->tempel_stiker = $request->tempel_stiker;
            $wargas->kriteria_rumah = $request->kriteria_rumah;
            $wargas->aktivitas_UP2K = $request->aktivitas_UP2K;
            $wargas->aktivitas_kegiatan_usaha = $request->aktivitas_kegiatan_usaha;
            $wargas->periode = $request->periode;
            $wargas->save();
            // $input = $request->all();

            // $post = DataWarga::create($input);
            Alert::success('Berhasil', 'Data berhasil di tambahkan');

            return redirect('/data_keluarga');
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
    public function edit(DataKeluarga $data_keluarga)
    {
        //halaman edit data pendidikan
        $keg = DataWarga::all();
        $kel = DataKeluarga::all();

        // dd($keg);

        return view('kader.data_kegiatan.form.edit_data_keluarga', compact('data_keluarga','keg', 'kel'));

    }

    /**
     * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, DataKeluarga $data_keluarga)
    {
        // proses mengubah untuk tambah data pendidikan
        // dd($request->all());

        $request->validate([
            'id_desa' => 'required',
            'id_kecamatan' => 'required',
            'id_data_warga' => 'required',
            'dasa_wisma' => 'required',
            'nama_kepala_rumah_tangga' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'laki_laki' => 'required',
            'perempuan' => 'required',
            'jumla_KK' => 'required',
            'jumlah_balita' => 'required',
            'jumlah_PUS' => 'required',
            'jumlah_WUS' => 'required',
            'jumlah_3_buta' => 'required',
            'jumlah_ibu_hamil' => 'required',
            'jumlah_ibu_menyusui' => 'required',
            'jumlah_lansia' => 'required',
            'jumlah_kebutuhan' => 'required',
            'makanan_pokok' => 'required',
            'punya_jamban' => 'required',
            'jumlah_jamban' => 'required',
            'sumber_air' => 'required',
            'punya_tempat_sampah' => 'required',
            'punya_saluran_air' => 'required',
            'tempel_stiker' => 'required',
            'kriteria_rumah' => 'required',
            'aktivitas_UP2K' => 'required',
            'aktivitas_kegiatan_usaha' => 'required',
            'periode' => 'required',

        ]);

            $data_keluarga->update($request->all());
            Alert::success('Berhasil', 'Data berhasil di ubah');
            // dd($jml_kader);
            return redirect('/data_keluarga');

    }

    /**
     * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($data_keluarga, DataKeluarga $kel)
    {
        //temukan id gotong_royong
        $kel::find($data_keluarga)->delete();

        return redirect('/data_keluarga')->with('status', 'sukses');



    }
}