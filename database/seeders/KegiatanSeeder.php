<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('kegiatan')->insert([

        [
            'nama_kegiatan'=>'Penghayatan dan Pengamalan Pancasila',
        ],
        [
            'nama_kegiatan'=>'Kerjabakti',
        ],
        [
            'nama_kegiatan'=>'Rukun Kematian',
        ],
        [
            'nama_kegiatan'=>'Kegiatan Keagamaan',
        ],
        [
            'nama_kegiatan'=>'Jimpitan',
        ],
        [
            'nama_kegiatan'=>'Arisan',
        ],
        [
            'nama_kegiatan'=>'Lain-lain',
        ]
     ]);
    }
}