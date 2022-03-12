<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
            // halaman dashboard
            public function dashboard_super(){
                return view('super_admin.dashboard');
            }



            // halaman data pokja1
            public function data_pokja1_super(){
                return view('super_admin.data_pokja1');
            }

            // halaman data pokja2
            public function data_pokja2_super(){
                return view('super_admin.data_pokja2');
            }

            // halaman data pokja3
            public function data_pokja3_super(){
                return view('super_admin.data_pokja3');
            }

            // halaman data pokja4
            public function data_pokja4_super(){
                return view('super_admin.data_pokja4');
            }

            // halaman papan pokja1
            // public function data_umum(){
            //     return view('pokja.papan_sekre');
            // }

            // halaman data pokja4
            public function data_laporan_super(){
                return view('super_admin.data_laporan');
            }

            // halaman data pokja4
            public function data_pengguna_super(){
                return view('super_admin.data_pengguna');
            }

            // halaman data sekretariat
            public function data_sekretariat_super(){
                return view('super_admin.data_sekretariat');
            }

            // halaman data koperasi
            public function koperasi_super(){
                return view('super_admin.sub_file_pokja_2.koperasi');
            }

            // halaman data makanan pokok
            public function makanan_super(){
                return view('super_admin.sub_file_pokja_3.makanan');
            }

            // halaman data pangan
            public function pangan_super(){
                return view('super_admin.sub_file_pokja_3.pangan');
            }

}