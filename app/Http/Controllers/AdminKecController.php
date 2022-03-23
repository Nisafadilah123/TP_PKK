<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminKecController extends Controller
{
        // halaman dashboard
        public function dashboard_kec(){

            return view('admin_kec.dashboard_kec');
        }

        // halaman data pokja1
        public function data_pokja1_kec(){
            return view('admin_kec.data_pokja1_kec');
        }

        // halaman data pokja2
        public function data_pokja2_kec(){
            return view('admin_kec.data_pokja2_kec');
        }

        // halaman data pokja3
        public function data_pokja3_kec(){
            return view('admin_kec.data_pokja3_kec');
        }

        // halaman data pokja4
        public function data_pokja4_kec(){
            return view('admin_kec.data_pokja4_kec');
        }

        // halaman data pokja4
        public function data_laporan_kec(){
            return view('admin_kec.data_laporan_kec');
        }

        // halaman data pokja4
        public function data_pengguna_kec(){
            return view('admin_kec.data_pengguna_kec');
        }

        // halaman data sekretariat
        public function data_sekretariat_kec(){
            return view('admin_kec.data_sekretariat_kec');
        }


}