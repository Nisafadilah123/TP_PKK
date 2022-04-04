<?php

namespace App\Http\Controllers\SuperAdmin\DataPokja2;
use App\Http\Controllers\Controller;
use App\Models\Data_Desa;
use App\Models\Koperasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class KehidupanBerkoperasiSuperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // halaman koperasi pokja 2
        // nama desa yang login
        // $desa = Data_Desa::all();
        $kopsup = Koperasi::with('desa')->get();

        return view('super_admin.sub_file_pokja_2.kehidupan_berkoperasi_super', compact('kopsup'));
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

        return view('super_admin.sub_file_pokja_2.form.create_pengembangan_super', compact('desas'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // proses penyimpanan untuk tambah data jml koperasi
        $request->validate([
            'id_desa' => 'required',
            'jml_pemula_klp' => 'required',
            'jml_pemula_peserta' => 'required',
            'jml_madya_klp' => 'required',
            'jml_madya_peserta' => 'required',
            'jml_utama_klp' => 'required',
            'jml_utama_peserta' => 'required',
            'jml_mandiri_klp' => 'required',
            'jml_mandiri_peserta' => 'required',
            'jml_koperasi_klp' => 'required',
            'jml_koperasi_peserta' => 'required',
            'periode' => 'required',

        ], [
            'id_desa.required' => 'Lengkapi Id Desa',
            'jml_pemula_klp.required' => 'Lengkapi Jumlah Pemula KLP',
            'jml_pemula_peserta.required' => 'Lengkapi Jumlah Pemula Peserta',
            'jml_madya_klp.required' => 'Lengkapi Jumlah Madya KLP',
            'jml_madya_peserta.required' => 'Lengkapi Jumlah Madya Peserta',
            'jml_utama_klp.required' => 'Lengkapi Jumlah Utama KLP',
            'jml_utama_peserta.required' => 'Lengkapi Jumlah Utama Peserta',
            'jml_mandiri_klp.required' => 'Lengkapi Jumlah Mandiri KLP',
            'jml_mandiri_peserta.required' => 'Lengkapi Mandiri Peserta',
            'jml_koperasi_klp.required' => 'Lengkapi Jumlah Koperasi KLP',
            'jml_koperasi_peserta.required' => 'Lengkapi Jumlah Koperasi Peserta',
            'periode.required' => 'Lengkapi Periode',

        ]);
        $insert=DB::table('koperasi')->where('id_desa', $request->id_desa)->where('periode', $request->periode)->first();
        if ( !empty($insert)) {
            Alert::error('Gagal', 'Data Tidak Berhasil Di Ubah, Hanya Bisa Menginputkan Satu kali Data Desa Per Periode. Periode Desa Sudah Ada ');

            return redirect('/koperasi_super');
        }
        else {
            // cara 1
            $kop = new Koperasi;
            $kop->id_desa = $request->id_desa;
            $kop->jml_pemula_klp = $request->jml_pemula_klp;
            $kop->jml_pemula_peserta = $request->jml_pemula_peserta;
            $kop->jml_madya_klp = $request->jml_madya_klp;
            $kop->jml_madya_peserta = $request->jml_madya_peserta;
            $kop->jml_utama_klp = $request->jml_utama_klp;
            $kop->jml_utama_peserta = $request->jml_utama_peserta;
            $kop->jml_mandiri_klp = $request->jml_mandiri_klp;
            $kop->jml_mandiri_peserta = $request->jml_mandiri_peserta;
            $kop->jml_koperasi_klp = $request->jml_koperasi_klp;
            $kop->jml_koperasi_peserta = $request->jml_koperasi_peserta;
            $kop->periode = $request->periode;

            $kop->save();

            Alert::success('Berhasil', 'Data berhasil di tambahkan');

            return redirect('/koperasi_super');
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
    public function edit(Koperasi $koperasi_super)
    {
        //halaman edit data Koperasi
        $desa = Koperasi::with('desa')->first();
        $desas = Data_Desa::all();

        return view('super_admin.sub_file_pokja_2.form.edit_pengembangan_super', compact('koperasi_super','desa','desas'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Koperasi $koperasi_super)
    {
        // proses mengubah untuk tambah data pendidikan
        $request->validate([
            'id_desa' => 'required',
            'jml_pemula_klp' => 'required',
            'jml_pemula_peserta' => 'required',
            'jml_madya_klp' => 'required',
            'jml_madya_peserta' => 'required',
            'jml_utama_klp' => 'required',
            'jml_utama_peserta' => 'required',
            'jml_mandiri_klp' => 'required',
            'jml_mandiri_peserta' => 'required',
            'jml_koperasi_klp' => 'required',
            'jml_koperasi_peserta' => 'required',
            'periode' => 'required',
        ]);
        $update=DB::table('koperasi')->where('id_desa', $request->id_desa)->where('periode', $request->periode)->first();
        if ( !empty($update)) {
            Alert::error('Gagal', 'Data Tidak Berhasil Di Tambahkan, Hanya Bisa Menginputkan Satu kali Data Desa Per Periode. Periode Desa Sudah Ada ');

            return redirect('/koperasi_super');
        }
        else {
            $koperasi_super->update($request->all());

            Alert::success('Berhasil', 'Data berhasil di ubah');
            // dd($jml_kader);

            return redirect('/koperasi_super');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($koperasi_super, Koperasi $kop)
    {
        //temukan id gotong_royong
        $kop::find($koperasi_super)->delete();

        return redirect('/koperasi_super')->with('status', 'sukses');

    }}