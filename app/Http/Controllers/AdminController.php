<?php

namespace App\Http\Controllers;

use App\Models\Data_Desa;
use App\Models\DataDasaWisma;
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


        // halaman data pokja4
        public function data_pengguna(){
            return view('admin_desa.data_pengguna');
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
                ->select('rt', 'rw', 'periode')
                ->where('id_desa', $user->id_desa)
                ->distinct()
                ->get();

            return view('admin_desa.data_rekap.data_kelompok_pkk_rt', compact('rt'));
        }

         // rekap catatan data dan kegiatan warga kelompok rt admin desa
        public function rekap_kelompok_pkk_rt(Request $request)
        {
            /** @var User */
            $user = Auth::user();

            $rt = $request->query('rt');
            $rw = $request->query('rw');
            $periode = $request->query('periode');

            $desa = $user->desa;

            $dasaWismas = DataDasaWisma::getDasaWismas($desa->id, $rw, $rt, $periode);

            return view('admin_desa.data_rekap.data_rekap_pkk_rt', compact(
                'dasaWismas',
                'desa',
                'rt',
                'rw',
                'periode',
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
            $desa = $user->desa;
            $dasa_wisma = $request->query('dasa_wisma');
            $rt = $request->query('rt');
            $rw = $request->query('rw');
            $periode = $request->query('periode');
            // $dasa_wismas = DB::table('data_keluarga')->select('dasa_wisma')->distinct();

            $catatan_keluarga = DataKeluarga::query()
                ->with(['industri', 'pemanfaatan'])
                ->where([
                    // ['dasa_wisma', $dasa_wisma],
                    // ['rt', $rt],
                    ['rw', $rw],
                    ['periode', $periode],
                ])
                ->get();

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