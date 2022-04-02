<?php

namespace App\Http\Controllers\AdminDesa\DataPokja1;
use App\Http\Controllers\Controller;
use App\Models\Data_Desa;
use App\Models\Penghayatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PenghayatanDanPengamalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //halaman penghayatan pokja 1
        // nama desa yang login
        // $desa = Data_Desa::all();
        $peng = Penghayatan::with('desa')
        ->where('id_desa', auth()->user()->id_desa)

        ->get();

        return view('admin_desa.sub_file_pokja_1.penghayatan', compact('peng'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // nama desa yang login
        // $desas = DB::table('data_desa')->get();
        $desas = DB::table('data_desa')
        ->where('id', auth()->user()->id_desa)
        ->get();
        return view('admin_desa.sub_file_pokja_1.form.create_penghayatan', compact('desas'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // proses penyimpanan untuk tambah data penghayatan
        $request->validate([
            'id_desa' => 'required',
            'jml_PKBN_simulasi' => 'required',
            'jml_PKBN_anggota' => 'required',
            'jml_PKDRT_simulasi' => 'required',
            'jml_PKDRT_anggota' => 'required',
            'jml_pola_asuh_simulasi' => 'required',
            'jml_pola_asuh_anggota' => 'required',
            'jml_lansia_klp' => 'required',
            'jml_lansia_anggota' => 'required',
            'periode'=>'required'
        ], [
            'id_desa.required' => 'Lengkapi Id Desa',
            'jml_PKBN_simulasi.required' => 'Lengkapi Jumlah PKBN Simulasi',
            'jml_PKBN_anggota.required' => 'Lengkapi Jumlah PKBN Anggota',
            'jml_PKDRT_simulasi.required' => 'Lengkapi Jumlah PKDRT Simulasi',
            'jml_PKDRT_anggota.required' => 'Lengkapi Jumlah PKDRT Anggota',
            'jml_pola_asuh_simulasi.required' => 'Lengkapi Jumlah Pola Asuh Simulasi',
            'jml_pola_asuh_anggota.required' => 'Lengkapi Jumlah Pola Asuh Anggota',
            'jml_lansia_klp.required' => 'Lengkapi Jumlah Lansia KLP',
            'jml_lansia_anggota.required' => 'Lengkapi Jumlah Lansia Anggota',
            'periode.required' => 'Lengkapi Periode',

        ]);
        $insert=DB::table('penghayatan')->where('periode', $request->periode)->first();
        if ($insert != null) {
            Alert::error('Gagal', 'Data Tidak Berhasil Di Ubah, Hanya Bisa Menggunakan Satu kali Periode. Periode Sudah Ada ');

            return redirect('/penghayatan');

        }
        else {
            // cara 1
            $peng = new Penghayatan;
            $peng->id_desa = $request->id_desa;
            $peng->jml_PKBN_simulasi = $request->jml_PKBN_simulasi;
            $peng->jml_PKBN_anggota = $request->jml_PKBN_anggota;
            $peng->jml_PKDRT_simulasi = $request->jml_PKDRT_simulasi;
            $peng->jml_PKDRT_anggota = $request->jml_PKDRT_anggota;
            $peng->jml_pola_asuh_simulasi = $request->jml_pola_asuh_simulasi;
            $peng->jml_pola_asuh_anggota = $request->jml_pola_asuh_anggota;
            $peng->jml_lansia_klp = $request->jml_lansia_klp;
            $peng->jml_lansia_anggota = $request->jml_lansia_anggota;
            $peng->periode = $request->periode;
            // dd($peng);

            $peng->save();


            Alert::success('Berhasil', 'Data berhasil di tambahkan');

            return redirect('/penghayatan');
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
    public function edit(Penghayatan $penghayatan)
    {
        //halaman edit data jml_kader
        $desa = Penghayatan::with('desa')->first();
        $desas = Data_Desa::where('id', auth()->user()->id_desa)
            ->get();

        return view('admin_desa.sub_file_pokja_1.form.edit_penghayatan', compact('penghayatan','desa','desas'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penghayatan $penghayatan)
    {
        // proses penyimpanan untuk tambah data penghayatan
        $request->validate([
            'id_desa' => 'required',
            'jml_PKBN_simulasi' => 'required',
            'jml_PKBN_anggota' => 'required',
            'jml_PKDRT_simulasi' => 'required',
            'jml_PKDRT_anggota' => 'required',
            'jml_pola_asuh_simulasi' => 'required',
            'jml_pola_asuh_anggota' => 'required',
            'jml_lansia_klp' => 'required',
            'jml_lansia_anggota' => 'required',
            'periode' => 'required',

       ]);
       $update=DB::table('penghayatan')->where('periode', $request->periode)->first();
       if ($update != null) {
           Alert::error('Gagal', 'Data Tidak Berhasil Di Ubah, Hanya Bisa Menggunakan Satu kali Periode. Periode Sudah Ada ');

           return redirect('/penghayatan');

       }
       else {

            $penghayatan->update($request->all());

            Alert::success('Berhasil', 'Data berhasil di ubah');
            //    dd($penghayatan);

            return redirect('/penghayatan');
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($penghayatan, Penghayatan $peng)
    {
        //temukan id penghayatan
        $peng::find($penghayatan)->delete();

        return redirect('/penghayatan')->with('status', 'sukses');

    }
}
