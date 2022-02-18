<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\PokjaController;
use App\Http\Controllers\AdminController;

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

// halaman admin kel
Route::get('/dashboard', [AdminController::class, 'dashboard']);
Route::get('/data_wilayah', [AdminController::class, 'data_wilayah']);
Route::get('/data_pokja1', [AdminController::class, 'data_pokja1']);
Route::get('/data_pokja2', [AdminController::class, 'data_pokja2']);
Route::get('/data_pokja3', [AdminController::class, 'data_pokja3']);
Route::get('/data_pokja4', [AdminController::class, 'data_pokja4']);
Route::get('/pengguna', [AdminController::class, 'data_pengguna']);
Route::get('/laporan', [AdminController::class, 'data_laporan']);