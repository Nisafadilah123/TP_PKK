<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KaderFormController extends Controller
{
    //
    // halaman dashboard
    public function dashboard_kader(){
        return view('kader.dashboard');
    }

    // halaman data pokja1
    public function data_pokja1(){
        return view('kader.data_pokja1');
    }

    // halaman data pokja2
    public function data_pokja2(){
        return view('kader.data_pokja2');
    }

    // halaman data pokja3
    public function data_pokja3(){
        return view('kader.data_pokja3');
    }

    // halaman data pokja4
    public function data_pokja4(){
        return view('kader.data_pokja4');
    }
}