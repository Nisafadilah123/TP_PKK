<?php

namespace App\Http\Controllers\SuperAdmin\DataUmum;
use App\Http\Controllers\Controller;
use App\Models\Data_Desa;
use App\Models\JumlahKaderDataUmum;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class JumlahKaderDataUmumSuperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //halaman jumlah kader pokja 4
        // nama desa yang login
        // $desa = Data_Desa::all();
        $jumkadumsup = JumlahKaderDataUmum::with('desa')->get();

        return view('admin_desa.sub_file_sekretariat.jml_kader_data_umum_super', compact('jumkadumsup'));
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

        return view('admin_desa.sub_file_sekretariat.form.create_jumlah_kader_data_umum_super', compact('desas'));

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
            'jml_kader_anggota_pkk_laki_data_umum' => 'required',
            'jml_kader_anggota_pkk_perempuan_data_umum' => 'required',
            'jml_kader_umum_laki_data_umum' => 'required',
            'jml_kader_umum_perempuan_data_umum' => 'required',
            'jml_kader_khusus_laki_data_umum' => 'required',
            'jml_kader_khusus_perempuan_data_umum' => 'required',
            'periode' => 'required',

        ], [
            'id_desa.required' => 'Lengkapi Id Desa',
            'jml_kader_anggota_pkk_laki_data_umum.required' => 'Lengkapi Jumlah Kader Anggota TP PKK Laki-laki Data Umum',
            'jml_kader_anggota_pkk_perempuan_data_umum.required' => 'Lengkapi Jumlah Kader Anggota TP PKK Laki-laki Data Umum',
            'jml_kader_umum_laki_data_umum.required' => 'Lengkapi Jumlah Kader Anggota TP PKK Laki-laki Data Umum',
            'jml_kader_umum_perempuan_data_umum.required' => 'Lengkapi Jumlah Kader Anggota TP PKK Laki-laki Data Umum',
            'jml_kader_khusus_laki_data_umum.required' => 'Lengkapi Jumlah Kader Anggota TP PKK Laki-laki Data Umum',
            'jml_kader_khusus_perempuan_data_umum.required' => 'Lengkapi Jumlah Kader Anggota TP PKK Laki-laki Data Umum',
            'periode.required' => 'Lengkapi Periode',

        ]);

        // cara 1
        $jumkadums = new JumlahKaderDataUmum;
        $jumkadums->id_desa = $request->id_desa;
        $jumkadums->jml_kader_anggota_pkk_laki_data_umum = $request->jml_kader_anggota_pkk_laki_data_umum;
        $jumkadums->jml_kader_anggota_pkk_perempuan_data_umum = $request->jml_kader_anggota_pkk_perempuan_data_umum;
        $jumkadums->jml_kader_umum_laki_data_umum = $request->jml_kader_umum_laki_data_umum;
        $jumkadums->jml_kader_umum_perempuan_data_umum = $request->jml_kader_umum_perempuan_data_umum;
        $jumkadums->jml_kader_khusus_laki_data_umum = $request->jml_kader_khusus_laki_data_umum;
        $jumkadums->jml_kader_khusus_perempuan_data_umum = $request->jml_kader_khusus_perempuan_data_umum;
        $jumkadums->periode = $request->periode;

        $jumkadums->save();


        Alert::success('Berhasil', 'Data berhasil di tambahkan');

        return redirect('/jml_kader_umum_super');

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
    public function edit(JumlahKaderDataUmum $jml_kader_umum_super)
    {
        //halaman edit data gotong_royong
        $desa = JumlahKaderDataUmum::with('desa')->first();
        $desas = Data_Desa::all();

        return view('admin_desa.sub_file_sekretariat.form.edit_jumlah_kader_data_umum_super', compact('jml_kader_umum_super','desa','desas'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JumlahKaderDataUmum $jml_kader_umum_super)
    {
        // proses mengubah untuk tambah data jml jml_kader_umum
        $request->validate([
            'id_desa' => 'required',
            'jml_kader_anggota_pkk_laki_data_umum' => 'required',
            'jml_kader_anggota_pkk_perempuan_data_umum' => 'required',
            'jml_kader_umum_laki_data_umum' => 'required',
            'jml_kader_umum_perempuan_data_umum' => 'required',
            'jml_kader_khusus_laki_data_umum' => 'required',
            'jml_kader_khusus_perempuan_data_umum' => 'required',
            'periode' => 'required',

        ]);

        $jml_kader_umum_super->update($request->all());

        Alert::success('Berhasil', 'Data berhasil di ubah');
        // dd($jml_jml_kader_umum);

        return redirect('/jml_kader_umum_super');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($jml_kader_umum_super, JumlahKaderDataUmum $jumkadums)
    {
        //temukan id jml_kader_umum
        $jumkadums::find($jml_kader_umum_super)->delete();

        return redirect('/jml_kader_umum_super')->with('status', 'sukses');


    }
}