<?php

namespace App\Http\Controllers;
use App\Models\BeritaKab;
use App\Models\Data_Desa;
use App\Models\DataAgenda;
use App\Models\DataGaleri;
use App\Models\DataKecamatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminKabController extends Controller
{
    // halaman dashboard
    public function dashboard_kab(){
        $berita = BeritaKab::count();
        $desa = Data_Desa::count();
        $kecamatan = DataKecamatan::count();
        $user = User::count();
        $agenda = DataAgenda::count();
        $galeri = DataGaleri::count();
        // $kecamatan = DataKecamatan::count();
        // $user = User::count();
        return view('admin_kab.dashboard_kab', compact('berita', 'desa', 'kecamatan', 'user', 'agenda', 'galeri'));
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

    // data catatan data dan kegiatan warga kelompok tp pkk kecamatan
    public function data_kelompok_pkk_kec()
    {
        /** @var User */
        $user = Auth::user();

        $kecamatan = DB::table('data_keluarga')
        ->join('data_kecamatan', 'data_keluarga.id_kecamatan', '=', 'data_kecamatan.id')
        ->select('nama_kecamatan', 'periode')
        // ->where('id_kecamatan', $user->user_type)
        ->distinct()
        ->get();

        // $kecamatan = DataKecamatan::where()->get();

        // dd($kecamatan);
        return view('admin_kab.data_rekap.data_kelompok_pkk_kec', compact('kecamatan'));
    }
    // rekap catatan data dan keluarga dan kegiatan warga admin kec
    public function rekap_pkk_kec(Request $request)
    {
        $user = Auth::user();
        $desa = $user->desa;
        $kecamatan = $request->query('kecamatan');
        $dasa_wisma = $request->query('dasa_wisma');
        $rt = $request->query('rt');
        $rw = $request->query('rw');
        $dusun = $request->query('dusun');
        $periode = $request->query('periode');
        // dd($kecamatan);
        return view('admin_kab.data_rekap.data_rekap_pkk_kec', compact(
            'dusun',
            'kecamatan',
            'rw',
            'periode',
            'desa',

        ));
    }

}
