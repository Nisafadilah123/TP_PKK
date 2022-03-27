<?php

namespace App\Http\Controllers\AdminDesa\DataPokja2;
use App\Http\Controllers\Controller;
use App\Models\Pendidikan;
use App\Models\Data_Desa;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // halaman pendidikan pokja 2
        // nama desa yang login
        // $desa = Data_Desa::all();
        $pend = Pendidikan::with('desa')->get();

        return view('admin_desa.sub_file_pokja_2.jml_kelompok', compact('pend'));
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

        return view('admin_desa.sub_file_pokja_2.form.create_pendidikan', compact('desas'));

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
        $request->validate([
            'id_desa' => 'required',
            'jml_warga_buta' => 'required',
            'jml_pktA_kel_belajar' => 'required',
            'jml_pktA_warga_belajar' => 'required',
            'jml_pktB_kel_belajar' => 'required',
            'jml_pktB_warga_belajar' => 'required',
            'jml_pktC_kel_belajar' => 'required',
            'jml_pktC_warga_belajar' => 'required',
            'jml_KF_kel_belajar' => 'required',
            'jml_KF_warga_belajar' => 'required',
            'jml_paud' => 'required',
            'jml_taman_bacaan' => 'required',
            'jml_BKB_kel_belajar' => 'required',
            'jml_BKB_ibu_peserta' => 'required',
            'jml_BKB_ape' => 'required',
            'jml_BKB_kel_simulasi' => 'required',
            'jml_kader_khusus_KF' => 'required',
            'jml_kader_khusus_paud_sejenis' => 'required',
            'jml_kader_khusus_BKB' => 'required',
            'jml_kader_khusus_koperasi' => 'required',
            'jml_kader_khusus_keterampilan' => 'required',
            'jml_kader_umum_LP3' => 'required',
            'jml_kader_umum_TPK' => 'required',
            'jml_kader_umum_damas' => 'required',

        ], [
            'id_desa.required' => 'Lengkapi Id Desa',
            'jml_warga_buta.required' => 'Lengkapi Jumlah Warga Buta',
            'jml_pktA_kel_belajar.required' => 'Lengkapi Jumlah Paket A Kelompok Belajar',
            'jml_pktA_warga_belajar.required' => 'Lengkapi Jumlah Paket A Warga Belajar',
            'jml_pktB_kel_belajar.required' => 'Lengkapi Jumlah Paket B Kelompok Belajar',
            'jml_pktB_warga_belajar.required' => 'Lengkapi Jumlah Paket B Warga Belajar',
            'jml_pktC_kel_belajar.required' => 'Lengkapi Jumlah Paket C Kelompok Belajar',
            'jml_pktC_warga_belajar.required' => 'Lengkapi Jumlah Paket C Warga Belajar',
            'jml_KF_kel_belajar.required' => 'Lengkapi Jumlah Paket KF Kelompok Belajar',
            'jml_KF_warga_belajar.required' => 'Lengkapi Jumlah Paket KF Warga Belajar',
            'jml_paud.required' => 'Lengkapi Jumlah PAUD',
            'jml_taman_bacaan.required' => 'Lengkapi Jumlah Taman Bacaan/Perpustakaan',
            'jml_BKB_kel_belajar.required' => 'Lengkapi Jumlah BKB Kelompok Belajar',
            'jml_BKB_ibu_peserta.required' => 'Lengkapi Jumlah BKB Ibu Peserta',
            'jml_BKB_ape.required' => 'Lengkapi Jumlah BKB APE (SET)',
            'jml_BKB_kel_simulasi.required' => 'Lengkapi Jumlah BKB Kelompok Simulasi',
            'jml_kader_khusus_KF.required' => 'Lengkapi Jumlah Kader Khusus KF',
            'jml_kader_khusus_paud_sejenis.required' => 'Lengkapi Jumlah Kader Khusus Paud Sejenis',
            'jml_kader_khusus_BKB.required' => 'Lengkapi Jumlah Kader Khusus BKB',
            'jml_kader_khusus_koperasi.required' => 'Lengkapi Jumlah Kader Khusus Koperasi',
            'jml_kader_khusus_keterampilan.required' => 'Lengkapi Jumlah Kader Khusus Keterampilan',
            'jml_kader_umum_LP3.required' => 'Lengkapi Jumlah Kader Umum LP3',
            'jml_kader_umum_TPK.required' => 'Lengkapi Jumlah Kader Umum TPK',
            'jml_kader_umum_damas.required' => 'Lengkapi Jumlah Kader Khusus Damas',

        ]);

        // cara 1
        $pends = new Pendidikan;
        $pends->id_desa = $request->id_desa;
        $pends->jml_warga_buta = $request->jml_warga_buta;
        $pends->jml_pktA_kel_belajar = $request->jml_pktA_kel_belajar;
        $pends->jml_pktA_warga_belajar = $request->jml_pktA_warga_belajar;
        $pends->jml_pktB_kel_belajar = $request->jml_pktB_kel_belajar;
        $pends->jml_pktB_warga_belajar = $request->jml_pktB_warga_belajar;
        $pends->jml_pktC_kel_belajar = $request->jml_pktC_kel_belajar;
        $pends->jml_pktC_warga_belajar = $request->jml_pktC_warga_belajar;
        $pends->jml_KF_kel_belajar = $request->jml_KF_kel_belajar;
        $pends->jml_KF_warga_belajar = $request->jml_KF_warga_belajar;
        $pends->jml_paud = $request->jml_paud;
        $pends->jml_taman_bacaan = $request->jml_taman_bacaan;
        $pends->jml_BKB_kel_belajar = $request->jml_BKB_kel_belajar;
        $pends->jml_BKB_ibu_peserta = $request->jml_BKB_ibu_peserta;
        $pends->jml_BKB_ape = $request->jml_BKB_ape;
        $pends->jml_BKB_kel_simulasi = $request->jml_BKB_kel_simulasi;
        $pends->jml_kader_khusus_KF = $request->jml_kader_khusus_KF;
        $pends->jml_kader_khusus_paud_sejenis = $request->jml_kader_khusus_paud_sejenis;
        $pends->jml_kader_khusus_BKB = $request->jml_kader_khusus_BKB;
        $pends->jml_kader_khusus_koperasi = $request->jml_kader_khusus_koperasi;
        $pends->jml_kader_khusus_keterampilan = $request->jml_kader_khusus_keterampilan;
        $pends->jml_kader_umum_LP3 = $request->jml_kader_umum_LP3;
        $pends->jml_kader_umum_TPK = $request->jml_kader_umum_TPK;
        $pends->jml_kader_umum_damas = $request->jml_kader_umum_damas;

        $pends->save();


        Alert::success('Berhasil', 'Data berhasil di tambahkan');

        return redirect('/pendidikan');

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
    public function edit(Pendidikan $pendidikan)
    {
                //halaman edit data pendidikan
                $desa = Pendidikan::with('desa')->first();
                $desas = Data_Desa::all();

                return view('admin_desa.sub_file_pokja_2.form.edit_pendidikan', compact('pendidikan','desa','desas'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pendidikan $pendidikan)
    {
                // proses mengubah untuk tambah data pendidikan
                $request->validate([
                    'id_desa' => 'required',
                    'jml_warga_buta' => 'required',
                    'jml_pktA_kel_belajar' => 'required',
                    'jml_pktA_warga_belajar' => 'required',
                    'jml_pktB_kel_belajar' => 'required',
                    'jml_pktB_warga_belajar' => 'required',
                    'jml_pktC_kel_belajar' => 'required',
                    'jml_pktC_warga_belajar' => 'required',
                    'jml_KF_kel_belajar' => 'required',
                    'jml_KF_warga_belajar' => 'required',
                    'jml_paud' => 'required',
                    'jml_taman_bacaan' => 'required',
                    'jml_BKB_kel_belajar' => 'required',
                    'jml_BKB_ibu_peserta' => 'required',
                    'jml_BKB_ape' => 'required',
                    'jml_BKB_kel_simulasi' => 'required',
                    'jml_kader_khusus_KF' => 'required',
                    'jml_kader_khusus_paud_sejenis' => 'required',
                    'jml_kader_khusus_BKB' => 'required',
                    'jml_kader_khusus_koperasi' => 'required',
                    'jml_kader_khusus_keterampilan' => 'required',
                    'jml_kader_umum_LP3' => 'required',
                    'jml_kader_umum_TPK' => 'required',
                    'jml_kader_umum_damas' => 'required',

                ]);

                $pendidikan->update($request->all());

                Alert::success('Berhasil', 'Data berhasil di ubah');
                // dd($jml_kader);

                return redirect('/pendidikan');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($pendidikan, Pendidikan $pend)
    {
        //temukan id gotong_royong
        $pend::find($pendidikan)->delete();

        return redirect('/pendidikan')->with('status', 'sukses');

    }
}