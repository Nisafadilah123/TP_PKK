<?php

namespace App\Http\Controllers;
use App\Models\BeritaKab;

use Illuminate\Http\Request;

class AdminKabController extends Controller
{
    // halaman dashboard
    public function dashboard_kab(){
        $berita = BeritaKab::count();

        return view('admin_kab.dashboard_kab', compact('berita'));
    }

    // halaman data pokja1
    public function data_pokja1_kab(){
        return view('admin_kab.data_pokja1_kab');
    }

    // halaman data pokja2
    public function data_pokja2_kab(){
        return view('admin_kab.data_pokja2_kab');
    }

    // halaman data pokja3
    public function data_pokja3_kab(){
        return view('admin_kab.data_pokja3_kab');
    }

    // halaman data pokja4
    public function data_pokja4_kab(){
        return view('admin_kab.data_pokja4_kab');
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


}