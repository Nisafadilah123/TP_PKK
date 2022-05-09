<?php

namespace App\Http\Controllers;
use App\Models\DataKeluarga;

use App\Models\DataWarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $warga = DataWarga::whereNull('nik_kepala_keluarga')->get();
        // dd($warga);
        return view('kader.rekap', compact('warga'));
    }

     // halaman data rekap data warga pkk
     public function rekap_data_warga($id){
        $kepala_keluarga = DataWarga::findOrFail($id);

        $warga = DataWarga::where('nik_kepala_keluarga', $kepala_keluarga->no_ktp)
        ->get();
        return view('kader.data_rekap', compact('warga'));
    }

    // halaman data catatan keluarga pkk
     public function catatan_keluarga($id){
        $kepala_keluarga = DataWarga::findOrFail($id);

        $catatan_keluarga = DataWarga::where('nik_kepala_keluarga', $kepala_keluarga->no_ktp)
            ->get();
            return view('kader.catatan_keluarga', compact('catatan_keluarga'));
    }

}