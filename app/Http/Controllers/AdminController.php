<?php

namespace App\Http\Controllers;

use App\Models\Data_Desa;
use App\Models\DataKeluarga;
use App\Models\DataWarga;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
        // halaman dashboard
        public function dashboard(){

            // $Variabel = $request->id_kategori+$request->id_room;

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
            /** @var User */
            $user = Auth::user();

            $dasa_wisma = DB::table('data_keluarga')
                ->select('id_desa', 'dasa_wisma',  'rt','rw', 'periode')
                ->where('id_desa', $user->id_desa)
                ->distinct()
                ->get();

            return view('admin_desa.data_rekap.data_kelompok_dasa_wisma', compact('dasa_wisma'));
        }

        // rekap catatan data dan kegiatan warga kelompok dasa wisma admin desa
        public function rekap_kelompok_dasa_wisma(Request $request)
        {
            /** @var User */
            $user = Auth::user();

            $dasa_wisma = $request->query('dasa_wisma');
            $rt = $request->query('rt');
            $rw = $request->query('rw');
            $periode = $request->query('periode');

            // $rekap = DB::table('data_keluarga')
            //     ->join('data_desa', 'data_desa.id', '=', 'data_keluarga.id_desa')
            //     ->select('dasa_wisma',  'rt','rw', 'periode', 'nama_desa')->distinct()->where('dasa_wisma', $request->query('dasa_wisma'))
            //     ->get();

            // $catatan_keluarga = DataKeluarga::
            //     leftjoin('data_pemanfaatan_pekarangan', 'data_pemanfaatan_pekarangan.id_keluarga', '=', 'data_keluarga.id')
            //     ->leftjoin('data_industri_rumah', 'data_industri_rumah.id_keluarga', '=', 'data_keluarga.id')
            //     ->leftjoin('data_kegiatan_warga', 'data_keluarga.id', '=', 'data_kegiatan_warga.id_keluarga')
            //     ->leftjoin('kategori_kegiatan', 'data_kegiatan_warga.id_kategori', '=', 'kategori_kegiatan.id')

            //     ->select(
            //         'data_keluarga.*', 'data_pemanfaatan_pekarangan.*','data_pemanfaatan_pekarangan.id_keluarga as kategori_pemanfaatan',
            //         'data_industri_rumah.*', 'data_kegiatan_warga.*', 'kategori_kegiatan.*'
            //         )
            //     ->get();

            // $rekap

            $catatan_keluarga = DataKeluarga::query()
                ->with(['industri', 'pemanfaatan',
                    ])
                // ->where('id_keluarga', $id)
                ->where('id_desa', $user->id_desa)
                ->where('dasa_wisma', $dasa_wisma)
                ->where('rt', $rt)
                ->where('rw', $rw)
                ->where('periode', $periode)
                ->get();

            $desa = $user->desa;

            return view('admin_desa.data_rekap.data_rekap_dasa_wisma', compact(
                'dasa_wisma',
                'rt',
                'rw',
                'periode',
                'catatan_keluarga',
                'desa',
            ));
        }

        // data catatan data dan kegiatan warga kelompok pkk rt admin desa
        public function data_kelompok_pkk_rt()
        {
            $user = Auth::user();

            $rt = DB::table('data_keluarga')
                ->select('id_desa', 'rt', 'rw', 'periode')
                // ->where('id_desa', $user->id_desa)
                ->distinct()
                ->get();

            return view('admin_desa.data_rekap.data_kelompok_pkk_rt', compact('rt'));
        }

         // rekap catatan data dan kegiatan warga kelompok rt admin desa
        public function rekap_kelompok_pkk_rt(Request $request)
        {
            $user = Auth::user();

            $dasa_wisma = $request->query('dasa_wisma');
            $rt = $request->query('rt');
            $rw = $request->query('rw');
            $periode = $request->query('periode');
            $desa = $request->query('id_desa');
            $id = $request->query('id');


            $catatan_keluarga = DataKeluarga::query()
                ->with(['industri', 'pemanfaatan'])
                ->where([
                    ['rt', $rt],
                    ['rw', $rw],
                    // ['dasa_wisma', $dasa_wisma],
               ])
            //    ->groupBy('dasa_wisma')
                ->get();
            //     $catatan_keluarga = DataKeluarga::query()
            //     ->with(['industri', 'pemanfaatan'])
            //     ->select('dasa_wisma',
            //     DB::raw('SUM("jumlah_KK") AS total_keluarga',
            //     DB::raw('SUM("laki_laki") AS total_laki',
            //     DB::raw('SUM("perempuan") AS total_perempuan',
            //     DB::raw('SUM("jumlah_balita_laki") AS total_balita_laki',
            //     DB::raw('SUM("jumlah_balita_perempuan") AS total_balita_perempuan',
            //     DB::raw('SUM("jumlah_3_buta") AS total_3 buta',
            //     DB::raw('SUM("jumlah_PUS") AS total_PUS',
            //     DB::raw('SUM("jumlah_WUS") AS total_WUS',
            //     DB::raw('SUM("jumlah_ibu_hamil") AS total_ibu_hamil',
            //     DB::raw('SUM("jumlah_ibu_menyusui") AS total_ibu_menyusui',
            //     DB::raw('SUM("jumlah_lansia") AS total_lansia',
            //     DB::raw('SUM("jumlah_kebutuhan") AS total_kebutuhan',
            //     DB::raw('SUM("kriteria_rumah") AS total_kriteria',

            // ))))))))))))))
            // ->groupBy('data_keluarga.dasa_wisma')->get();

            $desa = $user->desa;

            // dd($catatan_keluarga);
            return view('admin_desa.data_rekap.data_rekap_pkk_rt', compact(
                'desa',
                'dasa_wisma',
                'rt',
                'rw',
                'periode',
                'catatan_keluarga',
                'desa',
            ));
        }

        // data catatan data dan kegiatan warga kelompok pkk rw admin desa
        public function data_kelompok_pkk_rw()
        {
            $user = Auth::user();

            $rw = DB::table('data_keluarga')
                ->select('id_desa', 'rw', 'periode')
                ->where('id_desa', $user->id_desa)
                ->distinct()
                ->get();

            return view('admin_desa.data_rekap.data_kelompok_pkk_rw', compact('rw'));
        }

        // rekap catatan data dan kegiatan warga kelompok rw admin desa
        public function rekap_kelompok_pkk_rw(Request $request)
        {
            $user = Auth::user();

            $dasa_wisma = $request->query('dasa_wisma');
            $rt = $request->query('rt');
            $rw = $request->query('rw');
            $periode = $request->query('periode');
            // $dasa_wismas = DB::table('data_keluarga')->select('dasa_wisma')->distinct();

            $catatan_keluarga = DataKeluarga::query()
                ->with(['industri', 'pemanfaatan'])
                // ->where('id_keluarga', $id)
                // ->where('id_desa', $user->id_desa)
                // ->where('dasa_wisma', $user->id_desa)

                // ->where('dasa_wisma', $dasa_wismas)

                ->where([
                    // ['dasa_wisma', $dasa_wisma],
                    // ['rt', $rt],
                    ['rw', $rw],
                    ['periode', $periode],
                ])
                ->get();

            // $hitung = $request->$catatan_keluarga->where(['dasa_wisma', $dasa_wisma], ['rt', $rt]);

            $desa = $user->desa;
            // $dasa_wismas = $catatan_keluarga->$requestdistinct();
            // dd($catatan_keluarga);

            return view('admin_desa.data_rekap.data_rekap_pkk_rw', compact(
                'dasa_wisma',
                'rt',
                'rw',
                'periode',
                'catatan_keluarga',
                'desa',
            ));
        }

        // data catatan data dan kegiatan warga kelompok pkk dusun admin desa
        public function data_kelompok_pkk_dusun()
        {
            $dusun = DB::table('data_keluarga')->select('dusun', 'periode')->distinct()->get();
            return view('admin_desa.data_rekap.data_kelompok_pkk_dusun', compact('dusun'));
        }

        // rekap catatan data dan kegiatan warga kelompok dusun admin desa
        public function rekap_kelompok_pkk_dusun(Request $request)
        {
            $user = Auth::user();

            $dasa_wisma = $request->query('dasa_wisma');
            $rt = $request->query('rt');
            $rw = $request->query('rw');
            $periode = $request->query('periode');
            $dusun = $request->query('dusun');

            $catatan_keluarga = DataKeluarga::query()
                ->with(['industri', 'pemanfaatan'])
                ->where([
                    ['dusun', $dusun],
                    ['periode', $periode],
                ])
                ->get();

            // $dusun = DB::table('data_warga')->select('alamat')->get();

            $desa = $user->desa;
            // $dasa_wismas = $catatan_keluarga->$requestdistinct();
            dd($dusun);

            return view('admin_desa.data_rekap.data_rekap_pkk_dusun', compact(
                'dusun',
                'rt',
                'rw',
                'periode',
                'catatan_keluarga',
                'desa',
            ));
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
