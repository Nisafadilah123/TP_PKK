<?php

namespace App\Http\Controllers;
use App\Models\BeritaKab;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminKabController extends Controller
{
    // halaman dashboard
    public function dashboard_kab(){
        $berita = BeritaKab::count();

        return view('admin_kab.dashboard_kab', compact('berita'));
    }

    // halaman data pokja1
    public function kelompok_data_pokja1_kab(){

        return view('admin_kab.data_pokja.data_kelompok_data_pokja_1');
    }
    // halaman data pokja1
    public function data_pokja1_kab(){

        // FAIL
        // return view('admin_kab.data_pokja1');
        return view('admin_kab.data_pokja.data_pokja_1');
    }

    // halaman data pokja1
    public function kelompok_data_pokja2_kab(){

        return view('admin_kab.data_pokja.data_kelompok_data_pokja_2');
    }

    // halaman data pokja2
    public function data_pokja2_kab(){
        // return view('admin_kab.data_pokja2');
        return view('admin_kab.data_pokja.data_pokja_2');

    }

    // halaman data pokja1
    public function kelompok_data_pokja3_kab(){

        return view('admin_kab.data_pokja.data_kelompok_data_pokja_3');
    }

    // halaman data pokja3
    public function data_pokja3_kab(){
        // return view('admin_kab.data_pokja3');
        return view('admin_kab.data_pokja.data_pokja_3');
    }

    // halaman data pokja1
    public function kelompok_data_pokja4_kab(){
        return view('admin_kab.data_pokja.data_kelompok_data_pokja_4');
    }

    // halaman data pokja4
    public function data_pokja4_kab(){
        // return view('admin_kab.data_pokja4');
        return view('admin_kab.data_pokja.data_pokja_4');
    }

    // halaman data pokja1
    public function kelompok_data_umum_kab(){
        return view('admin_kab.data_pokja.data_kelompok_data_umum');
    }

    // halaman data pokja4
    public function data_umum_kab(){
    // return view('admin_kab.data_pokja4');
        return view('admin_kab.data_pokja.data_umum');
    }

    // halaman data pokja4
    public function data_laporan_kab(){
        return view('admin_kab.data_laporan_kab');
    }

    // halaman data pokja4
    public function data_pengguna_kab(){
        return view('admin_kab.data_pengguna_kab');
    }

    // halaman data sekretariat
    public function data_sekretariat_kab(){
        return view('admin_kab.data_sekretariat_kab');
    }

    // halaman login admin kabupaten
    public function login()
    {
        return view('admin_kab.login');
    }

    // // halaman pengiriman data login admin kabupaten
    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $credentials['email'] = $request->get('email');
        $credentials['password'] = $request->get('password');
        $credentials['user_type'] = 'admin_kabupaten';
        $remember = $request->get('remember');

        $attempt = Auth::attempt($credentials, $remember);
// dd($attempt);

        if ($attempt) {
            return redirect('/dashboard_kab');
        } else {
            return back()->withErrors(['email' => ['Incorrect email / password.']]);
        }
    }

    // pengiriman data logout admin kabupaten
    public function logoutPost()
    {
        Auth::logout();

        return redirect()->route('admin_kabupaten.login');
    }

    // rekap catatan data dan kegiatan warga admin kec
    public function rekap_kegiatan_kab()
    {
        return view('admin_kab.rekap_kegiatan_kab');
    }

}