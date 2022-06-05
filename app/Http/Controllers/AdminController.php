<?php

namespace App\Http\Controllers;

use App\Models\DataWarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
        // halaman dashboard
        public function dashboard(){
            return view('admin_desa.dashboard');
        }

        // halaman data pokja1
        public function kelompok_data_pokja1(){

            return view('admin_desa.data_pokja.data_kelompok_data_pokja_1');
        }
        // halaman data pokja1
        public function data_pokja1(){

            // FAIL
            // return view('admin_desa.data_pokja1');
            return view('admin_desa.data_pokja.data_pokja_1');
        }

        // halaman data pokja1
        public function kelompok_data_pokja2(){

            return view('admin_desa.data_pokja.data_kelompok_data_pokja_2');
        }

        // halaman data pokja2
        public function data_pokja2(){
            // return view('admin_desa.data_pokja2');
            return view('admin_desa.data_pokja.data_pokja_2');

        }

        // halaman data pokja1
        public function kelompok_data_pokja3(){

            return view('admin_desa.data_pokja.data_kelompok_data_pokja_3');
        }

        // halaman data pokja3
        public function data_pokja3(){
            // return view('admin_desa.data_pokja3');
            return view('admin_desa.data_pokja.data_pokja_3');
        }

        // halaman data pokja1
        public function kelompok_data_pokja4(){
            return view('admin_desa.data_pokja.data_kelompok_data_pokja_4');
        }

        // halaman data pokja4
        public function data_pokja4(){
            // return view('admin_desa.data_pokja4');
            return view('admin_desa.data_pokja.data_pokja_4');
        }

        // halaman data pokja1
        public function kelompok_data_umum(){
            return view('admin_desa.data_pokja.data_kelompok_data_umum');
        }

        // halaman data pokja4
        public function data_umum(){
        // return view('admin_desa.data_pokja4');
            return view('admin_desa.data_pokja.data_umum');

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
            $dasa_wisma = DB::table('data_warga')->select('dasa_wisma',  'rt','rw', 'periode')->distinct()->get();
            // dd($dasa_wisma);
            return view('admin_desa.data_rekap.data_kelompok_dasa_wisma', compact('dasa_wisma'));
        }

        // rekap catatan data dan kegiatan warga kelompok dasa wisma admin desa
        public function rekap_kelompok_dasa_wisma(Request $request)
        {
            $rekap = DB::table('data_warga')->select('dasa_wisma',  'rt','rw', 'periode')->distinct()->get($request);
            $warga = DataWarga::with('desa')->get();
            $catatan_keluarga = DataWarga::query()
                ->with([
                    'kegiatan',
                    'kegiatan.kategori_kegiatan',
                    'kegiatan.keterangan_kegiatan',
                    'keluarga'
                ])
                ->select('nama_kepala_rumah_tangga')->distinct()
                ->where('dasa_wisma', $request->query('dasa_wisma'))
                ->get();
            // dd($catatan_keluarga);
            return view('admin_desa.data_rekap.data_rekap_dasa_wisma', compact('rekap', 'catatan_keluarga', 'warga'));
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

        // rekap catatan data laporan pokja 1
        public function laporan_pokja_1()
        {
            return view('admin_desa.data_laporan_pokja.data_rekap_pokja_1');
        }

        // rekap catatan data laporan pokja 2
        public function laporan_pokja_2()
        {
            return view('admin_desa.data_laporan_pokja.data_rekap_pokja_2');
        }

        // rekap catatan data laporan pokja 3
        public function laporan_pokja_3()
        {
            return view('admin_desa.data_laporan_pokja.data_rekap_pokja_3');
        }

        // rekap catatan data laporan pokja 4
        public function laporan_pokja_4()
        {
            return view('admin_desa.data_laporan_pokja.data_rekap_pokja_4');
        }

        // rekap catatan data laporan data umum
        public function laporan_umum()
        {
            return view('admin_desa.data_laporan_pokja.data_rekap_umum');
        }

}
