<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('superadmin'),
            'user_type' => 'superadmin',
            'id_kecamatan' => null,
            'id_desa' => null,
        ]);
        User::create([
            'name' => 'Admin PKK Kabupaten',
            'email' => 'adminkabupaten@gmail.com',
            'password' => Hash::make('adminkabupaten'),
            'user_type' => 'admin_kabupaten',
            'id_kecamatan' => null,
            'id_desa' => null,
        ]);

        // admin desa anjatan
        User::create([
            'name' => 'Admin PKK Desa Anjatan',
            'email' => 'admindesaanjatan@gmail.com',
            'password' => Hash::make('anjatan'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 1,
            'id_desa' => 1,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Anjatan Baru',
            'email' => 'admindesaanjatanbaru@gmail.com',
            'password' => Hash::make('anjatanbaru'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 1,
            'id_desa' => 2,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Anjatan Utara',
            'email' => 'admindesaanjatanutara@gmail.com',
            'password' => Hash::make('anjatanutara'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 1,
            'id_desa' => 3,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Bugis',
            'email' => 'admindesabugis@gmail.com',
            'password' => Hash::make('bugis'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 1,
            'id_desa' => 4,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Bugis Tua',
            'email' => 'admindesabugistua@gmail.com',
            'password' => Hash::make('bugistua'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 1,
            'id_desa' => 5,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Cilandak',
            'email' => 'admindesacilandak@gmail.com',
            'password' => Hash::make('cilandak'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 1,
            'id_desa' => 6,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Cilandak Lor',
            'email' => 'admindesacilandaklor@gmail.com',
            'password' => Hash::make('cilandaklor'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 1,
            'id_desa' => 7,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Kedungwungu',
            'email' => 'admindesakedungwunguanjatan@gmail.com',
            'password' => Hash::make('kedungwunguanjatan'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 1,
            'id_desa' => 8,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Kopyah',
            'email' => 'admindesakopyah@gmail.com',
            'password' => Hash::make('kopyah'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 1,
            'id_desa' => 9,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Lempuyang',
            'email' => 'admindesalempuyang@gmail.com',
            'password' => Hash::make('lempuyang'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 1,
            'id_desa' => 10,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Mangunjaya',
            'email' => 'admindesamangunjaya@gmail.com',
            'password' => Hash::make('mangunjaya'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 1,
            'id_desa' => 11,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Salamdarma',
            'email' => 'admindesasalamdarma@gmail.com',
            'password' => Hash::make('salamdarma'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 1,
            'id_desa' => 12,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Wanguk',
            'email' => 'admindesawanguk@gmail.com',
            'password' => Hash::make('wanguk'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 1,
            'id_desa' => 13,
        ]);

        // admin desa arahan
        User::create([
            'name' => 'Admin PKK Desa Arahan Kidul',
            'email' => 'admindesaarahankidul@gmail.com',
            'password' => Hash::make('arahankidul'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 2,
            'id_desa' => 14,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Arahan Lor',
            'email' => 'admindesaarahanlor@gmail.com',
            'password' => Hash::make('arahanlor'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 2,
            'id_desa' => 15,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Cidempet',
            'email' => 'admindesacidempet@gmail.com',
            'password' => Hash::make('cidempet'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 2,
            'id_desa' => 16,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Linggajati',
            'email' => 'admindesalinggarjati@gmail.com',
            'password' => Hash::make('linggarjati'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 2,
            'id_desa' => 17,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Pranggong',
            'email' => 'admindesapranggong@gmail.com',
            'password' => Hash::make('pranggong'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 2,
            'id_desa' => 18,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Sukadadi',
            'email' => 'admindesasukadadih@gmail.com',
            'password' => Hash::make('sukadadi'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 2,
            'id_desa' => 19,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Sukasari',
            'email' => 'admindesasukasari@gmail.com',
            'password' => Hash::make('sukasari'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 2,
            'id_desa' => 20,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Tawangsari',
            'email' => 'admindesatawangsari@gmail.com',
            'password' => Hash::make('tawangsari'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 2,
            'id_desa' => 21,
        ]);

        // admin desa Balongan
        User::create([
            'name' => 'Admin PKK Desa Balongan',
            'email' => 'admindesabalongan@gmail.com',
            'password' => Hash::make('balongan'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 3,
            'id_desa' => 22,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Gelarmendala',
            'email' => 'admindesagelarmendala@gmail.com',
            'password' => Hash::make('gelarmendala'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 3,
            'id_desa' => 23,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Majakerta',
            'email' => 'admindesamajakerta@gmail.com',
            'password' => Hash::make('majakerta'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 3,
            'id_desa' => 24,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Rawadalem',
            'email' => 'admindesarawadalem@gmail.com',
            'password' => Hash::make('rawadalem'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 3,
            'id_desa' => 25,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Sudimampir',
            'email' => 'admindesasudimampir@gmail.com',
            'password' => Hash::make('sudimampir'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 3,
            'id_desa' => 27,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Sudimampir Lor',
            'email' => 'admindesasudimampirlor@gmail.com',
            'password' => Hash::make('sudimampirlor'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 3,
            'id_desa' => 27,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Sukareja',
            'email' => 'admindesasukareja@gmail.com',
            'password' => Hash::make('sukareja'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 3,
            'id_desa' => 28,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Sukaurip',
            'email' => 'admindesasukaurip@gmail.com',
            'password' => Hash::make('sukaurip'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 3,
            'id_desa' => 29,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Tegal Sembadra',
            'email' => 'admindesategalsembadra@gmail.com',
            'password' => Hash::make('tegalsembadra'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 3,
            'id_desa' => 30,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Tegal Urung',
            'email' => 'admindesategalurung@gmail.com',
            'password' => Hash::make('tegalurung'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 3,
            'id_desa' => 31,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Bangodua',
            'email' => 'admindesabangodua@gmail.com',
            'password' => Hash::make('bangodua'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 4,
            'id_desa' => 32,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Beduyut',
            'email' => 'admindesabeduyut@gmail.com',
            'password' => Hash::make('beduyut'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 4,
            'id_desa' => 33,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Karanggetas',
            'email' => 'admindesakaranggetas@gmail.com',
            'password' => Hash::make('karanggetas'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 4,
            'id_desa' => 34,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Malangsari',
            'email' => 'admindesamalangsari@gmail.com',
            'password' => Hash::make('malangsari'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 4,
            'id_desa' => 35,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Mulyasari',
            'email' => 'admindesamulyasari@gmail.com',
            'password' => Hash::make('mulyasari'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 4,
            'id_desa' => 36,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Rancasari',
            'email' => 'admindesarancasari@gmail.com',
            'password' => Hash::make('rancasari'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 4,
            'id_desa' => 37,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Tegalgirang',
            'email' => 'admindesategalgirang@gmail.com',
            'password' => Hash::make('tegalgirang'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 4,
            'id_desa' => 38,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Wanasari',
            'email' => 'admindesawanasari@gmail.com',
            'password' => Hash::make('wanasari'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 4,
            'id_desa' => 39,
        ]);

        // admin desa bongas
        User::create([
            'name' => 'Admin PKK Desa Bongas',
            'email' => 'admindesabongas@gmail.com',
            'password' => Hash::make('bongas'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 5,
            'id_desa' => 40,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Cipaat',
            'email' => 'admindesacipaat@gmail.com',
            'password' => Hash::make('cipaat'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 5,
            'id_desa' => 41,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Cipedang',
            'email' => 'admindesacipedang@gmail.com',
            'password' => Hash::make('cipedang'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 5,
            'id_desa' => 42,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Kertajaya',
            'email' => 'admindesakertajaya@gmail.com',
            'password' => Hash::make('kertajaya'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 5,
            'id_desa' => 43,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Kertamulya',
            'email' => 'admindesakertamulya@gmail.com',
            'password' => Hash::make('kertamulya'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 5,
            'id_desa' => 44,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Margamulya',
            'email' => 'admindesamargamulya@gmail.com',
            'password' => Hash::make('margamulya'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 5,
            'id_desa' => 45,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Plawangan',
            'email' => 'admindesaplawangan@gmail.com',
            'password' => Hash::make('plawangan'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 5,
            'id_desa' => 46,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Sidamulya',
            'email' => 'admindesasidamulya@gmail.com',
            'password' => Hash::make('sidamulya'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 5,
            'id_desa' => 47,
        ]);


        // admin desa Cangkring
        User::create([
            'name' => 'Admin PKK Desa Cangkring',
            'email' => 'admindesacangkring@gmail.com',
            'password' => Hash::make('cangkring'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 6,
            'id_desa' => 48,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Cantigi Kulon',
            'email' => 'admindesacantigikulon@gmail.com',
            'password' => Hash::make('cantigikulon'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 6,
            'id_desa' => 49,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Cantigi Wetan',
            'email' => 'admindesacantigiwetan@gmail.com',
            'password' => Hash::make('cantigiwetan'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 6,
            'id_desa' => 50,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Lamarantarung',
            'email' => 'admindesalamarantarung@gmail.com',
            'password' => Hash::make('lamarantarung'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 6,
            'id_desa' => 51,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Panyingkiran Kidul',
            'email' => 'admindesapanyingkirankidul@gmail.com',
            'password' => Hash::make('panyingkirankidul'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 6,
            'id_desa' => 52,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Panyingkiran Lor',
            'email' => 'admindesapanyingkiranlor@gmail.com',
            'password' => Hash::make('panyingkiranlor'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 6,
            'id_desa' => 53,
        ]);

        // admin amis
        User::create([
            'name' => 'Admin PKK Desa Amis',
            'email' => 'admindesaamis@gmail.com',
            'password' => Hash::make('amis'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 7,
            'id_desa' => 54,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Cikedung Lor',
            'email' => 'admindesacikedunglor@gmail.com',
            'password' => Hash::make('cikedunglor'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 7,
            'id_desa' => 55,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Cikedung Kidul',
            'email' => 'admindesacikedungkidul@gmail.com',
            'password' => Hash::make('cikedungkidul'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 7,
            'id_desa' => 56,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Jambak',
            'email' => 'admindesajambak@gmail.com',
            'password' => Hash::make('jambak'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 7,
            'id_desa' => 57,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Jatisura',
            'email' => 'admindesajatisura@gmail.com',
            'password' => Hash::make('jatisura'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 7,
            'id_desa' => 58,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Loyang',
            'email' => 'admindesaloyang@gmail.com',
            'password' => Hash::make('loyang'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 7,
            'id_desa' => 59,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Mundakjaya',
            'email' => 'admindesamundakjaya@gmail.com',
            'password' => Hash::make('mundakjaya'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 7,
            'id_desa' => 60,
        ]);

        // admin desa Babakan jaya
        User::create([
            'name' => 'Admin PKK Desa Babakan Jaya',
            'email' => 'admindesababakanjaya@gmail.com',
            'password' => Hash::make('babakanjaya'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 8,
            'id_desa' => 61,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Drunten Kulon',
            'email' => 'admindesadruntenkulon@gmail.com',
            'password' => Hash::make('druntenkulon'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 8,
            'id_desa' => 62,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Drunten Wetan',
            'email' => 'admindesadruntenwetan@gmail.com',
            'password' => Hash::make('druntenwetan'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 8,
            'id_desa' => 63,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Gabus Kulon',
            'email' => 'admindesagabuskulon@gmail.com',
            'password' => Hash::make('gabuskulon'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 8,
            'id_desa' => 64,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Gabus Wetan',
            'email' => 'admindesagabuswetan@gmail.com',
            'password' => Hash::make('gabuswetan'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 8,
            'id_desa' => 65,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Kedokan Gabus',
            'email' => 'admindesakedokangabus@gmail.com',
            'password' => Hash::make('kedokangabus'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 8,
            'id_desa' => 66,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Kedung Dawa',
            'email' => 'admindesakedungdawa@gmail.com',
            'password' => Hash::make('kedungdawa'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 8,
            'id_desa' => 67,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Rancahan',
            'email' => 'admindesarancahan@gmail.com',
            'password' => Hash::make('rancahan'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 8,
            'id_desa' => 68,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Rancamulya',
            'email' => 'admindesarancamulya@gmail.com',
            'password' => Hash::make('rancamulya'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 8,
            'id_desa' => 69,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Sekar Mulya',
            'email' => 'admindesasekarmulya@gmail.com',
            'password' => Hash::make('sekarmulya'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 8,
            'id_desa' => 70,
        ]);

        // admin desa Balereja
        User::create([
            'name' => 'Admin PKK Desa Balereja',
            'email' => 'admindesabaleraja@gmail.com',
            'password' => Hash::make('baleraja'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 9,
            'id_desa' => 71,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Bantarwaru',
            'email' => 'admindesabantarwaru@gmail.com',
            'password' => Hash::make('bantarwaru'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 9,
            'id_desa' => 72,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Gantar',
            'email' => 'admindesagantar@gmail.com',
            'password' => Hash::make('gantar'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 9,
            'id_desa' => 73,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Mekarjaya',
            'email' => 'admindesamekarjaya@gmail.com',
            'password' => Hash::make('mekarjaya'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 9,
            'id_desa' => 74,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Mekarwaru',
            'email' => 'admindesamekarwaru@gmail.com',
            'password' => Hash::make('mekarwaru'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 9,
            'id_desa' => 75,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Sanca',
            'email' => 'admindesasanca@gmail.com',
            'password' => Hash::make('sanca'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 9,
            'id_desa' => 76,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Situraja',
            'email' => 'admindesasituraja@gmail.com',
            'password' => Hash::make('situraja'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 9,
            'id_desa' => 77,
        ]);

        // admin desa cipancuh
        User::create([
            'name' => 'Admin PKK Desa Cipancuh',
            'email' => 'admindesaCipancuh@gmail.com',
            'password' => Hash::make('Cipancuh'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 10,
            'id_desa' => 78,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Haurgeulis',
            'email' => 'admindesahaurgeulis@gmail.com',
            'password' => Hash::make('haurgeulisoyang'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 10,
            'id_desa' => 79,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Haurkolot',
            'email' => 'admindesahaurkolot@gmail.com',
            'password' => Hash::make('haurkolot'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 10,
            'id_desa' => 80,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Karangtumaritis',
            'email' => 'admindesakarangtumaritis@gmail.com',
            'password' => Hash::make('karangtumaritis'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 10,
            'id_desa' => 81,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Kertanegara',
            'email' => 'admindesakertanegara@gmail.com',
            'password' => Hash::make('kertanegara'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 10,
            'id_desa' => 82,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Mekarjati',
            'email' => 'admindesamekarjati@gmail.com',
            'password' => Hash::make('mekarjati'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 10,
            'id_desa' => 83,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Sidodadi',
            'email' => 'admindesasidodadi@gmail.com',
            'password' => Hash::make('sidodadi'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 10,
            'id_desa' => 84,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Sukajati',
            'email' => 'admindesasukajati@gmail.com',
            'password' => Hash::make('sukajati'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 10,
            'id_desa' => 85,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Sumbermulya',
            'email' => 'admindesasumbermulya@gmail.com',
            'password' => Hash::make('sumbermulya'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 10,
            'id_desa' => 86,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Wanakaya',
            'email' => 'admindesawanakaya@gmail.com',
            'password' => Hash::make('wanakaya'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 10,
            'id_desa' => 87,
        ]);

        // admin desa Dukuh
        User::create([
            'name' => 'Admin PKK Desa Dukuh',
            'email' => 'admindesadukuh@gmail.com',
            'password' => Hash::make('dukuh'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 11,
            'id_desa' => 88,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Karangsong',
            'email' => 'admindesakarangsong@gmail.com',
            'password' => Hash::make('karangsong'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 11,
            'id_desa' => 89,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Pabean Udik',
            'email' => 'admindesapabeanudik@gmail.com',
            'password' => Hash::make('pabeanudik'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 11,
            'id_desa' => 90,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Pekandangan',
            'email' => 'admindesapekandangan@gmail.com',
            'password' => Hash::make('pekandangan'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 11,
            'id_desa' => 91,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Pekandangan Jaya',
            'email' => 'admindesapekandanganjaya@gmail.com',
            'password' => Hash::make('pekandanganjaya'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 11,
            'id_desa' => 92,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Plumbon',
            'email' => 'admindesaplumbon@gmail.com',
            'password' => Hash::make('plumbon'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 11,
            'id_desa' => 93,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Singajaya',
            'email' => 'admindesasingajaya@gmail.com',
            'password' => Hash::make('singajaya'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 11,
            'id_desa' => 94,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Singaraja',
            'email' => 'admindesasingaraja@gmail.com',
            'password' => Hash::make('singaraja'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 11,
            'id_desa' => 95,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Tambak',
            'email' => 'admindesatambak@gmail.com',
            'password' => Hash::make('tambak'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 11,
            'id_desa' => 96,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Telukagung',
            'email' => 'admindesatelukagung@gmail.com',
            'password' => Hash::make('telukagung'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 11,
            'id_desa' => 97,
        ]);
        User::create([
            'name' => 'Admin PKK Kel. Bojongsari',
            'email' => 'adminkelbojongsari@gmail.com',
            'password' => Hash::make('bojongsari'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 11,
            'id_desa' => 98,
        ]);
        User::create([
            'name' => 'Admin PKK Kel. Karanganyar',
            'email' => 'adminkelkaranganya@gmail.com',
            'password' => Hash::make('karanganyar'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 11,
            'id_desa' => 99,
        ]);
        User::create([
            'name' => 'Admin PKK Kel. Karangmalang',
            'email' => 'adminkelkarangmalang@gmail.com',
            'password' => Hash::make('karangmalang'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 11,
            'id_desa' => 100,
        ]);
        User::create([
            'name' => 'Admin PKK Kel. Kepandean',
            'email' => 'adminkelkepandean@gmail.com',
            'password' => Hash::make('kepandean'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 11,
            'id_desa' => 101,
        ]);
        User::create([
            'name' => 'Admin PKK Kel. Lemahabang',
            'email' => 'adminkellemahabang@gmail.com',
            'password' => Hash::make('lemahabang'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 11,
            'id_desa' => 102,
        ]);
        User::create([
            'name' => 'Admin PKK Kel. Lemahmekar',
            'email' => 'adminkellemahmekar@gmail.com',
            'password' => Hash::make('lemahmekar'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 11,
            'id_desa' => 103,
        ]);
        User::create([
            'name' => 'Admin PKK Kel. Margadadi',
            'email' => 'adminkelmargadadi@gmail.com',
            'password' => Hash::make('margadadi'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 11,
            'id_desa' => 104,
        ]);
        User::create([
            'name' => 'Admin PKK Kel. Paoman',
            'email' => 'adminkelpaoman@gmail.com',
            'password' => Hash::make('paoman'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 11,
            'id_desa' => 105,
        ]);

        // admin desa Bulak
        User::create([
            'name' => 'Admin PKK Desa Bulak',
            'email' => 'admindesabulakjtb@gmail.com',
            'password' => Hash::make('bulakjtb'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 12,
            'id_desa' => 106,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Bulak Lor',
            'email' => 'admindesabulaklor@gmail.com',
            'password' => Hash::make('bulaklor'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 12,
            'id_desa' => 107,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Jatibarang',
            'email' => 'admindesajatibarang@gmail.com',
            'password' => Hash::make('jatibarang'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 12,
            'id_desa' => 108,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Jatibarang Baru',
            'email' => 'admindesajatibarangbaru@gmail.com',
            'password' => Hash::make('jatibarangbaru'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 12,
            'id_desa' => 109,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Jatisawit',
            'email' => 'admindesajatisawit@gmail.com',
            'password' => Hash::make('jatisawit'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 12,
            'id_desa' => 110,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Jatisawit Lor',
            'email' => 'admindesajatisawitlor@gmail.com',
            'password' => Hash::make('jatisawitlor'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 12,
            'id_desa' => 111,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Kalimati',
            'email' => 'admindesakalimati@gmail.com',
            'password' => Hash::make('kalimati'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 12,
            'id_desa' => 112,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Kebulen',
            'email' => 'admindesakebulen@gmail.com',
            'password' => Hash::make('kebulen'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 12,
            'id_desa' => 113,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Krasak',
            'email' => 'admindesakrasak@gmail.com',
            'password' => Hash::make('krasak'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 12,
            'id_desa' => 114,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Lohbener',
            'email' => 'admindesalohbenerjtb@gmail.com',
            'password' => Hash::make('lohbenerjtb'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 12,
            'id_desa' => 115,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Lohbener Lor',
            'email' => 'admindesalohbenerlor@gmail.com',
            'password' => Hash::make('lohbenerlor'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 12,
            'id_desa' => 116,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Malang Semirang',
            'email' => 'admindesamalangsemirang@gmail.com',
            'password' => Hash::make('malangsemirang'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 12,
            'id_desa' => 117,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Pawidean',
            'email' => 'admindesapawidean@gmail.com',
            'password' => Hash::make('pawidean'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 12,
            'id_desa' => 118,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Pilang Sari',
            'email' => 'admindesapilangsari@gmail.com',
            'password' => Hash::make('pilangsari'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 12,
            'id_desa' => 119,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Sukalila',
            'email' => 'admindesasukalila@gmail.com',
            'password' => Hash::make('sukalila'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 12,
            'id_desa' => 120,
        ]);

        // admin desa dadap
        User::create([
            'name' => 'Admin PKK Desa Dadap',
            'email' => 'admindesadadap@gmail.com',
            'password' => Hash::make('dadap'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 13,
            'id_desa' => 121,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Juntikebon',
            'email' => 'admindesajuntikebon@gmail.com',
            'password' => Hash::make('juntikebon'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 13,
            'id_desa' => 122,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Juntikedokan',
            'email' => 'admindesajuntikedokan@gmail.com',
            'password' => Hash::make('juntikedokan'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 13,
            'id_desa' => 123,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Juntiweden',
            'email' => 'admindesajuntiweden@gmail.com',
            'password' => Hash::make('juntiweden'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 13,
            'id_desa' => 124,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Juntinyuat',
            'email' => 'admindesajuntinyuat@gmail.com',
            'password' => Hash::make('juntinyuat'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 13,
            'id_desa' => 125,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Limbangan',
            'email' => 'admindesalimbangan@gmailcom',
            'password' => Hash::make('limbangan'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 13,
            'id_desa' => 126,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Lombang',
            'email' => 'admindesalombang@gmail.com',
            'password' => Hash::make('lombang'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 13,
            'id_desa' => 127,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Pondoh',
            'email' => 'admindesapondoh@gmail.com',
            'password' => Hash::make('pondoh'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 13,
            'id_desa' => 128,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Sambirmaya',
            'email' => 'admindesaSambirmaya@gmail.com',
            'password' => Hash::make('Sambirmaya'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 13,
            'id_desa' => 129,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Segeran',
            'email' => 'admindesasegeran@gmail.com',
            'password' => Hash::make('segeran'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 13,
            'id_desa' => 130,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Segeran Kidul',
            'email' => 'admindesasegerankidul@gmail.com',
            'password' => Hash::make('segerankidul'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 13,
            'id_desa' => 131,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Tinumpuk',
            'email' => 'admindesatinumpuk@gmail.com',
            'password' => Hash::make('tinumpuk'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 13,
            'id_desa' => 132,
        ]);

        // admin desa Bulak kecamatan kandanghaur
        User::create([
            'name' => 'Admin PKK Desa Bulak',
            'email' => 'admindesabulak@gmail.com',
            'password' => Hash::make('bulak'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 14,
            'id_desa' => 133,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Curug',
            'email' => 'admindesacurug@gmail.com',
            'password' => Hash::make('curug'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 14,
            'id_desa' => 134
        ]);
        User::create([
            'name' => 'Admin PKK Desa Eretan Kulon',
            'email' => 'admindesaeretankulon@gmail.com',
            'password' => Hash::make('eretankulon'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 14,
            'id_desa' => 135
        ]);
        User::create([
            'name' => 'Admin PKK Desa Eretan Wetan',
            'email' => 'admindesaeretanwetan@gmail.com',
            'password' => Hash::make('eretanwetan'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 14,
            'id_desa' => 136
        ]);
        User::create([
            'name' => 'Admin PKK Desa Ilir',
            'email' => 'admindesailir@gmail.com',
            'password' => Hash::make('ilir'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 14,
            'id_desa' => 137
        ]);
        User::create([
            'name' => 'Admin PKK Desa Karang Anyar',
            'email' => 'admindesakaranganyar@gmail.com',
            'password' => Hash::make('karanganyar'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 14,
            'id_desa' => 138
        ]);
        User::create([
            'name' => 'Admin PKK Desa Karangmulya',
            'email' => 'admindesakarangmulya@gmail.com',
            'password' => Hash::make('karangmulya'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 14,
            'id_desa' => 139
        ]);
        User::create([
            'name' => 'Admin PKK Desa Kertawinangun',
            'email' => 'admindesakertawinangun@gmail.com',
            'password' => Hash::make('kertawinangun'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 14,
            'id_desa' => 140
        ]);
        User::create([
            'name' => 'Admin PKK Desa Pareangirang',
            'email' => 'admindesapareangirang@gmail.com',
            'password' => Hash::make('pareangirang'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 14,
            'id_desa' => 141
        ]);
        User::create([
            'name' => 'Admin PKK Desa Pranti',
            'email' => 'admindesapranti@gmail.com',
            'password' => Hash::make('pranti'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 14,
            'id_desa' => 142
        ]);
        User::create([
            'name' => 'Admin PKK Desa Soge',
            'email' => 'admindesasoge@gmail.com',
            'password' => Hash::make('soge'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 14,
            'id_desa' => 143
        ]);
        User::create([
            'name' => 'Admin PKK Desa Wirakanan',
            'email' => 'admindesawirakanan@gmail.com',
            'password' => Hash::make('wirakanan'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 14,
            'id_desa' => 144
        ]);
        User::create([
            'name' => 'Admin PKK Desa Wirapanjunan',
            'email' => 'admindesawirapanjunan@gmail.com',
            'password' => Hash::make('wirapanjunan'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 14,
            'id_desa' => 145
        ]);

        // admin desa benda
        User::create([
            'name' => 'Admin PKK Desa Benda',
            'email' => 'admindesabenda@gmail.com',
            'password' => Hash::make('benda'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 15,
            'id_desa' => 146
        ]);
        User::create([
            'name' => 'Admin PKK Desa Dukuh Jeruk',
            'email' => 'admindesadukuhjeruk@gmail.com',
            'password' => Hash::make('dukuhjeruk'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 15,
            'id_desa' => 147
        ]);
        User::create([
            'name' => 'Admin PKK Desa Dukuh Tengah',
            'email' => 'admindesadukuhtengah@gmail.com',
            'password' => Hash::make('dukuhtengah'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 15,
            'id_desa' => 148
        ]);
        User::create([
            'name' => 'Admin PKK Desa Kaplongan Lor',
            'email' => 'admindesakaplonganlor@gmail.com',
            'password' => Hash::make('kaplonganlor'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 15,
            'id_desa' => 149
        ]);
        User::create([
            'name' => 'Admin PKK Desa Karangampel',
            'email' => 'admindesakarangampel@gmail.com',
            'password' => Hash::make('karangampel'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 15,
            'id_desa' => 150
        ]);
        User::create([
            'name' => 'Admin PKK Desa Karangampel Kidul',
            'email' => 'admindesakarangampelkidul@gmail.com',
            'password' => Hash::make('karangampelkidul'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 15,
            'id_desa' => 151
        ]);
        User::create([
            'name' => 'Admin PKK Desa Mundu',
            'email' => 'admindesamundu@gmail.com',
            'password' => Hash::make('mundu'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 15,
            'id_desa' => 152
        ]);
        User::create([
            'name' => 'Admin PKK Desa Pringgacala',
            'email' => 'admindesapringgacala@gmail.com',
            'password' => Hash::make('pringgacala'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 15,
            'id_desa' => 153
        ]);
        User::create([
            'name' => 'Admin PKK Desa Sendang',
            'email' => 'admindesasendang@gmail.com',
            'password' => Hash::make('sendang'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 15,
            'id_desa' => 154
        ]);
        User::create([
            'name' => 'Admin PKK Desa Tanjungpura',
            'email' => 'admindesatanjungpura@gmail.com',
            'password' => Hash::make('tanjungpura'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 15,
            'id_desa' => 155
        ]);
        User::create([
            'name' => 'Admin PKK Desa Tanjungsari',
            'email' => 'admindesatanjungsari@gmail.com',
            'password' => Hash::make('tanjungsari'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 15,
            'id_desa' => 156
        ]);

        // admin desa Cangkingan
        User::create([
            'name' => 'Admin PKK Desa Cangkingan',
            'email' => 'admindesaCangkingan@gmail.com',
            'password' => Hash::make('Cangkingan'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 16,
            'id_desa' => 157
        ]);
        User::create([
            'name' => 'Admin PKK Desa Jayalaksana',
            'email' => 'admindesajayalaksana@gmail.com',
            'password' => Hash::make('jayalaksana'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 16,
            'id_desa' => 158
        ]);
        User::create([
            'name' => 'Admin PKK Desa Jayawinangun',
            'email' => 'admindesajayawinangun@gmail.com',
            'password' => Hash::make('jayawinangun'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 16,
            'id_desa' => 159
        ]);
        User::create([
            'name' => 'Admin PKK Desa Kaplongan',
            'email' => 'admindesakaplongan@gmail.com',
            'password' => Hash::make('kaplongan'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 16,
            'id_desa' => 160
        ]);
        User::create([
            'name' => 'Admin PKK Desa Kedokan Agung',
            'email' => 'admindesakedokanagung@gmail.com',
            'password' => Hash::make('kedokanagung'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 16,
            'id_desa' => 161
        ]);
        User::create([
            'name' => 'Admin PKK Desa Kedokanbunder',
            'email' => 'admindesakedokanbunder@gmail.com',
            'password' => Hash::make('kedokanbunder'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 16,
            'id_desa' => 162
        ]);
        User::create([
            'name' => 'Admin PKK Desa Kedokanbunderwetan',
            'email' => 'admindesakedokanbunderwetan@gmail.com',
            'password' => Hash::make('kedokanbunderwetan'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 16,
            'id_desa' => 163
        ]);

        // admin desa jambe
        User::create([
            'name' => 'Admin PKK Desa Jambe',
            'email' => 'admindesajambe@gmail.com',
            'password' => Hash::make('jambe'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 17,
            'id_desa' => 164
        ]);
        User::create([
            'name' => 'Admin PKK Desa Jengkok',
            'email' => 'admindesajengkok@gmail.com',
            'password' => Hash::make('jengkok'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 17,
            'id_desa' => 165
        ]);
        User::create([
            'name' => 'Admin PKK Desa Kertasemaya',
            'email' => 'admindesakertasemaya@gmail.com',
            'password' => Hash::make('kertasemaya'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 17,
            'id_desa' => 166
        ]);
        User::create([
            'name' => 'Admin PKK Desa Kliwed',
            'email' => 'admindesakliwed@gmail.com',
            'password' => Hash::make('kliwed'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 17,
            'id_desa' => 167
        ]);
        User::create([
            'name' => 'Admin PKK Desa Larangan Jambe',
            'email' => 'admindesalaranganjambe@gmail.com',
            'password' => Hash::make('lemahayu'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 17,
            'id_desa' => 168
        ]);
        User::create([
            'name' => 'Admin PKK Desa Lemahayu',
            'email' => 'admindesalemahayu@gmail.com',
            'password' => Hash::make('lemahayu'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 17,
            'id_desa' => 169
        ]);
        User::create([
            'name' => 'Admin PKK Desa Manguntara',
            'email' => 'admindesamanguntara@gmail.com',
            'password' => Hash::make('manguntara'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 17,
            'id_desa' => 170
        ]);
        User::create([
            'name' => 'Admin PKK Desa Sukawera',
            'email' => 'admindesasukawera@gmail.com',
            'password' => Hash::make('sukawera'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 17,
            'id_desa' => 171
        ]);
        User::create([
            'name' => 'Admin PKK Desa Tegal Wirangrong',
            'email' => 'admindesategalwirangrong@gmail.com',
            'password' => Hash::make('tegalwirangrong'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 17,
            'id_desa' => 172
        ]);
        User::create([
            'name' => 'Admin PKK Desa Tenajar',
            'email' => 'admindesatenajar@gmail.com',
            'password' => Hash::make('tenajar'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 17,
            'id_desa' => 173
        ]);
        User::create([
            'name' => 'Admin PKK Desa Tenajar Kidul',
            'email' => 'admindesatenajarkidul@gmail.com',
            'password' => Hash::make('tenajarkidul'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 17,
            'id_desa' => 174
        ]);
        User::create([
            'name' => 'Admin PKK Desa Tenajar Lor',
            'email' => 'admindesatenajarlor@gmail.com',
            'password' => Hash::make('tenajarlor'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 17,
            'id_desa' => 175
        ]);
        User::create([
            'name' => 'Admin PKK Desa Tulungagung',
            'email' => 'admindesatulungagung@gmail.com',
            'password' => Hash::make('tulungagung'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 17,
            'id_desa' => 176
        ]);

        // admin desa Dukuhjati
        User::create([
            'name' => 'Admin PKK Desa Dukuhjati',
            'email' => 'admindesadukuhjati@gmail.com',
            'password' => Hash::make('dukuhjati'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 18,
            'id_desa' => 177
        ]);
        User::create([
            'name' => 'Admin PKK Desa Kalianyar',
            'email' => 'admindesakalianyar@gmail.com',
            'password' => Hash::make('kalianyar'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 18,
            'id_desa' => 178
        ]);
        User::create([
            'name' => 'Admin PKK Desa Kapringan',
            'email' => 'admindesakapringan@gmail.com',
            'password' => Hash::make('kapringan'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 18,
            'id_desa' => 179
        ]);
        User::create([
            'name' => 'Admin PKK Desa Kedungwungu',
            'email' => 'admindesakedungwungu@gmail.com',
            'password' => Hash::make('kedungwungu'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 18,
            'id_desa' => 180
        ]);
        User::create([
            'name' => 'Admin PKK Desa Krangkeng',
            'email' => 'admindesakrangkeng@gmail.com',
            'password' => Hash::make('krangkeng'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 18,
            'id_desa' => 181
        ]);
        User::create([
            'name' => 'Admin PKK Desa Luwunggesik',
            'email' => 'admindesaluwunggesik@gmail.com',
            'password' => Hash::make('luwunggesik'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 18,
            'id_desa' => 182
        ]);
        User::create([
            'name' => 'Admin PKK Desa Purwajaya',
            'email' => 'admindesapurwajaya@gmail.com',
            'password' => Hash::make('purwajaya'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 18,
            'id_desa' => 183
        ]);
        User::create([
            'name' => 'Admin PKK Desa Singakerta',
            'email' => 'admindesasingakerta@gmail.com',
            'password' => Hash::make('singakerta'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 18,
            'id_desa' => 184
        ]);
        User::create([
            'name' => 'Admin PKK Desa Srengseng',
            'email' => 'admindesasrengseng@gmail.com',
            'password' => Hash::make('srengseng'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 18,
            'id_desa' => 185
        ]);
        User::create([
            'name' => 'Admin PKK Desa Tanjakan',
            'email' => 'admindesatanjakan@gmail.com',
            'password' => Hash::make('tanjakan'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 18,
            'id_desa' => 186
        ]);
        User::create([
            'name' => 'Admin PKK Desa Tegalmulya',
            'email' => 'admindesategalmulya@gmail.com',
            'password' => Hash::make('tegalmulya'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 18,
            'id_desa' => 187
        ]);

        // admin desa Jayamulya
        User::create([
            'name' => 'Admin PKK Desa Jayamulya',
            'email' => 'admindesajayamulya@gmail.com',
            'password' => Hash::make('jayamulya'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 19,
            'id_desa' => 188
        ]);
        User::create([
            'name' => 'Admin PKK Desa Kroya',
            'email' => 'admindesakroya@gmail.com',
            'password' => Hash::make('kroya'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 19,
            'id_desa' => 189
        ]);
        User::create([
            'name' => 'Admin PKK Desa Suka Slamet',
            'email' => 'admindesasukaslamet@gmail.com',
            'password' => Hash::make('sukaslamet'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 19,
            'id_desa' => 190
        ]);
        User::create([
            'name' => 'Admin PKK Desa Sukamelang',
            'email' => 'admindesasukamelang@gmail.com',
            'password' => Hash::make('sukamelang'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 19,
            'id_desa' => 191
        ]);
        User::create([
            'name' => 'Admin PKK Desa Sumberjaya',
            'email' => 'admindesasumberjaya@gmail.com',
            'password' => Hash::make('sumberjaya'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 19,
            'id_desa' => 192
        ]);
        User::create([
            'name' => 'Admin PKK Desa Sumbon',
            'email' => 'admindesasumbon@gmail.com',
            'password' => Hash::make('sumbon'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 19,
            'id_desa' => 193
        ]);
        User::create([
            'name' => 'Admin PKK Desa Temiyangsari',
            'email' => 'admindesatemiyangsari@gmail.com',
            'password' => Hash::make('temiyangsari'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 19,
            'id_desa' => 194
        ]);
        User::create([
            'name' => 'Admin PKK Desa Tanjungngkerta',
            'email' => 'admindesatanjungngkerta@gmail.com',
            'password' => Hash::make('tanjungngkerta'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 19,
            'id_desa' => 195
        ]);
        User::create([
            'name' => 'Admin PKK Desa Temiyang',
            'email' => 'admindesatemiyang@gmail.com',
            'password' => Hash::make('temiyang'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 19,
            'id_desa' => 196
        ]);

        // admin desa cempeh
        User::create([
            'name' => 'Admin PKK Desa Cempeh',
            'email' => 'admindesacempeh@gmail.com',
            'password' => Hash::make('cempeh'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 20,
            'id_desa' => 197
        ]);
        User::create([
            'name' => 'Admin PKK Desa Langgengsari',
            'email' => 'admindesalanggengsari@gmail.com',
            'password' => Hash::make('langgengsari'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 20,
            'id_desa' => 198
        ]);
        User::create([
            'name' => 'Admin PKK Desa Lelea',
            'email' => 'admindesalelea@gmail.com',
            'password' => Hash::make('lelea'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 20,
            'id_desa' => 199
        ]);
        User::create([
            'name' => 'Admin PKK Desa Nunuk',
            'email' => 'admindesanunuk@gmail.com',
            'password' => Hash::make('nunuk'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 20,
            'id_desa' => 200
        ]);
        User::create([
            'name' => 'Admin PKK Desa Pangauban',
            'email' => 'admindesapangauban@gmail.com',
            'password' => Hash::make('pangauban'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 20,
            'id_desa' => 201
        ]);
        User::create([
            'name' => 'Admin PKK Desa Tamansari',
            'email' => 'admindesatamansari@gmail.com',
            'password' => Hash::make('tamansari'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 20,
            'id_desa' => 202
        ]);
        User::create([
            'name' => 'Admin PKK Desa Tegalasari',
            'email' => 'admindesategalasari@gmail.com',
            'password' => Hash::make('tegalasari'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 19,
            'id_desa' => 203
        ]);
        User::create([
            'name' => 'Admin PKK Desa Tempel',
            'email' => 'admindesatempel@gmail.com',
            'password' => Hash::make('tempel'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 20,
            'id_desa' => 204
        ]);
        User::create([
            'name' => 'Admin PKK Desa Tempelkulon',
            'email' => 'admindesatempelkulon@gmail.com',
            'password' => Hash::make('tempelkulon'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 20,
            'id_desa' => 205
        ]);
        User::create([
            'name' => 'Admin PKK Desa Tugu',
            'email' => 'admindesatugu@gmail.com',
            'password' => Hash::make('tugu'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 20,
            'id_desa' => 206
        ]);
        User::create([
            'name' => 'Admin PKK Desa Tunggul Payung',
            'email' => 'admindesatunggulpayung@gmail.com',
            'password' => Hash::make('tunggulpayung'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 20,
            'id_desa' => 207
        ]);

        // admin desa Bojongslawi
        User::create([
            'name' => 'Admin PKK Desa Bojongslawi',
            'email' => 'admindesabojongslawi@gmail.com',
            'password' => Hash::make('bojongslawi'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 21,
            'id_desa' => 208
        ]);
        User::create([
            'name' => 'Admin PKK Desa Kiajaran Kulon',
            'email' => 'admindesakiajarankulon@gmail.com',
            'password' => Hash::make('kiajarankulon'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 21,
            'id_desa' => 209
        ]);
        User::create([
            'name' => 'Admin PKK Desa Kiajaran Wetan',
            'email' => 'admindesakiajaranwetan@gmail.com',
            'password' => Hash::make('kiajaranwetan'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 21,
            'id_desa' => 210
        ]);
        User::create([
            'name' => 'Admin PKK Desa Langut',
            'email' => 'admindesalangut@gmail.com',
            'password' => Hash::make('langut'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 21,
            'id_desa' => 211
        ]);
        User::create([
            'name' => 'Admin PKK Desa Lanjan',
            'email' => 'admindesalanjan@gmail.com',
            'password' => Hash::make('lanjan'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 21,
            'id_desa' => 212
        ]);
        User::create([
            'name' => 'Admin PKK Desa Larangan',
            'email' => 'admindesalarangan@gmail.com',
            'password' => Hash::make('larangan'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 21,
            'id_desa' => 213
        ]);
        User::create([
            'name' => 'Admin PKK Desa Legok',
            'email' => 'admindesalegok@gmail.com',
            'password' => Hash::make('legok'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 21,
            'id_desa' => 214
        ]);
        User::create([
            'name' => 'Admin PKK Desa Lohbener',
            'email' => 'admindesalohbener@gmail.com',
            'password' => Hash::make('lohbener'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 21,
            'id_desa' => 215
        ]);
        User::create([
            'name' => 'Admin PKK Desa Pamayahan',
            'email' => 'admindesapamayahan@gmail.com',
            'password' => Hash::make('pamayahan'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 21,
            'id_desa' => 216
        ]);
        User::create([
            'name' => 'Admin PKK Desa Rambatan Kulon',
            'email' => 'admindesarambatankulon@gmail.com',
            'password' => Hash::make('rambatankulon'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 21,
            'id_desa' => 217
        ]);
        User::create([
            'name' => 'Admin PKK Desa Sindangkerta',
            'email' => 'admindesasindangkerta@gmail.com',
            'password' => Hash::make('sindangkerta'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 21,
            'id_desa' => 218
        ]);
        User::create([
            'name' => 'Admin PKK Desa Waru',
            'email' => 'admindesawaru@gmail.com',
            'password' => Hash::make('waru'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 21,
            'id_desa' => 219
        ]);

        // admin desa cemara
        User::create([
            'name' => 'Admin PKK Desa Cemara',
            'email' => 'admindesacemara@gmail.com',
            'password' => Hash::make('cemara'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 22,
            'id_desa' => 220
        ]);
        User::create([
            'name' => 'Admin PKK Desa Cemara Kulon',
            'email' => 'admindesacemarakulon@gmail.com',
            'password' => Hash::make('cemarakulon'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 22,
            'id_desa' => 221
        ]);
        User::create([
            'name' => 'Admin PKK Desa Jangga',
            'email' => 'admindesajangga@gmail.com',
            'password' => Hash::make('jangga'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 22,
            'id_desa' => 222
        ]);
        User::create([
            'name' => 'Admin PKK Desa Jumbleng',
            'email' => 'admindesajumbleng@gmail.com',
            'password' => Hash::make('jumbleng'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 22,
            'id_desa' => 223
        ]);
        User::create([
            'name' => 'Admin PKK Desa Krimun',
            'email' => 'admindesakrimun@gmail.com',
            'password' => Hash::make('krimun'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 22,
            'id_desa' => 224
        ]);
        User::create([
            'name' => 'Admin PKK Desa Losarang',
            'email' => 'admindesalosarang@gmail.com',
            'password' => Hash::make('losarang'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 22,
            'id_desa' => 225
        ]);
        User::create([
            'name' => 'Admin PKK Desa Muntur',
            'email' => 'admindesamuntur@gmail.com',
            'password' => Hash::make('muntur'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 22,
            'id_desa' => 226
        ]);
        User::create([
            'name' => 'Admin PKK Desa Pangkalan',
            'email' => 'admindesapangkalan@gmail.com',
            'password' => Hash::make('pangkalan'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 22,
            'id_desa' => 227
        ]);
        User::create([
            'name' => 'Admin PKK Desa Pegagan',
            'email' => 'admindesapegagan@gmail.com',
            'password' => Hash::make('pegagan'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 22,
            'id_desa' => 228
        ]);
        User::create([
            'name' => 'Admin PKK Desa Puntang',
            'email' => 'admindesapuntang@gmail.com',
            'password' => Hash::make('puntang'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 22,
            'id_desa' => 229
        ]);
        User::create([
            'name' => 'Admin PKK Desa Rajaiyang',
            'email' => 'admindesarajaiyang@gmail.com',
            'password' => Hash::make('rajaiyang'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 22,
            'id_desa' => 230
        ]);
        User::create([
            'name' => 'Admin PKK Desa Ranjeng',
            'email' => 'admindesaranjeng@gmail.com',
            'password' => Hash::make('ranjeng'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 22,
            'id_desa' => 231
        ]);
        User::create([
            'name' => 'Admin PKK Desa Santing',
            'email' => 'admindesasanting@gmail.com',
            'password' => Hash::make('santing'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 22,
            'id_desa' => 232
        ]);

        // admin desa brondong
        User::create([
            'name' => 'Admin PKK Desa Brondong',
            'email' => 'admindesaBrondong@gmail.com',
            'password' => Hash::make('Brondong'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 23,
            'id_desa' => 233
        ]);
        User::create([
            'name' => 'Admin PKK Desa Karanganyar',
            'email' => 'admindesakaranganyarpasekan@gmail.com',
            'password' => Hash::make('karanganyarpasekan'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 23,
            'id_desa' => 234
        ]);
        User::create([
            'name' => 'Admin PKK Desa Pabean Ilir',
            'email' => 'admindesapabeanilir@gmail.com',
            'password' => Hash::make('pabeanilir'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 23,
            'id_desa' => 235
        ]);
        User::create([
            'name' => 'Admin PKK Desa Pagirikan',
            'email' => 'admindesapagirikan@gmail.com',
            'password' => Hash::make('pagirikan'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 23,
            'id_desa' => 236
        ]);
        User::create([
            'name' => 'Admin PKK Desa Pasekan',
            'email' => 'admindesapasekan@gmail.com',
            'password' => Hash::make('pasekan'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 23,
            'id_desa' => 237
        ]);
        User::create([
            'name' => 'Admin PKK Desa Totoran',
            'email' => 'admindesatotoran@gmail.com',
            'password' => Hash::make('totoran'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 23,
            'id_desa' => 238
        ]);

        // admin desa arjasari
        User::create([
            'name' => 'Admin PKK Desa Arjasari',
            'email' => 'admindesaarjasari@gmail.com',
            'password' => Hash::make('arjasari'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 24,
            'id_desa' => 239
        ]);
        User::create([
            'name' => 'Admin PKK Desa Bugel',
            'email' => 'admindesabugel@gmail.com',
            'password' => Hash::make('bugel'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 24,
            'id_desa' => 240
        ]);
        User::create([
            'name' => 'Admin PKK Desa Limpas',
            'email' => 'admindesalimpas@gmail.com',
            'password' => Hash::make('limpas'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 24,
            'id_desa' => 241
        ]);
        User::create([
            'name' => 'Admin PKK Desa Mekarsari',
            'email' => 'admindesamekarsaripatrolgmail.com',
            'password' => Hash::make('mekarsaripatrol'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 24,
            'id_desa' => 242
        ]);
        User::create([
            'name' => 'Admin PKK Desa Patrol',
            'email' => 'admindesapatrol@gmail.com',
            'password' => Hash::make('patrol'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 24,
            'id_desa' => 243
        ]);
        User::create([
            'name' => 'Admin PKK Desa Patrol Baru',
            'email' => 'admindesapatrolbaru@gmail.com',
            'password' => Hash::make('patrolbaru'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 24,
            'id_desa' => 244
        ]);
        User::create([
            'name' => 'Admin PKK Desa Patrol Lor',
            'email' => 'admindesapatrollor@gmail.com',
            'password' => Hash::make('patrollor'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 24,
            'id_desa' => 245
        ]);
        User::create([
            'name' => 'Admin PKK Desa Sukahaji',
            'email' => 'admindesasukahaji@gmail.com',
            'password' => Hash::make('sukahaji'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 24,
            'id_desa' => 246
        ]);

        // admin desa babadan
        User::create([
            'name' => 'Admin PKK Desa Babadan',
            'email' => 'admindesababadan@gmail.com',
            'password' => Hash::make('babadan'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 25,
            'id_desa' => 247
        ]);
        User::create([
            'name' => 'Admin PKK Desa Dermayu',
            'email' => 'admindesadermayu@gmail.com',
            'password' => Hash::make('dermayu'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 25,
            'id_desa' => 248
        ]);
        User::create([
            'name' => 'Admin PKK Desa Kenanga',
            'email' => 'admindesakenanga@gmail.com',
            'password' => Hash::make('kenanga'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 25,
            'id_desa' => 249
        ]);
        User::create([
            'name' => 'Admin PKK Desa Panyindangan Kulon',
            'email' => 'admindesapanyindangankulon@gmail.com',
            'password' => Hash::make('panyindangankulon'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 25,
            'id_desa' => 250
        ]);
        User::create([
            'name' => 'Admin PKK Desa Panyindangan Wetan',
            'email' => 'admindesapanyindanganwetan@gmail.com',
            'password' => Hash::make('panyindanganwetan'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 25,
            'id_desa' => 251
        ]);
        User::create([
            'name' => 'Admin PKK Desa Penganjang',
            'email' => 'admindesapenganjang@gmail.com',
            'password' => Hash::make('penganjang'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 25,
            'id_desa' => 252
        ]);
        User::create([
            'name' => 'Admin PKK Desa Rambatan Wetan',
            'email' => 'admindesarambatanwetan@gmail.com',
            'password' => Hash::make('rambatanwetan'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 25,
            'id_desa' => 253
        ]);
        User::create([
            'name' => 'Admin PKK Desa Sindang',
            'email' => 'admindesasindang@gmail.com',
            'password' => Hash::make('sindang'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 25,
            'id_desa' => 254
        ]);
        User::create([
            'name' => 'Admin PKK Desa Terusan',
            'email' => 'admindesaterusan@gmail.com',
            'password' => Hash::make('terusan'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 25,
            'id_desa' => 255
        ]);
        User::create([
            'name' => 'Admin PKK Desa Wawantara',
            'email' => 'admindesawawantara@gmail.com',
            'password' => Hash::make('wawantara'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 25,
            'id_desa' => 256
        ]);

        // admin desa gadingan
        User::create([
            'name' => 'Admin PKK Desa Gadingan',
            'email' => 'admindesagadingan@gmail.com',
            'password' => Hash::make('gadingan'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 26,
            'id_desa' => 257
        ]);
        User::create([
            'name' => 'Admin PKK Desa Longok',
            'email' => 'admindesalongok@gmail.com',
            'password' => Hash::make('longok'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 26,
            'id_desa' => 258
        ]);
        User::create([
            'name' => 'Admin PKK Desa Majasari',
            'email' => 'admindesamajasari@gmail.com',
            'password' => Hash::make('majasari'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 26,
            'id_desa' => 259
        ]);

        // admin desa majasih
        User::create([
            'name' => 'Admin PKK Desa Majasih',
            'email' => 'admindesamajasih@gmail.com',
            'password' => Hash::make('majasih'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 26,
            'id_desa' => 260
        ]);
        User::create([
            'name' => 'Admin PKK Desa Mekargading',
            'email' => 'admindesamekargading@gmail.com',
            'password' => Hash::make('mekargading'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 26,
            'id_desa' => 261
        ]);
        User::create([
            'name' => 'Admin PKK Desa Sleman',
            'email' => 'admindesasleman@gmail.com',
            'password' => Hash::make('sleman'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 26,
            'id_desa' => 262
        ]);
        User::create([
            'name' => 'Admin PKK Desa Sleman Lor',
            'email' => 'admindesaslemanlor@gmail.com',
            'password' => Hash::make('slemanlor'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 26,
            'id_desa' => 263
        ]);
        User::create([
            'name' => 'Admin PKK Desa Sliyeg',
            'email' => 'admindesasliyeg@gmail.com',
            'password' => Hash::make('sliyeg'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 26,
            'id_desa' => 264
        ]);
        User::create([
            'name' => 'Admin PKK Desa Sliyeg Lor',
            'email' => 'admindesasliyeglor@gmail.com',
            'password' => Hash::make('sliyeglor'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 26,
            'id_desa' => 265
        ]);
        User::create([
            'name' => 'Admin PKK Desa Sudikampiran',
            'email' => 'admindesasudikampiran@gmail.com',
            'password' => Hash::make('sudikampiran'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 26,
            'id_desa' => 266
        ]);
        User::create([
            'name' => 'Admin PKK Desa Tambi',
            'email' => 'admindesatambi@gmail.com',
            'password' => Hash::make('tambi'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 26,
            'id_desa' => 267
        ]);
        User::create([
            'name' => 'Admin PKK Desa Tambi Lor',
            'email' => 'admindesatambilor@gmail.com',
            'password' => Hash::make('tambilor'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 26,
            'id_desa' => 268
        ]);
        User::create([
            'name' => 'Admin PKK Desa Tugu',
            'email' => 'admindesatugusliyeg@gmail.com',
            'password' => Hash::make('tugusliyeg'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 26,
            'id_desa' => 269
        ]);
        User::create([
            'name' => 'Admin PKK Desa Tugukidul',
            'email' => 'admindesatugukidul@gmail.com',
            'password' => Hash::make('tugukidul'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 26,
            'id_desa' => 270
        ]);
        User::create([
            'name' => 'Admin PKK Desa Bondan',
            'email' => 'admindesabondan@gmail.com',
            'password' => Hash::make('bondan'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 26,
            'id_desa' => 271
        ]);

        // admin desa cadang pinggan
        User::create([
            'name' => 'Admin PKK Desa Cadang Pinggan',
            'email' => 'admindesacadangpinggan@gmail.com',
            'password' => Hash::make('cadangpinggan'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 27,
            'id_desa' => 272
        ]);
        User::create([
            'name' => 'Admin PKK Desa Cibeber',
            'email' => 'admindesacibeber@gmail.com',
            'password' => Hash::make('cibeber'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 27,
            'id_desa' => 273
        ]);
        User::create([
            'name' => 'Admin PKK Desa Gedangan',
            'email' => 'admindesagedangan@gmail.com',
            'password' => Hash::make('gedangan'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 27,
            'id_desa' => 274
        ]);
        User::create([
            'name' => 'Admin PKK Desa Gunungsari',
            'email' => 'admindesagunungsari@gmail.com',
            'password' => Hash::make('gunungsari'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 27,
            'id_desa' => 275
        ]);
        User::create([
            'name' => 'Admin PKK Desa Sukagumiwang',
            'email' => 'admindesasukagumiwang@gmail.com',
            'password' => Hash::make('sukagumiwang'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 27,
            'id_desa' => 276
        ]);
        User::create([
            'name' => 'Admin PKK Desa Tersana',
            'email' => 'admindesatersana@gmail.com',
            'password' => Hash::make('tersana'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 27,
            'id_desa' => 277
        ]);

        // admin desa bogor
        User::create([
            'name' => 'Admin PKK Desa Bogor',
            'email' => 'admindesabogor@gmail.com',
            'password' => Hash::make('bogor'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 28,
            'id_desa' => 278
        ]);
        User::create([
            'name' => 'Admin PKK Desa Karang Layung',
            'email' => 'admindesakaranglayung@gmail.com',
            'password' => Hash::make('karanglayung'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 28,
            'id_desa' => 279
        ]);
        User::create([
            'name' => 'Admin PKK Desa Sukra',
            'email' => 'admindesasukra@gmail.com',
            'password' => Hash::make('sukra'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 28,
            'id_desa' => 280
        ]);
        User::create([
            'name' => 'Admin PKK Desa Sukrawetan',
            'email' => 'admindesasukrawetan@gmail.com',
            'password' => Hash::make('sukrawetan'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 28,
            'id_desa' => 281
        ]);
        User::create([
            'name' => 'Admin PKK Desa Sumuradem',
            'email' => 'admindesasumuradem@gmail.com',
            'password' => Hash::make('sumuradem'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 28,
            'id_desa' => 282
        ]);
        User::create([
            'name' => 'Admin PKK Desa Sumuradem Timur',
            'email' => 'admindesasumurademtimur@gmail.com',
            'password' => Hash::make('sumurademtimur'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 28,
            'id_desa' => 283
        ]);
        User::create([
            'name' => 'Admin PKK Desa Tagal Taman',
            'email' => 'admindesatagaltaman@gmail.com',
            'password' => Hash::make('tagaltaman'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 28,
            'id_desa' => 284
        ]);
        User::create([
            'name' => 'Admin PKK Desa Ujunggebang',
            'email' => 'admindesaujunggebang@gmail.com',
            'password' => Hash::make('ujunggebang'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 28,
            'id_desa' => 285
        ]);

        // admin desa cibereng
        User::create([
            'name' => 'Admin PKK Desa Cibereng',
            'email' => 'admindesacibereng@gmail.com',
            'password' => Hash::make('cibereng'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 29,
            'id_desa' => 286
        ]);
        User::create([
            'name' => 'Admin PKK Desa Cikawung',
            'email' => 'admindesacikawung@gmail.com',
            'password' => Hash::make('cikawung'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 29,
            'id_desa' => 287
        ]);
        User::create([
            'name' => 'Admin PKK Desa Jatimulya',
            'email' => 'admindesajatimulya@gmail.com',
            'password' => Hash::make('jatimulya'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 29,
            'id_desa' => 288
        ]);
        User::create([
            'name' => 'Admin PKK Desa Jatimunggul',
            'email' => 'admindesajatimunggul@gmail.com',
            'password' => Hash::make('jatimunggul'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 29,
            'id_desa' => 289
        ]);
        User::create([
            'name' => 'Admin PKK Desa Karangasem',
            'email' => 'admindesakarangasem@gmail.com',
            'password' => Hash::make('karangasem'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 29,
            'id_desa' => 290
        ]);
        User::create([
            'name' => 'Admin PKK Desa Kendayakan',
            'email' => 'admindesakendayakan@gmail.com',
            'password' => Hash::make('kendayakan'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 29,
            'id_desa' => 291
        ]);
        User::create([
            'name' => 'Admin PKK Desa Manggungan',
            'email' => 'admindesamanggungan@gmail.com',
            'password' => Hash::make('manggungan'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 29,
            'id_desa' => 292
        ]);
        User::create([
            'name' => 'Admin PKK Desa Plosokerep',
            'email' => 'admindesaplosokerep@gmail.com',
            'password' => Hash::make('plosokerep'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 29,
            'id_desa' => 293
        ]);
        User::create([
            'name' => 'Admin PKK Desa Rajasinga',
            'email' => 'admindesarajasinga@gmail.com',
            'password' => Hash::make('rajasinga'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 29,
            'id_desa' => 294
        ]);

        // admin desa bodas
        User::create([
            'name' => 'Admin PKK Desa Bodas',
            'email' => 'admindesabodas@gmail.com',
            'password' => Hash::make('bodas'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 30,
            'id_desa' => 295
        ]);
        User::create([
            'name' => 'Admin PKK Desa Cangko',
            'email' => 'admindesacangko@gmail.com',
            'password' => Hash::make('cangko'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 30,
            'id_desa' => 296
        ]);
        User::create([
            'name' => 'Admin PKK Desa Gadel',
            'email' => 'admindesagadel@gmail.com',
            'password' => Hash::make('gadel'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 30,
            'id_desa' => 297
        ]);
        User::create([
            'name' => 'Admin PKK Desa Karangkerta',
            'email' => 'admindesakarangkerta@gmail.com',
            'password' => Hash::make('karangkerta'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 30,
            'id_desa' => 298
        ]);
        User::create([
            'name' => 'Admin PKK Desa Kerticala',
            'email' => 'admindesakerticala@gmail.com',
            'password' => Hash::make('kerticala'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 30,
            'id_desa' => 299
        ]);
        User::create([
            'name' => 'Admin PKK Desa Lajer',
            'email' => 'admindesalajer@gmail.com',
            'password' => Hash::make('lajer'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 30,
            'id_desa' => 300
        ]);
        User::create([
            'name' => 'Admin PKK Desa Mekarsari',
            'email' => 'admindesamekarsari@gmail.com',
            'password' => Hash::make('mekarsari'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 30,
            'id_desa' => 301
        ]);
        User::create([
            'name' => 'Admin PKK Desa Pagedangan',
            'email' => 'admindesapagedangan@gmail.com',
            'password' => Hash::make('pagedangan'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 30,
            'id_desa' => 302
        ]);
        User::create([
            'name' => 'Admin PKK Desa Rancajawat',
            'email' => 'admindesarancajawat@gmail.com',
            'password' => Hash::make('rancajawat'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 30,
            'id_desa' => 303
        ]);
        User::create([
            'name' => 'Admin PKK Desa Sukadana',
            'email' => 'admindesasukadana@gmail.com',
            'password' => Hash::make('sukadana'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 30,
            'id_desa' => 304
        ]);
        User::create([
            'name' => 'Admin PKK Desa Sukamulya',
            'email' => 'admindesasukamulya@gmail.com',
            'password' => Hash::make('sukamulya'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 30,
            'id_desa' => 305
        ]);
        User::create([
            'name' => 'Admin PKK Desa Sukaperna',
            'email' => 'admindesasukaperna@gmail.com',
            'password' => Hash::make('sukaperna'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 30,
            'id_desa' => 306
        ]);
        User::create([
            'name' => 'Admin PKK Desa Tukdana',
            'email' => 'admindesatukdana@gmail.com',
            'password' => Hash::make('tukdana'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 30,
            'id_desa' => 307
        ]);

        // admin desa Bangkaloa Ilir
        User::create([
            'name' => 'Admin PKK Desa Bangkaloa Ilir',
            'email' => 'admindesabangkaloailir@gmail.com',
            'password' => Hash::make('Bangkaloa Ilir'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 31,
            'id_desa' => 308
        ]);
        User::create([
            'name' => 'Admin PKK Desa Bunder',
            'email' => 'admindesabunder@gmail.com',
            'password' => Hash::make('bunder'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 31,
            'id_desa' => 309
        ]);
        User::create([
            'name' => 'Admin PKK Desa Kalensari',
            'email' => 'admindesakalensari@gmail.com',
            'password' => Hash::make('kalensari'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 31,
            'id_desa' => 310
        ]);
        User::create([
            'name' => 'Admin PKK Desa Kasmaran',
            'email' => 'admindesakasmaran@gmail.com',
            'password' => Hash::make('kasmaran'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 31,
            'id_desa' => 311
        ]);
        User::create([
            'name' => 'Admin PKK Desa Kongsijaya',
            'email' => 'admindesakongsijaya@gmail.com',
            'password' => Hash::make('kongsijaya'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 31,
            'id_desa' => 312
        ]);
        User::create([
            'name' => 'Admin PKK Desa Leuwigede',
            'email' => 'admindesaleuwigede@gmail.com',
            'password' => Hash::make('leuwigede'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 31,
            'id_desa' => 313
        ]);
        User::create([
            'name' => 'Admin PKK Desa Ujung Pondok Jaya',
            'email' => 'admindesaujungpondokjaya@gmail.com',
            'password' => Hash::make('ujungpondokjaya'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 31,
            'id_desa' => 314
        ]);
        User::create([
            'name' => 'Admin PKK Desa Ujungaris',
            'email' => 'admindesaujungaris@gmail.com',
            'password' => Hash::make('ujungaris'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 31,
            'id_desa' => 315
        ]);
        User::create([
            'name' => 'Admin PKK Desa Ujungjaya',
            'email' => 'admindesaujungjaya@gmail.com',
            'password' => Hash::make('ujungjaya'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 31,
            'id_desa' => 316
        ]);
        User::create([
            'name' => 'Admin PKK Desa Widasari',
            'email' => 'admindesawidasari@gmail.com',
            'password' => Hash::make('widasari'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 31,
            'id_desa' => 317
        ]);

        //
        User::create([
            'name' => 'Admin PKK Kecamatan Anjatan',
            'email' => 'adminkecamatanarahan@gmail.com',
            'password' => Hash::make('adminkecamatanarahan@gmail.com'),
            'user_type' => 'admin_kecamatan',
            'id_kecamatan' => 2,
            'id_desa' => null,
        ]);
        User::create([
            'name' => 'Admin PKK Kecamatan Arahan Kidul',
            'email' => 'adminkecamatananjatan@gmail.com',
            'password' => Hash::make('adminkecamatananjatan@gmail.com'),
            'user_type' => 'admin_kecamatan',
            'id_kecamatan' => 1,
            'id_desa' => null,
        ]);

    }
}
