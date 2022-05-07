<?php

namespace App\Http\Controllers;

use App\Models\DataWarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
        // halaman dashboard
        public function dashboard(){
            return view('admin_desa.dashboard');
        }

        // halaman data pokja1
        public function data_pokja1(){
            return view('admin_desa.data_pokja1');
        }

        // halaman data pokja2
        public function data_pokja2(){
            return view('admin_desa.data_pokja2');
        }

        // halaman data pokja3
        public function data_pokja3(){
            return view('admin_desa.data_pokja3');
        }

        // halaman data pokja4
        public function data_pokja4(){
            return view('admin_desa.data_pokja4');
        }

        // halaman data pokja4
        public function data_laporan(){
            return view('admin_desa.data_laporan');
        }

        // halaman data pokja4
        public function data_pengguna(){
            return view('admin_desa.data_pengguna');
        }

        // halaman data sekretariat
        public function data_sekretariat(){
            return view('admin_desa.data_sekretariat');
        }

        // halaman login admin desa
        public function login()
        {
            return view('admin_desa.login');
        }

        // halaman pengiriman data login admin desa
        public function loginPost(Request $request)
        {
            $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            $credentials['email'] = $request->get('email');
            $credentials['password'] = $request->get('password');
            $credentials['user_type'] = 'admin_desa';
            $remember = $request->get('remember');

            $attempt = Auth::attempt($credentials, $remember);
// dd($attempt);

            if ($attempt) {
                return redirect('/dashboard');
            } else {
                return back()->withErrors(['email' => ['Incorrect email / password.']]);
            }
        }

        // pengiriman data logout admin desa
        public function logoutPost()
        {
            Auth::logout();

            return redirect()->route('admin_desa.login');
        }


}
