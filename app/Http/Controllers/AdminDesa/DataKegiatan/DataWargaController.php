<?php

namespace App\Http\Controllers\AdminDesa\DataKegiatan;
use App\Http\Controllers\Controller;
use App\Models\Data_Desa;
use App\Models\DataWarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class DataWargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //halaman form data warga
        $warga=DataWarga::all();
        return view('admin_desa.data_kegiatan.data_warga', compact('warga'));
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

     $kec = DB::table('data_kecamatan')
     ->where('id', auth()->user()->id_kecamatan)
     ->get();

     return view('admin_desa.data_kegiatan.form.create_data_warga', compact('desas', 'kec'));

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
            'id_desa' => 'required',
            'id_kecamatan' => 'required',
            'dasa_wisma' => 'required',
            'nama_kepala_rumah_tangga' => 'required',
            'no_registrasi' => 'required',
            'no_ktp' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'umur' => 'required',
            'status_perkawinan' => 'required',
            'status_keluarga' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'akseptor_kb' => 'required',
            'aktif_posyandu' => 'required',
            'ikut_bkb' => 'required',
            'memiliki_tabungan' => 'required',
            'ikut_kelompok_belajar' => 'required',
            'ikut_paud_sejenis' => 'required',
            'ikut_koperasi' => 'required',
            'periode' => 'required',

        ], [
            'id_desa.required' => 'Lengkapi Id Desa',
            'id_kecamatan' => 'Lengkapi Id Desa',
            'dasa_wisma.required' => 'Lengkapi Nama Dasawisma',
            'nama_kepala_rumah_tangga.required' => 'Lengkapi Nama Kepala Rumah Tangga',
            'no_registrasi.required' => 'Lengkapi No. Registrasi',
            'no_ktp.required' => 'Lengkapi No. KTP/NIK',
            'nama.required' => 'Lengkapi Nama',
            'jabatan.required' => 'Lengkapi Jabatan dalam Struktur TP PKK',
            'jenis_kelamin.required' => 'Lengkapi Jenis Kelamin',
            'tempat_lahir.required' => 'Lengkapi Jumlah Tempat Lahir',
            'tgl_lahir.required' => 'Lengkapi Tanggal Lahir',
            'umur.required' => 'Lengkapi Umur',
            'status_perkawinan.required' => 'Lengkapi Jumlah Taman Bacaan/Perpustakaan',
            'status_keluarga.required' => 'Lengkapi Jumlah BKB Kelompok Belajar',
            'agama.required' => 'Lengkapi Jumlah BKB Ibu Peserta',
            'alamat.required' => 'Lengkapi Alamat',
            'rt.required' => 'Lengkapi Jumlah BKB Kelompok Belajar',
            'rw.required' => 'Lengkapi Jumlah BKB Kelompok Belajar',
            'kota.required' => 'Lengkapi Kota',
            'provinsi.required' => 'Lengkapi Provinsi',
            'pendidikan.required' => 'Lengkapi Jumlah BKB Kelompok Simulasi',
            'pekerjaan.required' => 'Lengkapi Jumlah Kader Khusus KF',
            'akseptor_kb.required' => 'Lengkapi Jumlah Kader Khusus Paud Sejenis',
            'aktif_posyandu.required' => 'Lengkapi Jumlah Kader Khusus BKB',
            'ikut_bkb.required' => 'Lengkapi Jumlah Kader Khusus Koperasi',
            'memiliki_tabungan.required' => 'Lengkapi Jumlah Kader Khusus Keterampilan',
            'ikut_kelompok_belajar.required' => 'Lengkapi Jumlah Kader Umum LP3',
            'ikut_paud_sejenis.required' => 'Lengkapi Jumlah Kader Umum TPK',
            'ikut_koperasi.required' => 'Lengkapi Jumlah Kader Khusus Damas',
            'periode.required' => 'Lengkapi Periode',

        ]);
        $insert=DB::table('data_warga')->where('no_ktp', $request->no_ktp)->first();
        if ($insert != null) {
            Alert::error('Gagal', 'Data Tidak Berhasil Di Tambah. No.KTP Sudah Ada ');

            return redirect('/data_warga');
        }
        else {
        //cara 1

            $wargas = new DataWarga;
            $wargas->id_desa = $request->id_desa;
            $wargas->id_kecamatan = $request->id_kecamatan;
            $wargas->dasa_wisma = $request->dasa_wisma;
            $wargas->nama_kepala_rumah_tangga = $request->nama_kepala_rumah_tangga;
            $wargas->no_registrasi = $request->no_registrasi;
            $wargas->no_ktp = $request->no_ktp;
            $wargas->nama = $request->nama;
            $wargas->jabatan = $request->jabatan;
            $wargas->jenis_kelamin = $request->jenis_kelamin;
            $wargas->tempat_lahir = $request->tempat_lahir;
            $wargas->tgl_lahir = $request->tgl_lahir;
            $wargas->umur = $request->umur;
            $wargas->status_perkawinan = $request->status_perkawinan;
            $wargas->status_keluarga = $request->status_keluarga;
            $wargas->status = $request->status_keluarga == 'kepala keluarga' ? 'kepala keluarga' : $request->status;
            $wargas->agama = $request->agama;
            $wargas->alamat = $request->alamat;
            $wargas->rt = $request->rt;
            $wargas->rw = $request->rw;
            $wargas->kota = $request->kota;
            $wargas->provinsi = $request->provinsi;
            $wargas->pendidikan = $request->pendidikan;
            $wargas->pekerjaan = $request->pekerjaan;
            $wargas->akseptor_kb = $request->akseptor_kb;
            $wargas->aktif_posyandu = $request->aktif_posyandu;
            $wargas->ikut_bkb = $request->ikut_bkb;
            $wargas->memiliki_tabungan = $request->memiliki_tabungan;
            $wargas->ikut_kelompok_belajar = $request->ikut_kelompok_belajar;
            $wargas->ikut_paud_sejenis = $request->ikut_paud_sejenis;
            $wargas->ikut_koperasi = $request->ikut_koperasi;
            $wargas->periode = $request->periode;
            $wargas->save();
            // $input = $request->all();

            // $post = DataWarga::create($input);
            Alert::success('Berhasil', 'Data berhasil di tambahkan');

            return redirect('/data_warga');
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
    public function edit(DataWarga $data_warga)
    {
        //halaman edit data pendidikan
        $desa = DataWarga::with('desa')->first();
        $desas = Data_Desa::where('id', auth()->user()->id_desa)
        ->get();

        $kec = DB::table('data_kecamatan')
        ->where('id', auth()->user()->id_kecamatan)
        ->get();
        return view('admin_desa.data_kegiatan.form.edit_data_warga', compact('data_warga','desa','desas','kec'));

    }

    /**
     * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, DataWarga $data_warga)
    {
        // proses mengubah untuk tambah data pendidikan
        // dd($request->all());

        $request->validate([
            'id_desa' => 'required',
            'id_kecamatan' => 'required',
            'dasa_wisma' => 'required',
            'nama_kepala_rumah_tangga' => 'required',
            'no_registrasi' => 'required',
            'no_ktp' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'umur' => 'required',
            'status_perkawinan' => 'required',
            'status_keluarga' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'akseptor_kb' => 'required',
            'aktif_posyandu' => 'required',
            'ikut_bkb' => 'required',
            'memiliki_tabungan' => 'required',
            'ikut_kelompok_belajar' => 'required',
            'ikut_paud_sejenis' => 'required',
            'ikut_koperasi' => 'required',
            'periode' => 'required',
        ]);

            $data_warga->update($request->all());
            Alert::success('Berhasil', 'Data berhasil di ubah');
            // dd($jml_kader);
            return redirect('/data_warga');

    }

    /**
     * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($data_warga, DataWarga $warg)
    {
        //temukan id gotong_royong
        $warg::find($data_warga)->delete();

        return redirect('/data_warga')->with('status', 'sukses');

    }
}