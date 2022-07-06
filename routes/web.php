<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\PokjaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDesa\DataAset\DataPosyanduController;
use App\Http\Controllers\AdminDesa\DataAset\DataTamanBacaanController;
use App\Http\Controllers\AdminDesa\DataAset\DataWarungController;
use App\Http\Controllers\AdminDesa\DataAset\KejarPaketController;
use App\Http\Controllers\AdminDesa\DataAset\KelompokSimulasiController;
use App\Http\Controllers\AdminDesa\DataAset\KoperasiController;
use App\Http\Controllers\AdminDesa\DataAset\PosyanduController;
use App\Http\Controllers\AdminDesa\DataAset\TamanBacaanController;
use App\Http\Controllers\AdminDesa\DataAset\WarungController;
use App\Http\Controllers\AdminDesa\DataDaftarAnggotaKaderController;
use App\Http\Controllers\AdminDesa\DataDaftarAnggotaTPController;
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
use App\Http\Controllers\AdminDesa\DataUmum\JumlahTenagaSekretariatDataUmumController;
use App\Http\Controllers\AdminDesa\DataKegiatan\Kategori\KategoriIndustriRumahController;
use App\Http\Controllers\AdminDesa\DataKegiatan\Kategori\KategoriPemanfaatanLahanController;
use App\Http\Controllers\AdminDesa\KaderController;
use App\Http\Controllers\AdminKab\BeritaController;
use App\Http\Controllers\AdminKab\DataAgendaKegiatanController;
use App\Http\Controllers\AdminKab\DataDesaController;
use App\Http\Controllers\AdminKab\DataGaleriController;
use App\Http\Controllers\AdminKab\DataKecamatanController;
use App\Http\Controllers\AdminKab\UserController;
use App\Http\Controllers\AdminKabController;
use App\Http\Controllers\AdminKecController;
use App\Http\Controllers\DashboardSuperController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KaderFormController;
use App\Http\Controllers\PendataanKader\DataIndustriRumahController;
use App\Http\Controllers\PendataanKader\DataKaderGabungController;
use App\Http\Controllers\PendataanKader\DataKegiatanWargaController;
use App\Http\Controllers\PendataanKader\DataKeluargaController;
use App\Http\Controllers\PendataanKader\DataPelatihanKaderController;
use App\Http\Controllers\PendataanKader\DataPemanfaatanPekaranganController;
use App\Http\Controllers\PendataanKader\DataWargaController;
use App\Http\Controllers\SuperAdmin\DataPokja1\GotongRoyongSuperController;
use App\Http\Controllers\SuperAdmin\DataPokja1\JumlahKaderPokja1SuperController;
use App\Http\Controllers\SuperAdmin\DataPokja1\PenghayatanDanPengamalanSuperController;
use App\Http\Controllers\SuperAdmin\DataPokja2\KehidupanBerkoperasiSuperController;
use App\Http\Controllers\SuperAdmin\DataPokja2\PendidikanSuperController;
use App\Http\Controllers\SuperAdmin\DataPokja3\JumlahIndustriRumahTanggaSuperController;
use App\Http\Controllers\SuperAdmin\DataPokja3\JumlahKaderPokja3SuperController;
use App\Http\Controllers\SuperAdmin\DataPokja3\JumlahRumahSuperController;
use App\Http\Controllers\SuperAdmin\DataPokja3\PanganSuperController;
use App\Http\Controllers\SuperAdmin\DataPokja4\JumlahKaderPokja4SuperController;
use App\Http\Controllers\SuperAdmin\DataPokja4\KelestarianLingkunganHidupSuperController;
use App\Http\Controllers\SuperAdmin\DataPokja4\KesehatanPosyanduSuperController;
use App\Http\Controllers\SuperAdmin\DataPokja4\PerencanaanSehatSuperController;
use App\Http\Controllers\SuperAdmin\DataUmum\JumlahDataUmumSuperController;
use App\Http\Controllers\SuperAdmin\DataUmum\JumlahJiwaDataUmumSuperController;
use App\Http\Controllers\SuperAdmin\DataUmum\JumlahKaderDataUmumSuperController;
use App\Http\Controllers\SuperAdmin\DataUmum\JumlahKelompokUmumSuperController;
use App\Http\Controllers\SuperAdmin\DataUmum\JumlahTenagaSekretariatDataUmumSuperController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Middleware\Authenticate;
use App\Models\BeritaKab;
use App\Models\Data_Desa;
use App\Models\KeteranganKegiatan;
use Illuminate\Support\Facades\Auth;
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
// Route::get('/', [MainController::class, 'home']);
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
Route::get('/berita/{id}', [MainController::class, 'berita']);
Route::get('/allberita', [MainController::class, 'allberita']);
Route::get('/allgaleri', [MainController::class, 'galeri']);
Route::get('/about', [MainController::class, 'about']);
Route::get('/agenda', [MainController::class, 'agenda']);

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
Route::get('/admin_desa/login', [AdminController::class, 'login'])->name('admin_desa.login');
Route::post('/admin_desa/login', [AdminController::class, 'loginPost']);
Route::post('/admin_desa/logout', [AdminController::class, 'logoutPost'])->name('admin_desa.logout');
Route::middleware(['user_type:admin_desa'])->group(function(){
    Route::get('/dashboard', [AdminController::class, 'dashboard']);

    // data kelompok dasa wisma
    Route::get('/data_kelompok_dasa_wisma', [AdminController::class, 'data_kelompok_dasa_wisma']);

    // rekap kelompok dasa wisma
    Route::get('/rekap_kelompok_dasa_wisma', [AdminController::class, 'rekap_kelompok_dasa_wisma']);

    // data kelompok pkk rt
    Route::get('/data_kelompok_pkk_rt', [AdminController::class, 'data_kelompok_pkk_rt']);

    // rekap kelompok pkk rt
    Route::get('/rekap_kelompok_pkk_rt', [AdminController::class, 'rekap_kelompok_pkk_rt']);

    // data kelompok pkk rw
    Route::get('/data_kelompok_pkk_rw', [AdminController::class, 'data_kelompok_pkk_rw']);

    // rekap kelompok pkk rw
    Route::get('/rekap_kelompok_pkk_rw', [AdminController::class, 'rekap_kelompok_pkk_rw']);

    // data kelompok pkk dusun
    Route::get('/data_kelompok_pkk_dusun', [AdminController::class, 'data_kelompok_pkk_dusun']);

    // rekap kelompok dusun
    Route::get('/rekap_kelompok_pkk_dusun', [AdminController::class, 'rekap_kelompok_pkk_dusun']);

    // data kelompok pkk desa
    Route::get('/data_kelompok_pkk_desa', [AdminController::class, 'data_kelompok_pkk_desa']);

    // rekap kelompok desa
    Route::get('/rekap_pkk_desa', [AdminController::class, 'rekap_pkk_desa']);

    // akun kader desa
    Route::resource('/data_kader', KaderController::class);

    // form data kategori pendataan kader
    Route::resource('/kategori_industri', KategoriIndustriRumahController::class);
    Route::resource('/kategori_pemanfaatan', KategoriPemanfaatanLahanController::class);

});


// halaman admin kab
Route::get('/admin_kabupaten/login', [AdminKabController::class, 'login'])->name('admin_kabupaten.login');
Route::post('/admin_kabupaten/login', [AdminKabController::class, 'loginPost']);
Route::post('/admin_kabupaten/logout', [AdminKabController::class, 'logoutPost'])->name('admin_kabupaten.logout');
Route::middleware(['user_type:admin_kabupaten'])->group(function(){
    Route::get('/dashboard_kab', [AdminKabController::class, 'dashboard_kab']);
    Route::get('/data_pokja1_kab', [AdminKabController::class, 'data_pokja1_kab']);
    Route::get('/data_pokja2_kab', [AdminKabController::class, 'data_pokja2_kab']);
    Route::get('/data_pokja3_kab', [AdminKabController::class, 'data_pokja3_kab']);
    Route::get('/data_pokja4_kab', [AdminKabController::class, 'data_pokja4_kab']);
    Route::get('/pengguna_kab', [AdminKabController::class, 'data_pengguna_kab']);
    Route::get('/laporan_kab', [AdminKabController::class, 'data_laporan_kab']);
    Route::get('/data_umum_kab', [AdminKabController::class, 'data_umum_kab']);
    Route::get('/data_kelompok_pkk_kec', [AdminKabController::class, 'data_kelompok_pkk_kec']);
    Route::get('/rekap_pkk_kec', [AdminKabController::class, 'rekap_pkk_kec']);

    //form berita admin kabupaten
    Route::resource('/beritaKab', BeritaController::class);
    Route::resource('/galeriKeg', DataGaleriController::class);
    Route::resource('/agendaKeg', DataAgendaKegiatanController::class);
    Route::resource('/data_desa', DataDesaController::class);
    Route::resource('/data_kecamatan', DataKecamatanController::class);
    Route::resource('/data_pengguna_super', UserController::class);

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/super_admin', [App\Http\Controllers\HomeController::class, 'super'])->name('super_admin');

// Route::get('/super_admin', [DashboardSuperController::class, 'index'])->name('super_admin');
Route::get('/kader_desa/login', [KaderFormController::class, 'login'])->name('kader_desa.login');
Route::post('/kader_desa/login', [KaderFormController::class, 'loginPost']);
Route::post('/kader_desa/logout', [KaderFormController::class, 'logoutPost'])->name('kader_desa.logout');
Route::middleware(['user_type:kader_desa'])->group(function(){
        // halaman kader desa
        Route::get('/dashboard_kader', [KaderFormController::class, 'dashboard_kader']);

        // mengambil nama desa
        // Route::get('getDesa/{id}', function ($id) {
        //     $desas = Data_Desa::where('id_kecamatan',$id)->get();
        //     // dd($desas);
        //     return response()->json($desas);
        // });

        Route::get('getKeterangan/{id}', function ($id) {
            $keterangan = KeteranganKegiatan::where('id_kegiatan',$id)->get();
            // dd($keterangan);
            return response()->json($keterangan);
        });


    // form data pendataan kader
    Route::resource('/data_warga', DataWargaController::class);
    Route::resource('/data_kegiatan', DataKegiatanWargaController::class);
    Route::resource('/data_keluarga', DataKeluargaController::class);
    Route::resource('/data_pemanfaatan', DataPemanfaatanPekaranganController::class);
    Route::resource('/data_industri', DataIndustriRumahController::class);
    Route::resource('/data_pelatihan', DataPelatihanKaderController::class);
    Route::resource('/data_gabung', DataKaderGabungController::class);
    Route::get('/rekap', [KaderFormController::class, 'rekap']);

    // rekap anggota keluarga
    Route::get('/rekap_data_warga/{id}/rekap_data_warga', [KaderFormController::class, 'rekap_data_warga']);

    //print rekap anggota keluarga
    Route::get('/print/{id}', [KaderFormController::class, 'print']);
    Route::get('/print_pdf/{id}', [KaderFormController::class, 'print_pdf']);

    //print rekap anggota keluarga
    Route::get('/print_cakel/{id}', [KaderFormController::class, 'print_cakel']);
    Route::get('/print_pdf_cakel/{id}', [KaderFormController::class, 'print_pdf_cakel']);

    // rekap catatan keluarga
    Route::get('/catatan_keluarga/{id}/catatan_keluarga', [KaderFormController::class, 'catatan_keluarga']);

});
