<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\PokjaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDesa\DataAset\DataTamanBacaanController;
use App\Http\Controllers\AdminDesa\DataAset\DataWarungController;
use App\Http\Controllers\AdminDesa\DataAset\KoperasiController;
use App\Http\Controllers\AdminDesa\DataAset\TamanBacaanController;
use App\Http\Controllers\AdminDesa\DataAset\WarungController;
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
use App\Http\Controllers\super_admin\dataKecamtanController;
use App\Http\Controllers\SuperAdmin\DataDesaController;
use App\Http\Controllers\SuperAdmin\DataKecamatanController;
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
use App\Http\Controllers\SuperAdmin\UserController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Middleware\Authenticate;
use App\Models\BeritaKab;
use App\Models\Data_Desa;
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
Route::get('/about', [MainController::class, 'about']);

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
    Route::get('/data_pokja1', [AdminController::class, 'data_pokja1']);
    Route::get('/data_pokja2', [AdminController::class, 'data_pokja2']);
    Route::get('/data_pokja3', [AdminController::class, 'data_pokja3']);
    Route::get('/data_pokja4', [AdminController::class, 'data_pokja4']);
    Route::get('/laporan', [AdminController::class, 'data_laporan']);
    Route::get('/data_sekretariat', [AdminController::class, 'data_sekretariat']);
    Route::get('/rekap_data_warga', [AdminController::class, 'rekap_data_warga']);

    // form data_pokja1
    Route::resource('/jml_kader', JumlahKaderPokja1Controller::class);
    Route::resource('/penghayatan', PenghayatanDanPengamalanController::class);
    Route::resource('/gotong_royong', GotongRoyongController::class);

    // form data_pokja2
    Route::resource('/pendidikan', PendidikanController::class);
    Route::resource('/koperasi', KehidupanBerkoperasiController::class);

    // form data_pokja3
    Route::resource('/kader', JumlahKaderPokja3Controller::class);
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
    Route::resource('/jml_tenaga_umum', JumlahTenagaSekretariatDataUmumController::class);
    Route::resource('/jml_kader_umum', JumlahKaderDataUmumController::class);

    // akun
    Route::resource('/data_kader', KaderController::class);

    // form data kategori pendataan kader
    Route::resource('/kategori_industri', KategoriIndustriRumahController::class);
    Route::resource('/kategori_pemanfaatan', KategoriPemanfaatanLahanController::class);

    // data aset desa
    Route::resource('/warung', WarungController::class);
    Route::resource('/data_warung', DataWarungController::class);
    Route::resource('/taman_bacaan', TamanBacaanController::class);
    Route::resource('/data_taman_bacaan', DataTamanBacaanController::class);
    Route::resource('/data_aset_koperasi', KoperasiController::class);

});

// halaman admin kec
Route::get('/admin_kecamatan/login', [AdminKecController::class, 'login'])->name('admin_kecamatan.login');
Route::post('/admin_kecamatan/login', [AdminKecController::class, 'loginPost']);
Route::post('/admin_kecamatan/logout', [AdminKecController::class, 'logoutPost'])->name('admin_kecamatan.logout');
Route::middleware(['user_type:admin_kecamatan'])->group(function(){
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
    Route::get('/data_sekretariat_kab', [AdminKabController::class, 'data_sekretariat_kab']);
    //form berita admin kabupaten
    Route::resource('/beritaKab', BeritaController::class);

});

// halaman super admin
Route::get('/super_admin/login', [SuperAdminController::class, 'login'])->name('super_admin.login');
Route::post('/super_admin/login', [SuperAdminController::class, 'loginPost']);
Route::post('/super_admin/logout', [SuperAdminController::class, 'logoutPost'])->name('super_admin.logout');
Route::middleware(['user_type:superadmin'])->group(function(){
    Route::get('/dashboard_super', [SuperAdminController::class, 'dashboard_super']);
    Route::get('/data_pokja1_super', [SuperAdminController::class, 'data_pokja1_super']);
    Route::get('/data_pokja2_super', [SuperAdminController::class, 'data_pokja2_super']);
    Route::get('/data_pokja3_super', [SuperAdminController::class, 'data_pokja3_super']);
    Route::get('/data_pokja4_super', [SuperAdminController::class, 'data_pokja4_super']);
    Route::get('/laporan_super', [SuperAdminController::class, 'data_laporan_super']);
    Route::get('/data_sekretariat_super', [SuperAdminController::class, 'data_sekretariat_super']);
    Route::get('/koperasi_super', [SuperAdminController::class, 'koperasi_super']);
    Route::get('/makanan_super', [SuperAdminController::class, 'makanan_super']);
    Route::get('/pangan_super', [SuperAdminController::class, 'pangan_super']);

    // form data_pokja1
    Route::resource('/jml_kader_super', JumlahKaderPokja1SuperController::class);
    Route::resource('/penghayatan_super', PenghayatanDanPengamalanSuperController::class);
    Route::resource('/gotong_royong_super', GotongRoyongSuperController::class);

    // form data_pokja2
    Route::resource('/pendidikan_super', PendidikanSuperController::class);
    Route::resource('/koperasi_super', KehidupanBerkoperasiSuperController::class);

    // form data_pokja3
    Route::resource('/kader_super', JumlahKaderPokja3SuperController::class);
    Route::resource('/industri_super', JumlahIndustriRumahTanggaSuperController::class);
    Route::resource('/rumah_super', JumlahRumahSuperController::class);
    Route::resource('/pangan_super', PanganSuperController::class);

    // form data_pokja4
    Route::resource('/kader_pokja4_super', JumlahKaderPokja4SuperController::class);
    Route::resource('/kelestarian_super', KelestarianLingkunganHidupSuperController::class);
    Route::resource('/kesehatan_super', KesehatanPosyanduSuperController::class);
    Route::resource('/perencanaan_super', PerencanaanSehatSuperController::class);

    // form data umum
    Route::resource('/kelompok_super', JumlahKelompokUmumSuperController::class);
    Route::resource('/jml_data_umum_super', JumlahDataUmumSuperController::class);
    Route::resource('/jml_jiwa_umum_super', JumlahJiwaDataUmumSuperController::class);
    Route::resource('/jml_tenaga_umum_super', JumlahTenagaSekretariatDataUmumSuperController::class);
    Route::resource('/jml_kader_umum_super', JumlahKaderDataUmumSuperController::class);

    // form desa super admin
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
        Route::get('getDesa/{id}', function ($id) {
            $desas = Data_Desa::where('id_kecamatan',$id)->get();
            // dd($desas);
            return response()->json($desas);
        });

    // form data pendataan kader
    Route::resource('/data_warga', DataWargaController::class);
    Route::resource('/data_kegiatan', DataKegiatanWargaController::class);
    Route::resource('/data_keluarga', DataKeluargaController::class);
    Route::resource('/data_pemanfaatan', DataPemanfaatanPekaranganController::class);
    Route::resource('/data_industri', DataIndustriRumahController::class);
    Route::resource('/data_pelatihan', DataPelatihanKaderController::class);
    Route::resource('/data_gabung', DataKaderGabungController::class);

});