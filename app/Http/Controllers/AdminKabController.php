<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminKabController extends Controller
{
    // halaman dashboard
    public function dashboard_kab(){
        return view('admin_kab.dashboard');
    }



    // halaman data pokja1
    public function data_pokja1_kab(){
        return view('admin_kab.data_pokja1');
    }

    // halaman data pokja2
    public function data_pokja2_kab(){
        return view('admin_kab.data_pokja2');
    }

    // halaman data pokja3
    public function data_pokja3_kab(){
        return view('admin_kab.data_pokja3');
    }

    // halaman data pokja4
    public function data_pokja4_kab(){
        return view('admin_kab.data_pokja4');
    }

    // halaman data pokja4
    public function data_laporan_kab(){
        return view('admin_kab.data_laporan');
    }

    // halaman data pokja4
    public function data_pengguna_kab(){
        return view('admin_kab.data_pengguna');
    }

    // halaman data sekretariat
    public function data_sekretariat_kab(){
        return view('admin_kab.data_sekretariat');
    }
}
