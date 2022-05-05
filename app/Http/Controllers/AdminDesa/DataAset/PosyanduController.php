<?php

namespace App\Http\Controllers\AdminDesa\DataAset;
use App\Http\Controllers\Controller;
use App\Models\Posyandu;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PosyanduController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //halaman pengelola posyandu
        // nama desa yang login
        $desas = DB::table('data_desa')
        ->where('id', auth()->user()->id_desa)
        ->get();

        $kec = DB::table('data_kecamatan')
            ->where('id', auth()->user()->id_desa)
            ->get();

        $posyandu = Posyandu::all();

        return view('admin_desa.data_aset.posyandu', compact('posyandu', 'desas', 'kec'));
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
        ->where('id', auth()->user()->id_desa)
        ->get();

        // dd($desas);
        return view('admin_desa.data_aset.form.create_posyandu', compact('desas', 'kec'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // proses penyimpanan untuk tambah data pengelola warung
    //    dd($request->all());
       $request->validate([
            'id_desa' => 'required',
            'id_kecamatan' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'nama_posyandu' => 'required',
            'pengelola' => 'required',
            'sekretaris' => 'required',
            'jenis_posyandu' => 'required',
            'jumlah_kader' => 'required',

        ], [
            'id_desa.required' => 'Lengkapi Alamat Desa Taman Bacaan/Perpustakaan PKK Desa/Kelurahan',
            'id_kecamatan' => 'Lengkapi Alamat Kecamatan Taman Bacaan/Perpustakaan PKK Desa/Kelurahan',
            'kota.required' => 'Lengkapi Kota Taman Bacaan/Perpustakaan PKK Desa/Kelurahan',
            'provinsi.required' => 'Lengkapi Provinsi Taman Bacaan/Perpustakaan PKK Desa/Kelurahan',
            'nama_posyandu.required' => 'Lengkapi Nama Posyandu PKK Desa/Kelurahan',
            'pengelola.required' => 'Lengkapi Nama Penanggung Jawab Pelaksanaan Posyandu PKK Desa/Kelurahan',
            'sekretaris.required' => 'Lengkapi Sekretaris Penanggung Jawab Pelaksanaan Posyandu PKK Desa/Kelurahan',
            'jenis_posyandu.required' => 'Pilih Jenis Posyandu PKK Desa/Kelurahan',
            'jumlah_kader.required' => 'Lengkapi Jumlah Kader yang aktif dalam pelaksanaan Posyandu PKK Desa/Kelurahan',

        ]);

        // cara 1
        $insert=DB::table('data_aset_posyandu')->where('nama_posyandu', $request->nama_posyandu)->first();
        if ($insert != null) {
            Alert::error('Gagal', 'Data Tidak Berhasil Di Tambahkan, Nama Taman Bacaan Sudah Ada ');

            return redirect('/posyandu');
        }
        else {
            $posyandu = new Posyandu;
            $posyandu->id_desa = $request->id_desa;
            $posyandu->id_kecamatan = $request->id_kecamatan;
            $posyandu->kota = $request->kota;
            $posyandu->provinsi = $request->provinsi;
            $posyandu->nama_posyandu = $request->nama_posyandu;
            $posyandu->pengelola = $request->pengelola;
            $posyandu->sekretaris = $request->sekretaris;
            $posyandu->jenis_posyandu = $request->jenis_posyandu;
            $posyandu->jumlah_kader = $request->jumlah_kader;

            $posyandu->save();

            Alert::success('Berhasil', 'Data berhasil di tambahkan');

            return redirect('/posyandu');
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
    public function edit(Posyandu $posyandu)
    {
        //halaman edit data posyandu
        // nama desa yang login
        $desas = DB::table('data_desa')
            ->where('id', auth()->user()->id_desa)
            ->get();
        $kec = DB::table('data_kecamatan')
            ->where('id', auth()->user()->id_desa)
            ->get();


        return view('admin_desa.data_aset.form.edit_posyandu', compact('kec','desas', 'posyandu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posyandu $posyandu)
    {
        // proses mengubah data pengelola posyandu
        $request->validate([
            'id_desa' => 'required',
            'id_kecamatan' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'nama_posyandu' => 'required',
            'pengelola' => 'required',
            'sekretaris' => 'required',
            'jenis_posyandu' => 'required',
            'jumlah_kader' => 'required',

        ], [
            'id_desa.required' => 'Lengkapi Alamat Desa Taman Bacaan/Perpustakaan PKK Desa/Kelurahan',
            'id_kecamatan' => 'Lengkapi Alamat Kecamatan Taman Bacaan/Perpustakaan PKK Desa/Kelurahan',
            'kota.required' => 'Lengkapi Kota Taman Bacaan/Perpustakaan PKK Desa/Kelurahan',
            'provinsi.required' => 'Lengkapi Provinsi Taman Bacaan/Perpustakaan PKK Desa/Kelurahan',
            'nama_posyandu.required' => 'Lengkapi Nama Posyandu PKK Desa/Kelurahan',
            'pengelola.required' => 'Lengkapi Nama Penanggung Jawab Pelaksanaan Posyandu PKK Desa/Kelurahan',
            'sekretaris.required' => 'Lengkapi Sekretaris Penanggung Jawab Pelaksanaan Posyandu PKK Desa/Kelurahan',
            'jenis_posyandu.required' => 'Pilih Jenis Posyandu PKK Desa/Kelurahan',
            'jumlah_kader.required' => 'Lengkapi Jumlah Kader yang aktif dalam pelaksanaan Posyandu PKK Desa/Kelurahan',

        ]);
        // $update=DB::table('data_aset_posyandu')->where('nama_posyandu', $request->nama_posyandu)->first();
        // if ($update != null) {
        //     Alert::error('Gagal', 'Data Tidak Berhasil Di Ubah, Nama Posyandu Sudah Ada ');

        //     return redirect('/posyandu');
        // }
        // else {
            $posyandu->update($request->all());

            Alert::success('Berhasil', 'Data berhasil di ubah');
            // dd($jml_kader);
            return redirect('/posyandu');
            // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($posyandu, Posyandu $taman)
    {
        //temukan id war$posyandu
        $taman::find($posyandu)->delete();
        Alert::success('Berhasil', 'Data berhasil di hapus');

        return redirect('/posyandu');


    }

}