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

        // data catatan data dan kegiatan warga kelompok dasa wisma admin desa
        public function data_kelompok_dasa_wisma()
        {
            return view('admin_desa.data_rekap.data_kelompok_dasa_wisma');
        }

        // rekap catatan data dan kegiatan warga kelompok dasa wisma admin desa
        public function rekap_kelompok_dasa_wisma()
        {
            return view('admin_desa.data_rekap.data_rekap_dasa_wisma');
        }

        // data catatan data dan kegiatan warga kelompok pkk rt admin desa
        public function data_kelompok_pkk_rt()
        {
            return view('admin_desa.data_rekap.data_kelompok_pkk_rt');
        }

         // rekap catatan data dan kegiatan warga kelompok rt admin desa
        public function rekap_kelompok_pkk_rt()
        {
            return view('admin_desa.data_rekap.data_rekap_pkk_rt');
        }

        // data catatan data dan kegiatan warga kelompok pkk rw admin desa
        public function data_kelompok_pkk_rw()
        {
            return view('admin_desa.data_rekap.data_rekap_pkk_rw');
        }

        // rekap catatan data dan kegiatan warga kelompok rw admin desa
        public function rekap_kelompok_pkk_rw()
        {
            return view('admin_desa.data_rekap.data_rekap_pkk_rw');
        }

        // data catatan data dan kegiatan warga kelompok pkk dusun admin desa
        public function data_kelompok_pkk_dusun()
        {
            return view('admin_desa.data_rekap.data_kelompok_dasa_wisma');
        }

        // rekap catatan data dan kegiatan warga kelompok dusun admin desa
        public function rekap_kelompok_pkk_dusun()
        {
            return view('admin_desa.data_rekap.data_rekap_pkk_dusun');
        }

        // data catatan data dan kegiatan warga kelompok pkk desa admin desa
        // public function data_kelompok_pkk_desa()
        // {
        //     return view('admin_desa.data_rekap.data_kelompok_dasa_wisma');
        // }

        // rekap catatan data dan kegiatan warga kelompok desa admin desa
        public function rekap_kelompok_pkk_desa()
        {
            return view('admin_desa.data_rekap.data_rekap_pkk_desa');
        }

}