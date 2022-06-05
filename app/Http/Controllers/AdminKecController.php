<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminKecController extends Controller
{
        // halaman dashboard
        public function dashboard_kec(){

            return view('admin_kec.dashboard_kec');
        }

        // halaman data pokja1
        public function kelompok_data_pokja1_kec(){

            return view('admin_kec.data_pokja.data_kelompok_data_pokja_1');
        }
        // halaman data pokja1
        public function data_pokja1_kec(){

            // FAIL
            // return view('admin_kec.data_pokja1');
            return view('admin_kec.data_pokja.data_pokja_1');
        }

        // halaman data pokja1
        public function kelompok_data_pokja2_kec(){

            return view('admin_kec.data_pokja.data_kelompok_data_pokja_2');
        }

        // halaman data pokja2
        public function data_pokja2_kec(){
            // return view('admin_kec.data_pokja2');
            return view('admin_kec.data_pokja.data_pokja_2');

        }

        // halaman data pokja1
        public function kelompok_data_pokja3_kec(){

            return view('admin_kec.data_pokja.data_kelompok_data_pokja_3');
        }

        // halaman data pokja3
        public function data_pokja3_kec(){
            // return view('admin_kec.data_pokja3');
            return view('admin_kec.data_pokja.data_pokja_3');
        }

        // halaman data pokja1
        public function kelompok_data_pokja4_kec(){
            return view('admin_kec.data_pokja.data_kelompok_data_pokja_4');
        }

        // halaman data pokja4
        public function data_pokja4_kec(){
            // return view('admin_kec.data_pokja4');
            return view('admin_kec.data_pokja.data_pokja_4');
        }

        // halaman data pokja1
        public function kelompok_data_umum_kec(){
            return view('admin_kec.data_pokja.data_kelompok_data_umum');
        }

        // halaman data pokja4
        public function data_umum_kec(){
        // return view('admin_kec.data_pokja4');
            return view('admin_kec.data_pokja.data_umum');
        }

        // halaman data pokja4
        public function data_laporan_kec(){
            return view('admin_kec.data_laporan_kec');
        }

        // halaman data pokja4
        public function data_pengguna_kec(){
            return view('admin_kec.data_pengguna_kec');
        }

        // halaman login admin kecamatan
        public function login()
        {
            return view('admin_kec.login');
        }

        // halaman pengiriman data login admin kecamatan
        public function loginPost(Request $request)
        {
            $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            $credentials['email'] = $request->get('email');
            $credentials['password'] = $request->get('password');
            $credentials['user_type'] = 'admin_kecamatan';
            $remember = $request->get('remember');

            $attempt = Auth::attempt($credentials, $remember);
// dd($attempt);

            if ($attempt) {
                return redirect('/dashboard_kec');
            } else {
                return back()->withErrors(['email' => ['Incorrect email / password.']]);
            }
        }

        // halaman data logout admin kecamatan
        public function logoutPost()
        {
            Auth::logout();

            return redirect()->route('admin_kecamatan.login');
        }

        // rekap catatan data dan kegiatan warga admin kec
        public function rekap_kegiatan_kec()
        {
            return view('admin_kec.rekap_kegiatan_kec');
        }

}