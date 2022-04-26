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
        public function data_pokja1_kec(){
            return view('admin_kec.data_pokja1_kec');
        }

        // halaman data pokja2
        public function data_pokja2_kec(){
            return view('admin_kec.data_pokja2_kec');
        }

        // halaman data pokja3
        public function data_pokja3_kec(){
            return view('admin_kec.data_pokja3_kec');
        }

        // halaman data pokja4
        public function data_pokja4_kec(){
            return view('admin_kec.data_pokja4_kec');
        }

        // halaman data pokja4
        public function data_laporan_kec(){
            return view('admin_kec.data_laporan_kec');
        }

        // halaman data pokja4
        public function data_pengguna_kec(){
            return view('admin_kec.data_pengguna_kec');
        }

        // halaman data sekretariat
        public function data_sekretariat_kec(){
            return view('admin_kec.data_sekretariat_kec');
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
}