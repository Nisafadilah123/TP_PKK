<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\PokjaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDesa\DataPokja1\GotongRoyongController;
use App\Http\Controllers\AdminDesa\DataPokja1\JumlahKaderPokja1Controller;
use App\Http\Controllers\AdminDesa\DataPokja1\PenghayatanDanPengamalanController;
use App\Http\Controllers\AdminDesa\DataPokja2\KehidupanBerkoperasiController;
use App\Http\Controllers\AdminDesa\DataPokja2\PendidikanController;
use App\Http\Controllers\AdminDesa\DataPokja3\JumlahIndustriRumahTanggaController;
use App\Http\Controllers\AdminDesa\DataPokja3\JumlahKaderPokja3Controller;
use App\Http\Controllers\AdminDesa\DataPokja3\JumlahRumahController;
use App\Http\Controllers\AdminDesa\DataPokja3\PanganController;
use App\Http\Controllers\AdminDesa\DataPokja4\JumlahKaderPokja4Controller;
use App\Http\Controllers\AdminDesa\DataPokja4\KelestarianLingkunganHidupController;
use App\Http\Controllers\AdminDesa\DataPokja4\KesehatanPosyanduController;
use App\Http\Controllers\AdminDesa\DataPokja4\PerencanaanSehatController;
use App\Http\Controllers\AdminDesa\DataUmum\JumlahKelompokUmumController;
use App\Http\Controllers\AdminDesa\DataUmum\JumlahDataUmumController;
use App\Http\Controllers\AdminDesa\DataUmum\JumlahJiwaDataUmumController;
use App\Http\Controllers\AdminDesa\DataUmum\JumlahKaderDataUmumController;
use App\Http\Controllers\AdminKab\BeritaController;
use App\Http\Controllers\AdminKabController;
use App\Http\Controllers\AdminKecController;
use App\Http\Controllers\super_admin\dataKecamtanController;
use App\Http\Controllers\SuperAdmin\DataDesaController;
use App\Http\Controllers\SuperAdmin\DataKecamatanController;
use App\Http\Controllers\SuperAdminController;
use App\Models\BeritaKab;
use App\Models\JumlahTenagaSekretariatDataUmum;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// halaman main
Route::get('/', function () {
    $berita = BeritaKab::all();
    // dd($berita);

    return view('main.home', ['berita'=>$berita]);
});
Route::get('/sejarah', [MainController::class, 'sejarah']);
Route::get('/program', [MainController::class, 'program_pkk']);
Route::get('/visi', [MainController::class, 'visi']);
Route::get('/arti', [MainController::class, 'arti']);
Route::get('/profil', [MainController::class, 'profil']);
Route::get('/struktur', [MainController::class, 'bagan_struktur_kel']);
Route::get('/pkk', [MainController::class, 'bagan_struktur_pkk']);
Route::get('/baganmekel', [MainController::class, 'bagan_mekanis_kel']);
Route::get('/baganmekpkk', [MainController::class, 'bagan_mekanis_pkk']);
Route::get('/berita', [MainController::class, 'berita']);
Route::get('/agenda', [MainController::class, 'agenda']);
Route::get('/galeri', [MainController::class, 'galeri']);
Route::get('/kontak', [MainController::class, 'kontak']);

// halaman pokja
Route::get('/pokja1', [PokjaController::class, 'pokja1']);
Route::get('/papan1', [PokjaController::class, 'papan1']);
Route::get('/pokja2', [PokjaController::class, 'pokja2']);
Route::get('/papan2', [PokjaController::class, 'papan2']);
Route::get('/pokja3', [PokjaController::class, 'pokja3']);
Route::get('/papan3', [PokjaController::class, 'papan3']);
Route::get('/pokja4', [PokjaController::class, 'pokja4']);
Route::get('/papan4', [PokjaController::class, 'papan4']);
Route::get('/sekretariat', [PokjaController::class, 'sekretariat']);
Route::get('/data_umum', [PokjaController::class, 'data_umum']);

// halaman admin desa
Route::get('/dashboard', [AdminController::class, 'dashboard']);
Route::get('/data_pokja1', [AdminController::class, 'data_pokja1']);
Route::get('/data_pokja2', [AdminController::class, 'data_pokja2']);
Route::get('/data_pokja3', [AdminController::class, 'data_pokja3']);
Route::get('/data_pokja4', [AdminController::class, 'data_pokja4']);
Route::get('/pengguna', [AdminController::class, 'data_pengguna']);
Route::get('/laporan', [AdminController::class, 'data_laporan']);
Route::get('/data_sekretariat', [AdminController::class, 'data_sekretariat']);
Route::get('/makanan', [AdminController::class, 'makanan']);

// halaman admin kec
Route::get('/dashboard_kec', [AdminKecController::class, 'dashboard_kec']);
Route::get('/data_pokja1_kec', [AdminKecController::class, 'data_pokja1_kec']);
Route::get('/data_pokja2_kec', [AdminKecController::class, 'data_pokja2_kec']);
Route::get('/data_pokja3_kec', [AdminKecController::class, 'data_pokja3_kec']);
Route::get('/data_pokja4_kec', [AdminKecController::class, 'data_pokja4_kec']);
Route::get('/pengguna_kec', [AdminKecController::class, 'data_pengguna_kec']);
Route::get('/laporan_kec', [AdminKecController::class, 'data_laporan_kec']);
Route::get('/data_sekretariat_kec', [AdminKecController::class, 'data_sekretariat_kec']);
Route::get('/koperasi_kec', [AdminKecController::class, 'koperasi_kec']);
Route::get('/makanan_kec', [AdminKecController::class, 'makanan_kec']);
Route::get('/pangan_kec', [AdminKecController::class, 'pangan_kec']);

// halaman admin kab
Route::get('/dashboard_kab', [AdminKabController::class, 'dashboard_kab']);
Route::get('/data_pokja1_kab', [AdminKabController::class, 'data_pokja1_kab']);
Route::get('/data_pokja2_kab', [AdminKabController::class, 'data_pokja2_kab']);
Route::get('/data_pokja3_kab', [AdminKabController::class, 'data_pokja3_kab']);
Route::get('/data_pokja4_kab', [AdminKabController::class, 'data_pokja4_kab']);
Route::get('/pengguna_kab', [AdminKabController::class, 'data_pengguna_kab']);
Route::get('/laporan_kab', [AdminKabController::class, 'data_laporan_kab']);
Route::get('/data_sekretariat_kab', [AdminKabController::class, 'data_sekretariat_kab']);

// halaman super admin
Route::get('/dashboard_super', [SuperAdminController::class, 'dashboard_super']);
Route::get('/data_pokja1_super', [SuperAdminController::class, 'data_pokja1_super']);
Route::get('/data_pokja2_super', [SuperAdminController::class, 'data_pokja2_super']);
Route::get('/data_pokja3_super', [SuperAdminController::class, 'data_pokja3_super']);
Route::get('/data_pokja4_super', [SuperAdminController::class, 'data_pokja4_super']);
Route::get('/pengguna_super', [SuperAdminController::class, 'data_pengguna_super']);
Route::get('/laporan_super', [SuperAdminController::class, 'data_laporan_super']);
Route::get('/data_sekretariat_super', [SuperAdminController::class, 'data_sekretariat_super']);
Route::get('/koperasi_super', [SuperAdminController::class, 'koperasi_super']);
Route::get('/makanan_super', [SuperAdminController::class, 'makanan_super']);
Route::get('/pangan_super', [SuperAdminController::class, 'pangan_super']);

// form data_pokja1
Route::resource('/jml_kader', JumlahKaderPokja1Controller::class);
Route::resource('/penghayatan', PenghayatanDanPengamalanController::class);
Route::resource('/gotong_royong', GotongRoyongController::class);

// form data_pokja2
Route::resource('/pendidikan', PendidikanController::class);
// Route::resource('/bkb', bkb_pokja2Controller::class);
// Route::resource('/kader_khusus', kader_khusus_pokja2Controller::class);
// Route::resource('/kader_umum', kader_umum_pokja2Controller::class);
Route::resource('/koperasi', KehidupanBerkoperasiController::class);
// Route::resource('/kelompok_belajar', kelompok_belajarController::class);

// form data_pokja3
Route::resource('/kader', JumlahKaderPokja3Controller::class);
// Route::resource('/makanan', makanan_pokja3Controller::class);
// Route::resource('/pemanfaatan', pemanfaatan_pokja3Controller::class);
Route::resource('/industri', JumlahIndustriRumahTanggaController::class);
Route::resource('/rumah', JumlahRumahController::class);
Route::resource('/pangan', PanganController::class);

// form data_pokja4
Route::resource('/kader_pokja4', JumlahKaderPokja4Controller::class);
Route::resource('/kelestarian', KelestarianLingkunganHidupController::class);
Route::resource('/kesehatan', KesehatanPosyanduController::class);
Route::resource('/perencanaan', PerencanaanSehatController::class);

// form data umum
Route::resource('/kelompok', JumlahKelompokUmumController::class);
Route::resource('/jml_data_umum', JumlahDataUmumController::class);
Route::resource('/jml_jiwa_umum', JumlahJiwaDataUmumController::class);
Route::resource('/jml_tenaga_umum', JumlahTenagaSekretariatDataUmum::class);
Route::resource('/jml_kader_umum', JumlahKaderDataUmumController::class);

//form berita admin kabupaten
Route::resource('/beritaKab', BeritaController::class);

// form desa super admin
Route::resource('/data_desa', DataDesaController::class);
Route::resource('/data_kecamatan', DataKecamatanController::class);
