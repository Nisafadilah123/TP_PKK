<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
        // halaman dashboard
        public function dashboard(){
            return view('admin_kel.dashboard');
        }

        // halaman data wilayah
        public function data_wilayah(){
            return view('admin_kel.data_wilayah');
        }

        // halaman data pokja1
        public function data_pokja1(){
            return view('admin_kel.data_pokja1');
        }

        // halaman data pokja2
        public function data_pokja2(){
            return view('admin_kel.data_pokja2');
        }

        // halaman data pokja3
        public function data_pokja3(){
            return view('admin_kel.data_pokja3');
        }

        // halaman data pokja4
        public function data_pokja4(){
            return view('admin_kel.data_pokja4');
        }

        // halaman papan pokja1
        // public function data_umum(){
        //     return view('pokja.papan_sekre');
        // }

        // halaman data pokja4
        public function data_laporan(){
            return view('admin_kel.data_laporan');
        }

        // halaman data pokja4
        public function pengguna(){
            return view('pokja.data_pengguna');
        }

}