<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\PokjaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\admin_desa\data_pokja1\jml_kader_pokja1Controller;
use App\Http\Controllers\admin_desa\data_pokja1\penghayatan_pokja1Controller;
use App\Http\Controllers\admin_desa\data_pokja1\gotong_royong_pokja1Controller;
use App\Http\Controllers\admin_desa\data_pokja2\bkb_pokja2Controller;
use App\Http\Controllers\admin_desa\data_pokja2\kader_khusus_pokja2Controller;
use App\Http\Controllers\admin_desa\data_pokja2\kader_umum_pokja2Controller;
use App\Http\Controllers\admin_desa\data_pokja2\kehidupan_berkoperasi_pokja2Controller;
use App\Http\Controllers\admin_desa\data_pokja2\kelompok_belajarController;
use App\Http\Controllers\admin_desa\data_pokja2\pendidikan_pokja2Controller;
use App\Http\Controllers\admin_desa\data_pokja3\kader_pokja3Controller;
use App\Http\Controllers\admin_desa\data_pokja3\makanan_pokja3Controller;
use App\Http\Controllers\admin_desa\data_pokja3\pemanfaatan_pokja3Controller;
use App\Http\Controllers\admin_desa\data_pokja3\industri_pokja3Controller;
use App\Http\Controllers\admin_desa\data_pokja3\rumah_pokja3Controller;
use App\Http\Controllers\admin_desa\data_pokja4\kader_pokja4Controller;
use App\Http\Controllers\admin_desa\data_pokja4\kelestarian_pokja4Controller;
use App\Http\Controllers\admin_desa\data_pokja4\kesehatan_pokja4Controller;
use App\Http\Controllers\admin_desa\data_pokja4\perencanaan_pokja4Controller;
use App\Http\Controllers\admin_desa\dataDesaController;
use App\Http\Controllers\AdminKabController;
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
    return view('main.home');
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
Route::get('/koperasi', [AdminController::class, 'koperasi']);
Route::get('/makanan', [AdminController::class, 'makanan']);
Route::get('/pangan', [AdminController::class, 'pangan']);

// halaman admin kab
Route::get('/dashboard_kab', [AdminKabController::class, 'dashboard_kab']);
Route::get('/data_pokja1_kab', [AdminKabController::class, 'data_pokja1_kab']);
Route::get('/data_pokja2_kab', [AdminKabController::class, 'data_pokja2_kab']);
Route::get('/data_pokja3_kab', [AdminKabController::class, 'data_pokja3_kab']);
Route::get('/data_pokja4_kab', [AdminKabController::class, 'data_pokja4_kab']);
Route::get('/pengguna_kab', [AdminKabController::class, 'data_pengguna_kab']);
Route::get('/laporan_kab', [AdminKabController::class, 'data_laporan_kab']);
Route::get('/data_sekretariat_kab', [AdminKabController::class, 'data_sekretariat_kab']);

// form data_pokja1
Route::resource('/jml_kader', jml_kader_pokja1Controller::class);
Route::resource('/penghayatan', penghayatan_pokja1Controller::class);
Route::resource('/gotong_royong', gotong_royong_pokja1Controller::class);

// form data_pokja2
Route::resource('/pendidikan', pendidikan_pokja2Controller::class);
Route::resource('/bkb', bkb_pokja2Controller::class);
Route::resource('/kader_khusus', kader_khusus_pokja2Controller::class);
Route::resource('/kader_umum', kader_umum_pokja2Controller::class);
Route::resource('/kehidupan_berkoperasi', kehidupan_berkoperasi_pokja2Controller::class);
Route::resource('/kelompok_belajar', kelompok_belajarController::class);

// form data_pokja3
Route::resource('/kader', kader_pokja3Controller::class);
Route::resource('/makanan', makanan_pokja3Controller::class);
Route::resource('/pemanfaatan', pemanfaatan_pokja3Controller::class);
Route::resource('/industri', industri_pokja3Controller::class);
Route::resource('/rumah', rumah_pokja3Controller::class);

// form data_pokja4
Route::resource('/kader_pokja4', kader_pokja4Controller::class);
Route::resource('/kelestarian', kelestarian_pokja4Controller::class);
Route::resource('/kesehatan', kesehatan_pokja4Controller::class);
Route::resource('/perencanaan', perencanaan_pokja4Controller::class);

// form desa
Route::resource('/data_desa', dataDesaController::class);