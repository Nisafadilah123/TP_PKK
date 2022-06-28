<?php

namespace App\Http\Controllers\AdminKab;
use App\Http\Controllers\Controller;
use App\Models\DataAgenda;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DataAgendaKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //halaman data agenda kegiatan
        $agenda = DataAgenda::all();

        return view('admin_kab.agenda', compact('agenda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_kab.form.create_agenda');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // proses penyimpanan untuk tambah data tema warung
        $request->validate([
            'judul_agenda' => 'required',
            'tema' => 'required',
            'tempat' => 'required',
            'tgl_publish' => 'required',
            'pukul' => 'required',

        ], [
            'judul_agenda.required' => 'Lengkapi Judul Agenda Kegiatan',
            'tema.required' => 'Lengkapi Tema Agenda Kegiatan',
            'tempat.required' => 'Lengkapi Tempat Agenda Kegiatan',
            'tgl_publish.required' => 'Lengkapi Tanggal Publish Agenda Kegiatan',
            'pukul.required' => 'Lengkapi Waktu Agenda Kegiatan',

        ]);

        // cara 1
        // $insert=DB::table('war$warung')->where('pukul', $request->pukul)->first();
        // if ($insert != null) {
        //     Alert::error('Gagal', 'Data Tidak Berhasil Di Tambahkan, Hanya Bisa Menginputkan Satu kali pukul. pukul Sudah Ada ');

        //     return redirect('/war$warung');
        // }
        // else {
            $agendas = new DataAgenda;
            $agendas->judul_agenda = $request->judul_agenda;
            $agendas->tema = $request->tema;
            $agendas->tempat = $request->tempat;
            $agendas->tgl_publish = $request->tgl_publish;
            $agendas->pukul = $request->pukul;

            $agendas->save();

            Alert::success('Berhasil', 'Data berhasil di tambahkan');

            return redirect('/agendaKeg');
        // }
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
    public function edit(DataAgenda $agendaKeg)
    {
        // halaman edit data agenda kegiatan
        $agenda = DataAgenda::all();

        return view('admin_kab.form.edit_agenda', compact('agenda', 'agendaKeg'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataAgenda $agendaKeg)
    {
        // proses mengubah data tema warung
        $request->validate([
            'judul_agenda' => 'required',
            'tema' => 'required',
            'tempat' => 'required',
            'tgl_publish' => 'required',
            'pukul' => 'required',

        ], [
            'judul_agenda.required' => 'Lengkapi Nama Pengelola Data Warung PKK Desa/Kelurahan',
            'tema.required' => 'Lengkapi tema Warung PKK Desa/Kelurahan',
            'tempat.required' => 'Lengkapi tempat Warung PKK Desa/Kelurahan',
            'tgl_publish.required' => 'Lengkapi tgl_publish Warung PKK Desa/Kelurahan',
            'pukul.required' => 'Pilih pukul Warung PKK Desa/Kelurahan',

        ]);
        // $update=DB::table('warung_pkk')->where('pukul', $request->pukul)->first();
        // if ($update != null) {
        //     Alert::error('Gagal', 'Data Tidak Berhasil Di Ubah, Hanya Bisa Menggunakan Satu kali pukul. pukul Sudah Ada ');

        //     return redirect('/war$warung');
        // }
        // else {
            $agendaKeg->update($request->all());

            Alert::success('Berhasil', 'Data berhasil di ubah');
            // dd($jml_kader);

            return redirect('/agendaKeg');
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($agendaKeg, DataAgenda $agenda)
    {
        //temukan id agenda
        $agenda::find($agendaKeg)->delete();
        Alert::success('Berhasil', 'Data berhasil di hapus');

        return redirect('/agendaKeg');

    }

    public function update_status(Request $request, DataAgenda $agendaKeg)
    {
        // proses mengubah data tema warung
        $request->validate([
            'status' => 'required',
        ]);
        // $update=DB::table('warung_pkk')->where('pukul', $request->pukul)->first();
        // if ($update != null) {
        //     Alert::error('Gagal', 'Data Tidak Berhasil Di Ubah, Hanya Bisa Menggunakan Satu kali pukul. pukul Sudah Ada ');

        //     return redirect('/war$warung');
        // }
        // else {
            $agendaKeg->update($request->all());

            Alert::success('Berhasil', 'Data berhasil di ubah');
            // dd($jml_kader);

            return redirect('/agendaKeg');
        // }
    }
}
