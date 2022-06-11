<?php

namespace App\Http\Controllers;

use App\Models\DataKeluarga;
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
            $dasa_wisma = DB::table('data_keluarga')->select('dasa_wisma',  'rt','rw', 'periode')->distinct()->get();
            // dd($dasa_wisma);
            return view('admin_desa.data_rekap.data_kelompok_dasa_wisma', compact('dasa_wisma'));
        }

        // rekap catatan data dan kegiatan warga kelompok dasa wisma admin desa
        public function rekap_kelompok_dasa_wisma(Request $request)
        {
            $rekap = DB::table('data_warga')
            ->join('data_desa', 'data_desa.id', '=', 'data_warga.id_desa')
            ->select('dasa_wisma',  'rt','rw', 'periode', 'nama_desa')->distinct()->where('dasa_wisma', $request->query('dasa_wisma'))
            ->get();
            // $warga = DB::table('data_warga')->select('nama_kepala_rumah_tangga', 'status_keluarga')->distinct()->get();
            // $kegiatan = DataWarga::query()
            //     ->with([
            //         'kegiatan',
            //         'kegiatan.kategori_kegiatan',
            //         'kegiatan.keterangan_kegiatan',
            //         'pemanfaatan',
            //         'industri'
            //     ])
            //     ->get();
            $kegiatan = DataWarga::
                leftjoin('data_kegiatan_warga', 'data_warga.id', '=', 'data_kegiatan_warga.id_warga')
                ->leftjoin('kategori_kegiatan', 'data_kegiatan_warga.id_kategori', '=', 'kategori_kegiatan.id')
                ->select('data_warga.*', 'data_kegiatan_warga.*', 'kategori_kegiatan.*')
                ->where('nama_kegiatan')->get();;

            $catatan_keluarga = DataKeluarga::
                leftjoin('data_pemanfaatan_pekarangan', 'data_pemanfaatan_pekarangan.id_keluarga', '=', 'data_keluarga.id')
                ->leftjoin('data_industri_rumah', 'data_industri_rumah.id_keluarga', '=', 'data_keluarga.id')
                ->select('data_keluarga.*', 'data_industri_rumah.*', 'data_pemanfaatan_pekarangan.*', 'data_industri_rumah.nama_kategori as kategori_industri')
                ->get();
            // $catatan_keluarga = DataKeluarga::all();
            // $catatan_keluarga = DataKeluarga::query()
            //     ->with([
            //         'pemanfaatan',
            //         'industri',
            //     ])
            //     ->get();
            dd($kegiatan);
            return view('admin_desa.data_rekap.data_rekap_dasa_wisma', compact('rekap', 'catatan_keluarga', 'kegiatan'));
        }

        // data catatan data dan kegiatan warga kelompok pkk rt admin desa
        public function data_kelompok_pkk_rt()
        {
            $rt = DB::table('data_warga')->select('rt','rw', 'periode')->distinct()->get();

            return view('admin_desa.data_rekap.data_kelompok_pkk_rt', compact('rt'));
        }

         // rekap catatan data dan kegiatan warga kelompok rt admin desa
        public function rekap_kelompok_pkk_rt(Request $request)
        {
            $rekap = DB::table('data_warga')
            ->join('data_desa', 'data_desa.id', '=', 'data_warga.id_desa')
            ->select('rt','rw', 'periode', 'nama_desa')->distinct()
            ->get();
            $catatan_keluarga = DataWarga::
                leftjoin('data_kegiatan_warga', 'data_warga.id', '=', 'data_kegiatan_warga.id_warga')
                ->leftjoin('kategori_kegiatan', 'data_kegiatan_warga.id_kegiatan', '=', 'kategori_kegiatan.id')
                ->leftjoin('keterangan_kegiatan', 'data_kegiatan_warga.id_keterangan', '=', 'keterangan_kegiatan.id')
                ->leftjoin('data_keluarga', 'data_warga.id', '=', 'data_keluarga.id_warga')
                ->select('data_warga.*', 'data_warga.dasa_wisma as warga_dasa_wisma', 'data_keluarga.*', 'data_kegiatan_warga.*', 'kategori_kegiatan.*')
                ->get();
            $hitung_sehat = DataKeluarga::where('kriteria_rumah', '1')->get()->sum('kriteria_rumah');
            // dd($hitung_sehat);

            return view('admin_desa.data_rekap.data_rekap_pkk_rt', compact('rekap', 'catatan_keluarga', 'hitung_sehat'));
        }

        // data catatan data dan kegiatan warga kelompok pkk rw admin desa
        public function data_kelompok_pkk_rw()
        {
            $rw = DB::table('data_warga')->select('rw', 'periode')->distinct()->get();

            return view('admin_desa.data_rekap.data_kelompok_pkk_rw', compact('rw'));
        }

        // rekap catatan data dan kegiatan warga kelompok rw admin desa
        public function rekap_kelompok_pkk_rw()
        {
            $rekap = DB::table('data_warga')
            ->join('data_desa', 'data_desa.id', '=', 'data_warga.id_desa')
            ->select('rt','rw', 'periode', 'nama_desa')->distinct()
            ->get();
            $catatan_keluarga = DataWarga::query()
                ->with([
                    'kegiatan',
                    'kegiatan.kategori_kegiatan',
                    'kegiatan.keterangan_kegiatan',
                    'keluarga'
                ])
                // ->select('nama_kepala_rumah_tangga')->distinct()
                // ->where('dasa_wisma', $request->query('dasa_wisma'))
                ->get();
            // dd($catatan_keluarga);

            return view('admin_desa.data_rekap.data_rekap_pkk_rw', compact('rekap', 'catatan_keluarga'));
        }

        // data catatan data dan kegiatan warga kelompok pkk dusun admin desa
        public function data_kelompok_pkk_dusun()
        {
            $dusun = DB::table('data_warga')->select('alamat', 'periode')->distinct()->get();
            return view('admin_desa.data_rekap.data_kelompok_pkk_dusun', compact('dusun'));
        }

        // rekap catatan data dan kegiatan warga kelompok dusun admin desa
        public function rekap_kelompok_pkk_dusun()
        {
            $rekap = DB::table('data_warga')
            ->join('data_desa', 'data_desa.id', '=', 'data_warga.id_desa')
            ->select('alamat', 'periode', 'nama_desa')->distinct()
            ->get();
            $catatan_keluarga = DataWarga::query()
            ->with([
                'kegiatan',
                'kegiatan.kategori_kegiatan',
                'kegiatan.keterangan_kegiatan',
                'keluarga'
            ])
            // ->select('nama_kepala_rumah_tangga')->distinct()
            // ->where('dasa_wisma', $request->query('dasa_wisma'))
            ->get();
            return view('admin_desa.data_rekap.data_rekap_pkk_dusun', compact('rekap', 'catatan_keluarga'));
        }

        // data catatan data dan kegiatan warga kelompok pkk desa admin desa
        public function data_kelompok_pkk_desa()
        {
            $desa = DB::table('data_warga')->select('alamat', 'periode')->distinct()->get();
            return view('admin_desa.data_rekap.data_kelompok_pkk_desa', compact('desa'));
        }

        // rekap catatan data dan kegiatan warga kelompok desa admin desa
        public function rekap_kelompok_pkk_desa()
        {
            $rekap = DB::table('data_warga')
            ->join('data_desa', 'data_desa.id', '=', 'data_warga.id_desa')
            ->select('alamat', 'periode', 'nama_desa')->distinct()
            ->get();
            $catatan_keluarga = DataWarga::query()
            ->with([
                'kegiatan',
                'kegiatan.kategori_kegiatan',
                'kegiatan.keterangan_kegiatan',
                'keluarga'
            ])->get();
            return view('admin_desa.data_rekap.data_rekap_pkk_desa', compact('rekap',  'catatan_keluarga'));
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
