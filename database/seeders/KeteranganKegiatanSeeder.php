<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeteranganKegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create tabel kategori_keterangan
        DB::table('kategori_keterangan')->insert([

            [
                'id_kategori' => '1',
                'nama_keterangan' => 'Keagamaan ',
            ],

            [
                'id_kategori' => '1',
                'nama_keterangan' => 'PKBN (Pembinaan Kesadaran Bela Negara)',
            ],

            [
                'id_kategori' => '1',
                'nama_keterangan' => 'Pola Asuh',
            ],

            [
                'id_kategori' => '1',
                'nama_keterangan' => 'Pencegahan KDRT',
            ],

            [
                'id_kategori' => '1',
                'nama_keterangan' => 'Pencegahan Traffocking',
            ],

            [
                'id_kategori' => '1',
                'nama_keterangan' => 'Narkoba',
            ],

            [
                'id_kategori' => '1',
                'nama_keterangan' => 'Pencegahan Kejahatan Seksual',
            ],

            [
                'id_kategori' => '2',
                'nama_keterangan' => 'Kerja Bakti',
            ],

            [
                'id_kategori' => '2',
                'nama_keterangan' => 'Jimpitan ',
            ],

            [
                'id_kategori' => '2',
                'nama_keterangan' => ' Arisan',
            ],

            [
                'id_kategori' => '2',
                'nama_keterangan' => 'Rukun Kematian',
            ],

            [
                'id_kategori' => '2',
                'nama_keterangan' => 'Bakti Sosial',
            ],

            [
                'id_kategori' => '3',
                'nama_keterangan' => 'BKB (Bina Keluarga Balita)',
            ],

            [
                'id_kategori' => '3',
                'nama_keterangan' => 'PAUD Sejenis',
            ],

            [
                'id_kategori' => '3',
                'nama_keterangan' => 'Paket A ',
            ],

            [
                'id_kategori' => '3',
                'nama_keterangan' => 'Paket B ',
            ],

            [
                'id_kategori' => '3',
                'nama_keterangan' => 'Paket C',
            ],

            [
                'id_kategori' => '3',
                'nama_keterangan' => 'KF (Keaksaraan Fungsionalitas)',
            ],

            [
                'id_kategori' => '4',
                'nama_keterangan' => 'UP2K (Usaha Peningkatan Pendapatan Koperasi)',
            ],

            [
                'id_kategori' => '4',
                'nama_keterangan' => 'Koperasi',
            ],

         ]);

    }
}