<?php

namespace App\Http\Controllers;

use App\Models\DataKeluarga;
use App\Models\DataWarga;
use App\Models\KategoriKegiatan;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\DB;

class KaderFormController extends Controller
{
    //
    // halaman dashboard
    public function dashboard_kader(){
        return view('kader.dashboard');
    }

    // halaman data pokja1
    public function data_pokja1(){
        return view('kader.data_pokja1');
    }

    // halaman data pokja2
    public function data_pokja2(){
        return view('kader.data_pokja2');
    }

    // halaman data pokja3
    public function data_pokja3(){
        return view('kader.data_pokja3');
    }

    // halaman data pokja4
    public function data_pokja4(){
        return view('kader.data_pokja4');
    }

    // halaman login kader desa pendata
    public function login()
    {
        return view('kader.loginKaderDesa');
    }

    // halaman pengiriman data login kader desa pendata
    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $credentials['email'] = $request->get('email');
        $credentials['password'] = $request->get('password');
        $credentials['user_type'] = 'kader_desa';
        $remember = $request->get('remember');

        $attempt = Auth::attempt($credentials, $remember);
// dd($attempt);

        if ($attempt) {
            return redirect('/dashboard_kader');
        } else {
            return back()->withErrors(['email' => ['Incorrect email / password.']]);
        }
    }

    // pengiriman data logout kader desa pendata
    public function logoutPost()
    {
        Auth::logout();

        return redirect()->route('kader_desa.login');
    }

    // ngambil nama kepala keluarga
    public function rekap(){
        $warga = DataKeluarga::all();
        // dd($warga);
        return view('kader.rekap', compact('warga'));
    }

     // halaman data rekap data warga pkk
    public function rekap_data_warga($id){
        $kepala_keluarga = DataWarga::findOrFail($id);

        // $warga = DataWarga::where('nik_kepala_keluarga', $kepala_keluarga->no_ktp)
        // ->get();
        // $warga = DB::table('data_warga')
        // ->join('data_keluarga', 'data_keluarga.id', '=', 'data_warga.id_keluarga' )
        // // ->where('nama_kepala_keluarga', $id)
        // ->get();

        $warga =  DataWarga::where('id_keluarga', $id)->get();
        // $print = DataWarga::where('nik_kepala_keluarga', $kepala_keluarga->no_ktp)
        // ->first();

        // $print_pdf = DataWarga::where('nik_kepala_keluarga', $kepala_keluarga->no_ktp)
        // ->first();
        $print = DataWarga::where('id_keluarga', $id)
        ->first();

        $print_pdf = DataWarga::where('id_keluarga', $id)
        ->first();

        // dd($warga);
        return view('kader.data_rekap', compact('warga', 'print','print_pdf'));
    }

     // print halaman data rekap data warga pkk
     public function print($id){
        $kepala_keluarga = DataWarga::findOrFail($id)->first();

        // $warga = DataWarga::where('nik_kepala_keluarga', $kepala_keluarga->no_ktp)
        // ->get();
        $warga = DataWarga::where('id_keluarga', $id)
        ->get();

        return view('kader.print_rekap', compact('warga'));
    }

     // print halaman data rekap data warga pkk
     public function print_pdf($id){
        $kepala_keluarga = DataWarga::findOrFail($id)->first();

        // $warga = DataWarga::where('nik_kepala_keluarga', $kepala_keluarga->no_ktp)
        // ->get();
        $warga = DataWarga::where('id_keluarga', $id)
        ->get();

        $html= view('kader.print_rekap_pdf', compact('warga'));
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }

    // halaman data catatan keluarga pkk
     public function catatan_keluarga($id)
     {
        $kepala_keluarga = DataWarga::find($id);

        // $keluarga = DataKeluarga::where('id_warga', $kepala_keluarga->id)->first();
        $keluarga = DataKeluarga::first();

        // $catatan_keluarga = DataWarga::query()
        //     ->with(['kegiatan', 'kegiatan.kategori_kegiatan',
        //         'kegiatan.keterangan_kegiatan','kepalaKeluarga', 'keluarga'])
        //     ->where('nik_kepala_keluarga', $kepala_keluarga->no_ktp)
        //     ->get();
        $catatan_keluarga = DataWarga::query()
            ->with(['kegiatan', 'kegiatan.kategori_kegiatan',
                'kegiatan.keterangan_kegiatan', 'keluarga'])
            ->where('id_keluarga', $id)
            ->get();
        // dump($catatan_keluarga);

        $kategori_kegiatans = KategoriKegiatan::query()->where('id', '<=', 8)->get();

        // $print_cakel = DataWarga::where('nik_kepala_keluarga', $kepala_keluarga->no_ktp)
        // ->first();
        $print_cakel = DataWarga::where('id_keluarga', $id)
        ->first();

        // $print_pdf_cakel = DataWarga::where('nik_kepala_keluarga', $kepala_keluarga->no_ktp)
        // ->first();

        $print_pdf_cakel = DataWarga::where('id_keluarga', $id)
        ->first();

        return view('kader.catatan_keluarga', compact('catatan_keluarga', 'keluarga', 'kepala_keluarga', 'kategori_kegiatans', 'print_cakel', 'print_pdf_cakel'));
    }

    // print halaman data rekap catatan data keluarga pkk
    public function print_cakel($id){
        $kepala_keluarga = DataWarga::find($id)->first();

       // $keluarga = DataKeluarga::where('id_warga', $kepala_keluarga->id)->first();
       $keluarga = DataKeluarga::first();

       // $catatan_keluarga = DataWarga::query()
       //     ->with(['kegiatan', 'kegiatan.kategori_kegiatan',
       //         'kegiatan.keterangan_kegiatan','kepalaKeluarga', 'keluarga'])
       //     ->where('nik_kepala_keluarga', $kepala_keluarga->no_ktp)
       //     ->get();
       $catatan_keluarga = DataWarga::query()
           ->with(['kegiatan', 'kegiatan.kategori_kegiatan',
               'kegiatan.keterangan_kegiatan', 'keluarga'])
           ->where('id_keluarga', $id)
           ->get();
       // dump($catatan_keluarga);

       $kategori_kegiatans = KategoriKegiatan::query()->where('id', '<=', 8)->get();

        return view('kader.print_rekap_cakel', compact('catatan_keluarga', 'keluarga', 'kepala_keluarga', 'kategori_kegiatans'));
    }

     // print halaman data rekap data warga pkk
     public function print_pdf_cakel($id){
        $kepala_keluarga = DataWarga::find($id)->first();

        // $keluarga = DataKeluarga::where('id_warga', $kepala_keluarga->id)->first();
        $keluarga = DataKeluarga::first();

        // $catatan_keluarga = DataWarga::query()
        //     ->with(['kegiatan', 'kegiatan.kategori_kegiatan',
        //         'kegiatan.keterangan_kegiatan','kepalaKeluarga', 'keluarga'])
        //     ->where('nik_kepala_keluarga', $kepala_keluarga->no_ktp)
        //     ->get();
        $catatan_keluarga = DataWarga::query()
            ->with(['kegiatan', 'kegiatan.kategori_kegiatan',
                'kegiatan.keterangan_kegiatan', 'keluarga'])
            ->where('id_keluarga', $id)
            ->get();
        // dump($catatan_keluarga);

        $kategori_kegiatans = KategoriKegiatan::query()->where('id', '<=', 8)->get();

        return view('kader.print_pdf_cakel', compact('catatan_keluarga', 'keluarga', 'kepala_keluarga', 'kategori_kegiatans'));
        // // instantiate and use the dompdf class
        // $dompdf = new Dompdf();
        // $dompdf->loadHtml($html);

        // // (Optional) Setup the paper size and orientation
        // $dompdf->setPaper('a3', 'landscape');

        // // Render the HTML as PDF
        // $dompdf->render();

        // // Output the generated PDF to Browser
        // $dompdf->stream();
        $pdf = PDF::loadview('kader.catatan_keluarga');
    	// return $pdf->download('laporan-pegawai-pdf');
        return $pdf->stream();

    }
}
